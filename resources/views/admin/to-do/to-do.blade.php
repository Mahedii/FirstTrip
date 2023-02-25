@extends('admin.include.master')
    @section('content')

        <div class="page-content">
            <div class="container-fluid">

                <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
                    <div class="file-manager-sidebar">
                        <div class="p-4 d-flex flex-column h-100">
                            <div class="mb-3">
                                <button class="btn btn-success w-100" data-bs-target="#createProjectModal"
                                    data-bs-toggle="modal"><i class="ri-add-line align-bottom"></i> Add Project</button>
                            </div>

                            @if(session('crudMsg'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('crudMsg') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 468px);">
                                <ul class="to-do-menu list-unstyled" id="projectlist-data">

                                    @foreach($toDoProject as $projectList)

                                        <li>
                                            <div class="nav-link fs-14">
                                                <a href="#" style="color:black" class="active">{{ Str::limit($projectList->PROJECT_NAME, 20) }} </a>
                                                <a href="{{ route('todo.project.delete',$projectList->SLUG) }}" class="d-inline-block edit-item-btn" onclick="return confirm('Are you sure you want to delete this?');" style="float:right;">
                                                    <i class="ri-delete-bin-5-fill align-bottom me-2" style="font-size:18px; color:#ff2020"></i>  
                                                </a>  
                                                <a href="#" data-slug="{{$projectList->SLUG}}" class="d-inline-block btn-info edit-project" style="float:right">
                                                    <i class="ri-pencil-fill align-bottom me-2" style="font-size:18px;"></i>  
                                                </a>
                                            </div>
                                        </li>

                                    @endforeach

                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    <!--end side content-->
                    <div class="file-manager-content w-100 p-4 pb-0">
                        
                        <div class="p-3 bg-light rounded mb-4">
                            
                            <div class="row g-4">  
                                   
                                <div class="col-sm">
                                
                                    <div class="d-flex justify-content-sm-end">
                                    
                                        <button class="btn btn-primary createTask" type="button" data-bs-toggle="modal"
                                            data-bs-target="#createTask">
                                            <i class="ri-add-fill align-bottom"></i> Add Tasks
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(session('crudMsgTask'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('crudMsgTask') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="todo-content position-relative px-4 mx-n4" id="todo-content">
                            <!-- <div id="elmLoader">
                                <div class="spinner-border text-primary avatar-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div> -->

                            <!-- <div class="hstack mb-4">
                                <h5 class="fw-semibold flex-grow-1 mb-0">Velzon Admin & Dashboard </h5> 
                            </div> -->
                            
                            <div class="todo-task" id="todo-task">
                                <div class="table-responsive">
                                    <!-- <table class="table align-middle position-relative"> -->
                                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                        <thead class="table-active">
                                            <tr>
                                                <th scope="col">Task Name</th>
                                                <th scope="col">Project Name</th>
                                                <th scope="col">Assigned To</th>
                                                <th scope="col">Due Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Priority</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="task-list">

                                            @foreach($toDoTask as $taskData)
                                            
                                                <tr>

                                                    <td>
                                                        <div class="d-flex align-items-start">
                                                            <!-- <div class="flex-shrink-0 me-3">
                                                                <div class="task-handle px-1 bg-light rounded">: :</div>
                                                            </div> -->
                                                            <div class="flex-grow-1">
                                                                <div class="form-check"> 
                                                                    <input class="form-check-input task-checkbox" type="checkbox" data-task-id="{{ $taskData->id }}" @if($taskData->STATUS == "Completed") checked @endif > 
                                                                    <label class="form-check-label label-{{ $taskData->id }}" for="{{ $taskData->TASK_NAME }}" @if($taskData->STATUS == "Completed") style="text-decoration: line-through;" @endif >{{ $taskData->TASK_NAME }}</label> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>{{ $taskData->PROJECT_NAME }}</td>

                                                    <td>

                                                        <!-- <div class="avatar-group">
                                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                                data-img="assets/images/users/avatar-5.jpg" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" aria-label="Virgie Price">
                                                                <img src="assets/images/users/avatar-5.jpg" alt=""
                                                                    class="rounded-circle avatar-xxs">
                                                            </a>
                                                        </div> -->
                                                        
                                                        @php($assignedUsers = App\Http\Controllers\Admin\ToDo\ToDoController::assignedUserList($taskData->id))

                                                        @foreach($assignedUsers as $userData)
                                                            <span class="badge bg-success text-uppercase">{{ $userData->name }}</span>
                                                        @endforeach

                                                    </td>

                                                    <td>{{ $taskData->DUE_DATE }}</td>

                                                    <td class="status-badge-{{ $taskData->id }}">
                                                        <span class="badge @if($taskData->STATUS == 'New') badge-soft-info @elseif($taskData->STATUS == 'Inprogress') badge-soft-secondary @elseif($taskData->STATUS == 'Pending') badge-soft-warning @elseif($taskData->STATUS == 'Completed') badge-soft-success @endif text-uppercase">{{ $taskData->STATUS }}</span>
                                                    </td>

                                                    <td>
                                                        @if($taskData->PRIORITY == 'High')
                                                            <span class="badge bg-danger text-uppercase">{{ $taskData->PRIORITY }}</span>
                                                        @elseif($taskData->PRIORITY == 'Medium')
                                                            <span class="badge bg-warning text-uppercase">{{ $taskData->PRIORITY }}</span>
                                                        @elseif($taskData->PRIORITY == 'Low')
                                                            <span class="badge bg-success text-uppercase">{{ $taskData->PRIORITY }}</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <div class="hstack gap-2"> 
                                                            <button class="btn btn-sm btn-soft-danger remove-list" data-id="{{$taskData->id}}">
                                                                <i class="ri-delete-bin-5-fill align-bottom" style="font-size:16px;"></i>
                                                            </button> 
                                                            <!-- <a href="{{ url('task/delete/'.$taskData->id) }}" class="btn btn-sm btn-soft-danger">
                                                                <i class="ri-delete-bin-5-fill align-bottom" style="font-size:16px;"></i>
                                                            </a> -->
                                                            <a href="{{ route('todo.task.details',$taskData->id) }}" class="btn btn-sm btn-soft-info edit-list">
                                                                <i class="ri-pencil-fill align-bottom" style="font-size:16px;"></i>
                                                            </a>
                                                        </div>
                                                    </td>

                                                </tr>

                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="py-4 mt-4 text-center" id="noresult" style="display: none;">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                    colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px">
                                </lord-icon>
                                <h5 class="mt-4">Sorry! No Result Found</h5>
                            </div>

                        </div>

                    </div>
                </div>


                <!-- Start Create Project Modal -->
                <div class="modal fade zoomIn" id="createProjectModal" tabindex="-1" aria-labelledby="createProjectModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header p-3 bg-soft-success">
                                <h5 class="modal-title" id="createProjectModalLabel">Create Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" id="addProjectBtn-close"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>

                                    <form method="POST" action="{{ route('todo.project.add') }}" enctype="multipart/form-data">
                                        
                                        @csrf

                                        <div class="mb-4">
                                            <label for="PROJECT_NAME" class="form-label">Project Name</label>
                                            <input type="text" class="form-control @error('PROJECT_NAME') is-invalid @enderror" value="{{ old('PROJECT_NAME') }}" id="projectname-input" name="PROJECT_NAME" autocomplete="off">
                                            @if ($errors->has('PROJECT_NAME'))
                                                <span class="text-danger">{{ $errors->first('PROJECT_NAME') }}</span>
                                            @endif
                                        </div>

                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i
                                                    class="ri-close-line align-bottom"></i> Close</button>
                                            <button type="submit" class="btn btn-primary" id="addNewProject">Add
                                                Project</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal-dialog -->
                </div>
                <!-- End Create Project Modal -->

                <!-- Start Edit Project Modal -->
                <div class="modal fade zoomIn" id="editProjectModal" tabindex="-1" aria-labelledby="editProjectModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header p-3 bg-soft-success">
                                <h5 class="modal-title" id="editProjectModalLabel">Edit Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" id="addProjectBtn-close" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>

                                    <form method="POST" action="{{ route('todo.project.update') }}" enctype="multipart/form-data">
                                        
                                        @csrf

                                        <input type="hidden" class="form-control" id="SLUG" name="SLUG" >

                                        <div class="mb-4">
                                            <label for="PROJECT_NAME" class="form-label">Project Name</label>
                                            <input type="text" class="form-control @error('PROJECT_NAME') is-invalid @enderror" id="updated-projectname-input" name="PROJECT_NAME" autocomplete="off">
                                            @if ($errors->has('PROJECT_NAME'))
                                                <span class="text-danger">{{ $errors->first('PROJECT_NAME') }}</span>
                                            @endif
                                        </div>

                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i
                                                    class="ri-close-line align-bottom"></i> Close</button>
                                            <button type="submit" class="btn btn-primary" id="addNewProject">Update
                                                Project</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal-dialog -->
                </div>
                <!-- End Edit Project Modal -->

                <!-- Create Task Modal -->
                <div class="modal fade" id="createTask" tabindex="-1" aria-labelledby="createTaskLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0">
                            <div class="modal-header p-3 bg-soft-success">
                                <h5 class="modal-title" id="createTaskLabel">Create Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" id="createTaskBtn-close"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="task-error-msg" class="alert alert-danger py-2"></div>                 
                                        
                                <form method="POST" action="{{ route('todo.task.add') }}" enctype="multipart/form-data" autocomplete="off" action="" id="creattask-form">

                                    @csrf

                                    <div class="mb-3">
                                        <label for="PROJECT_ID" class="form-label">Select Project<span class="text-danger">*</span></label>
                                        <select class="js-example-basic-single mb-3" id="select-project" name="PROJECT_ID">
                                                                
                                            <option value="" disabled selected>Select Project</option>

                                            @foreach($toDoProject as $toDoProject)
                                                <option @if(old('PROJECT_ID') == $toDoProject->PROJECT_NAME) selected @endif value="{{ $toDoProject->id }}">{{ $toDoProject->PROJECT_NAME }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="task-title-input" class="form-label">Task Title<span class="text-danger">*</span></label>
                                        <input type="text" id="task-title-input" class="form-control" name="TASK_NAME" placeholder="Enter task title">
                                    </div>

                                    <div class="mb-3">
                                        <label for="task-description-input" class="form-label">Task Description</label>
                                        <textarea class="form-control" name="TASK_DESCRIPTION" placeholder="Enter task description"></textarea>
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label for="task-assign-input" class="form-label">Assigned To<span class="text-danger">*</span></label>

                                        <select class="js-example-basic-multiple" name="ASSIGNED_USER_ID[]" multiple="multiple">
                                            
                                            @foreach($userList as $user)
                                                <option @if(Auth::user()->id == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach

                                        </select>
                                        
                                    </div>

                                    <div class="row g-4 mb-3">
                                        <div class="col-lg-6">
                                            <label for="task-status" class="form-label">Status<span class="text-danger">*</span></label>
                                            <select class="form-control" data-choices data-choices-search-false name="STATUS"
                                                id="task-status-input">
                                                <option value="">Status</option>
                                                <option value="New" selected>New</option>
                                                <option value="Inprogress">Inprogress</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Completed">Completed</option>
                                            </select>
                                        </div>
                                        <!--end col-->

                                        <div class="col-lg-6">
                                            <label for="priority-field" class="form-label">Priority<span class="text-danger">*</span></label>
                                            <select class="form-control" data-choices data-choices-search-false name="PRIORITY"
                                                id="priority-field">
                                                <option value="">Priority</option>
                                                <option value="High">High</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Low">Low</option>
                                            </select>
                                        </div>
                                        <!--end col-->

                                    </div>

                                    <div class="mb-4">
                                        <label for="task-duedate-input" class="form-label">Due Date:<span class="text-danger">*</span></label>
                                        <input type="date" id="task-duedate-input" class="form-control" name="DUE_DATE" placeholder="Due date">
                                    </div>

                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i
                                                class="ri-close-fill align-bottom"></i> Close</button>
                                        <button type="submit" class="btn btn-primary" id="addNewTodo">Add Task</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end create taks-->

                <!-- removeFileItemModal -->
                <div id="removeTaskItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    id="close-removetodomodal"></button>
                            </div>
                            <div class="modal-body">

                                <div class="mt-2 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                        colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px">
                                    </lord-icon>
                                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                        <h4>Are you sure ?</h4>
                                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this task ?</p>
                                    </div>
                                </div>

                                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                    <a href="javascript:void(0)" class="btn w-sm btn-danger" id="remove-todoitem">Yes, Delete It!</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end delete modal -->

            </div>

        </div>


        <script type="text/javascript">

            $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $(".task-checkbox").click(function(){

                    if($(this).prop("checked") == true){

                        var taskID = $(this).data('task-id');
                        var status = "Completed";
                        var url = '/to-do/task/'+taskID+'/'+status;

                        $.ajax({
                            type:'get',
                            url:url,
                            dataType:'json',
                            success:function(data){

                                $('.label-'+taskID).css('text-decoration', 'line-through');
                                $('.status-badge-'+taskID).html('<span class="badge badge-soft-success text-uppercase">'+status+'</span>');

                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status);
                                alert(thrownError);
                            }
                        });
                        

                    }
                    else if($(this).prop("checked") == false){

                        var taskID = $(this).data('task-id');
                        var status = "Pending";
                        var url = '/to-do/task/'+taskID+'/'+status;

                        $.ajax({
                            type:'get',
                            url:url,
                            dataType:'json',
                            success:function(data){

                                $('.label-'+taskID).css('text-decoration', 'none');
                                $('.status-badge-'+taskID).html('<span class="badge badge-soft-warning text-uppercase">'+status+'</span>');

                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status);
                                alert(thrownError);
                            }
                        });

                    }

                });


                $('#projectlist-data').on('click', '.edit-project', function () {


                    var slug = $(this).data('slug');
                    var url = '/to-do/project/'+slug+'/details';
                    // alert(slug);

                    $.ajax({
                        type:'get',
                        url:url,
                        dataType:'json',
                        success:function(data){

                            $('#SLUG').val(data.SLUG);
                            $('#updated-projectname-input').val(data.PROJECT_NAME);

                            $('#editProjectModal').modal('show');

                        }
                        ,error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status);
                            alert(thrownError);
                        }
                    });


                });


                $('.table').on('click', '.remove-list', function () {


                    var taskID = $(this).data('id');
                    var url = 'task/delete/'+taskID;
                    // alert(url);

                    $("#remove-todoitem").attr("href", url);
                    $('#removeTaskItemModal').modal('show');


                });


            });

        </script>


    @endsection