@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Update Post
        </div>
        <div class="card-body">
            <form action="{{ route('updatepost', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" required>{{ $post->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="post_image">Post Image</label>
                    <input type="file" class="form-control-file" name="post_image">
                </div>
                @if($post->post_image)
                <div class="form-group">
                    <label>Current Image</label><br>
                    <img src="{{ asset('storage/' . $post->post_image) }}" alt="post" width="100">
                </div>
                @endif
                <button type="submit" class="btn btn-primary">Update Post</button>
            </form>
        </div>
    </div>
</div>
@endsection
