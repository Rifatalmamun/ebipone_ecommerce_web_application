<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;

class WishlistController extends Controller
{
    public function AddWishlist($id)
    {   

        if (Auth::check()){

        }else{

              return response()->json(['error' => 'At first login your account']);    
    	 }

    	$userid=Auth::user()->id;                                                                                
    	$check=DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

    	$data = array(
    		'user_id' => $userid, 
    		'product_id'=>$id 
    	); 

    	if (Auth::check()) {

    		if ($check) {  
                return response()->json(['error' => 'Product Already has on your wishlist']);       
    		}else{
    			DB::table('wishlists')->insert($data);
             return response()->json(['success' => 'Successfully Added on your wishlist']);   		
    		}
        }
        else{

              return response()->json(['error' => 'At first login your account']);    
    	 }

	}
	
	public function ViewWishlist(){

		$wishlist = DB::table('wishlists')
					->join('products','wishlists.product_id','products.id')
					->select('wishlists.*','products.un_id','products.product_name','products.discount','products.cashback','products.selling_price')
					->get(); 

		$wishlist_count = DB::table('wishlists')
					->join('products','wishlists.product_id','products.id')
					->select('wishlists.*','products.product_name','products.discount','products.cashback','products.selling_price')
					->count(); 

		return view('templates.wishlist.wishlist',compact('wishlist','wishlist_count'));                  

	}

	public function deleteWishlistItem($id){

		$deleteWishlist = DB::table('wishlists')->where('id',$id)->delete();

		if($deleteWishlist){
			$notification=array(
				'messege'=>'Successfully Deleted',
				 'alert-type'=>'info'
		   );
		 return Redirect()->back()->with($notification);
		}else{
			$notification=array(
				'messege'=>'Something wrong',
				 'alert-type'=>'info'
		   );
		 return Redirect()->back()->with($notification);
		}
	}

	public function destroy(){

		$destroy = DB::table('wishlists')->delete();

		if($destroy){
			$notification=array(
				'messege'=>'Successfully Clear Wishlist',
				 'alert-type'=>'info'
		   );
		 return Redirect()->back()->with($notification);
		}else{
			$notification=array(
				'messege'=>'Something wrong',
				 'alert-type'=>'info'
		   );
		 return Redirect()->back()->with($notification);
		}



	}
}
