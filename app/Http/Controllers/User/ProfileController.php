<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use DB;
use Image;
class ProfileController extends Controller
{

    public function apply(){

        return view('apply');
    }

    public function createShop(){

        return 'create shop';
    }

    public function createWarehosue(){

        return ' createWarehosue';
    }

    public function createPickupPoint(){

        return ' createWarehosue';
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showPasswordChangeForm(){

        return view('templates.profile.password_change_form');
    }

    public function changeUserPassword(Request $request){


      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;

      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      if(strlen($newpass)<8){
                        $notification=array(
                            'messege'=>'Password length must be greater or equeal 8',
                            'alert-type'=>'error'
                             );
                             return Redirect()->back()->with($notification);
                      }else{
                        $user=User::find(Auth::id());
                        $user->password=Hash::make($request->password);
                        $user->save();
                        Auth::logout();  
                        $notification=array(
                          'messege'=>'Password Changed Successfully ! Now Login with Your New Password',
                          'alert-type'=>'info'
                           );
                         return Redirect()->route('login')->with($notification); 
                        }
                      
                 }else{
                     $notification=array(
                        'messege'=>'New password and Confirm Password not matched!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                    }     
            }else{
                    $notification=array(
                            'messege'=>'Old Password not matched!',
                            'alert-type'=>'error'
                            );
                        return Redirect()->back()->with($notification);
                }
    }

    public function showUserProfile(){

        $id = Auth::user()->id;
        $data = DB::table('users')->where('id',$id)->first(); 
        return view('user_profile_page',compact('data'));
    }

    public function showProfileEditForm(){

        $id = Auth::user()->id;
        $data = DB::table('users')->where('id',$id)->first();
        //$city_data = DB::table('cities')->get();

        return view('templates.profile.edit',compact('data'));
    }

    public function updateUserProfile(Request $request){

        $validatedData = $request->validate([

            'phone' => 'required|digits:11',

        ]);

        $id = Auth::user()->id;

        $data=array();

    	$data['name']=$request->name;
    	$data['username']=$request->username;
    	$data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['gender']=$request->gender;
        $data['birthday']=$request->birthday;
        $data['village']=$request->village;
        $data['postcode']=$request->postcode;
        $data['ps']=$request->ps;
        $data['district']=$request->district;
    	$data['address']=$request->village.'-'.$request->ps.'-'.$request->district;

        $old_profile_pic  = $request->old_avatar;
        $profile_pic  = $request->avatar;

        
        //return response()->json($data);

        if($profile_pic){ 

            if($old_profile_pic){
                unlink($request->old_avatar);
            }
            $image_name= hexdec(uniqid()).'.'.$profile_pic->getClientOriginalExtension();
                Image::make($profile_pic)->resize(90,90)->save('public/media/profile/'.$image_name);
                $data['avatar']='public/media/profile/'.$image_name;
        }

        $update = DB::table('users')->where('id',$id)->update($data);


        if($update){
            $notification=array(
                'messege'=>'Profile Updated Successfully !',
                'alert-type'=>'info'
                 );
            return Redirect()->route('home')->with($notification); 
        }else{
            $notification=array(
                'messege'=>'Profile data reamin same !',
                'alert-type'=>'warning'
                 );
            return Redirect()->route('home')->with($notification);   
        }
 
    }

}
