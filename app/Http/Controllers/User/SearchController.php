<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class SearchController extends Controller
{


    public function searchOrderByShopPickupPoint(Request $request){

        $phone              = $request->phone;
        $transaction_id     = $request->transaction_id;



        if($transaction_id!=''){
            $order_parent = DB::table('orders')->where('phone',$phone)->where('transaction_id',$transaction_id)->first();
        }else{
            $order_parent = DB::table('orders')->where('phone',$phone)->first();
        }

        //return response()->json($order_parent);

                if($order_parent!=null){
                    
                    $search_order  = DB::table('order_childs')
                                        ->join('orders','orders.id','order_childs.order_id')
                                        ->join('products','products.id','order_childs.product_id')
                                        ->select('order_childs.*','products.un_id','products.product_name','products.image_one','orders.finalStatus','orders.admin_status','orders.order_date','orders.order_time','orders.s_district','orders.s_area')
                                        ->where('orders.id',$order_parent->id)
                                        ->where('orders.phone',$phone)               
                                        ->where('orders.status','complete')
                                        ->where('orders.reason','order_product')->get();

                    $search_order = json_encode($search_order);

                    if($request->page=='new'){
                                            return view('templates.my shop.new_order')->with('search_order',json_decode($search_order));  
                                        }elseif($request->page=='pending'){
                                            return view('templates.my shop.delivery_pending')->with('search_order',json_decode($search_order));  
                                        }else{
                                            return view('templates.my shop.delivery_complete')->with('search_order',json_decode($search_order));  
                                        }                    

                }

                return view('templates.my shop.new_order');  
    }

    public function trackOrder(Request $request){

        $order = DB::table('orders')->where('transaction_id',$request->transaction_id)->first();
        $count = DB::table('orders')->where('transaction_id',$request->transaction_id)->count();

        return view('templates.product.track',compact('order','count'));                           
    }

    public function searchResult(Request $request){

        return redirect('/search-result-'.$request->cat.'-'.$request->search_key); 
    }

    public function searchValue($category,$search_key){

        if($category=='all_category'){
            $products = DB::table('products')
                        ->join('users','users.id','products.product_owner_id')
                        ->join('categories','categories.id','products.category_id')
                        ->join('subcategories','subcategories.id','products.subcategory_id') 
                        ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')
                        ->where('products.product_name','LIKE', "%{$search_key}%")->where('products.status','active')->get();
            $count = DB::table('products')
                        ->join('users','users.id','products.product_owner_id')
                        ->join('categories','categories.id','products.category_id')
                        ->join('subcategories','subcategories.id','products.subcategory_id') 
                        ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')
                        ->where('products.product_name','LIKE', "%{$search_key}%")->where('products.status','active')->count();
        }else{
            $products = DB::table('products')
                        ->join('users','users.id','products.product_owner_id')
                        ->join('categories','categories.id','products.category_id')
                        ->join('subcategories','subcategories.id','products.subcategory_id') 
                        ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')
                        ->where('products.product_name','LIKE', "%{$search_key}%")->where('categories.category_name',$category)->where('products.status','active')->get();

            $count = DB::table('products')
                        ->join('users','users.id','products.product_owner_id')
                        ->join('categories','categories.id','products.category_id')
                        ->join('subcategories','subcategories.id','products.subcategory_id') 
                        ->select('products.*','users.name','users.phone','users.email','users.district','users.village','users.ps','users.postcode','users.shop_address','users.shop_name','users.shop_id','categories.category_name','subcategories.subcategory_name')
                        ->where('products.product_name','LIKE', "%{$search_key}%")->where('categories.category_name',$category)->where('products.status','active')->count();
        }

        

        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();

        return view('templates.product.search_result',compact('products','category','brand','count'));
    }

    public function test(Request $request){

        

        return 'filter';
    }
}




