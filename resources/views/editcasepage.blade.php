@extends('layout.template')
@section('content')
<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="" style="background-color:white; border:1px solid gray; border-radius: 5px;">
            <div class="form-header" style="">
                <i class="fas fa-pencil-alt" id="addcaseitag" ></i><span id="addcasespantag">Edit Case<span>
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
                <form class="form-horizontal" method="POST" action="{{ route('updatecase')}}" >
                    
                    {{-- <center> <label id="addcasehead">Add new Case</label> </center> --}}
                    {{-- ---------------------------------------------------------------------- --}}
                    @csrf
                    <div class="row addcaserow" >
                        <input type="text" hidden="true" name="case_id" value="{{Crypt::encrypt($casedata->case_id)}}">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Case Title:
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                        <input class="form-control{{ $errors->has('case_title') ? ' is-invalid' : '' }}" type="text" name="case_title" id="case_title" value="{{$casedata->case_title}}" placeholder="Enter Case Title">
                            @if($errors->has('case_title'))
                                <div style="color:red">{{ $errors->first('case_title') }}</div>
                            @endif
                        </div>

                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Case Nature:
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('case_nature') ? ' is-invalid' : '' }}" type="text" name="case_nature" id="case_nature" value="{{$casedata->case_nature}}" placeholder="Enter Case Nature">
                            @if($errors->has('case_nature'))
                                <div style="color:red">{{ $errors->first('case_nature') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row addcaserow">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Court Name:
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('court_name') ? ' is-invalid' : '' }}" type="text" name="court_name" id="court_name" value="{{$casedata->court_name}}" placeholder="Enter Case Title">
                            @if($errors->has('court_name'))
                                <div style="color:red">{{ $errors->first('court_name') }}</div>
                            @endif
                        </div>

                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Next Date:
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('next_date') ? ' is-invalid' : '' }}" type="date" name="next_date" id="next_date" value="{{$casedata->next_date}}" >
                            @if($errors->has('next_date'))
                                <div style="color:red">{{ $errors->first('next_date') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row addcaserow">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Case Fee:
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{$casedata->amount}}" placeholder="Enter Case Fee">
                            @if($errors->has('amount'))
                                <div style="color:red">{{ $errors->first('amount') }}</div>
                            @endif
                        </div>

                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Reference:
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('reference') ? ' is-invalid' : '' }}" type="text" name="reference" id="reference" value="{{$casedata->reference}}" >
                            @if($errors->has('reference'))
                                <div style="color:red">{{ $errors->first('reference') }}</div>
                            @endif
                        </div>
                    </div>
                    
                     {{-- <div class="row addcaserow">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Previous Date:
                        </label> --}}
                        {{-- <div class="col-md-4" style="padding-left:0px"> --}}
                            <input hidden type="date" name="prev_date" value="{{$casedata->previous_date}}" >
                            <input hidden type="date" name="next" value="{{$casedata->next_date}}" >
                            {{-- @if($errors->has('previous_date'))
                                <div style="color:red">{{ $errors->first('previous_date') }}</div>
                            @endif --}}
                        {{-- </div> --}}

                    {{--    <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Next Date:
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('next_date') ? ' is-invalid' : '' }}" type="date" name="next_date" id="next_date" value="{{$casedata->next_date}}" >
                            @if($errors->has('next_date'))
                                <div style="color:red">{{ $errors->first('next_date') }}</div>
                            @endif
                        </div>
                    </div> --}}

                    <div class="row addcaserow">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Case Status:
                        </label>
                        <div class="col-md-10" style="padding-left:0px">
                            <textarea class="form-control{{ $errors->has('case_status') ? ' is-invalid' : '' }}" name="case_status" id="case_status" rows="5" placeholder="Enter Case Status">{{$casedata->case_status}}</textarea>
                            @if($errors->has('case_status'))
                                <div style="color:red">{{ $errors->first('case_status') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row addcaserow" >
                        <div class="col-md-12" style="text-align:center">
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