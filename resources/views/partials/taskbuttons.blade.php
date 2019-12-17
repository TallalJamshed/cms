
<a title="Press this button to edit task" class="red-tooltip" href="{{route('Edit Task', Crypt::encrypt($value->task_id))}}">
<button class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></button></a>
<button class="btn btn-sm btn-danger" onClick='showModal({{$value->task_id}})'><i class="far fa-trash-alt"></i></button>

<script type="text/javascript">
function showModal(val){
    $('#taskModal').modal();
    $('#tasktodel').val(val);
}
</script>

<!-- modal static -->
<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
data-backdrop="static">
<div class="modal-dialog " role="document">
   <div class="modal-content">
       <div class="modal-header">
           <h5 class="modal-title" id="staticModalLabel">Static Modal</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
       </div>
       <div class="modal-body">
           <p>
               Do you really want to delete this task.
            </p>
       </div>
       <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <!-- <a href="{{route('deletetask' , Crypt::encrypt($value->task_id))}}"><button type="button" class="btn btn-primary" id="confirmDelete">Confirm</button></a> -->
            <form method="POST" action="{{ route('deletetask')}}">
                @csrf
                <input hidden type="text" id="tasktodel" name="task_id">
                <input class="btn btn-primary" type="submit" id="submit" value="Confirm">
            </form>
        </div>
   </div>
</div>
</div>
<!-- end modal static -->