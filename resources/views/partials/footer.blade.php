

<!-- Bootstrap JS-->
<script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<!-- Vendor JS       -->
<script src="{{ asset('vendor/slick/slick.min.js') }}">
</script>
<script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
</script>
<script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}">
</script>
<script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}">
</script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
</script>
<script src="https://cdn.datatables.net/autofill/2.3.1/js/dataTables.autoFill.min.js"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<!-- Main JS-->
<script src="{{ asset('js/main.js') }}"></script>

<script>
$(document).ready(function() {
  $('.select2').select2({
    placeholder:'Select Client Name',
  });
});
</script>

<script>
  setTimeout(function() {
    $('#message').fadeOut('slow');
  }, 4000); 
</script>

<script type="text/javascript" src="{{ asset('js/bootstrap-filestyle.min.js') }}"> </script>
<script>
$(":file").filestyle();
</script>
{{-- <script>
  $('.next_date').datepicker({
        multidate: true,
        todayHighlight: true,
        minDate: 0,
    });

 $('.next_date').datepicker('setDates', [new Date(2015, 7, 5), new Date(2015, 7, 8), new Date(2015, 7, 7)])
</script> --}}

{{-- <script>
  $(function(){
    var dates = {};
    dates[ new Date('03/24/2019') ] = 1;
    dates[ new Date('03/21/2019') ] = 0;
    dates[ new Date('04/03/2019') ] = 1;
    // dates[ new Date('03/04/2019') ] = new Date('03/04/2019');
    $('#datepicker').datepicker({
      changeMonth: true,
      changeYear: true,
      stepMonths: 1,
      dateFormat: "dd/mm/yy",
      beforeShowDay: function(date){
        var highlight = dates[date];
        if(highlight){
          return [true , "event" , "tooltip text"];
        } else{
          return [true , "" , ""];
        }
      },
    });
  });
  </script> --}}

  {{-- <script>
    $(document).ready(function(){
      $("#search").keyup(function(){
        search_table($(this).val());
      });
      function search_table(value){
        $("#casetable tr").each(function(){
          var found = 'false';
          $(this).each(function(){
            if($(this).text().toLowerCase().indexOf(value.toLowerCase()) > -1){
              found = "true";
            }
          });
          if(found == 'true'){
            $(this).show();
          }else{
            $(this).hide();
          }
        });        
      }
    });
  </script> --}}
 
{{-- <script>
  function statussearch() {
    // Declare variables 
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("statussearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("casestable");
    tr = table.getElementsByTagName("tr");
    // alert(input);
    // alert(filter);
    // alert(table);
    // alert(tr);
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 1; i < tr.length; i++) {
      // td = tr[i].getElementsByTagName("td")[1];
      // tr[i].each(function(){
        // $(this).getElementsByTagName("td").each(function(){
          // alert($(this).text());
        // });
      // });
      // if (td) {
      //   txtValue = td.textContent || td.innerText;
      //   if (txtValue.toUpperCase().indexOf(filter) > -1) {
      //     tr[i].style.display = "";
      //   } else {
      //     tr[i].style.display = "none";
      //   }
      // } 
    }
  }
</script> --}}

{{-- <script>
    function casesearch() {
      // Declare variables 
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("casesearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("casestable");
      tr = table.getElementsByTagName("tr");
    
      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        } 
      }
    }
  </script>

<script>
    function courtsearch() {
      // Declare variables 
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("courtsearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("casestable");
      tr = table.getElementsByTagName("tr");
    
      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        } 
      }
    }
  </script>

<script>
    function datesearch() {
      // Declare variables 
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("datesearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("casestable");
      tr = table.getElementsByTagName("tr");
    
      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        } 
      }
    }
  </script>

<script>
    function statussearch() {
      // Declare variables 
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("statussearch");
      filter = input.value.toUpperCase();
      table = document.getElementById("casestable");
      tr = table.getElementsByTagName("tr");
    
      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[4];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        } 
      }
    }
  </script> --}}
{{-- <script>
$(document).ready(function() {
  $(".chosen-select").chosen({
    placeholder_text_single:'Search A Client Name',
  })
});
</script> --}}



{{-- <script>
  $("#allcasebtn").Click(function(){
    $('html, body').animate({
        scrollTop: $('#allcaserow').offset().top
    }, 'slow');
});
  })
</script> --}}


{{-- <script>
    $(document).ready(function(){
        $('#addcaseform').submit(function(event){
            var = formdata{
                'case_title'    :$('input[name=case_title]').val(),
                'case_nature'   :$('input[name=case_nature]').val(),
                'court_name'    :$('input[name=court_name]').val(),
                'reference'     :$('input[name=reference]').val(),
                'previous_date' :$('input[name=previous_date]').val(),
                'next_date'     :$('input[name=next_date]').val(),
                'case_status'   :$('input[name=case_status]').val(),
            };
            $.ajax({
                type        :'POST',
                URL         :'/addcaseindb',
                data        :formdata,
                datatype    :'json',
                encode      :true
            })
                .done(function(data){
                    console.log(data);
                });
            event.preventDefault();
        });
    });
</script> --}}

<script>
  $(document).ready( function () {
    $('#casestable').DataTable({
      "paging":   false
    });
} );
</script>

<script type="text/javascript">
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
              url: 'casedetails/'+id,
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
</script>

<script>
  $(document).on('hidden.bs.modal', '#dataModal', function() { 
      $('#clientname').text("");
      $('#clientemail').text("");
      $('#clientnumber').text("");
  });
</script>
  


<!-- modal static -->
<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
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
                      @csrf
                      {{-- <div class="btn-group"> --}}
                          {{-- <button id="exitbutton" class="btn btn-secondary modalbtn1" data-dismiss="modal">Cancel</button> --}}
                          <button class="btn btn-primary" type="submit" name="case_id"  id="case_id">Get Invoice</button>
                          <button class="btn btn-primary" type="submit" name="pay_id"  id="pay_id">Add Payment</button>
                          <button class="btn btn-primary" type="submit" name="pay_id"  id="pay_id">Add Case Fee</button>
                          {{-- <span onClick="sendMailModal({{$case}})" class="btn btn-primary"  name="mail_id"  id="mail_id">Send details to client</span> --}}
                      {{-- </div> --}}
                  </form>
              </div>
         </div>
     </div>
 </div>
</div>
<!-- end modal static -->