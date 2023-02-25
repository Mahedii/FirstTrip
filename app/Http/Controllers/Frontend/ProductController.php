<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Helper\Helper;

use App\Models\ProductPage\ProductCategory;
use App\Models\ProductPage\ProductSubCategory;
use App\Models\ProductPage\Product;

class ProductController extends Controller{

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Product Page Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index($SLUG){

        // $productPageData = ContactPageData::all();

        $getSubCategory = ProductSubCategory::where('SLUG', $SLUG)->first();
        $SUBCATEGORY_ID = $getSubCategory->SUBCATEGORY_ID;
        $CATEGORY_ID = $getSubCategory->CATEGORY_ID;

        $getAllSub = ProductSubCategory::select("*")->where('CATEGORY_ID', '=', $CATEGORY_ID)->get();

        $getProduct = Product::select('products.*','product_sub_categories.SUBCATEGORY_NAME', 'product_sub_categories.SLUG as SUB_SLUG')
            ->join('product_sub_categories', 'product_sub_categories.SUBCATEGORY_ID', '=', 'products.SUBCATEGORY_ID')
            ->where('products.CATEGORY_ID', '=', $CATEGORY_ID)
            ->orderBy('products.PRODUCT_ID', 'DESC')
        	->get();

        return view('frontend.products.product',compact('getProduct','getAllSub'));
    }
}
