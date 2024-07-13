@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Edit Comment
        </div>
        <div class="card-body">
            <form action="{{ route('updateComment', $comment->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control" required>{{ $comment->content }}</textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Update Comment</button>
                    <a href="{{ url()->previous() }}" class="btn btn-success" type="button">Go back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
