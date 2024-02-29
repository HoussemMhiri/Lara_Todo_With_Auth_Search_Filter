@props(['todos'])

@foreach ($todos as $todo)
<div class="d-flex mt-5 border border-black justify-content-evenly" style="width: 20%">
    <p class={{$todo->done ? 'text-decoration-line-through' : ''  }}>{{$todo->task}}</p> 
    <div class="mx-1">
   <form action="{{route('todos.toggle', ['todo'=>$todo])}}" method="post">
    @csrf 
    <button type="submit">{{$todo->done ? 'Uncheck' : 'Check'}}</button>
   </form>
</div> 
    <div class="mx-1">
   <form action="{{route('todos.delete', ['todo'=>$todo])}}" method="post"> 
    @csrf
    @method('delete') 
    <button type="submit">Delete</button>
   </form>
</div> 
    <div class="mx-1">
  

    <x-editBtn :todo="$todo"/> 

</div> 


   
</div>
@endforeach
