<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use DB;
use Image;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $five_star_logo = DB::table('logos')->where('logos.logo_rating','=',5)
        ->join('users','logos.user_id','users.id')
        ->select('logos.*','users.username','users.profile_pic','users.name','users.phone')
        ->get();

        $four_to = DB::table('logos')->whereBetween('logos.logo_rating', [4, 4.9])
        ->join('users','logos.user_id','users.id')
        ->select('logos.*','users.username','users.profile_pic','users.name','users.phone')
        ->orderBy('logos.logo_rating', 'DESC')
        ->get();

        $below_four_logo = DB::table('logos')->whereBetween('logos.logo_rating', [0.1, 3.9])
        ->join('users','logos.user_id','users.id')
        ->select('logos.*','users.username','users.profile_pic','users.name','users.phone')
        ->get();

        //return response()->json($three_to);

        $new_logo = DB::table('logos')->where('logos.logo_rating',null)
        ->join('users','logos.user_id','users.id')
        ->select('logos.*','users.username','users.profile_pic','users.name','users.phone')
        ->get();

        return view('templates.logo.index',compact('five_star_logo','four_to','below_four_logo','new_logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.logo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
            // validation 
            $validatedData = $request->validate([
                'logo_concept'  => 'required|min:25|max:300', 
                //'logo'  => 'required|image|mimes:jpg,png|max:2000', 
                'logo' => 'required|mimes:jpeg,jpg,png|max:2024',
                //'logo'  => 'required|image|mimes:jpg,png|max:2000', 
            ]);

            $data = array();
                
            $data['user_id'] = Auth::user()->id;
            $data['logo_concept'] = $request->logo_concept;

            $data['day']   = date("d"); 
            $data['month'] = date("M"); 
            $data['year']  = date("Y");  

            date_default_timezone_set("Asia/Dhaka");
            $data['time'] = date("h:i:sa");

            $logo  = $request->logo;    
    
            if($logo){ 
                $image_name= hexdec(uniqid()).'.'.$logo->getClientOriginalExtension();
                    Image::make($logo)->resize(300,300)->save('public/media/logo/'.$image_name);    
                    $data['logo']='public/media/logo/'.$image_name;
            }

            $insert = DB::table('logos')->insert($data); 

        
            if($insert){
                $notification=array(
                    'messege'=>'Your logo submitted successfully !',
                    'alert-type'=>'success'
                    );
            }else{
                $notification=array(
                    'messege'=>'Something wrong !',
                    'alert-type'=>'warning'
                    );
            }
            return Redirect()->route('home')->with($notification); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('logos')->where('logos.id',$id)
        ->join('users','logos.user_id','users.id')
        ->select('logos.*','users.username','users.name','users.profile_pic')
        ->first();

        //return response()->json($data);

        $allComments = DB::table('ratings')->where('logo_id',$id)
            ->join('users','ratings.rating_from','users.id')
            ->select('ratings.*','users.username','users.profile_pic','users.name')
        ->get();

        return view('templates.logo.show',compact('data','allComments'));
        //return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
