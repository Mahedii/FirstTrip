<?php

namespace App\Http\Controllers\Frontend\WebPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StaticPage\StaticPage;

class CommonController extends Controller{

    public function aboutPage(){
        $pagesData = StaticPage::all();
        return view('frontend.web-pages.about',compact('pagesData'));
    }

    public function faqPage(){
        $pagesData = StaticPage::all();
        return view('frontend.web-pages.faq',compact('pagesData'));
    }

    public function refundPage(){
        $pagesData = StaticPage::all();
        return view('frontend.web-pages.privacy',compact('pagesData'));
    }

    public function privacyPage(){
        $pagesData = StaticPage::all();
        return view('frontend.web-pages.refund',compact('pagesData'));
    }

    public function termsConditionPage(){
        $pagesData = StaticPage::all();
        return view('frontend.web-pages.terms',compact('pagesData'));
    }

}
