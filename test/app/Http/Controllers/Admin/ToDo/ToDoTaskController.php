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
use App\Models\User;

class ToDoTaskController extends Controller{


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
        
        $this->middleware('permission:create-task', ['only' => ['addTask']]);
        $this->middleware('permission:edit-task', ['only' => ['loadTask','updateTask','ajaxStatusUpdate']]);
        $this->middleware('permission:delete-task', ['only' => ['taskDelete']]);
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Task Insert into database
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function addTask(Request $request){

        $validated = Validator::make($request->all(), [
            'PROJECT_ID' => 'required',
            'TASK_NAME' => 'required',
            'ASSIGNED_USER_ID.*' => 'required',
            'STATUS' => 'required',
            'PRIORITY' => 'required',
            'DUE_DATE' => 'required',
        ],
        [
            'PROJECT_ID.required' => 'Please give a task name',
        ]);

        if ($validated->passes()) {

            $toDoTask = ToDoTask::create([
                'PROJECT_ID' => $request->PROJECT_ID,
                'TASK_NAME' => $request->TASK_NAME,
                'TASK_DESCRIPTION' => $request->TASK_DESCRIPTION,
                'STATUS' => $request->STATUS,
                'PRIORITY' => $request->PRIORITY,
                'DUE_DATE' => $request->DUE_DATE,
                'CREATOR' => Auth::user()->id
            ]);


            if(count($request->ASSIGNED_USER_ID) > 0){  
                for($i=0; $i<count($request->ASSIGNED_USER_ID); $i++){

                    $toDoTaskAssignedTo = ToDoTaskAssignedTo::create([
                        'TASK_ID' => $toDoTask->id,
                        'ASSIGNED_USER_ID' => $request->ASSIGNED_USER_ID[$i],
                        'CREATOR' => Auth::user()->id
                    ]); 

                    
                }  

            } 

            $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
            $random_color = Arr::random($color_array);
            $ACTION = "Created Task ".$request->TASK_NAME.".";

            $log = ActivityLog::create([
                'USER_ID' => Auth::user()->id,
                'USER_NAME' => Auth::user()->name,
                'ACTION' => $ACTION,
                'CARD_COLOR' => $random_color
            ]);

            return redirect()->back()->with('crudMsgTask','Task '.$request->TASK_NAME.' Added Successfully');

        }
        else{
            return redirect()->back()->with("crudMsgTask","Couldn't add Task ".$request->TASK_NAME.".");
        }

        
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

    public function loadTask($id){

        $toDoTaskQuery = ToDoTask::select('to_do_tasks.*', 'to_do_projects.PROJECT_NAME')
        ->join('to_do_projects', 'to_do_projects.id', '=', 'to_do_tasks.PROJECT_ID')
        ->where('to_do_tasks.id', '=', $id)
        ->orderBy('to_do_tasks.id', 'DESC')
        ->get();

        $toDoProject = ToDoProject::orderBy('id', 'DESC')->get();

        $toDoTaskAssignedTo = ToDoTaskAssignedTo::select("to_do_task_assigned_tos.*", "users.name")
        ->join('users', 'users.id', '=', 'to_do_task_assigned_tos.ASSIGNED_USER_ID')
        ->where('to_do_task_assigned_tos.TASK_ID', $id)->get();

        $userList = User::select('id','name')
        ->whereNotIn('id', ToDoTaskAssignedTo::select('ASSIGNED_USER_ID')->where('TASK_ID', '=', $id)->get()->toArray())
        ->get();

        return view('admin.to-do.edit-task',compact('toDoTaskQuery','toDoProject','toDoTaskAssignedTo','userList'));

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update Task Data
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function updateTask(Request $request,$id){

        $validated = Validator::make($request->all(), [
            'PROJECT_ID' => 'required',
            'TASK_NAME' => 'required',
            'ASSIGNED_USER_ID.*' => 'required',
            'STATUS' => 'required',
            'PRIORITY' => 'required',
            'DUE_DATE' => 'required',
        ],
        [
            'PROJECT_ID.required' => 'Please give a task name',
        ]);


        if ($validated->passes()) {

            $update = ToDoTask::where('id', $id)->update([
                'PROJECT_ID' => $request->PROJECT_ID,
                'TASK_NAME' => $request->TASK_NAME,
                'TASK_DESCRIPTION' => $request->TASK_DESCRIPTION,
                'STATUS' => $request->STATUS,
                'PRIORITY' => $request->PRIORITY,
                'DUE_DATE' => $request->DUE_DATE,
                'EDITOR' => Auth::user()->id,
                'updated_at' => Carbon::now()
            ]);


            if(count($request->ASSIGNED_USER_ID) > 0){  

                $toDoTaskAssignedToDelete = ToDoTaskAssignedTo::where('TASK_ID', $id)->delete();

                for($i=0; $i<count($request->ASSIGNED_USER_ID); $i++){

                    $toDoTaskAssignedTo = ToDoTaskAssignedTo::create([
                        'TASK_ID' => $id,
                        'ASSIGNED_USER_ID' => $request->ASSIGNED_USER_ID[$i],
                        'CREATOR' => Auth::user()->id
                    ]); 

                }  

            } 


            $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
            $random_color = Arr::random($color_array);
            $ACTION = "Created Task ".$request->TASK_NAME.".";

            $log = ActivityLog::create([
                'USER_ID' => Auth::user()->id,
                'USER_NAME' => Auth::user()->name,
                'ACTION' => $ACTION,
                'CARD_COLOR' => $random_color
            ]);


            return redirect()->route("todo.list")->with('crudMsgTask','Task '.$request->TASK_NAME.' Updated Successfully');

        }
        else{
            return redirect()->route("todo.list")->with("crudMsgTask","Couldn't update Task ".$request->TASK_NAME.".");
        }

    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Update Status by Ajax
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function ajaxStatusUpdate($id,$STATUS){


        $update = ToDoTask::where('id', $id)->update([
            'STATUS' => $STATUS,
            'EDITOR' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Updated Task Status to: ".$STATUS.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);
       

        return Response()->json("Success");


    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete Task
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function taskDelete($id){

        // dd($id);

        $toDoTask = ToDoTask::select("*")->where('id', $id)->first();
        $TASK_NAME = $toDoTask->TASK_NAME;
        

        $toDoTaskDelete = ToDoTask::where('id', $id)->delete();

        $color_array = ['card-dark', 'card-info', 'card-primary', 'card-secondary', 'card-success', 'card-warning', 'card-danger'];
        $random_color = Arr::random($color_array);
        $ACTION = "Deleted Task ".$TASK_NAME.".";

        $log = ActivityLog::create([
            'USER_ID' => Auth::user()->id,
            'USER_NAME' => Auth::user()->name,
            'ACTION' => $ACTION,
            'CARD_COLOR' => $random_color
        ]);

        return Redirect()->back()->with('crudMsgTask','Task '.$TASK_NAME.' Permanently Deleted');
    }


    
}
