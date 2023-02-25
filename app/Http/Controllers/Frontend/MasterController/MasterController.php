<?php

namespace App\Http\Controllers\Frontend\MasterController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductPage\ProductCategory;
use App\Models\ProductPage\ProductSubCategory;
use App\Models\ProductPage\Product;

use App\Models\Header\HeaderSection;
use App\Models\Footer\FooterSection;

use App\Models\Header\MetaTitles\MetaTitle;

use App\Models\SocialMedia\SocialMedia;

class MasterController extends Controller{

    public static function getCategory(){
        return $getCategory = ProductCategory::all();
    }

    public static function getSubCategory($id){
        return $getSubCategory = ProductSubCategory::select("*")->where('CATEGORY_ID', '=', $id)->get();
    }

    public static function getFooterSubCategory($id){
        return $getFooterSubCategory = ProductSubCategory::select("*")->where('CATEGORY_ID', '=', $id)->orderBy('SUBCATEGORY_ID', 'DESC')->limit(1)->get();
    }

    public static function getMetaTitles(){
        return $metaTitle = MetaTitle::all();
    }

    public static function getFooterData(){
        return $footerSection = FooterSection::all();
    }

    public static function getHeaderData(){
        return $headerSection = HeaderSection::all();
    }

    public static function getSocialMedia(){
        return $socialMedia = SocialMedia::all();
    }

}
