<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - KnoWell</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Playfair+Display:wght@700&family=Lobster&display=swap" rel="stylesheet">
    <style>
       :root {
        --main-color: #4415ff;
        --main-color-darker: #a9e54e;
        --white: #fff;
        --gray-light: #f8f9fa;
        --hover-color: black;
        --navbar-bg-color: blue;
      }

      body {
        font-family: 'Roboto', Arial, sans-serif;
        background-color: var(--gray-light);
        padding-top: 60px;
      }

      .navbar-custom {
        background-color: var(--navbar-bg-color);
      }

      .navbar-brand {
        color: var(--white);
        font-family: 'Lobster', cursive;
        font-size: 1.8rem;
        display: flex;
        align-items: center;
      }

      .navbar-brand img {
        height: 30px;
        margin-right: 10px;
      }

      .nav-link {
        color: var(--white);
        display: flex;
        align-items: center;
        gap: 5px;
        font-weight: bold;
        margin-top: 5px; /* Adjust the margin to fit better vertically */
      }

      .nav-link:hover {
        color: var(--hover-color);
        background-color: rgb(25, 24, 24);
        border-radius: 5px;
      }

      .nav-link.active {
        color: var(--main-color-darker);
      }

      .search-icon {
        border-color: var(--white);
        border-radius: 15px;
        padding-left: 25px;
        background: url("src/outline_search_black_24dp.png") no-repeat left;
        background-size: 20px;
        font-weight: bold;
        color: black;
      }

      .btn-outline-primary {
        background-color: aqua;
        color: black;
        font-weight: bold;
      }

      .profile {
        width: 40px;
        height: 40px;
        border-radius: 50%;
      }

      @media (min-width: 992px) {
        .navbar-nav {
          margin-left: 50px;
        }
      }

      .dropdown:hover .dropdown-menu {
        display: block;
      }

      .dropdown-menu {
        display: none;
      }

      .navbar-toggler {
        margin-top: 10px; /* Adjust the margin to fit better vertically */
      }

      .navbar-nav .nav-item + .nav-item {
        margin-left: 20px; /* Adjust spacing between nav items */
      }

      .navbar-nav.ms-auto {
        margin-right: 20px;
      }
        
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        function incrementCount(elementId) {
            const element = document.getElementById(elementId);
            let count = parseInt(element.innerText);
            element.innerText = ++count;
        }

        function incrementReactionCount(reactionType, postId) {
            const element = document.querySelector(`#${postId} .${reactionType}`);
            let count = parseInt(element.innerText);
            element.innerText = ++count;
        }
    </script>
</head>
<body>
    <div class="side-nav" >
        <a href="#" style="color: black;"><i class="material-icon"></i></a>
        <a href="{{ route('chat') }}" style="color: black;"><i class="material-icons" >chat</i> Chat</a>
        <a href="{{ route('que') }}" style="color: black;"><i class="material-icons">help_outline</i> Ask a Question</a>
        <a href="{{ route('rules') }}" style="color: black;"><i class="material-icons">rule</i>Guidelines</a>
        <a href="{{ route('faq') }}" style="color: black;"><i class="material-icons">question_answer</i> FAQ</a>
        <a href="{{ route('contact') }}" style="color: black;"><i class="material-icons">contact_mail</i> Contact Us</a>
        <a href="{{ route('privacy') }}" style="color: black;"><i class="material-icons">privacy_tip</i> Privacy Policy</a>
        <a href="{{ route('about') }}" style="color: black;"><i class="material-icons">info</i> About</a>
    </div>

    <nav class="navbar navbar-expand-md navbar-light border-bottom p-0 align-left ps-8 navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">KnoWell</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}"><i class="material-icons">home</i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('chat') }}"><i class="material-icons">chat</i> Chat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('que') }}"><i class="material-icons">help_outline</i> Ask a Question</a>
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
                            <button type="submit" class="btn btn-link nav-link" style="color: white; text-decoration: none; padding: 5; background: none; border: none; display: inline;"><i class="material-icons"></i>Logout</button>
                        </form>
                    </li>
                    @endguest

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2 search-icon" type="search" placeholder="Search KnoWell" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>

                <ul class="navbar-nav ms-2">
                    <li class="nav-item dropdown">
                        
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


    <script>
        // Automatically remove status message after 2 seconds
    setTimeout(function() {
    var statusMessage = document.getElementById('statusMessage');
    if (statusMessage) {
        statusMessage.remove();
    }
    }, 2000);
    </script>

    

<div class="container mt-5">
    @foreach($posts as $post)
    <div class="post-container mb-5" id="post{{ $post->id }}">
        <div class="post-header">
            <div class="post-info">
                <img class="profile rounded-circle me-3" src="{{ $post->user->profile_photo ? asset('storage/' . $post->user->profile_photo) : asset('assets/img/user-icon.png') }}" alt="Profile" width="50" height="50">
                <h5 class="mb-0">{{ $post->user->name }}</h5>
            </div>
            <small class="text-muted">Posted on {{ $post->created_at->format('F j, Y, g:i a') }}</small>
        </div>

        <p class="post-caption">{{ $post->content }}</p>

        @if($post->post_image)
        <img src="{{ asset('storage/' . $post->post_image) }}" alt="Post Image" class="img-fluid rounded mb-3" style="display: block; margin: 0 auto;">
        @endif

        <div class="d-flex justify-content-between">
            {{-- Like --}}
            <form action="{{ route('like.toggle', ['post' => $post->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-primary">
                    <i class="material-icons">thumb_up</i>{{ $post->likes()->count() }} {{ Str::plural('Like', $post->likes()->count()) }}
                </button>
            </form>

            <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#comment{{ $post->id }}" onclick="incrementCount('comment-count{{ $post->id }}')">
                <i class="material-icons">comment</i> <span id="comment-count{{ $post->id }}">{{ $post->comments()->count() }}</span> Comments
            </button>
            
            <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#reply{{ $post->id }}">
                <i class="material-icons">reply</i> Reply
            </button>
            
            <button class="btn btn-outline-primary" onclick="sharePost({{ $post->id }})">
                <i class="material-icons">share</i> Share
            </button>
        </div>

        <div id="comment{{ $post->id }}" class="collapse mt-3">
            <div class="card card-body">
                <div class="comments mt-3">
                    @foreach($post->comments as $comment)
                    <div class="comment mb-2">
                        <div class="d-flex align-items-center">
                            <img class="profile rounded-circle me-2" src="{{ $comment->user->profile_photo ? asset('storage/' . $comment->user->profile_photo) : asset('assets/img/user-icon.png') }}" alt="Profile" width="30" height="30">
                            <strong>{{ $comment->user->name }}</strong>
                        </div>
                        <p class="mb-0">{{ $comment->content }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="collapse mt-3 reply-section" id="reply{{ $post->id }}">
            <div class="card card-body">
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="form-group">
                        <textarea name="content" rows="3" class="form-control" placeholder="Write a reply..."></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-outline-primary">Submit Reply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

    </div>
<footer style="background-color: blue; color: white; padding: 10px 20px; text-align: center;">
    <p>&copy; 2024 KnoWell. All rights reserved</p>
</footer>


<script>
    function sharePost(postId) {
        const url = `{{ url('/') }}#post${postId}`;
        navigator.clipboard.writeText(url).then(function() {
            alert('Post URL copied to clipboard: ' + url);
        }, function(err) {
            console.error('Could not copy text: ', err);
        });
    }

    function incrementCount(elementId) {
        const element = document.getElementById(elementId);
        if (element) {
            let count = parseInt(element.innerText);
            element.innerText = count + 1;
        }
    }
</script>

</body>
</html>
