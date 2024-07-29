@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Comments for Post: <b>{{ $post->content }}</b></span>
            <a href="{{ route('viewpost') }}" class="btn btn-success" type="button">Go back to posts menu </a>
        </div>
        <div class="card-body">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Comment</th>
                        <th>User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comments as $comment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $comment->content }}</td>
                        <td>{{ $comment->user->name }}</td>
                        <td>
                            <form action="{{ route('deleteComment', $comment->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            {{-- <a href="{{ route('editComment', $comment->id) }}" class="btn btn-info">Edit</a> --}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No Data Available</td>
                    </tr>
                    @endforelse        
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
