<?php

namespace App\Models\ProductPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'CATEGORY_NAME',
        'SLUG',
        'EDITOR',
        'SORT_ORDER',
    ];
}
