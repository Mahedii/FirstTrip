<?php

namespace App\Http\Controllers\Admin\HomePage;

use File;
use Image;
use Response;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Models\AboutSection\AboutSectionOne;
use App\Models\Log\ActivityLog;

class AboutSectionTwoController extends Controller{

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load About Section One Show Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $aboutSectionTwoData = AboutSectionTwo::select("*")->where('id', '1')->get();

        return view('admin.static-page.home.about-section-two.index',compact('aboutSectionOneData'));
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | About Section One Page Update
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function aboutSectionOneUpdate(Request $request){

        $validated = $request->validate([
            'TITLE' => 'required',
            'SUBTITLE'=>'required',
            'TITLE_BODY' => 'required',
            'singleFile' => 'mimes:jpg,png,jpeg,gif,svg|max:5120',
        ],
        [
            'TITLE.required' => 'Please give a title',
            'SUBTITLE.required' => 'Please give a subtitle',
            'TITLE_BODY.required' => 'Title body is required',
        ]);

        $fileInput = $request->file('singleFile');

        $aboutSectionOne = AboutSectionOne::where('id', '1')->first();

        $filePath = $aboutSectionOne->FILE_PATH;
        $fileName = $aboutSectionOne->FILE_NAME;


        if ($fileInput) {

            //$fileExtension = $fileInput->extension();
            $fileExtension = strtolower($fileInput->getClientOriginalExtension());

            $fileName = $fileInput->getClientOriginalName();
            $fileName = 'about-one-img.'.$fileExtension;

            $path = public_path('frontend/assets/images/about-section-one/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            if( File::exists(public_path($filePath)) ) {
                File::delete(public_path($filePath));
            }

            $request->singleFile->move($path, $fileName);

            $filePath = 'frontend/assets/images/about-section-one/'.$fileName;

        }
        else{
            $fileName = "";
            $filePath = "";
        }


        AboutSectionOne::where('id', '1')->update([
            'TITLE' => $request->TITLE,
            'SUBTITLE' => $request->SUBTITLE,
            'TITLE_BODY' => $request->TITLE_BODY,
            'DISCOUNT' => $request->DISCOUNT,
            'FILE_NAME' => $fileName,
            'FILE_PATH' => $filePath,
            'EDITOR' => Auth::user()->id
        ]);


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated about section-01 ".$request->TITLE." data.";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);



        return redirect()->back()->with('crudMsg','Updated about section-01 ".$request->TITLE." data Successfully');
    }
}
