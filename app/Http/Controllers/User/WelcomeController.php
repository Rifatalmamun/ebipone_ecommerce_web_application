<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;

class WelcomeController extends Controller
{
    public function showWelcomePage(){

        $category = DB::table('categories')->get();
        $brands = DB::table('brands')->where('show_home','yes')->get();  
        $shop = DB::table('users')->where('shop_status','approve')->where('shop_block','0')->where('show_home','yes')->get();

        $products = DB::table('products')
                        ->join('users','users.id','products.product_owner_id')
                        ->join('categories','categories.id','products.category_id')
                        ->join('subcategories','subcategories.id','products.subcategory_id') 
                        ->select('products.*','users.name','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')->where('products.status','active')->where('products.show_home','1')
                        ->get();   

        $productss = DB::table('products')
                        ->join('users','users.id','products.product_owner_id')
                        ->join('categories','categories.id','products.category_id')
                        ->join('subcategories','subcategories.id','products.subcategory_id') 
                        ->select('products.*','users.name','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')->where('products.status','active')->where('products.show_home','1')
                        ->limit(12)->orderBy('id','DESC')->get();  

	//return response()->json($slide_products);

        $sections = DB::table('sections')->get();               

        return view('welcome',compact('category','brands','shop','products','sections','productss'));                                                     
    }
    public function showAboutPage(){

        $shop = DB::table('users')->where('isVendor',1)->count();
        $product = DB::table('products')->where('status','active')->count();
        $user = DB::table('users')->count();

        $shop = 500 + $shop;
        $product = 5000 + $product;
        $user = 50000 + $user; 

        return view('templates.about',compact('shop','product','user'));                                 
    }

    public function showContactPage(){

        return view('templates.contact');
    }

    public function showTermsPage(){

        return view('templates.terms');  
    }

    public function showPrivacyPage(){
        return view('templates.policy');  
    }

    public function deliveryPolicyPage(){
        return view('templates.deliveryPolicy');  
    }

    public function returnPolicyPage(){
        return view('templates.returnPolicy');  
    }

    public function refundPolicyPage(){
        return view('templates.refundPolicy');  
    }
    public function faqPage(){
        return view('templates.faq');  
    }
}