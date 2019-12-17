@extends('layout.template')
@section('content')
<div id="bodycontent">
<div class="row ">
    
    <div class="col-lg-12 ">
        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
            <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                <div class="bg-overlay bg-overlay--blue">
                </div>                    
                <div class="col-md-12" >
                    <div class="col-md-5" style="display:inline-block">
                        <h3>
                            <i class="zmdi zmdi-account-calendar"></i>
                            <?php echo date('d M Y')?>
                        </h3>
                    </div>
                    <div class="col-md-1" style="display:inline-block">
                    </div>
                    <div class="col-md-5" style="display:inline-block; float:right">
                        <h3 class="taskday" >
                            <i class="zmdi zmdi-account-calendar"></i>
                            <?php echo date('l')?>
                        </h3>
                    </div>
                </div>    
            <a href="{{route('Add New Task')}}" style="">
                <button class="au-btn-plus">
                    <i class="zmdi zmdi-plus"></i>
                </button>
            </a>

            </div>
            <div class="au-task js-list-load">
                {{-- <div class="row " style="margin:20px;padding:10px; border:1px solid black; overflow:hidden;">

                </div> --}}
               
                <div class="row " style="margin:20px; overflow:hidden;">
                    <div class="col-md-4 top-space" align="center">
                        <a title="Show All Previous Tasks" href="{{route('Previous Tasks')}}">
                            <button class="au-btn btn-lg au-btn-icon au-btn--gray" style="width:100%;">
                                <i class="fa fa-chevron-left" style="font-weight: 650" ></i>Previous Tasks
                            </button>
                        </a>
                    </div>

                    <div class="col-md-4 top-space" align="center">
                        <a title="Show Todays Tasks" href="{{route('Home')}}">
                            <button class="au-btn btn-lg au-btn-icon au-btn--gray" style="width:100%;">
                                Today's Tasks
                            </button>
                        </a>
                    </div>

                    <div class="col-md-4 top-space" align="center">
                        <a title="Show All Upcoming Tasks" href="{{route('Next Tasks')}}">
                            <button class="au-btn btn-lg au-btn-icon au-btn--gray" style="width:100%">
                                Next Day Tasks <i class="fa fa-chevron-right" style="font-weight: 650" ></i>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="au-task-list js-scrollbar3" style="max-height:420px; overflow-y:scroll">
                    <?php 
                        if (count($task)>0) {
                            foreach ($task as $key => $value) {                             
                    ?>
                        <div class="row" style="margin-bottom:-30px; width:100%">
                            <div class="col-md-10 au-task__item-inner" style="display:inline-block">
                                <h5 class="task">
                                    {{$value->task_detail}}
                                </h5>
                                <span class="time">{{date('h:i A' , strtotime($value->task_time))}}</span>
                            </div>
                            {{-- <div class="col-md-6 au-task__item-inner" align="center" style="display:inline-block;"> --}}
                                {{-- @if (preg_match('/.pdf/' , $value->task_file))
                                    <a data-toggle="tooltip" data-placement="left" title="PDF File" href="{{route('getdownload' , $value->task_file)}}" style="color:#be1800">
                                        <i class="fa fa-file-pdf-o" style="font-size:30px; margin-right:15px"></i>
                                    </a>
                                @endif
                                     --}}
                                    {{-- @if (preg_match('/.doc/' , $value->task_file))
                                    <a data-toggle="tooltip" data-placement="left" title="WORD File" href="{{route('nexttasks')}}" style="color:#295394">
                                            <i class="fa fa-file-word-o" style="font-size:30px; margin-right:15px"></i>
                                        </a>
                                    @endif

                                    @if (preg_match('/.xlsx/' , $value->task_file))
                                    <a data-toggle="tooltip" data-placement="left" title="EXCEL File" href="{{route('nexttasks')}}" style="color:#206f44">
                                            <i class="fa fa-file-excel-o" style="font-size:30px; margin-right:15px"></i>
                                        </a>
                                    @endif

                                    @if (preg_match('/.ppt/' , $value->task_file))
                                    <a data-toggle="tooltip" data-placement="left" title="PowerPoint File" href="{{route('nexttasks')}}" style="color:#ca4222">
                                            <i class="fa fa-file-powerpoint-o" style="font-size:30px; margin-right:15px"></i>
                                        </a>
                                    @endif --}}   
                            {{-- </div> --}}
                            <div class="col-md-2 au-task__item-inner" align="center" style="display:inline-block">
                                @include('partials.taskbuttons')
                            </div>
                        </div>
                        <hr>
                    <?php  
                            }
                        }
                        else { 
                    ?>
                        <div class="col-md-12 au-task__item-inner" align="center" style="display:inline-block;">
                            {{"You have no tasks for today."}}
                            <hr>
                        </div>
                    <?php  
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-md-12">
        <div class="copyright">
                <p>Copyright © <?php echo date('Y')?> CMS. All rights reserved.</p>
        </div>
    </div>
</div>

</div>
</div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>

</div>
</div>
@endsection