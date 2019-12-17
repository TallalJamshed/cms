<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
        <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>

        <title>Document</title>
        <style>
            /* p.second{
                margin-top: -20px;
            } */
            body{
                /* margin: 20px; */
                /* border: 1px solid black;
                width: 210mm;
                height: 297mm; */
            }
            /* @page {
                size: 21cm 29.7cm;
                margin: 30mm 45mm 30mm 45mm; */
                /* change the margins as you want them to be. */
            /* } */
            /* @media print { */
                body{
                    /* width: 21cm; */
                    /* height: 29.7cm; */
                    /* border: 1px solid black; */
                    position: relative;
                    min-height: 93vh;
                    /* margin: 1in; */
                    /* margin-left: auto; */
                    /* margin-top: auto; */
                    /* margin-bottom: auto; */
                    /* margin: 30mm 45mm 30mm 45mm;  */
                    /* change the margins as you want them to be. */
                } 
                @page {
                 margin: 0.5in;
                    }
            /* } */
            .main-content{
                margin: 50px 20px 0px 20px;
                /* height: auto; */
                /* margin: 30mm 45mm 30mm 45mm; */
                padding-bottom: 3rem;
            }
            .detailsdiv{
                line-height: 2.3;
            }
            .detailsdiv1{
                line-height: 1.7;
            }
            /* .col-md-12,.col-md-5,.col-md-7{
                padding: 0 !important;
            } */
            .dodiv{
                display: inline-block;
            }
            span.first{
                display: block;
                font-size: 20px;
                font-weight: bold;
                margin-bottom: -12px;
            }
            span.second{
                /* margin-top: -40px; */
                
            }
            h4.invoice{
                color: white;
            }
            button.paymentbtn{
                float:left;
                /* margin-top:15px; */
                background-color:#007bff;
                color:white;
                font-weight:bold;
                margin-left: 10px;
            }
            button.printbtn{
                float:right;
                /* margin-top:15px; */
                background-color:#007bff;
                margin-left: 10px;
            }
            .username{
                float:left;
                margin-left:50px;
                margin-top:30px;
            }
            .matter{
                margin-left:50px;
            }
            .defaultcolor1{
                background-color:#007bff; 
            }
            .defaultcolor2{
                color:#007bff; 
                font-weight: bold;
            }
            .invoicestart{
                width:100%;
                color:black;
                margin:0px;
                background-color:#007bff;
            }

            .footer{
                position: absolute;
                left: 0;
                bottom: 0;
                height: 3rem;
                width: 100%;
                background-color: #007bff;
                color: black;
                text-align: center;
                padding:10px;
                /* margin-top:-60px !important; */
            }
            .paydiv{
                position: relative;
                left: 0;
                /* bottom: 0; */
                width: 100%;
                background-color: #007bff;
                color: white;
                text-align: center;
                padding:10px;
                color:white; 
                /* font-weight:bold */
            }
            #firmname{
                margin-left:50px;
                font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                display:inline-block;
                opacity: 0.7;
            }
            @media print {
                #printbtn,#pay_id,#disc {
                    display :  none;
                }
                ::-webkit-input-placeholder { /* WebKit browsers */
                    color: transparent;
                }
                :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
                    color: transparent;
                }
                :-moz-placeholder { /* Mozilla Firefox 19+ */
                    color: transparent;
                }
                :-ms-input-placeholder { /* Internet Explorer 10+ */
                    color: transparent;
                }
                #expenses {
                    border :  none;
                }
                /* #disc{

                } */
            }
        </style>

    </head>
    <body class="responsive" align="center" >
        <div class="ml-auto mr-auto main-content" style="margin-top:35px;">
            <div class="container-fluid">
                <div style="margin:20px;">
                    <h1 id="firmname"> {{Auth::user()->lawfirmname}}</h1>
                        
                    <div class="row" style="float:right; margin-top:10px">
                        <form method="POST" action="{{route('casefunctions')}}">
                             @csrf
                            <button class="btn paymentbtn" type="submit" name="pay_id" id="pay_id"><i class="fa fa-plus-square" style="font-size:24px;color:white"></i> Add Payment</button>
                        </form>
                        <button class="btn paymentbtn " id="printbtn" onclick="window.print()" style=""><i class="fa fa-print" style="font-size:24px;color:white"></i> Print</button>   
                    </div>
                </div>
                <div class="defaultcolor1" style="height:3px;"></div>
                    
                <div class="row" style="line-height:3rem; margin:50px 0px 50px 0px">
                    <div class="col-md-6">
                        <div style="float:left" class="username">
                            <span class="first">{{Auth::user()->name}}</span>
                            <span class="second">Attorney at law</span>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <div style="">
                            <div class="row detailsdiv1">
                                <div class="col-md-5 defaultcolor2 dodiv"> Address: </div>
                                <span class="col-md-7">{{Auth::user()->lawfirmaddress}}</span>
                            </div>
                            <div class="row detailsdiv">
                                <div class="col-md-5 defaultcolor2 dodiv"> Phone No: </div>
                                <span class="col-md-7">{{Auth::user()->phone_no}}</span>
                            </div>
                            <div class="row detailsdiv">
                                <div class="col-md-5 defaultcolor2 dodiv"> Email: </div>
                                <span class="col-md-7">{{Auth::user()->email}}</span>
                            </div>
                            {{-- <div class="row detailsdiv">
                                <div class="col-md-5 defaultcolor2 dodiv"> Date: </div>
                                <span class="col-md-7">{{date('d-m-Y')}}</span>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row matter" style="padding:10px; margin-top:30px; margin-bottom:30px">
                    <div class="col-md-3">
                        <h4 style="font-weight:bold; display:inline-block">Matter:</h4>
                    </div>
                    <div class="col-md-9">
                        <span style="font-size:18px">{{$case->case_title}}</span>
                    </div>
                </div>
                <div class="row matter" style="padding:10px; margin-top:30px; margin-bottom:30px">
                    <div class="col-md-3">
                        <h4 style="font-weight:bold; display:inline-block">Billed To:</h4>
                    </div>
                    <div class="col-md-9">
                        <span style="font-size:18px">{{$case->client_name}}</span>
                    </div>
                </div>
                <div class="row invoicestart ml-auto" style=" margin-top:30px; margin-bottom:30px">
                    <h4 class="invoice ml-auto mr-auto">Invoice for Professional Services</h4>
                </div>        
                <div class="row">
                    <label id="disc" class="control-label ml-auto mr-auto" for="">Please Enter Case Discription Below <b>BEFORE PRINTING</b>.</label>
                </div>
                <div class="row" style=" margin-top:30px;margin-left:2px; margin-bottom:30px; border-bottom:2px solid black; width:100%">
                    <textarea style="border:none; text-align:center; font-size:18px" placeholder="For-example: Please pay these charges before dd-mm-yyyy. OR Pay these charges through pay order/cheque." class="ml-auto mr-auto" name="" id="" cols="100" rows="4"></textarea>
                </div>

                <div class="row" style="margin-top:100px; margin-bottom:30px" >
                    <div class="col-md-4"></div>
                        <span class="col-md-2" style="font-size:18px; font-weight:600">Case Fee:</span>
                        <span class="col-md-2" id="casefee" style="font-size:18px">{{$total_dues}}/-</span>
                        <div class="col-md-4"></div>
                    </div>
                    <div class="row" >
                        <div class="col-md-4"></div>
                            <span class="col-md-2" style="font-size:18px; font-weight:600">Misc Expenses:</span>
                            <input type="number" value="0" id="expenses" class="col-md-1" style="font-size:18px; float: right; height:35px; width:30px text-align:right">
                        <div class="col-md-4"></div>
                    </div>
                    <hr>
                    {{-- <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">--------------------------------------------------------</div>
                        <div class="col-md-4"></div>
                    </div> --}}
                    <div class="row" >
                        <div class="col-md-4"></div>
                            <span class="col-md-2" style="font-size:18px; font-weight:600">Total:</span>
                            <span class="col-md-2" id="total" style="font-size:18px">{{$total_dues}}/-</span>
                        <div class="col-md-4"></div>
                    </div>
                    <div style="margin-top:250px;">
                        <div class="row" >
                            <div class="col-md-8"></div>
                            <h5 class="col-md-1" style="display:inline-block">Advocate:</h5>
                            <span class="col-md-2" style="font-size:18px">__________________</span>
                            {{-- <div class="col-md-4"></div> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-8"></div>
                            <h5 class="col-md-1" style="display:inline-block">Date:</h5>
                            <span class="col-md-2" style="font-size:18px">{{date('d-m-Y')}}</span>
                            {{-- <div class="col-md-4"></div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <span >Copyright © <?php echo date('Y')?> CMS. All rights reserved.</span>
        </footer>
            
        
        {{-- </center> --}}
        <script>
            var casefee = $('#casefee').text();
            $(document).on('keyup','#expenses',function(){
                var expenses = $('#expenses').val();
                var total = parseFloat(expenses) + parseFloat(casefee);
                $('#total').text(total);
            });
        </script>
        <script>
            $('#pay_id').val( {{ $case->case_id }} );
            // $('#invoiceid').val( {{ $case->amount }} );
        </script>
    </body>
</html>