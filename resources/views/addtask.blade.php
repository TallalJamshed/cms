@extends('layout.template')
@section('content')
<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="" style="background-color:white; border:1px solid gray; border-radius: 5px;">
            <div class="form-header" style="">
                <i class="fas fa-plus" id="addcaseitag" ></i><span id="addcasespantag">Add New Task<span>
            </div>
            <div class="form-body">
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                
                <form class="form-horizontal" method="POST" action="{{ route('addtaskindb')}}" enctype="multipart/form-data">

                    @csrf

                    <div class="row addcaserow justify-content-center">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Task Due Date:
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('task_date') ? ' is-invalid' : '' }}" type="date" name="task_date" id="task_date" value="{{old('task_date')}}" placeholder="Enter Task Date">
                            @if($errors->has('task_date'))
                                <div style="color:red">{{ $errors->first('task_date') }}</div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row addcaserow justify-content-center">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Task Due Time:<sub style="color:grey">*optional</sub>
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('task_time') ? ' is-invalid' : '' }}" type="time" name="task_time" id="task_time" value="{{old('task_time')}}" placeholder="Enter Task Time">
                        </div>
                    </div>

                    <div class="row addcaserow justify-content-center">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Task Details:
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <textarea class="form-control{{ $errors->has('task_detail') ? ' is-invalid' : '' }}" name="task_detail" id="task_detail" value="{{old('task_detail')}}" rows="5" placeholder="Enter Task Detail"></textarea>
                            @if($errors->has('task_detail'))
                                <div style="color:red">{{ $errors->first('task_detail') }}</div>
                            @endif
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
                <p>Copyright © <?php echo date('Y')?> CMS. All rights reserved.</p>
        </div>
    </div>
</div>

@endsection