<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;

class logoController extends Controller
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

        $three_to = DB::table('logos')->whereBetween('logos.logo_rating', [3, 3.9])
        ->join('users','logos.user_id','users.id')
        ->select('logos.*','users.username','users.profile_pic','users.name','users.phone')
        ->orderBy('logos.logo_rating', 'DESC')
        ->get();

        $below_three_logo = DB::table('logos')->whereBetween('logos.logo_rating', [0.1, 2.9])
        ->join('users','logos.user_id','users.id')
        ->select('logos.*','users.username','users.profile_pic','users.name','users.phone')
        ->get();

        //return response()->json($three_to);

        $new_logo = DB::table('logos')->where('logos.logo_rating',null)
        ->join('users','logos.user_id','users.id')
        ->select('logos.*','users.username','users.profile_pic','users.name','users.phone')
        ->get();

        return view('admin.logo.index',compact('five_star_logo','four_to','three_to','below_three_logo','new_logo'));
    }

    public function fivestarLogo(){

        $five_star_logo = DB::table('logos')->where('logos.logo_rating','=',5)
        ->join('users','logos.user_id','users.id')
        ->select('logos.*','users.username','users.profile_pic','users.name','users.phone')
        ->get();

        return view('admin.logo.index',compact('five_star_logo'));
    }



    
    public function topLogo()
    {
        $data = DB::table('logos')->where('logo_rating','>=',4.5)->orderBy('logo_rating', 'DESC')->get();

        $pageName='Top';
        $ac = 'toplogo';
        return view('admin.logo.index',compact('ac','pageName','data'));
    }




    public function newLogo()
    {
        $data = DB::table('logos')->where('logo_rating',null)->get();


        $pageName='New';
        $ac = 'newlogo';
        return view('admin.logo.index',compact('ac','pageName','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('logos')->where('id',$id)->first();
        $countComment = DB::table('ratings')->where('logo_id',$id)->count();
        $allComments = DB::table('ratings')->where('logo_id',$id)
            ->join('users','ratings.rating_from','users.id')
            ->select('ratings.*','users.username','users.profile_pic','users.name')
        ->get();

        return view('admin.logo.show',compact('data','countComment','allComments'));
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
        $logo = DB::table('logos')->where('id',$id)->first();

        $logo_pic = $logo->logo;

        if($logo_pic){
            unlink($logo_pic); 
        }

        $delete = DB::table('logos')->where('id',$id)->delete();

        if($delete){
            $notification=array(
                'messege'=>'Logo deleted successfully !',
                'alert-type'=>'success'
                );
        }else{
            $notification=array(
                'messege'=>'Nothing deleted !',
                'alert-type'=>'warning'
                );
        }

        return Redirect()->route('admin.index.logo')->with($notification); 
    }
}
