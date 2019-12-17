<div class="btn-group">
<a title="Finish this case. All finished cases will be available in Decided Cases button" class="red-tooltip btn btn-md btn-warning" href="{{route('changestatus' , Crypt::encrypt($case->case_id))}}"><i  class="far fa-eye-slash"></i></a>
<a title="Press this button to edit this case" class="red-tooltip btn btn-md btn-info" href="{{route('Edit Case', Crypt::encrypt($case->case_id))}}"><i style="color:white" class="fas fa-pencil-alt"></i></a>
<button onClick='caseModal({{$case->case_id}})' class="btn btn-md btn-danger"><i style="color:white" class="far fa-trash-alt"></i></button>
<button onClick='sendMailModal({{$case}})' class="btn btn-md btn-success"><i style="color:white" class="fa fa-envelope"></i></button>
</div>

{{-- <div class="btn-group-vertical">
<button style="margin-top:5px" class="btn btn-sm btn-success"> Send to client</button>
<button style="margin-top:5px" class="btn btn-sm btn-success">Billing Details</button>
</div> --}}

<script type="text/javascript">
    function caseModal(val){
        $('#caseDetailsModal').modal();
        $('#idtodel').val(val);      
    }
</script>
<!-- Case Details Modal -->
<div class="modal fade" id="caseDetailsModal" tabindex="-1" role="dialog" aria-hidden="true"
data-backdrop="static">
   <div class="modal-dialog " role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="staticModalLabel">Confirmation</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <p>
                   Do you really want to delete this case.
               </p>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <form method="POST" action="{{ route('deletecase')}}">
                @csrf
                <input hidden type="text" id="idtodel" name="case_id">
                <input class="btn btn-primary" type="submit" id="submit" value="Confirm">
                </form>
               {{-- <a class="btn btn-primary" href="{{route('deletecase' , Crypt::encrypt($case->case_id))}}">Confirm</a> --}}
           </div>
       </div>
   </div>
</div>
<!-- End Case Details Modal -->
<script>
    function sendMailModal(val){
        var id = val.case_id;
        $.ajax({
                url: 'clientdetails/'+id,
                type: 'get',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                    // console.log(data[0]);
                    $('#mailmodal').modal();
                    $('#to').val(data[0].email);
                    $('#subject').val(data[0].case_title +" "+ "Case Details");
                    $('#emailbody').val(data[0].case_status);
                }
            });
    }
</script>

<!-- Mail Modal -->
<div class="modal fade" id="mailmodal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Send Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route("sendmail")}}" method="post">
                            @csrf
                    <div class="row">
                        
                            <div class="col-sm-12">
                                <label class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">To:<sup style="color:red">*required</sup></label>
                                <input type="text" class="col-sm-8" style="margin-left:10px" id="to" name="to">
                                <hr >
                            </div>

                            <div class="col-sm-12">
                                <label class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">Cc:</label>
                                <input type="text" class="col-sm-8" style="margin-left:10px" id="cc" name="cc">
                                <hr >
                            </div>
                            
                            <div class="col-sm-12">
                                <label class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">Bcc:</label>
                                <input type="text" class="col-sm-8" style="margin-left:10px" id="bcc" name="bcc">
                                <hr >
                            </div>

                            <div class="col-sm-12">
                                <label class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">Subject:<sup style="color:red">*required</sup></label>
                                <input type="text" class="col-sm-8" style="margin-left:10px; outline: 0; border-width: 0 0 2px; border-color: blue" id="subject" name="subject" >
                                <hr >
                            </div>
                            
                            <div class="col-sm-12">
                                <label class="control-label col-sm-3 addcaselabel" style="padding-right:0px" for="">Body:<sup style="color:red">*required</sup></label>
                                <input class="col-sm-8" style="margin-left:10px" id="emailbody" name="emailbody">
                                {{-- <hr style="margin:1px"> --}}
                            </div>
                            <div class="col-sm-12">
                                <input type="submit" value="Send" class="btn btn-primary">
                            </div>
                        
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mail Modal -->