@extends('layout')


@section('content')
 <h1>Register</h1>
<div>
  <form action="{{route('register.store')}}" method="post">
    @csrf
    <div>
        <label for="">Name:</label>
        <input type="text" name="name" id=""> 
        @error('name')
            <p class="text-danger mt-1">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="">Email:</label>
        <input type="email" name="email" id="">
        @error('email')
        <p class="text-danger mt-1">{{$message}}</p>
    @enderror
    </div>
    <div>
        <label for="">Password:</label>
        <input type="password" name="password" id="">  
        @error('email')
        <p class="text-danger mt-1">{{$message}}</p>
    @enderror
    </div> 
    <button type="submit">Submit</button>
  </form>
</div>

@endsection