<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Playfair+Display:wght@700&family=Lobster&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet"> <!-- For paragraphs -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet"> <!-- For list items -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> <!-- For anchor tags -->
    
    
     
       <!-- Default CSS -->
       <link href="{{ asset('assets/css/nav.css') }}" rel="stylesheet">
    
       <!-- Page-specific CSS -->
       @if(isset($pageCss))
           <link href="{{ asset($pageCss) }}" rel="stylesheet">
       @endif

       <title>{{ isset($title) ? $title : 'knoWell' }}</title>


</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light border-bottom p-0 align-left ps-8 navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
          knoWell
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active"style="color:white;" href="{{ route('home') }}" ><i class="material-icons">home</i> Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white;"  href="{{ route('chat') }}" ><i class="material-icons">chat</i> Chat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white;"  href="{{ route('que') }}" ><i class="material-icons">help_outline</i> Ask a Question</a>
            </li>

            @guest
            <li class="nav-item">
                <a class="nav-link" style="color:white;" href="{{ route('login') }}"><i class="material-icons"></i> Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:white;" href="{{ route('register') }}"><i class="material-icons"></i> Register</a>
            </li>
            @else
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" class="nav-link p-0 m-0" style="display: inline;">
                    @csrf
                    <button type="submit"  class="nav-link"  class="btn btn-link nav-link" style="color: white; text-decoration: none; padding: 5; background: none; border: none; display: inline;"><i class="material-icons"></i>Logout</button>
                </form>
            </li>
            @endguest
            


          </ul>

          <form class="d-flex">
            <input class="form-control me-2 search-icon" type="search" placeholder="Search knoWell" aria-label="Search" style="background-color: #f8f9fa;">
            <button class="btn btn-outline-primary" type="submit">Search</button>
          </form>
          
          <ul class="navbar-nav ms-2">
            <li class="nav-item dropdown"> 
              <a class="nav-link dropdown-toggle text-center" style="border-radius:5;   margin-top:8px ;background-color:lightblue; padding:50; border-radius: 5px;" href="" id="navbarDropdown" role="button" aria-expanded="false" >
                <i class="material-icons">more_horiz</i> Other
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('rules') }}" >Rules/Guidelines</a></li>
                <li><a class="dropdown-item" href="{{ route('faq') }}">FAQ</a></li>
                <li><a class="dropdown-item" href="{{ route('contact') }}">Contact Us</a></li>
                <li><a class="dropdown-item"href="{{ route('privacy') }}">Privacy Policy</a></li>
                <li><a class="dropdown-item" href="{{ route('about') }}">About</a></li>
              </ul>


            </li>

            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">
                <img class="profile rounded-circle" src="{{ asset('assets/img/user-icon.png') }}" class="rounded-circle img-thumbnail" alt="Default Profile" width="40" height="40">
              
              </a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('myProfile') }}">
                    <img class="profile rounded-circle" src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('assets/img/user-icon.png') }}" class="rounded-circle img-thumbnail" alt="Profile" width="40" height="40">
                </a>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

      <br>

    <div class="container mt-5">
      @if (session('status'))
      <div id="statusMessage" class="alert alert-success">
          {{ session('status') }}
      </div>
      @endif
  
      @if ($errors->any())
      <div class="alert alert-danger" id="statusMessage">
          <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif

      <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2"   id="statusMessage" class="alert alert-success"/>

  <div class="container mt-5">


      @yield('content')
      @yield('scripts')
  </div>

  <script>
          // Automatically remove status message after 2 seconds
      setTimeout(function() {
      var statusMessage = document.getElementById('statusMessage');
      if (statusMessage) {
          statusMessage.remove();
      }
      }, 2000);
  </script>

    </div>
    <footer style="background-color: blue; color: white; padding: 10px 20px; text-align: center;">
      <p>&copy; 2024 KnoWell. All rights reserved</p>
  </footer>

  </body>

</html>
