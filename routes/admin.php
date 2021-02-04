<?php

// here we write all admin releted route...........................................

    Route::post('admin-login','Admin\LoginController@login')->name('admin.login');
    Route::get('admin-login','Admin\LoginController@adminlogin')->name('admin.login.get');

    Route::get('admin-password-change','Admin\LoginController@showPasswordChangeForm')->name('admin.password.change');
    Route::post('admin-password-change-update','Admin\LoginController@adminPasswordChangeUpdate')->name('admin.password.change.update');

    Route::get('admin-forgot-password','Admin\ForgotPasswordController@adminLinkRequestForm')->name('admin.forgot.password');
    Route::post('admin-password-mail','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('admin-password-reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('admin-password-update','Admin\ResetPasswordController@reset')->name('admin.password.update');


Route::group(['middleware'=>'auth:admin'],function(){

    Route::get('dashboard','AdminController@dashboard')->name('admin.dashboard'); 
    Route::get('admin-logout','AdminController@logout')->name('admin.logout'); 

    // CUSTOMER ROUTE
    Route::get('customer','Admin\UserController@index')->name('admin.index.customer'); 

    Route::get('unveried-customer','Admin\UserController@unVerifiedUser')->name('admin.unverified.customer');

    Route::get('view/customer/{id}','Admin\UserController@show'); 
    Route::get('edit/customer/{id}','Admin\UserController@edit');
    Route::post('update/customer/','Admin\UserController@update')->name('admin.update.customer');  
    Route::get('delete/customer/{id}','Admin\UserController@destroy');
    Route::get('verify/user/email/{id}','Admin\UserController@verifyEmail'); 
    Route::get('verify/email-for-all-user','Admin\UserController@verifyAllEmail'); 

    Route::post('add/customer/note','Admin\UserController@addNote')->name('admin.add.customer.note');   
    

    // SHOP ROUTE 

        Route::get('shop','Admin\ShopController@index')->name('admin.index.shop'); 
        Route::get('shop/pending','Admin\ShopController@pendingShop')->name('admin.pending.shop'); 
        Route::get('shop/block','Admin\ShopController@blockShop')->name('admin.block.shop'); 

        Route::get('view/shop/{id}','Admin\ShopController@show'); 
        Route::get('edit/shop/{id}','Admin\ShopController@edit'); 

        Route::post('shop-update','Admin\ShopController@update')->name('admin.update.shop');  

        Route::get('approve/shop/{id}','Admin\ShopController@approve');                                 

        Route::get('block/shop/{id}','Admin\ShopController@block');
        Route::get('unblock/shop/{id}','Admin\ShopController@unblock');
    
    

    // WAREHOUSE ROUTE 

        Route::get('warehouse','Admin\WarehouseController@all_warehouse')->name('admin.all.warehouse'); 
        Route::get('pending-pickup-point','Admin\WarehouseController@pending_warehouse')->name('admin.pending.warehouse'); 
        Route::get('block-pickup-point','Admin\WarehouseController@block_warehouse')->name('admin.block.warehouse'); 

        Route::get('view/warehouse/{id}','Admin\WarehouseController@single_warehouse'); 
        Route::get('approve/warehouse/{id}','Admin\WarehouseController@approve_warehouse')->name('admin.approve.warehouse'); 
        
        //Route::get('pending/warehouse/{id}','Admin\WarehouseController@pending_warehouse')->name('admin.pending.warehouse'); 
        
    //----------------------------------------------------------------
        Route::get('approve/warehouse/{id}','Admin\WarehouseController@approve');
        Route::get('block/warehouse/{id}','Admin\WarehouseController@block');
        Route::get('unblock/warehouse/{id}','Admin\WarehouseController@unblock');

        Route::post('update/pickuppoint','Admin\WarehouseController@updatePickupPoint')->name('admin.update.pickuppoint');


        

    // CATEGORY ROUTE
        Route::get('category','Admin\CategoryController@index')->name('admin.index.category'); 
        Route::post('category/store','Admin\CategoryController@store')->name('admin.store.category'); 
        Route::get('edit/category/{id}','Admin\CategoryController@edit')->name('admin.edit.category');
        Route::post('update/category','Admin\CategoryController@update')->name('admin.update.category');  
        Route::get('delete/category/{id}','Admin\CategoryController@destroy');  

    
    // SUB CATEGORY ROUTE 
        Route::get('subcategory','Admin\SubCategoryController@index')->name('admin.index.subcategory'); 
        Route::post('subcategory/store','Admin\SubCategoryController@store')->name('admin.store.subcategory'); 
        Route::get('edit/subcategory/{id}','Admin\SubCategoryController@edit')->name('admin.edit.subcategory');
        Route::post('update/subcategory','Admin\SubCategoryController@update')->name('admin.update.subcategory');     
        Route::get('delete/subcategory/{id}','Admin\SubCategoryController@destroy');  



    // MICRO CATEGORY ROUTE 
        Route::get('microcategory','Admin\MicroController@index')->name('admin.index.microcategory'); 
        Route::post('microcategory/store','Admin\MicroController@store')->name('admin.store.microcategory'); 
        Route::get('edit/microcategory/{id}','Admin\MicroController@edit')->name('admin.edit.microcategory');
        Route::post('update/microcategory','Admin\MicroController@update')->name('admin.update.microcategory');     
        Route::get('delete/microcategory/{id}','Admin\MicroController@destroy');  


    // BRAND ROUTE
        Route::get('brand','Admin\BrandController@index')->name('admin.index.brand'); 
        Route::post('brand/store','Admin\BrandController@store')->name('admin.store.brand'); 
        Route::get('edit/brand/{id}','Admin\BrandController@edit')->name('admin.edit.brand');
        Route::post('update/brand','Admin\BrandController@update')->name('admin.update.brand');  
        Route::get('delete/brand/{id}','Admin\BrandController@destroy');  

    // PRODUCT ROUTE
        Route::get('all/products','Admin\ProductController@index')->name('admin.all.products'); 
        Route::get('active/products','Admin\ProductController@activeProduct')->name('admin.active.products'); 
        Route::get('pending/products','Admin\ProductController@pendingProduct')->name('admin.pending.products'); 
	    Route::get('block/products','Admin\ProductController@blockProduct')->name('admin.block.products'); 

        Route::get('show/product/{id}','Admin\ProductController@show'); 
        Route::get('edit/product/{id}','Admin\ProductController@edit'); 
        Route::post('update/product','Admin\ProductController@update')->name('admin.update.product'); 
        Route::post('set/cashback','Admin\ProductController@setCachback')->name('admin.set.cashback');  
        Route::get('approve/product/{id}','Admin\ProductController@approve');
        Route::get('block/product/{id}','Admin\ProductController@block');
        Route::get('unblock/product/{id}','Admin\ProductController@unblock');

        Route::get('delete/product/{id}','Admin\ProductController@delete'); 

    // ORDER ROUTE -- ALL ORDER, PENDING ORDER, DELIVERY ORDER, DELIVERED ORDER                                                  
        Route::get('all/orders','Admin\OrderController@all')->name('admin.all.orders');                       
        Route::get('pending/orders','Admin\OrderController@pending')->name('admin.pending.orders');          
        Route::get('delivery/orders','Admin\OrderController@delivery')->name('admin.delivery.orders');          
        Route::get('delivered/orders','Admin\OrderController@delivered')->name('admin.delivered.orders');       
    
        Route::get('show/order/{id}','Admin\OrderController@show'); 

        Route::get('delivery/product/{id}','Admin\OrderController@deliveryProduct'); 
        Route::get('delivered/product/{id}','Admin\OrderController@deliveredProduct');


    
        /* Here is the new order route for admin */

    Route::get('/new-order','Admin\OrderController@newOrder')->name('admin.view.new.order'); 
    Route::get('/shop-send-to-pickup-point-order','Admin\OrderController@shopSendToPickupPointOrder')->name('admin.view.shop.send.to.pickup.point.order');  
    Route::get('/pickup-point-received-order','Admin\OrderController@pickupPointReceivedOrder')->name('admin.view.pickup.point.received.order');  
    Route::get('/pickup-point-send-to-customer-order','Admin\OrderController@pickupPointSendToCustomerOrder')->name('admin.view.pickup.point.send.to.customer.order'); 
    Route::get('/customer-delivery-pending-order','Admin\OrderController@customerDeliveryPendingOrder')->name('admin.view.customer.delivery.pending.order'); 
    Route::get('/customer-received-order','Admin\OrderController@customerReceivedOrder')->name('admin.view.customer.received.order'); 
    Route::get('/full-complete-order-package','Admin\OrderController@fullCompleteOrder')->name('admin.view.full.complete.order.package'); 
    Route::get('/view-order-details-{id}','Admin\OrderController@orderDetails');              
    Route::post('/admin-set-pickup-point','Admin\OrderController@setPickupPoint')->name('admin.set.pickuppoint');    
        
    Route::get('/view-money-upload-details-{id}','Admin\OrderController@singleOrderDetails');      
    Route::get('/order-details-{id}','Admin\OrderController@orderParentDetails');  

    
    // TRANSACTION 
    Route::get('/order-transaction-list','Admin\OrderController@orderTransactionIndex')->name('admin.order.transaction.index'); 
    Route::get('/upload-transaction-list','Admin\OrderController@uploadTransactionIndex')->name('admin.upload.transaction.index'); 

    

    // HOME SECTION SETTING 
    Route::get('section','Admin\SectionController@index')->name('admin.section');  
    Route::post('section/store','Admin\SectionController@store')->name('admin.store.section');  
    Route::get('delete/section/{id}','Admin\SectionController@destroy');  
    

    // HOME PAGE BRAND AND SHOP
    Route::get('admin/homepage/brand','Admin\SectionController@homeBrand')->name('admin.homebrand'); 
    Route::post('admin/store/homepage/brand','Admin\SectionController@storeHomeBrand')->name('admin.store.homebrand'); 
   
    Route::get('admin/homepage/shop','Admin\SectionController@homeShop')->name('admin.homeshop'); 
    Route::post('admin/store/homepage/shop','Admin\SectionController@storeHomeShop')->name('admin.store.homeshop'); 


    
    // GIFT VOUCHER ROUTE 
    Route::get('giftvoucher','Admin\GiftController@index')->name('admin.index.giftvoucher');  
    Route::get('create/giftvoucher','Admin\GiftController@create')->name('admin.create.giftvoucher');  
    Route::post('store/giftvoucher','Admin\GiftController@store')->name('admin.store.giftvoucher');  
    Route::get('edit/giftvoucher/{id}','Admin\GiftController@edit');  
    Route::post('update/giftvoucher','Admin\GiftController@update')->name('admin.update.giftvoucher');
    Route::get('delete/giftvoucher/{id}','Admin\GiftController@destroy');  


	
    // PROFIT ROUTE 
    Route::get('profit/percent','Admin\ProfiltController@index')->name('admin.profit.percent');  
    Route::post('profit/percent','Admin\ProfiltController@update')->name('admin.update.profit.percent');


});

?>





