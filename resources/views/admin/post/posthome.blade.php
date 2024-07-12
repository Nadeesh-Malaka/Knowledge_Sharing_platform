@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Search
            <a href="{{ route('addpost') }}" class="btn btn-info float-right" type="button">Add New Post</a>
        </div>
    </div>

    <form action="{{ url()->current() }}" method="GET">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="name">User Name</label>
                    <input class="form-control" type="text" name="name" value="{{ request()->get('name') }}">
                </div>
                <div class="col-md-4 form-group">
                    <label for="content">Content</label>
                    <input class="form-control" type="text" name="content" value="{{ request()->get('content') }}">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <a href="{{ url()->current() }}" class="btn btn-secondary" type="button">Reset</a>
                    <button class="btn btn-primary float-right" type="submit">Search</button>
                </div>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-header">
            Results
        </div>
        <div class="card-body">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Content</th>
                        <th>Is Approved</th>
                        <th>Post Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->is_approved ? 'Approved' : 'Pending' }}</td>
                        <td>
                            @if($post->post_image)
                            <img src="{{ asset('storage/' . $post->post_image) }}" alt="post" width="80" height="80">
                            @else
                            No post image
                            @endif
                        </td>
                        <td>
                            @if($post->is_approved)
                            <a href="{{ route('markasnotapproved', $post->id) }}" class="btn btn-danger">Mark as Not Approved</a>
                            @else
                            <a href="{{ route('markasapproved', $post->id) }}" class="btn btn-primary">Mark as Approved</a>
                            @endif
                            <form action="{{ route('deletepost', $post->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning">Delete</button>
                            </form>
                            <a href="{{ route('updatepost', $post->id) }}" class="btn btn-success">Update</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No Data Available</td>
                    </tr>
                    @endforelse        
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
