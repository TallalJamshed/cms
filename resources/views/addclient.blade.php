@extends('layout.template')
@section('content')


<div class="row">
    <div class="main-content" style="padding-top:10px;" id="allcase">
        <div class="row" id="allcaserow">
            <div class="col-lg-12">
                <div class="table-responsive table--no-card m-b-30">
                    <table class="table" style="table-layout:fixed"  id="casestable">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:100px;">Serial No</th>
                                <th >Client Name</th>
                                <th >Client Email</th>
                                <th >client Phone Number</th>
                                <th >Actions</th>
                            </tr>
                        </thead>
                        <tbody style="text-align:center; background-color:white; ">
                            <?php $serial = 1; ?>
                            @foreach ($clients as $client)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$client->client_name}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->phone_number}}</td>
                                <td>
                                    <button onClick='clientModal({{$client->client_id}})' class="btn btn-md btn-danger"><i style="color:white" class="far fa-trash-alt"></i></button>
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

<p align="center" id="star">Fileds marked with <span >*</span> are required</p>       
    <form class="form-horizontal" method="POST" action="{{ route('addclientindb')}}" >
        @csrf
                    
        <div class="row" id="addcase">
            <div class="col-md-12 col-xl-12">
                <div class="" style="background-color:white; border:1px solid gray; border-radius: 5px;">
                    <div class="form-header" style="">
                        <i class="fas fa-plus" id="addcaseitag" ></i><span id="addcasespantag">Add New Case<span>
                    </div>
                    <div class="form-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <div class="row addcaserow" >
                            <label class="control-label col-md-1 addcaselabel" style="padding-right:0px" for="">Client Name:<span id="star">*</span>
                            </label>
                            <div class="col-md-3" style="padding-left:0px">
                                <input class="form-control{{ $errors->has('case_title') ? ' is-invalid' : '' }}" type="text" name="client_name" id="client_name" value="{{old('client_name')}}" placeholder="Enter Client Name">
                                <span id='ex' >ex- Mr. XYZ</span>
                            </div>

                            <label class="control-label col-md-1 addcaselabel" style="padding-right:0px" for="">Client Email:
                            </label>
                            <div class="col-md-3" style="padding-left:0px">
                                <input class="form-control{{ $errors->has('case_nature') ? ' is-invalid' : '' }}" type="text" name="email" id="email" value="{{old('email')}}" placeholder="Enter Client Email">
                                <span id='ex'>ex- abc@gmail.com</span>
                            </div>
                        {{-- </div>

                    <div class="row addcaserow"> --}}
                        <label class="control-label col-md-1 addcaselabel" style="padding-right:0px" for="">Phone No:<span id="star">*</span>
                        </label>
                        <div class="col-md-3" style="padding-left:0px">
                            <input class="form-control{{ $errors->has('court_name') ? ' is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{old('phone_number')}}" placeholder="Enter Client Phone Number">
                            <span id='ex'>ex- 0000-0000000000</span>
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

<script type="text/javascript">
    function clientModal(val){
        $('#deleteClientModal').modal();
        $('#clientidtodel').val(val);      
    }
</script>            

<!-- Stocks Modal -->
<div class="modal fade" id="deleteClientModal" tabindex="-1" role="dialog" aria-hidden="true"
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
                   Do you really want to delete this Client.
               </p>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <form method="POST" action="{{ route('deleteclient')}}">
                @csrf
                <input hidden type="text" id="clientidtodel" name="client_id">
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