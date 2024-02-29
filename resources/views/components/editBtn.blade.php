@props(['todo']) 

<form action="{{route('todos.update', ['todo'=>$todo])}}" method="post">
    @csrf
    @method('put')
<button type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#exampleModal{{$todo->id}}"  data-bs-whatever="@mdo">Edit</button>
<div class="modal fade"   id="exampleModal{{$todo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$todo->id}}"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5"  id="exampleModalLabel{{$todo->id}}" >Edit Your Task</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <div class="mb-3">
                <label  for="recipient-name{{$todo->id}}"class="col-form-label">Task:</label>
                <input type="text" class="form-control" id="recipient-name{{$todo->id}}" name="task" value="{{$todo->task}}">
            </div>
            <button type="submit" class="btn btn-primary">Done</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
        </div>
      </div>
    </div>
  </div>
    
</form>