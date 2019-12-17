@extends('layout.template')
@section('content')

<p align="center" id="star">Fileds marked with <span >*</span> are required</p>
<div class="row"  id="addcase">
    <div class="col-md-12 col-xl-12">
        <div class="" style="background-color:white; border:1px solid gray; border-radius: 5px;">
            <div class="form-header" style="">
                <i class="fas fa-plus" id="addcaseitag" ></i><span id="addcasespantag">Add Client Information<span>
            </div>
            <div class="form-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {{ $errors->first('fk_client_id') }}
                        </ul>
                    </div>
                @endif

                <?php Session::put('prevroute' , \Request::route()->getName()) ?>
            
                <form class="form-horizontal" method="POST" action="{{ route('addcaseindb')}}" >   
                    @csrf
                    <div class="row addcaserow">
                        <label class="control-label col-md-3 addcaselabel" style="padding-right:0px" for="">Search Client Name:<span id="star">*</span>
                        </label>
                    <div class="col-md-6" align="center" >
                        <select id="selection" class="select2" name="fk_client_id">
                            <option></option>
                            @foreach ($data as $name)
                                <option name="fk_client_id" value="{{$name->client_id}}">{{$name->client_name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('fk_client_id'))
                            <div style="color:red">{{ $errors->first('fk_client_id') }}</div>
                            
                        @endif
                        <br>
                        <span id="clientstar">* If a client name is not available in search then please enter a new Client</span>
                    </div>  
                    <div class="col-md-3" align="center">
                    <a href="{{route('Add Client')}}" class="btn btn-md btn-primary" id="addclientbtn">Add New Client</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="addcase">
    <div class="col-md-12 col-xl-12">
        <div class="" style="background-color:white; border:1px solid gray; border-radius: 5px;">
            <div class="form-header" style="">
                <i class="fas fa-plus" id="addcaseitag" ></i><span id="addcasespantag">Add New Case<span>
            </div>
            <div class="form-body">
                {{-- @if ($errors->any() ) 
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                    <?php Session::put('prevroute' , \Request::route()->getName()) ?>

                {{-- <form class="form-horizontal" method="POST" action="{{ route('addcaseindb')}}" > --}}
                    
                    {{-- <center> <label id="addcasehead">Add new Case</label> </center> --}}
                    {{-- ---------------------------------------------------------------------- --}}
                    {{-- @csrf --}}
                    <div class="row addcaserow" >
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Case Title:<span id="star">*</span>
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('case_title') ? ' is-invalid' : '' }}" type="text" name="case_title" id="case_title" value="{{old('case_title')}}" placeholder="Enter Case Title">
                            
                            @if($errors->has('case_title'))
                                <div style="color:red">{{ $errors->first('case_title') }}</div>
                            @else
                                <span id='ex' >ex- Plaintif vs Defendent</span>
                            @endif
                    </div>

                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Case Nature:<span id="star">*</span>
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('case_nature') ? ' is-invalid' : '' }}" type="text" name="case_nature" id="case_nature" value="{{old('case_nature')}}" placeholder="Enter Case Nature">
                            
                            @if($errors->has('case_nature'))
                                <div style="color:red">{{ $errors->first('case_nature') }}</div>
                            @else
                                <span id='ex'>ex- Family/criminal</span>
                            @endif
                        </div>
                    </div>

                    <div class="row addcaserow">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Court Name:<span id="star">*</span>
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('court_name') ? ' is-invalid' : '' }}" type="text" name="court_name" id="court_name" value="{{old('court_name')}}" placeholder="Enter Case Title">
                            
                            @if($errors->has('court_name'))
                                <div style="color:red">{{ $errors->first('court_name') }}</div>
                            @else
                                <span id='ex'>ex- High Court</span>
                            @endif
                        </div>

                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Reference:
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('reference') ? ' is-invalid' : '' }}" type="text" name="reference" id="reference" value="{{old('reference')}}" placeholder="Enter Case Title">
                            
                            @if($errors->has('reference'))
                                <div style="color:red">{{ $errors->first('reference') }}</div>
                            @else
                                <span id='ex'>ex- Mr.Nabeel (Reference is optional)</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row addcaserow">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Previous Date:
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('previous_date') ? ' is-invalid' : '' }}" type="date" name="previous_date" id="previous_date" value="{{old('previous_date')}}" >
                            
                            @if($errors->has('previous_date'))
                                <div style="color:red">{{ $errors->first('previous_date') }}</div>
                            @else
                                <span id='ex'>(Previous date is optional)</span>
                            @endif
                        </div>

                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Next Date:<span id="star">*</span>
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control {{ $errors->has('next_date') ? ' is-invalid' : '' }}" type="date" name="next_date" id="next_date" value="{{old('next_date')}}" >
                            
                            @if($errors->has('next_date'))
                                <div style="color:red">{{ $errors->first('next_date') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="row addcaserow">
                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Case Fee:
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{old('amount')}}" placeholder="Enter Case Fee" >
                            
                            @if($errors->has('amount'))
                                <div style="color:red">{{ $errors->first('amount') }}</div>
                            @endif
                        </div>

                        <label class="control-label col-md-2 addcaselabel" style="padding-right:0px" for="">Case Status:<span id="star">*</span>
                        </label>
                        <div class="col-md-4" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('case_status') ? ' is-invalid' : '' }}" type="text" name="case_status" id="case_status" value="{{old('case_status')}}" placeholder="Enter Case Status">
                            
                            @if($errors->has('case_status'))
                                <div style="color:red">{{ $errors->first('case_status') }}</div>
                            @else
                                <span id='ex'>ex- Evidence/Arguments</span>
                            @endif
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