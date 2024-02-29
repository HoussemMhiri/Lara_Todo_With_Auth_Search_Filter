@extends('layout')

@section('content')
    <h1>My Todos</h1> 

    <div class="d-flex">
        <form action="{{route('store.todo')}}" method="post">
            @csrf
            <input type="text" name="task" id="">  
            <button type="submit" class="btn btn-primary">add</button>
        </form>  
        <form action="{{route('todos.index')}}" method="GET">
            @csrf 
            <div>
            <select name="filters" id="" class="mx-3">
                <option value="all">All</option>
                <option value="complete">Complete</option>
                <option value="uncomplete">Uncomplete</option>
            </select>
          <button type="submit" class="btn btn-primary">Filter</button>
        </div>
        </form>
        
       
     
        @error('task')
            <p class="text-danger">{{$message}}</p>
        @enderror

    </div> 

    <x-todo  :todos="$todos"/>
    
@endsection