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
            body{
                position: relative;
                min-height: 93vh;
            } 
            @page {
                margin: 0.5in;
                }
            .main-content{
                margin: 50px 20px 0px 20px;
                padding-bottom: 3rem;
            }
            span.first{
                display: block;
                font-size: 20px;
                font-weight: bold;
                margin-bottom: -12px;
            }
            h4.invoice{
                color: white;
            }
            button.paymentbtn{
                float:left;
                background-color:#007bff;
                color:white;
                font-weight:bold;
                margin-left: 10px;
            }
            button.printbtn{
                float:right;
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
            .addresshead{
                color:#007bff; 
                font-weight: bold;
                display: inline-block;
            }
            .invoicestart{
                width:100%;
                height:40px;
                color:black;
                margin:0px;
                background-color:#007bff;
            }

            .footer{
                position: fixed;
                left: 0;
                bottom: 0;
                height: 3rem;
                width: 100%;
                background-color: #007bff;
                color: black;
                text-align: center;
                padding:10px;
            }
            .header {
                position: fixed;
                top: 0;
            }
            .paydiv{
                position: relative;
                left: 0;
                width: 100%;
                background-color: #007bff;
                color: white;
                text-align: center;
                padding:10px;
                color:white; 
            }
            #firmname{
                margin-left:50px;
                font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                display:inline-block;
                opacity: 0.7;
            }
            .noticelogo{
                height: 8rem;
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
            }
        </style>

    </head>
    
    <body class="responsive" align="center" >
        <div class="ml-auto mr-auto main-content" style="margin-top:35px;">
            <div class="container-fluid">
                <div class="header">
                <div style="margin:20px;">   
                    <div class="row" style="float:right;">
                        <button class="btn paymentbtn" id="printbtn" onclick="window.print()" style="">
                            <i class="fa fa-print" style="font-size:24px;color:white"></i>
                        </button>   
                    </div>
                </div>
                <div class="row" style="line-height:3rem; margin:50px 0px 50px 0px">
                    <div class="col-md-5">
                        @if (Auth::user()->file_path != null)
                            <div class="row" style="">
                                <img class="noticelogo ml-auto mr-auto" src="{{asset('/').'user_pic_uploads/'.Auth::user()->file_path}}" alt="avatar" />
                            </div>
                        @endif
                        
                        <div class="row" style="">
                            <h1 class="ml-auto mr-auto" id="firmname"> {{Auth::user()->lawfirmname}}</h1>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <div class="row" style="">
                            <div class="col-md-4 addresshead"> Address: </div>
                            <span class="col-md-8">{{Auth::user()->lawfirmaddress}}</span>
                        </div>
                        <div class="row" style="">
                            <div class="col-md-4 addresshead"> Phone No: </div>
                            <span class="col-md-8">{{Auth::user()->phone_no}}</span>
                        </div>
                        <div class="row" style="">
                            <div class="col-md-4 addresshead"> Email: </div>
                            <span class="col-md-8">{{Auth::user()->email}}</span>
                        </div>
                    </div>
                </div>
                
                

                <div class="row matter" style="padding:10px; margin-top:30px; margin-bottom:30px">
                    <div class="col-md-6">
                        <h4 style="font-weight:bold; display:inline-block">Reference No:</h4>
                    {{-- </div>
                    <div class="col-md-10"> --}}
                        <span style="font-size:18px; margin-left:10px">12{{(Auth::user()->lawfirmname)[0]}}-{{date('hdms')}}</span>
                    </div>
                {{-- </div>
                <div class="row matter" style="padding:10px; margin-top:30px; margin-bottom:30px"> --}}
                    <div class="col-md-6">
                        <div style="float:right; margin-right:150px">
                            <h4 style="font-weight:bold; display:inline-block">Date:</h4>
                            <span style="font-size:18px; margin-left:10px">{{date('d-m-Y / h-i-s')}}</span>
                        </div>
                    </div>
                </div>
                <div class="row invoicestart ml-auto" style=" margin-top:30px; margin-bottom:30px">
                {{-- <label id="disc" class="control-label " for=""><b>Click In the Center to add Title------></b>.</label> --}}
                    {{-- <h4 class="invoice ml-auto mr-auto"><input type="text" style="border:0;height:40px; background:0; text-align:center; color:white; font-weight:bold" ></h4> --}}
                    <h4 class="invoice ml-auto mr-auto">Legal Notice</h4> 
                </div>
                </div>        
                {{-- <hr style="margin-top:500px">
                <div class="row">
                    <label id="disc" class="control-label ml-auto mr-auto" for="">Please Type The Legal Notice Below <b>BEFORE PRINTING</b>.</label>
                </div>
                <div class="row" style=" margin-top:30px;margin-left:2px; margin-bottom:30px; width:100%">
                    <textarea style="border:none;text-align:justify;font-size:18px;resize:vertical" class="ml-auto mr-auto" name="" id="" cols="100"  placeholder="For-example: Please pay these charges before dd-mm-yyyy. OR Pay these charges through pay order/cheque." ></textarea>
                </div> --}}
                <div style="position:relative">
                    <textarea style="border:none;text-align:justify;font-size:18px;resize:vertical; bottom:0" class="ml-auto mr-auto" name="" id="" cols="100"  placeholder="For-example: Please pay these charges before dd-mm-yyyy. OR Pay these charges through pay order/cheque." ></textarea>
                </div>

                {{-- <div class="row" style="margin-top:100px; margin-bottom:30px">
                    <div class="col-md-8"></div>
                    <h5 class="col-md-1" style="display:inline-block">Advocate:</h5>
                    <span class="col-md-2" style="font-size:18px">__________________</span>
                </div>
                <div class="row">
                    <div class="col-md-8"></div>
                    <h5 class="col-md-1" style="display:inline-block">Date:</h5>
                    <span class="col-md-2" style="font-size:18px">{{date('d-m-Y')}}</span>
                </div> --}}
            </div>
        </div>
        <footer class="footer">
            <span >Copyright © <?php echo date('Y')?> CMS. All rights reserved.</span>
        </footer>
            
        
        {{-- </center> --}}
        {{-- <script>
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
        </script> --}}
    </body>
</html>