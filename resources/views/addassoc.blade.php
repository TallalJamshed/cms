@extends('layout.template')
@section('content')
<div class="row"  id="addcase">
    <div class="col-md-12 col-xl-12">
        <div class="" style="background-color:white; border:1px solid gray; border-radius: 5px;">
            <div class="form-header" style="">
                <i class="fas fa-plus" id="addcaseitag" ></i><span id="addcasespantag">Add Associate Information<span>
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
            
                <form class="form-horizontal" method="POST" action="{{ route('addassocindb')}}" >   
                    @csrf
                    <div align="center">
                    <div class="row" >
                        <label class="control-label col-md-3 addcaselabel" style="padding-right:0px" for="">Associate Name:<span id="star">*</span>
                        </label>
                        <div class="col-md-6"  >
                            <input type="text" class="form-control" name="assoc_name" >
                            @if($errors->has('assoc_name'))
                                <div style="color:red">{{ $errors->first('assoc_name') }}</div>
                                
                            @endif     
                        </div>  
                    </div>
                    <div class="row" >
                        <label class="control-label col-md-3 addcaselabel" style="padding-right:0px" for="">Associate Email:<span id="star">*</span>
                        </label>
                        <div class="col-md-6" >
                            <input type="text" class="form-control" name="assoc_email" >
                            @if($errors->has('assoc_email'))
                                <div style="color:red">{{ $errors->first('assoc_email') }}</div>    
                            @endif     
                        </div>  
                    </div>
                    <br>
                    <span id="clientstar">* If an associate is not available in the table above then please enter a new asociate name</span>
                    <div class="col-md-3" >
                        <input class="btn btn-md btn-primary" type="submit" name="Add Associate" id="addclientbtn">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="main-content" style="padding-top:10px;" id="allcase">
        <div class="row" id="allcaserow">
            <div class="col-lg-12">
                <div class="table-responsive table--no-card m-b-30">
                    <table class="table" style="table-layout:fixed"  id="casestable">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:50px;">Serial No</th>
                                <th style="width:200px">Associate Name</th>
                                <th style="width:150px">Associate Email</th>
                                <th style="width:150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center; background-color:white; ">
                            <?php $serial = 1; ?>
                            @foreach ($associates as $associate)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$associate->assoc_name}}</td>
                                <td>{{$associate->assoc_email}}</td>
                                <td>
                                    <button onClick='assocModal({{$associate->assoc_id}})' class="btn btn-md btn-danger"><i style="color:white" class="far fa-trash-alt"></i></button>
                                    {{-- <button onClick='sendMailModal({{$associate}})' class="btn btn-md btn-success"><i style="color:white" class="fa fa-envelope"></i></button> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                         {{-- <span>{{ $allcasesdata->links() }}</span> --}}
            </div>    
        </div>
    </div>
</div>


    
{{-- @if ($errors)
    @foreach ($errors->all() as $message)
        <div class="invalid-feedback" >
            <strong class="errormsg">{{$message}}</strong>
        </div>
    @endforeach
@endif      --}}
                
<script type="text/javascript">
    function assocModal(val){
        $('#deleteAssocModal').modal();
        $('#associdtodel').val(val);      
    }
</script>            

<!-- Stocks Modal -->
<div class="modal fade" id="deleteAssocModal" tabindex="-1" role="dialog" aria-hidden="true"
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
                   Do you really want to delete this Associate.
               </p>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <form method="POST" action="{{ route('deleteassoc')}}">
                @csrf
                <input hidden type="text" id="associdtodel" name="assoc_id">
                <input class="btn btn-primary" type="submit" id="submit" value="Confirm">
                </form>
               {{-- <a class="btn btn-primary" href="{{route('deletecase' , Crypt::encrypt($case->case_id))}}">Confirm</a> --}}
           </div>
       </div>
   </div>
</div>
<!-- Stocks Modal -->

<div class="row">
    <div class="col-md-12">
        <div class="copyright">
                <p>Copyright © <?php echo date('Y')?> CMS. All rights reserved.</p>
        </div>
    </div>
</div>

@endsection