@extends('layout.template')
@section('content')

<?php Session::put('prevroute' , \Request::route()->getName()) ?>
<div class="main-content" style="padding-top:10px;" id="decidedcase">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-30">
                <table class="table" id="casestable" >
                    {{-- <input type="text" class="form-control" id="tablesearch" onkeyup="myFunction()" placeholder="Search "> --}}
                    <thead style="text-align:center; background-color:black; color:white; border-radius:10px;">
                        <tr >
                            <th style="width:50px;">Serial No</th>
                            <th style="width:200px">Case Title</th>
                            <th style="width:150px">Court Name</th>
                            {{-- <th style="width:100px">Case Nature</th> --}}
                            {{-- <th style="width:110px">Previous Date</th> --}}
                            <th style="width:110px">Next Date</th>
                            {{-- <th style="width:100px">Reference</th> --}}
                            <th style="width:120px">Case Status</th>
                            <th style="width:150px">Actions</th>
                        </tr>
                    </thead>
                    <tbody style="text-align:center; background-color:white; ">
                        <?php $serial = 1; ?>
                        @foreach ($allcasesdata as $case)
                        <tr>
                            <td>{{$serial++}}</td>
                            <td><button onClick="caseDetailsModal({{$case}})" class="btn btn-primary" style="color:white;width:100%;white-space:normal;box-shadow: 0px 5px 5px 0px #808080;" >{{$case->case_title}}</button></td>
                            <td>{{$case->court_name}}</td>
                            {{-- <td>{{$case->case_nature}}</td> --}}
                            {{-- <td>{{date('d-m-Y',strtotime($case->previous_date))}}</td> --}}
                            <td>{{date('d-m-Y',strtotime($case->next_date))}}</td>
                            {{-- <td>{{$case->reference}}</td> --}}
                            <td>{{$case->case_status}}</td>
                            <td>
                                    @include('partials.buttons')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <span>{{ $allcasesdata->links() }}</span>
        </div>     
    </div>
    {{-- <script type="text/javascript">
        function caseDetailsModal(val){
            $('#dataModal').modal();
            $('#case_id').val(val.case_id);
            $('#pay_id').val(val.case_id);
            $('#mail_id').val(val.case_id);
            $('#casetitle').text(val.case_title);
            $('#casenature').text(val.case_nature);
            $('#courtname').text(val.court_name);
            $('#previousdate').text(val.previous_date);
            $('#nextdate').text(val.next_date);
            $('#reference').text(val.reference);
            $('#casestatus').text(val.case_status);
            var id = val.case_id;
    
                $.ajax({
                    url: 'details/'+id,
                    type: 'get',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        flen = data[0].length;
                        text = "<ul id='datesul'>";
                        for (i = 0; i < flen; i++) {
                            text += "<li id='datesli' >" + data[0][i] + "</li>";
                        }
                        text += "</ul>";
                        document.getElementById("dates").innerHTML = text;
                        // alert(data[1]);
                        $('#clientname').text(data[1].client_name);
                        $('#clientemail').text(data[1].email);
                        $('#clientnumber').text(data[1].phone_number);
                    }
                });
        }
    </script> --}}
    
    {{-- <script>
        $(document).on('hidden.bs.modal', '#dataModal', function() { 
            $('#clientname').text("");
            $('#clientemail').text("");
            $('#clientnumber').text("");
        });
    </script> --}}
    
    <!-- modal static -->
    {{-- <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
       <div class="modal-dialog " role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="staticModalLabel">Case Details</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <div class="row">
                        <div class="col-sm-12">
                            <label class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">Client Name:</label>
                            <span class="col-sm-9" style="margin-left:10px" id="clientname"></span>
                        </div>
                        <div class="col-sm-12">
                            <label class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">Client Email:</label>
                            <span class="col-sm-9" style="margin-left:10px" id="clientemail"></span>
                        </div>
                        <div class="col-sm-12">
                            <label class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">Phone No:</label>
                            <span class="col-sm-9" style="margin-left:10px" id="clientnumber"></span>
                            <hr style="margin:0px">
                        </div>
                       
                    <div class="col-sm-12">
                        <label class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">Case Title:</label>
                        <span class="col-sm-9" style="margin-left:10px" id="casetitle"></span>
                    </div>
                    <div class="col-sm-12">
                        <label class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">Case Nature:</label>
                        <span class="col-sm-9" style="margin-left:10px" id="casenature"></span>
                    </div>
                    <div class="col-sm-12">
                        <label class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">Court Name:</label>
                        <span class="col-sm-9" style="margin-left:10px" id="courtname"></span>
                    </div>
                    <div class="col-sm-12">
                        <label class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">Reference:</label>
                        <span class="col-sm-9" style="margin-left:10px" id="reference"></span>
                    </div>
                    <div class="col-sm-12">
                        <label class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">Case Status:</label>
                        <span class="col-sm-9" style="margin-left:10px" id="casestatus"></span>
                    </div>
                    <div class="col-sm-12">
                        <label class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">Next Date:</label>
                        <span class="col-sm-9" style="margin-left:10px" id="nextdate"></span>
                    </div>
                    <div class="col-sm-12">
                            <label class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">Prev Date:</label>
                            <span class="col-sm-9" style="margin-left:10px" id="previousdate"></span>
                        </div>
                    <div class="col-sm-12">
                        <hr style="margin:0px">
                        <label id="label" class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">Dates History:</label>
                        <span class="col-sm-9" style="margin-left:10px;" id="dates"></span>
                    </div>
               </div>
               </div>
               <div class="modal-footer">
                   <div align="center"> 
                        <form method="POST" action="{{route('casefunctions')}}">
                            @csrf --}}
                            {{-- <div class="btn-group"> --}}
                                {{-- <button id="exitbutton" class="btn btn-secondary modalbtn1" data-dismiss="modal">Cancel</button> --}}
                                {{-- <button class="btn btn-primary" type="submit" name="case_id"  id="case_id">Get Billing Details</button>
                                <button class="btn btn-primary" type="submit" name="pay_id"  id="pay_id">Add Payment</button>
                                <button class="btn btn-primary" type="submit" name="mail_id"  id="mail_id">Send details to client</button> --}}
                            {{-- </div> --}}
                        {{-- </form>
                    </div>
               </div> --}}
           {{-- </div> --}}
       {{-- </div> --}}
    {{-- </div> --}}
    <!-- end modal static -->
    <hr>
        <div class="row" >
            <div class="col-md-12">
                <div class="copyright">
                        <p>Copyright © <?php echo date('Y')?> CMS. All rights reserved.</p>
                </div>
            </div>
        </div>


                            
    @endsection