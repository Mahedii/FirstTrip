<?php

namespace App\Http\Controllers\Admin\Log;

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


class ActivityLogController extends Controller{


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
        $this->middleware('permission:see-activity-log', ['only' => ['index','ajaxLoad','liveSearch','delete']]);
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Log Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function index(){

        $logs = ActivityLog::select('activity_logs.*','users.name')
        ->join('users', 'users.id', '=', 'activity_logs.USER_ID')
        ->orderBy('activity_logs.id', 'DESC')
        ->get();

        return view('admin.activity-log.log',compact('logs'));
    }



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Load Log data by AJAX
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */


    public function ajaxLoad($limit,$offset){

        $limit = (intval($limit) != 0 ) ? $limit : 10;
        $offset = (intval($offset) != 0 ) ? $offset : 0;

        $logs = ActivityLog::select('activity_logs.*','users.name')
        ->join('users', 'users.id', '=', 'activity_logs.USER_ID')
        ->orderBy('activity_logs.id', 'DESC')
        ->offset($offset)->limit($limit)
        ->get();

        $queryData ="";

        foreach($logs as $data){

            $queryData .='
                <div class="col-xxl-3 col-sm-6 project-card">
                    <div class="card '.$data->CARD_COLOR.' card-height-100">
                        <div class="card-body">
                            <div class="d-flex flex-column h-100">
                                

                                <div class="d-flex mt-3">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-sm">
                                            <span class=" rounded p-2">
                                                <img src="theme/admin/assets/images/users/multi-user.jpg" alt=""
                                                    class="img-fluid p-1">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h4 class="mb-1 fs-15"><a href="apps-projects-overview.php"
                                                class="text-white">'.$data->name.'</a></h4>
                                        <p class="text-white text-truncate-two-lines mt-2 mb-3">'.$data->ACTION.'</p>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        
                        <div class="card-footer bg-transparent border-top-dashed py-2">
                            <div class="d-flex flex-column h-100">

                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-white mb-4"><i class="ri-calendar-event-fill me-1 align-bottom"></i> '.$data->created_at.'</p>
                                    </div>
                                    
                                </div>

                            </div>

                        </div>
                        
                    </div>
                    
                </div>
            ';
  
        } 

        return Response()->json($queryData);
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Search Log Page
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function liveSearch($searchText,$duration){

        // if($duration == "Today"){
        //     $activityLog = ActivityLog::select('activity_logs.*','users.name')->join('users', 'users.id', '=', 'activity_logs.USER_ID')->where('users.name', 'like', '%'.$searchText.'%')->whereDate('activity_logs.created_at', Carbon::today())->orderBy('activity_logs.id', 'DESC')->get();
        // }
        // else if($duration == "Yesterday"){
        //     $whereCondition = where('created_at','>=',Carbon::now()->subdays(1));
        // }
        // else if($duration == "Last 7 Days"){
        //     $whereCondition = where('created_at', '>=', Carbon::now()->subDays(7));
        // }
        // else if($duration == "Last 30 Days"){
        //     $whereCondition = where('created_at','>=',Carbon::now()->subdays(30));
        // }
        // else if($duration == "This Month"){
        //     $whereCondition = whereMonth('created_at', '=', Carbon::now()->month);
        // }
        // else if($duration == "Last Year"){
        //     $whereCondition = whereYear('created_at', date('Y', strtotime('-1 year')));
        // }
        // else if($duration == "All"){
        //     $whereCondition = "";
        // }

        // $today = ActivityLog::whereDate('created_at', Carbon::today());
        // $last_day = ActivityLog::where('created_at','>=',Carbon::now()->subdays(1))->get();
        // $last_7_day = ActivityLog::where('created_at', '>=', Carbon::now()->subDays(7))->get();
        // $previous_week = strtotime("-1 week +1 day");
        // $start_week = strtotime("last sunday midnight",$previous_week);
        // $end_week = strtotime("next saturday",$start_week);
        // $start_week = date("Y-m-d",$start_week);
        // $end_week = date("Y-m-d",$end_week);
        // $last_week = ActivityLog::whereBetween('created_at', [$start_week, $end_week])->get();
        // $this_week = ActivityLog::select("*")->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        // $last_15_days = ActivityLog::where('created_at','>=',Carbon::now()->subdays(15))->get();
        // $last_30_days = ActivityLog::where('created_at','>=',Carbon::now()->subdays(30))->get();
        // $this_month = ActivityLog::whereMonth('created_at', '=', Carbon::now()->month)->get();
        // $last_month = ActivityLog::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get();
        // $last_year = ActivityLog::whereYear('created_at', date('Y', strtotime('-1 year')))->get();
        // $this_year = ActivityLog::select('*')->whereYear('created_at', date('Y'))->get();

        $activityLog = ActivityLog::select('activity_logs.*','users.name')
        ->join('users', 'users.id', '=', 'activity_logs.USER_ID')
        ->where('users.name', 'like', '%'.$searchText.'%')
        // ->$whereCondition
        ->orderBy('activity_logs.id', 'DESC')->get();

        $error = 0;
        $count = count($activityLog);

        if($count <= 0){
            $error = 1;
        }

        $queryData ="";

        foreach($activityLog as $data){

            $queryData .='
                <div class="col-xxl-3 col-sm-6 project-card">
                    <div class="card '.$data->CARD_COLOR.' card-height-100">
                        <div class="card-body">
                            <div class="d-flex flex-column h-100">
                                

                                <div class="d-flex mt-3">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-sm">
                                            <span class=" rounded p-2">
                                                <img src="theme/admin/assets/images/users/multi-user.jpg" alt=""
                                                    class="img-fluid p-1">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h4 class="mb-1 fs-15"><a href="apps-projects-overview.php"
                                                class="text-white">'.$data->name.'</a></h4>
                                        <p class="text-white text-truncate-two-lines mt-2 mb-3">'.$data->ACTION.'</p>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        
                        <div class="card-footer bg-transparent border-top-dashed py-2">
                            <div class="d-flex flex-column h-100">

                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-white mb-4"><i class="ri-calendar-event-fill me-1 align-bottom"></i> '.$data->created_at.'</p>
                                    </div>
                                    
                                </div>

                            </div>

                        </div>
                        
                    </div>
                    
                </div>
            ';
  
        }      

        return response()->json([
            'error' => $error,
            'count' => $count,
            'queryData' => $queryData
        ]);

        // return response()->json(['success'=>'Record is successfully added']);
    }


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Delete Log Info
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    public function delete($id){

        $logInfoDelete = ActivityLog::where('id', $id)->delete();
        // $logInfoDelete = DB::table('activity_logs')->where('id', $id)->delete();

        return Redirect()->back()->with('crudMsg','Selected log Permanently Deleted');
    }

}
