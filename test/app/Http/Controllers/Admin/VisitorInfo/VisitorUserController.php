<?php

namespace App\Http\Controllers\Admin\VisitorInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Validator;
use Redirect;
use Response;

use App\Models\VisitorInfo\VisitorInfo;

class VisitorUserController extends Controller{
    
    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Visitor Informations
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $visitorInfo = VisitorInfo::all();
       
        return view('admin.visitor-user-info.show-list',compact('visitorInfo'));
    }
}
