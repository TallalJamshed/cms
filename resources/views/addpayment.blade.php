<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
        <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Document</title>
        <style>
            .footer{
                position: absolute;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: cornflowerblue;
                color: white;
                text-align: center;
                padding:10px
            }
            .paydiv{
                position: absolute;
                left: 0;
                /* bottom: 0; */
                width: 100%;
                background-color: cornflowerblue;
                color: white;
                text-align: center;
                padding:10px
            }
            @media print {
                #printbtn {
                    display :  none;
                }
            }
        </style>

    </head>
    <body class="A4 landscape" >
        {{-- <center> --}}
            <div class="sheet ml-auto mr-auto" style="margin-top:35px">
                <div class="row" style="width:100%; background-color:cornflowerblue; color:black;margin:0px;">
                    <div class="col-md-3"></div>
                    {{-- <div > --}}
                        <h1 class="col-md-6" align="center" style="font-size:50px; font-weight:500;">Add Payment</h1>
                    {{-- </div> --}}
                    {{-- <div class="col-md-3">
                        <button id="printbtn" onclick="window.print()" style="float:right; margin-top:15px"><i class="fa fa-print" style="font-size:24px"></i></button>
                    </div> --}}
                    {{-- <h1 align="center" style="font-size:50px; font-weight:500; display:inline-block">INVOICE</h1> --}}
                    {{-- <button onclick="printFunction()">Print this page</button> --}}
                </div>
                <form action="{{ route('addpayment')}}" method="POST">
                    @csrf
                <div class="row" style="padding:10px">
                    <div class="col-md-3" >
                        <h5>Payment Added by:</h5>
                    </div>
                    <div class="col-md-3" >
                        <span >{{ Auth::user()->name }}</span>
                    </div>    
                    <div class="col-md-3" >
                        <h5>Payment Added at:</h5>
                    </div>
                    <div class="col-md-3" >
                        <span >{{date('d-m-Y')}} {{date('h:i A')}}</span>
                    </div>
                   
                </div>
                <hr>
                <div class="container">
                    <div class="row ml-auto mr-auto" style="padding:10px">
                        <div class="col-md-3">
                            <h5>Case Name:</h5>
                        </div>
                        <div class="col-md-3">
                            <span style="font-size:18px">{{$case->case_title}}</span>
                        </div>
                        <div class="col-md-3">
                            <h5>Court Name:</h5>
                        </div>
                        <div class="col-md-3">
                            <span style="font-size:18px">{{$case->court_name}}</span>
                        </div>
                        <input type="text" name="fk_case_id" hidden value="{{$case->case_id}}">
                        <input type="text" name="fk_client_id" hidden value="{{$case->client_id}}">                        
                    </div>
                </div>

                <div class="paydiv">
                    <span style="color:black; font-weight:bold">--------------------Payment Details--------------------</span>
                </div>
                @if($errors)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error}}</li>
                        @endforeach
                    </ul>
                @endif
                {{-- @foreach ($errors->get() as $message)
                    {{$message->first()}}
                @endforeach --}}
                <div class="container" style="margin-top:50px">
                        <div class="row ml-auto mr-auto" style="padding:10px">
                            <div class="col-md-4">
                                <h5>Total Dues:</h5>
                            </div>
                            <div class="col-md-8">
                                <span style="font-size:20px; font-weight:500">{{$total_dues}}</span>
                            </div>
                            <div class="col-md-4">
                                <h5><sup style="color:red">*</sup>Amount paid by client:</h5>
                            </div>
                            <div class="col-md-8">
                                <input type="number" name="paid_amount" style="width:50%; border-radius:3px">

                                <div style="font-size:15px; color:red; font-weight:bold">Please Enter Amount</div>
                            </div>
                            {{-- <div class="col-md-3"> --}}
                                {{-- <h5>Amount Paid:</h5> --}}
                            {{-- </div> --}}
                            {{-- <div class="col-md-9"> --}}
                                {{-- <span style="font-size:18px"></span> --}}
                            {{-- </div> --}}
                            {{-- {{$paidamount}} --}}
                            
                        </div>
                    </div>
                    <div align="center" style="margin-top:100px">
                        <input class="btn btn-md btn-primary" type="submit" name="submit" value="submit">
                    </div>
                </form>
                <div class="footer">
                        <span style="color:black;">Copyright © <?php echo date('Y')?> CMS. All rights reserved.</span>
                        {{-- <hr style="margin:0; padding:-50px;"> --}}
                        {{-- <p style="margin-bottom:-5px; font-size:10px; position:relative">-------------------------------------------------------------------------------------
                            Cut Here
                            -------------------------------------------------------------------------------------</p> --}}
                </div>
            </div>
        {{-- </center> --}}
    </body>
</html>