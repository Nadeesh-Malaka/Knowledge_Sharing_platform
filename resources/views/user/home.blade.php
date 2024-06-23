    @extends('layouts.header',['title' => 'Home'])
   

    @section('content')
    <div class="container mt-5">
        <div class="post-container">
            <div class="d-flex align-items-center mb-3">
                <img class="profile rounded-circle me-3" src="{{ asset('assets/img/user-icon.png') }}" alt="Profile" width="50" height="50">
                <h5 class="mb-0">Nadeesh Malaka</h5>
            </div>
            <p class="post-caption">How Solve this Problem (Windows 11) </p>
            <img src="{{ asset('assets/img/problem.png') }}" alt="Post Image" class="img-fluid rounded mb-3">
            <div class="d-flex justify-content-between">
                <button class="btn btn-outline-primary"><i class="material-icons">thumb_up</i> Like</button>
                <button class="btn btn-outline-primary"><i class="material-icons">comment</i> Comment</button>
                <button class="btn btn-outline-primary"><i class="material-icons">reply</i> Reply</button>
                <button class="btn btn-outline-primary"><i class="material-icons">share</i> Share</button>
            </div>
        </div>
    </div>
    @endsection



    
