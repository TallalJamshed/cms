@extends('layout.template')
@section('content')


<div class="row" id="addcase">
    <div class="col-md-12 col-xl-12">
        <div class="" style="background-color:white; border:1px solid gray; border-radius: 5px;">
            <div class="form-header" style="">
                <i class="fas fa-plus" id="addcaseitag" ></i><span id="addcasespantag">Case Details<span>
            </div>
            <div class="form-body">
                @if ($errors->any() ) 
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <?php Session::put('prevroute' , \Request::route()->getName()) ?>

                {{-- <form class="form-horizontal" method="POST" action="{{ route('addcaseindb')}}" > --}}
                    
                    {{-- <center> <label id="addcasehead">Add new Case</label> </center> --}}
                    {{-- ---------------------------------------------------------------------- --}}
                    {{-- @csrf --}}
                    <div class="row addcaserow" >
                        <label class="control-label col-md-1 addcaselabel" style="padding-right:0px" for="">Case Title:<span id="star">*</span>
                        </label>
                        <div class="col-md-3" style="padding-left:0px">
                            <input disabled class="form-control{{ $errors->has('case_title') ? ' is-invalid' : '' }}" type="text" name="case_title" id="case_title" value="{{$data->case_title}}" placeholder="Enter Case Title">
                            {{-- <span id='ex' >ex- Plaintif vs Defendent</span> --}}
                        </div>

                        <label class="control-label col-md-1 addcaselabel" style="padding-right:0px" for="">Case Nature:<span id="star">*</span>
                        </label>
                        <div class="col-md-3" style="padding-left:0px">
                            <input disabled class="form-control{{ $errors->has('case_nature') ? ' is-invalid' : '' }}" type="text" name="case_nature" id="case_nature" value="{{$data->case_nature}}" placeholder="Enter Case Nature">
                            {{-- <span id='ex'>ex- Family/criminal</span> --}}
                        </div>
                        <label class="control-label col-md-1 addcaselabel" style="padding-right:0px" for="">Court Name:<span id="star">*</span>
                        </label>
                        <div class="col-md-3" style="padding-left:0px">
                            <input disabled class="form-control{{ $errors->has('court_name') ? ' is-invalid' : '' }}" type="text" name="court_name" id="court_name" value="{{$data->court_name}}" placeholder="Enter Case Title">
                            {{-- <span id='ex'>ex- High Court</span> --}}
                        </div>

                        <label class="control-label col-md-1 addcaselabel" style="padding-right:0px" for="">Reference:
                        </label>
                        <div class="col-md-3" style="padding-left:0px">
                            <input disabled class="form-control{{ $errors->has('reference') ? ' is-invalid' : '' }}" type="text" name="reference" id="reference" value="{{$data->reference}}" placeholder="Enter Case Title">
                            {{-- <span id='ex'>ex- Mr.Nabeel (Reference is optional)</span> --}}
                        </div>
                        <label class="control-label col-md-1 addcaselabel" style="padding-right:0px" for="">Case Status:<span id="star">*</span>
                        </label>
                        <div class="col-md-3" style="padding-left:0px">
                            <input disabled class="form-control{{ $errors->has('case_status') ? ' is-invalid' : '' }}" type="text" name="case_status" id="case_status" value="{{$data->case_status}}" placeholder="Enter Case Status">
                            {{-- <span id='ex'>ex- Evidence/Arguments</span> --}}
                        </div>
                        <label class="control-label col-md-1 addcaselabel" style="padding-right:0px" for="">Next Date:<span id="star">*</span>
                        </label>
                        <div class="col-md-3" style="padding-left:0px">
                            <input disabled class="form-control {{ $errors->has('next_date') ? ' is-invalid' : '' }}" type="date" name="next_date" id="next_date" value="{{$data->next_date}}" >
                        </div>
                    </div>
                    
                    <div class="row addcaserow">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Previous Dates:
                        </label>
                        <ul class="col-md-4">
                            @foreach ($dates as $date)
                                <li>{{$date->prev_date}}</li>
                            @endforeach
                        </ul>
                        {{-- <div class="col-md-4" style="padding-left:0px">
                            <input disabled class="form-control{{ $errors->has('previous_date') ? ' is-invalid' : '' }}" type="date" name="previous_date" id="previous_date" value="{{$data->previous_date}}" >
                            {{-- <span id='ex'>(Previous date is optional)</span> 
                        </div>--}}
                        {{-- <div class="col-md-4"></div> --}}
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Case Fee:
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input disabled class="form-control{{ $errors->has('previous_date') ? ' is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{$data->amount}}" placeholder="Enter Case Fee" >
                        </div>
                    </div>

                   

                    {{-- <div class="row addcaserow">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Case Status:<span id="star">*</span>
                        </label>
                        <div class="col-md-10" style="padding-left:0px">
                            <textarea class="form-control{{ $errors->has('case_status') ? ' is-invalid' : '' }}" name="case_status" id="case_status" value="{{old('case_status')}}" rows="2" placeholder="Enter Case Status"></textarea>
                            <span style="font-size:12px">ex- Evidence/Arguments</span>
                        </div>
                    </div> --}}

                    

                    <div class="row addcaserow" >
                        <div class="col-md-12" style="text-align:center">
                            <a class="btn btn-success" href="">Send case details on e-mail to client</a>
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