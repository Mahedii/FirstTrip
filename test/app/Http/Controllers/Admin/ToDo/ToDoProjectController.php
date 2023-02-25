<?php

namespace App\Http\Controllers\Admin\ToDo;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Validator;
use Redirect;
use Response;

use App\Models\Log\ActivityLog;
use App\Models\ToDo\ToDoProject;
use App\Models\ToDo\ToDoTask;
use App\Models\ToDo\ToDoTaskAssignedTo;

class ToDoProjectController extends Controller{


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Role Permissions
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    function __construct()
    {
        
        $this->middleware('permission:create-projects', ['only' => ['addProject','generateSlug']]);
        $this->middleware('permission:edit-projects', ['only' => ['loadProject','updateProject']]);
        // $this->middleware('permission:delete-project', ['only' => ['deleteProject']]);
    }

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Project Insert into database
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function addProject(Request $request){

        $validated = $request->validate([
            'PROJECT_NAME' => 'required|unique:to_do_projects',
        ],
        [
            'PROJECT_NAME.required' => 'Please give a project name',
        ]);

        // $SLUG = SlugService::createSlug(ToDoProject::class, 'SLUG', $request->PROJECT_NAME);
        $SLUG = $this->generateSlug($request->PROJECT_NAME);


        $po = ToDoProject::create([
            'PROJECT_NAME' => $request->PROJECT_NAME,
            'CREATOR' => Auth::user()->id,
            'SLUG' => $SLUG
        ]);


        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Created Project: ".$request->PROJECT_NAME." for to do list.";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);



        return redirect()->back()->with('crudMsg','Project '.$request->PROJECT_NAME.' Added Successfully');
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Fetch Selected Task Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function loadProject($SLUG){

        $toDoProject = toDoProject::select("*")->where('SLUG', $SLUG)->first();
        $SLUG = $toDoProject->SLUG;
        $PROJECT_NAME = $toDoProject->PROJECT_NAME;

        return response()->json([
            'SLUG' => $SLUG,
            'PROJECT_NAME' => $PROJECT_NAME
        ]);

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update Project Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function updateProject(Request $request){

        $validated = $request->validate([
            'PROJECT_NAME' => 'required|unique:to_do_projects',
        ],
        [
            'PROJECT_NAME.required' => 'Please give a project name',
        ]);

        $update = toDoProject::where('SLUG', $request->SLUG)->update([
            'PROJECT_NAME' => $request->PROJECT_NAME,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated Project ".$request->PROJECT_NAME.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);
       
        return redirect()->route("todo.list")->with('crudMsg','Project '.$request->PROJECT_NAME.' Updated Successfully');

    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete Project
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function deleteProject($SLUG){

        $toDoProject = toDoProject::select("*")->where('SLUG', $SLUG)->first();
        $PROJECT_NAME = $toDoProject->PROJECT_NAME;
        

        $toDoProjectDelete = toDoProject::where('SLUG', $SLUG)->delete();

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Deleted Project ".$PROJECT_NAME.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return Redirect()->back()->with('crudMsg','Project '.$PROJECT_NAME.' Permanently Deleted');
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Generate Slug
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public static function generateSlug($name){

        $slug=Str::slug($name);
        // dd($slug,"show");

        if (ToDoProject::where('SLUG',Str::slug($name))->exists()) {

            $original = $slug;

            $count = 1;

            while(ToDoProject::where('SLUG',$slug)->exists()) {

                $slug = "{$original}-" . $count++;
            }

            return $slug;

        }
        // dd($slug);
        return $slug;

    }

}
