<?php

namespace App\Http\Controllers\Newsletter;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Models\Newsletter\Newsletter;

class NewsletterController extends Controller{

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Newsletter Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){
        
        $newsletterData = Newsletter::all();

        return view('admin.Newsletter.show-data',compact('newsletterData'));
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    |  Newsletter Insert
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function newsletterInsert(Request $request){
        
        $validated = $request->validate([
            'EMAIL' => 'required|email|max:30',
        ],
        [
            'EMAIL.required' => 'Please Enter Your Email',
        ]);


        $data = array();
        $data["EMAIL"] = $request->EMAIL;
        DB::table('newsletters')->insert($data);

        return response()->json(['success' => 'Email Added Successfully.']);
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Newsletter Delete From database
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */


    public function newsletterDelete($ID){
        
        $delete = Newsletter::where('NEWSLETTER_ID', $ID)->delete();
        // $delete = DB::table('newsletters')->where('NEWSLETTER_ID', $ID)->delete();

        return Redirect()->back()->with('crudMsg','Data Permanently Deleted');
    }

}
