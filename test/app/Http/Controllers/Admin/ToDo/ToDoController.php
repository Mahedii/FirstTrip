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

use App\Models\ToDo\ToDoProject;
use App\Models\ToDo\ToDoTask;
use App\Models\ToDo\ToDoTaskAssignedTo;
use App\Models\User;

class ToDoController extends Controller{


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
        $this->middleware('permission:see-todo', ['only' => ['index','assignedUserList']]);
    }

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load To-Do List Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $toDoProject = ToDoProject::orderBy('id', 'DESC')->get();

        $toDoTask = ToDoTask::select('to_do_tasks.*', 'to_do_projects.PROJECT_NAME')
        ->join('to_do_projects', 'to_do_projects.id', '=', 'to_do_tasks.PROJECT_ID')
        ->orderBy('to_do_tasks.id', 'DESC')
        ->get();

        $userList = User::orderBy('id', 'DESC')->get();


        return view('admin.to-do.to-do',compact('toDoProject','userList','toDoTask'));
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Get Taskwise assigned user list
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public static function assignedUserList($id){

        $getUserList = ToDoTaskAssignedTo::select('to_do_task_assigned_tos.*', 'users.name')
        ->join('users', 'users.id', '=', 'to_do_task_assigned_tos.ASSIGNED_USER_ID')
        ->where('to_do_task_assigned_tos.TASK_ID', '=', $id)
        ->get();

        return $getUserList;
    }

}
