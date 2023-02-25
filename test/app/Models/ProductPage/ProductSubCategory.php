<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'SUBCATEGORY_NAME',
        'CATEGORY_ID',
        'SLUG',
        'EDITOR',
        'SORT_ORDER',
    ];
}
