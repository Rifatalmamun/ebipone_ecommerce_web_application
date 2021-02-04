<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Cart;
use Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $brands = DB::table('brands')->get(); 
            return view('templates.brand.index',compact('brands'));   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($brand_name)
    {
        $products = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->join('brands','brands.id','products.brand_id')
                    ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name','brands.brand_name')
                    ->where('brands.brand_name',$brand_name)
                    ->get();
        $others_products = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->where('products.status','active') 
                    ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')
                    ->orderBy('id','DESC')->get();

        $count = DB::table('products')
                    ->join('users','users.id','products.product_owner_id')
                    ->join('categories','categories.id','products.category_id')
                    ->join('subcategories','subcategories.id','products.subcategory_id') 
                    ->join('brands','brands.id','products.brand_id')
                    ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name','brands.brand_name')
                    ->where('brands.brand_name',$brand_name)
                    ->count(); 
        $brands = DB::table('brands')->where('show_home','yes')->get();   
                    
        return view('templates.brand.brand_product',compact('products','others_products','count','brands','brand_name')) ;
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
