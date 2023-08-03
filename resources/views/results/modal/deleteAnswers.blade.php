<div class="modal fade" id="deleteAnswers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset the poll</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p>
            Do you really want to delete the Answers and reset the poll '{{ $poll->title }}'?<br>
            <span class="text-muted">(本当に回答を消去し、「{{ $poll->title }}」をリセットしますか？)</span>
          </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{ route('result.delete', $poll->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-warning btn-lg"><i class="fa-solid fa-trash-check"></i> Reset the poll</button>
        </form>
      </div>  
    </div>
  </div>
</div>


