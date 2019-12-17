@extends('layout.template')
@section('content')
<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="" style="background-color:white; border:1px solid gray; border-radius: 5px;">
            <div class="form-header" style="">
                <i class="fas fa-pencil-alt" id="addcaseitag" ></i><span id="addcasespantag">Edit Task<span>
            </div>
            <div class="form-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form class="form-horizontal" method="POST" action="{{ route('updatetask')}}" enctype="multipart/form-data" >
                    
                    {{-- <center> <label id="addcasehead">Add new Case</label> </center> --}}
                    {{-- ---------------------------------------------------------------------- --}}
                    @csrf
                    <input type="text" hidden name="task_id" value="{{Crypt::encrypt($task->task_id)}}">
                    <div class="row addcaserow justify-content-center">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Task Due Date:
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('task_date') ? ' is-invalid' : '' }}" type="date" name="task_date" id="task_date" value="{{$task->task_date}}">
                            
                        </div>
                    </div>
                    
                    <div class="row addcaserow justify-content-center">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Task Due Time:<sub style="color:grey">*optional</sub>
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('task_time') ? ' is-invalid' : '' }}" type="time" name="task_time" id="task_time" value="{{$task->task_time}}">
                        </div>
                    </div>

                    {{-- <div class="row addcaserow justify-content-center" >
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Upload Task Files:<sub style="color:grey">*optional</sub></label>
                        <div class="col-md-4" style="padding-left:0px">
                        <input class="form-control{{ $errors->has('task_file') ? ' is-invalid' : '' }} filestyle" type="file"  name="task_file" id="task_file" value="{{$task->task_file}}" placeholder="Upload Task File">
                        </div>
                    </div> --}}

                    <div class="row addcaserow justify-content-center">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Task Details:
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <textarea class="form-control{{ $errors->has('task_detail') ? ' is-invalid' : '' }}" name="task_detail" id="task_detail" rows="5">{{$task->task_detail}}</textarea>
                        </div>
                    </div>

                    <div class="row addcaserow justify-content-center" >
                        <div class="col-md-4" style="text-align:center">
                            <input type="submit" value="submit" id="submitbutton" class="btn btn-primary"> 
                        </div>      
                    </div>
                    
                    {{-- ------------------------------------------------------------------------- --}}
                </form>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="copyright">
            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
        </div>
    </div>
</div>

@endsection