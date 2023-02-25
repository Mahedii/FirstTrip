@extends('admin.include.master')
    @section('content')

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Edit Task</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Task</a></li>
                                            <li class="breadcrumb-item active">Edit</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            
                            <div class="border-0">
                                <div class="row g-4">
                                    <div class="col-sm" style="margin-bottom: 1rem;">
                                        <div class="d-flex justify-content-sm-end">
                                            <a href="{{ url()->previous() }}" class="btn btn-success" id="addproduct-btn">
                                                <i class="ri-arrow-left-line align-bottom me-1"></i>
                                                Back
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @foreach($toDoTaskQuery as $toDoTask)

                                <form method="POST" action="{{ route('todo.task.update', $toDoTask->id) }}" enctype="multipart/form-data">

                                    @csrf

                                    <div class="row">

                                        <div class="col-lg-12">

                                            <div class="card">

                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Edit Task</h4>
                                                    
                                                </div><!-- end card header -->

                                                <div class="card-body">

                                                    <div class="row">


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="PROJECT_ID" class="form-label">Select Project<span class="text-danger">*</span></label>
                                                                <select class="js-example-basic-single mb-3" id="select-project" name="PROJECT_ID">
                                                                    
                                                                    @foreach($toDoProject as $toDoProjects)
                                                                        <option @if($toDoTask->PROJECT_ID == $toDoProjects->id) selected @endif value="{{ $toDoProjects->id }}">{{ $toDoProjects->PROJECT_NAME }}</option>
                                                                    @endforeach

                                                                </select>
                                                                @if ($errors->has('PROJECT_ID'))
                                                                    <span class="text-danger">{{ $errors->first('PROJECT_ID') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="task-title-input" class="form-label">Task Title<span class="text-danger">*</span></label>
                                                                <input type="text" id="task-title-input" class="form-control" name="TASK_NAME" value="{{ $toDoTask->TASK_NAME }}">
                                                                @if ($errors->has('TASK_NAME'))
                                                                    <span class="text-danger">{{ $errors->first('TASK_NAME') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="task-description-input" class="form-label">Task Description</label>
                                                                <textarea class="form-control" name="TASK_DESCRIPTION" placeholder="Enter task description">
                                                                    {{ $toDoTask->TASK_DESCRIPTION }}
                                                                </textarea>
                                                                @if ($errors->has('TASK_DESCRIPTION'))
                                                                    <span class="text-danger">{{ $errors->first('TASK_DESCRIPTION') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="task-assign-input" class="form-label">Assigned To<span class="text-danger">*</span></label>

                                                                <select class="js-example-basic-multiple" name="ASSIGNED_USER_ID[]" multiple="multiple">

                                                                    @foreach($toDoTaskAssignedTo as $assignedTo)
                                                                        <option selected value="{{ $assignedTo->ASSIGNED_USER_ID }}">{{ $assignedTo->name }}</option>
                                                                    @endforeach
                                                                    
                                                                    @foreach($userList as $user)
                                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                                    @endforeach

                                                                </select>
                                                                @if ($errors->has('ASSIGNED_USER_ID'))
                                                                    <span class="text-danger">{{ $errors->first('ASSIGNED_USER_ID') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="task-status" class="form-label">Status<span class="text-danger">*</span></label>
                                                                <select class="form-control" data-choices data-choices-search-false name="STATUS"
                                                                    id="task-status-input">
                                                                    <option value="{{ $toDoTask->STATUS }}" selected>{{ $toDoTask->STATUS }}</option>
                                                                    <option value="New">New</option>
                                                                    <option value="Inprogress">Inprogress</option>
                                                                    <option value="Pending">Pending</option>
                                                                    <option value="Completed">Completed</option>
                                                                </select>
                                                                @if ($errors->has('STATUS'))
                                                                    <span class="text-danger">{{ $errors->first('STATUS') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="priority-field" class="form-label">Priority<span class="text-danger">*</span></label>
                                                                <select class="form-control" data-choices data-choices-search-false name="PRIORITY"
                                                                    id="priority-field">
                                                                    <option value="{{ $toDoTask->PRIORITY }}" selected>{{ $toDoTask->PRIORITY }}</option>
                                                                    <option value="High">High</option>
                                                                    <option value="Medium">Medium</option>
                                                                    <option value="Low">Low</option>
                                                                </select>
                                                                @if ($errors->has('PRIORITY'))
                                                                    <span class="text-danger">{{ $errors->first('PRIORITY') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->


                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="task-duedate-input" class="form-label">Due Date:<span class="text-danger">*</span></label>
                                                                <input type="date" id="task-duedate-input" class="form-control" name="DUE_DATE" value="{{ $toDoTask->DUE_DATE }}">
                                                                @if ($errors->has('DUE_DATE'))
                                                                    <span class="text-danger">{{ $errors->first('DUE_DATE') }}</span>
                                                                @endif
                                                            </div>
                                                            
                                                        </div><!--end col-->

                                                        
                                                    </div>

                                                    
                                                </div>
                                            </div>
                                            <!-- end card -->

                                            <div class="text-end mb-3">
                                                <button type="submit" class="btn btn-success w-sm">Update Task</button>
                                            </div>
                                        </div>
                                        <!-- end col -->

                                    </div>
                                    <!-- end row -->

                                </form>

                            @endforeach


                        </div>
   

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


    @endsection