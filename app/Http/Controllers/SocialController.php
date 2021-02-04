<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
use DB;


class SocialController extends Controller
{

public function redirect($provider)
{
    return Socialite::driver($provider)->redirect();
}

public function callback($provider)
{
    $getInfo = Socialite::driver($provider)->user();

    $user = $this->createUser($getInfo,$provider);

    DB::table('users')->where('id',$user->id)->update(['email_verified_at' => now()]);
    auth()->login($user);
 
    return redirect()->to('/home');
}

function createUser($getInfo,$provider){

    if($provider=='google'){
        $user = User::where('email',$getInfo->email)->first();
        
        if($user){
            return $user;
        }
    }

    if($provider=='facebook'){

        $user = User::where('email',$getInfo->email)->first();

        if($user){
            return $user;
        }
    }
  $user = User::where('provider_id', $getInfo->id)->first(); 

 if (!$user) {

        $user = User::create([
            'name'     => $getInfo->name,
            'email'    => $getInfo->email,
            'provider' => $provider,
            'provider_id' => $getInfo->id,
        ]);
  }
  return $user;
 }
}
