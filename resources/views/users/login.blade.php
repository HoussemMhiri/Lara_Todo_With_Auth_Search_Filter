@extends('layout')


@section('content')
 <h1>Login</h1>
<div>
  <form action="" method="post">
    @csrf
 
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