<?php

use Illuminate\Support\Facades\Route;

// 500 ERROR MESSAGE TESTING

    Route::get('/test', function(){
    return 'Test route';
});

Route::get('/apply', 'User\ProfileController@apply')->name('apply')->middleware('verified')->middleware('auth');

Route::get('/apply/shop','User\ShopController@createForm')->name('shop.create')->middleware('verified')->middleware('auth');
Route::get('/apply/pickup-point', 'User\WarehouseController@create')->name('pickuppoint.create')->middleware('verified')->middleware('auth');
Route::get('/apply/warehouse', 'User\ProfileController@createWarehosue')->name('warehouse.create')->middleware('verified')->middleware('auth');


// WELCOME PAGE + SOME COMMON WEB PAGE ROUTE
    Route::get('/', 'User\WelcomeController@showWelcomePage')->name('welcome');
    Route::get('/about', 'User\WelcomeController@showAboutPage')->name('about');
    Route::get('/contact', 'User\WelcomeController@showContactPage')->name('contact');
    Route::get('/terms-condition', 'User\WelcomeController@showTermsPage')->name('terms'); 
    Route::get('/privacy', 'User\WelcomeController@showPrivacyPage')->name('privacy'); 
    Route::get('/delivery-policy', 'User\WelcomeController@deliveryPolicyPage')->name('deliveryPolicy'); 
    Route::get('/return-policy', 'User\WelcomeController@returnPolicyPage')->name('returnPolicy'); 
    Route::get('/refund-policy', 'User\WelcomeController@refundPolicyPage')->name('refundPolicy'); 
    Route::get('/faq', 'User\WelcomeController@faqPage')->name('faq'); 
 
    
// ADMIN ROUTE FILE LOCATION 
    Route::prefix('admin')->group(base_path('routes/admin.php')); 

    
// USER AUTHENTICATION + PASSWORD CHANGE ROUTE 
    Auth::routes(['verify' => true]); 
    Route::get('/user/password/change', 'User\ProfileController@showPasswordChangeForm')->name('show.user.password.change')->middleware('auth');
    Route::post('/user/password/change', 'User\ProfileController@changeUserPassword')->name('change.user.password')->middleware('auth');
    Route::get('/home', 'HomeController@index')->middleware('verified')->name('home');


// USER PROFILE SHOW EDIT UPDATE ROUTE
    Route::get('/show/user/profile', 'User\ProfileController@showUserProfile')->middleware('verified')->name('show.user.profile')->middleware('auth');
    Route::get('/edit/user/profile', 'User\ProfileController@showProfileEditForm')->middleware('verified')->name('show.profile.edit.form')->middleware('auth') ;
    Route::post('/update/user/profile', 'User\ProfileController@updateUserProfile')->middleware('verified')->name('update.user.profile')->middleware('auth');


// CART ROUTE
    Route::get('cart','User\CartController@showCart')->name('cart'); 
    Route::get('cart/product/view/{id}','User\CartController@ViewProduct'); 
    Route::post('insert/into/cart/','User\CartController@InsertCart')->name('insert.into.cart');
    Route::post('insert/to/cart/','User\CartController@InsertToCart')->name('insert.to.cart');
    Route::get('add/to/cart/{id}','User\CartController@AddCart');                                                       
    Route::get('check','User\CartController@check');    
    Route::get('delete/cart/product/{rowId}','User\CartController@removeCart');  
    Route::get('cart/destroy','User\CartController@destroy'); 

    Route::get('/get/cart/value/','User\CartController@getCart');   // update cart balance without page load
    Route::post('update-cart-item','User\CartController@UpdateCart')->name('updateCartItem');

 
// WISHLIST ROUTE
    Route::get('/add/wishlist/{id}','User\WishlistController@AddWishlist');
    Route::get('/wishlist','User\WishlistController@ViewWishlist')->name('wishlist');
    Route::get('/delete/wishlist/product/{id}','User\WishlistController@deleteWishlistItem');  
    Route::get('destroy/wishlist','User\WishlistController@destroy');    


// SHOP ROUTE 
    //Route::get('/shop/create', 'User\ShopController@createForm')->name('shop.create')->middleware('verified')->middleware('auth');
    Route::get('/edit/shop/{id}', 'User\ShopController@editShop')->middleware('verified')->middleware('auth');
    Route::post('/update/store', 'User\ShopController@updateShop')->name('update.shop')->middleware('verified')->middleware('auth'); 
    Route::post('/shop/store', 'User\ShopController@storeShop')->name('shop.store')->middleware('verified')->middleware('auth');
    Route::get('/shop', 'User\ShopController@myShop')->name('shop')->middleware('verified')->middleware('auth'); 
    Route::get('/shop/product/{id}','User\ShopController@viewShopProduct')->middleware('verified')->middleware('auth');  
    Route::get('shops','User\ProductController@allShop')->name('all.shop'); 
    Route::get('/shop/{shop_name}', 'User\ProductController@shopProduct');  

    Route::get('/shop-new-order','User\ShopController@newOrder')->name('shop.new.order')->middleware('verified')->middleware('auth');  
    
    Route::post('/send-to-warehouse','User\ShopController@sendToWarehouse')->name('send-to-warehouse')->middleware('verified')->middleware('auth');

    Route::get('/shop-delivery-pending-order','User\ShopController@deliveryPending')->name('shop.delivery.pending.order')->middleware('verified')->middleware('auth');  
    Route::get('/shop-delivery-complete','User\ShopController@deliveryComplete')->name('shop.delivery.complete')->middleware('verified')->middleware('auth');  
    
    Route::get('/order-invoice-{id}', 'User\ShopController@order_invoice')->middleware('verified')->middleware('auth');	

//  CATEGORY ROUTE
    Route::get('category/{category_name}', 'User\ProductController@categoryProduct'); 

// BRAND
    Route::get('brands','User\BrandController@index')->name('brand'); 
    // Route::get('brands/{brand_name}','User\BrandController@brandByName');  
    Route::get('brand/{brand_name}','User\BrandController@show'); 

// PRODUCT ROUTE 
    Route::get('/product/create', 'User\ProductController@create')->name('product.create')->middleware('verified')->middleware('auth');
    Route::post('/product/store', 'User\ProductController@store')->name('product.store')->middleware('verified')->middleware('auth');
    Route::get('/{un_id}/{product_name}', 'User\ProductController@show'); 


    Route::post('/get-one-taka-product', 'User\ProductController@getOneTakaProduct')->name('get.one.taka.product')->middleware('verified')->middleware('auth');


//  SUBCATEGORY ROUTE
    Route::get('category/{subcategory_name}', 'User\ProductController@subcategoryProduct');  

// SEARCH PRODUCT
    Route::post('/search', 'User\SearchController@SearchResult')->name('search');   
    Route::post('/filter/data', 'User\SearchController@test')->name('filter');      
    Route::get('/search-result-{category_name}-{search_key}', 'User\SearchController@searchValue');   
    

// COMPARE ROUTE
    Route::get('/add/compare/{id}','User\CompareController@store');
    Route::get('/compare-products','User\CompareController@index')->name('compare.index');
    Route::get('/compare/clear/all','User\CompareController@destroy')->name('compare.destroy');



// CHECKOUT -- PAYMENT -- INVOICE ROUTE
    Route::get('/checkout','User\PaymentController@proceed')->name('proceed.to.checkout');
    Route::post('/payment','User\PaymentController@paymentData')->name('order.with.payment'); 
    Route::get('/order/invoice/{transaction_id}','User\PaymentController@invoice');

    
// ORDER TRACK
    Route::post('/track','User\SearchController@trackOrder')->name('trackOrder');                   


// SSLCOMMERZ Start
    
    Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
    Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');
    Route::post('/pay', 'SslCommerzPaymentController@index');
    Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax'); 

    // Route::post('/pay/via/ajax/{amount}', 'SslCommerzPaymentController@payViaAjax'); 
    Route::post('/success', 'SslCommerzPaymentController@success');
    Route::post('/fail', 'SslCommerzPaymentController@fail');
    Route::post('/cancel', 'SslCommerzPaymentController@cancel');
    Route::post('/ipn', 'SslCommerzPaymentController@ipn');



// SSL MONEY UPLOAD ROUTE 

    Route::post('/sslupload/{amount}/{id}', 'SslUploadController@sslUpload'); 
    Route::get('upload/example1', 'SslUploadController@exampleEasyCheckout');
    Route::get('upload/example2', 'SslUploadController@exampleHostedCheckout');
    Route::post('upload/pay', 'SslUploadController@index');
    Route::post('upload/success', 'SslUploadController@success');
    Route::post('upload/fail', 'SslUploadController@fail');
    Route::post('upload/cancel', 'SslUploadController@cancel');
    Route::post('upload/ipn', 'SslUploadController@ipn');



Route::post('pay-with-ebipone-balance', 'User\PaymentController@payWithEbiponeBalance')->name('payWitheBiponeBalance');

// SESSION ORDERDATASESSION

    Route::get('/session', 'User\PaymentController@checkSession');
    Route::get('/clear', 'User\PaymentController@clearSession');

// CONTACT MESSAGE 
    Route::post('/contact-message', 'User\RatingController@store')->name('customer.send.message'); 

// UPLOAD MONEY 
    Route::post('/upload-money', 'User\MoneyController@upload')->name('uploadMoney'); 

// TRANSACTION HISTORY 
    Route::GET('/transaction-history', 'User\TransactionController@index')->name('transactionHistory');  

//GIFT VOUCHER ROUTE 
    Route::GET('/gift-voucher', 'User\GiftController@index')->name('gift'); 
    Route::GET('/gift-voucher-{voucher_code}', 'User\GiftController@show');   
    Route::GET('/purchase-gift-{voucher_code}', 'User\GiftController@giftInvoice')->middleware('verified')->middleware('auth');  
    Route::GET('/gift-purchase-complete-{id}', 'User\GiftController@purchaseComplete')->middleware('verified')->middleware('auth');  
    Route::GET('/my-gift-pending', 'User\GiftController@myGiftPendingHistory')->name('my.gift.pending')->middleware('verified')->middleware('auth');  
    
// WAREHOUSE ROUTE 
    Route::get('/warehouse-account', 'User\WarehouseController@index')->name('warehouse.index')->middleware('verified')->middleware('auth');

    Route::post('/warehouse/store', 'User\WarehouseController@store')->name('warehouse.store')->middleware('verified')->middleware('auth');                             
    
    Route::get('/warehouse-upcomming-product', 'User\WarehouseController@show_upcomming_product')->name('warehouse.upcomming.product')->middleware('verified')->middleware('auth'); 
    Route::get('/warehouse-received-product', 'User\WarehouseController@show_receive_product')->name('warehouse.receive.product')->middleware('verified')->middleware('auth'); 
    Route::get('/warehouse-delivery-pending', 'User\WarehouseController@show_delivery_pending')->name('warehouse.delivery.pending')->middleware('verified')->middleware('auth'); 
    Route::get('/warehouse-complete-order', 'User\WarehouseController@show_order_complete')->name('warehouse.order.complete')->middleware('verified')->middleware('auth'); 
    
    Route::get('/edit/warehouse/{id}', 'User\WarehouseController@edit')->middleware('verified')->middleware('auth'); 
    Route::post('/update/warehouse', 'User\WarehouseController@update')->name('warehouse.update')->middleware('verified')->middleware('auth'); 
    
    Route::post('/warehouse-receive-product', 'User\WarehouseController@warehouse_receive')->middleware('verified')->middleware('auth')->name('warehouse.received'); 
    Route::get('/warehouse-view-order-details-{id}', 'User\WarehouseController@viewOrder')->middleware('verified')->middleware('auth'); 

    Route::post('/warehouse-send-product-to-customer', 'User\WarehouseController@warehouse_send_to_customer')->middleware('verified')->middleware('auth')->name('warehouse.send.to.customer'); 
    Route::get('/warehouse-order-complete-{id}', 'User\WarehouseController@order_complete')->middleware('verified')->middleware('auth'); 

    
    Route::get('/warehouse-order-complete-invoice-{id}', 'User\WarehouseController@order_complete_invoice')->middleware('verified')->middleware('auth'); 


    Route::post('/order-search-result', 'User\SearchController@searchOrderByShopPickupPoint')->middleware('verified')->middleware('auth')->name('search_order_by_shop_and_pickup_point'); 



    Route::get('/warehouse/view/order/json/{id}', 'User\WarehouseController@viewOrderJson')->middleware('verified')->middleware('auth'); 
    Route::get('/warehouse/view/order/json/second/{id}', 'User\WarehouseController@viewOrderJsonSecond')->middleware('verified')->middleware('auth'); 

    

    Route::get('/pickup-point-pirnt-invoice-{id}', 'User\WarehouseController@printPage')->middleware('verified')->middleware('auth'); 





    // Route::get('/edit/shop/{id}', 'User\ShopController@editShop')->name('shop.create')->middleware('verified')->middleware('auth'); 
    // Route::post('/update/store', 'User\ShopController@updateShop')->name('update.shop')->middleware('verified')->middleware('auth'); 
    // Route::post('/shop/store', 'User\ShopController@storeShop')->name('shop.store')->middleware('verified')->middleware('auth');
    // Route::get('/shop', 'User\ShopController@myShop')->name('shop')->middleware('verified')->middleware('auth'); 
    // Route::get('/shop/product/{id}','User\ShopController@viewShopProduct')->middleware('verified')->middleware('auth');  
    // Route::get('shops','User\ProductController@allShop')->name('all.shop'); 
    // Route::get('/shop/{shop_name}', 'User\ProductController@shopProduct');  













    