@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Add Post
        </div>
        <div class="card-body">
            <form action="{{ route('storepost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select class="form-control" name="user_id" required>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" required></textarea>
                </div>
                <div class="form-group">
                    <label for="post_image">Post Image</label>
                    <input type="file" class="form-control-file" name="post_image">
                </div>
                <button type="submit" class="btn btn-primary">Add Post</button>
            </form>
        </div>
    </div>
</div>
@endsection
