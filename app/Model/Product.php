<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name','category_id','subcategory_id','product_owner_id','is_admin_upload_product','buying_price','shop_buying_price','selling_price','product_color','product_size','product_description','product_quantity','isAvailable','status','block','upload_date'  
    ];
}
