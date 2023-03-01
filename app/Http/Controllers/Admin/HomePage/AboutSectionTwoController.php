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

use App\Models\AboutSection\AboutSectionTwo;
use App\Models\Log\ActivityLog;

class AboutSectionTwoController extends Controller{

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load About Section Two Show Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $aboutSectionTwoData = AboutSectionTwo::select("*")->where('id', '1')->get();

        return view('admin.static-page.home.about-section-two.index',compact('aboutSectionTwoData'));
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | About Section Two Page Update
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function aboutSectionTwoUpdate(Request $request){

        $validated = $request->validate([
            'TITLE' => 'required',
            'SUBTITLE'=>'required',
            'TEXT_1' => 'required',
            'TEXT_2' => 'required',
            'TEXT_3' => 'required',
            'TEXT_4' => 'required',
            'singleFile' => 'mimes:jpg,png,jpeg,gif,svg|max:5120',
        ],
        [
            'TITLE.required' => 'Please give a title',
            'SUBTITLE.required' => 'Please give a subtitle',
        ]);

        $fileInput = $request->file('singleFile');

        $aboutSectionTwo = AboutSectionTwo::where('id', '1')->first();

        $filePath = $aboutSectionTwo->FILE_PATH;
        $fileName = $aboutSectionTwo->FILE_NAME;


        if ($fileInput) {

            //$fileExtension = $fileInput->extension();
            $fileExtension = strtolower($fileInput->getClientOriginalExtension());

            $fileName = $fileInput->getClientOriginalName();
            $fileName = 'about-two-img.'.$fileExtension;

            $path = public_path('frontend/assets/images/about-section-two/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            if( File::exists(public_path($filePath)) ) {
                File::delete(public_path($filePath));
            }

            $request->singleFile->move($path, $fileName);

            $filePath = 'frontend/assets/images/about-section-two/'.$fileName;

        }
        else{
            $fileName = "";
            $filePath = "";
        }


        AboutSectionTwo::where('id', '1')->update([
            'TITLE' => $request->TITLE,
            'SUBTITLE' => $request->SUBTITLE,
            'VIDEO_PATH' => $request->VIDEO_PATH,
            'TEXT_1' => $request->TEXT_1,
            'TEXT_2' => $request->TEXT_2,
            'TEXT_3' => $request->TEXT_3,
            'TEXT_4' => $request->TEXT_4,
            'FILE_NAME' => $fileName,
            'FILE_PATH' => $filePath,
            'EDITOR' => Auth::user()->id
        ]);


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated about section-02 ".$request->TITLE." data.";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);



        return redirect()->back()->with('crudMsg','Updated about section-01 '.$request->TITLE.' data Successfully');
    }
}
