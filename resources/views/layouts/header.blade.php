<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
       <!-- Default CSS -->
       <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    
       <!-- Page-specific CSS -->
       @if(isset($pageCss))
           <link href="{{ asset($pageCss) }}" rel="stylesheet">
       @endif

    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>{{ isset($title) ? $title : 'knoWell' }}</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light border-bottom p-0">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span class="text-main-color fw-bold fs-1">knoWell</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav" style="font-weight: bold;">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"><i class="material-icons">home</i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('chat') }}"><i class="material-icons">chat</i> Chat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('que') }}" style="color: blue;"><i class="material-icons">help_outline</i>Ask a Question</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="color: inherit; text-decoration: none;">Logout</button>
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
            <form class="d-flex ms-auto" style="margin-left: auto;">
                <input class="form-control me-2 search-icon" type="search" placeholder="Search knoWell" aria-label="Search" style="border-color: blue;border-radius: 15px;">
                <button class="btn btn-outline-primary" type="submit" style="background-color: aqua;color: black;font-weight: bold;">Search</button>
            </form>
            <ul class="navbar-nav" style="font-weight: bold;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-icons">more_horiz</i> Other
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('rules') }}">Rules/Guidelines</a></li>
                        <li><a class="dropdown-item" href="{{ route('faq') }}">FAQ</a></li>
                        <li><a class="dropdown-item" href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a class="dropdown-item" href="{{ route('privacy') }}">Privacy Policy</a></li>
                        {{-- <li><a class="dropdown-item" href="{{ route('about') }}">About</a></li> --}}
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <img id="profilePhoto" src="{{ asset('assets/img/user-icon.png') }}" class="rounded-circle img-thumbnail" alt="Default Profile" width="40" height="40">
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('myProfile') }}">
                        <img id="profilePhoto" src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('assets/img/user-icon.png') }}" class="rounded-circle img-thumbnail" alt="Profile" width="40" height="40">
                    </a>
                </li>
                @endguest
                
                
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('myProfile') }}">
                        @auth
                            <img class="profile rounded-circle" src="{{ asset(Auth::user()->profile_picture) }}" alt="Profile" width="40" height="40">
                        @else 
                            <img class="profile rounded-circle" src="{{ asset('assets/img/user-icon.png') }}" alt="Profile" width="40" height="40">
                        @endauth

                        <img id="profilePhoto" src="{{Auth::user()->profile_photo ? asset('storage/' .Auth::user()->profile_photo) : asset('assets/img/user-icon.png') }}" class="rounded-circle img-thumbnail" alt="Profile" width="40" height="40">
           
                    </a>
                    
                </li> --}}

            </ul>
        </div>
    </nav>

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


</body>
</html>
