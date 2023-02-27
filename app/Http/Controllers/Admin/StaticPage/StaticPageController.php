<?php

namespace App\Http\Controllers\Admin\StaticPage;

use File;
use Image;
use Response;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Log\ActivityLog;
use App\Models\StaticPage\StaticPage;

class StaticPageController extends Controller{

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load about-us Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function aboutUsPage(){

        $pageData = StaticPage::select("*")->where('id', '1')->get();

        return view('admin.static-page.about-us',compact('pageData'));
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update about-us
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function aboutUsUpdate(Request $request){

        StaticPage::where('id', '1')->update([
            'ABOUT_PAGE' => $request->ABOUT_PAGE,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated about-us page data.";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->back()->with('crudMsg','About-us page data Updated Successfully');

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load faq Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function faqPage(){

        $pageData = StaticPage::select("*")->where('id', '1')->get();

        return view('admin.static-page.faq',compact('pageData'));
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update FAQ Page Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function faqUpdate(Request $request){

        StaticPage::where('id', '1')->update([
            'FAQ_PAGE' => $request->FAQ_PAGE,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated faq page data.";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->back()->with('crudMsg','FAQ page data Updated Successfully');

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load refund policy Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function refundPolicyPage(){

        $pageData = StaticPage::select("*")->where('id', '1')->get();

        return view('admin.static-page.refund-policy',compact('pageData'));
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update refund policy page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function refundPolicyUpdate(Request $request){

        StaticPage::where('id', '1')->update([
            'REFUND_PAGE' => $request->REFUND_PAGE,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated refund-policy page data.";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->back()->with('crudMsg','Refund policy page data Updated Successfully');

    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load terms & condition Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function termsConditionPage(){

        $pageData = StaticPage::select("*")->where('id', '1')->get();

        return view('admin.static-page.terms-condition',compact('pageData'));
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update terms & condition page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function termsConditionUpdate(Request $request){

        StaticPage::where('id', '1')->update([
            'TERMS_CONDITION_PAGE' => $request->TERMS_CONDITION_PAGE,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated terms & condition page data.";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->back()->with('crudMsg','Terms & Condition page data Updated Successfully');

    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load privacy-policy Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function privacyPolicyPage(){

        $pageData = StaticPage::select("*")->where('id', '1')->get();

        return view('admin.static-page.privacy-policy',compact('pageData'));
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update privacy policy page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function privacyPolicyUpdate(Request $request){

        StaticPage::where('id', '1')->update([
            'PRIVACY_PAGE' => $request->PRIVACY_PAGE,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated privacy policy page data.";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return redirect()->back()->with('crudMsg','Privacy policy page data Updated Successfully');

    }

}
