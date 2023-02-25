<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'PRODUCT_NAME',
        'CATEGORY_ID',
        'SUBCATEGORY_ID',
        'FILE_NAME',
        'FILE_PATH',
        'SLUG',
        'EDITOR',
        'SORT_ORDER',
    ];
}
