@extends('layouts.header',['title' => 'Home'])

@section('content')
<div class="container mt-5">


    @foreach($posts as $post)
    <div class="post-container mb-5">
        <div class="d-flex align-items-center mb-3">
            <img class="profile rounded-circle me-3" src="{{  $post->user->profile_photo ? asset('storage/' . $post->user->profile_photo)  : asset('assets/img/user-icon.png') }}" alt="Profile" width="50" height="50">
           
            <h5 class="mb-0">{{ $post->user->name }}</h5>
        </div>
        <p class="post-caption">{{ $post->content }}</p>
        @if($post->post_image)
            <img src="{{ asset('storage/' . $post->post_image) }}" alt="Post Image" class="img-fluid rounded mb-3">
        @endif
        {{-- Like --}}
        <div class="d-flex justify-content-between">

            <form action="{{ route('like.toggle', ['post' => $post->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-primary">
                    <i class="material-icons">thumb_up</i>{{ $post->likes()->count() }} {{ Str::plural('Like', $post->likes()->count()) }}
                </button>
            </form>
            <button class="btn btn-outline-primary" data-toggle="collapse" data-target="#comment{{$post->id}}"><i class="material-icons">comment</i>comment</button>
            <button class="btn btn-outline-primary" data-toggle="collapse" data-target="#reply{{$post->id}}"><i class="material-icons">reply</i>Reply</button>
            <button class="btn btn-outline-primary" data-toggle="collapse" ><i class="material-icons">share</i> Share</button>
              </div>

              <div id="comment{{$post->id}}" class="collapse mt-3">
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

            
            <div class="collapse mt-3 reply-section" id="reply{{$post->id}}">
                <div class="card card-body">
                    <div class="replies mt-3">
                       
                    </div>
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="form-group">
                            <textarea name="content" rows="3" class="form-control" placeholder="Add a reply..."></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        


    </div>
    @endforeach
</div>
@endsection
