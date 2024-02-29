<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @auth
          
    
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
    <form action="{{route('logoutUser')}}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
          </li>
        </ul>
      </div> 
      <div class="mx-3">
        <p class="fw-bold">Welcome {{auth()->user()->name}}</p>
      </div>
      <div>
      <form class="d-flex" role="search" action="{{route('todos.index')}}" method="get">
        @csrf
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> 
    </div>
      @else
          <button><a href="{{route('registration')}}">Register</a></button>
          <button><a href="{{route('login')}}">Login</a></button>
      
      @endauth 
   
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
  </nav>