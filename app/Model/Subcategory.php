<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'subcategory_name','category_id','subcategory_picture','uploaded_date'
    ];
}
