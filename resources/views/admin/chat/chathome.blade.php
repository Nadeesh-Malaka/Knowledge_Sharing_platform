@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Search chats
        </div>
    </div>

    <form action="{{ url()->current() }}" method="GET">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" value="{{ request()->get('name') }}">
                </div>
                <div class="col-md-4 form-group">
                    <label for="message">Message</label>
                    <input class="form-control" type="text" name="message" value="{{ request()->get('message') }}">
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
                        <th>Name</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($chats as $chat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $chat->user->name }}</td>
                        <td>{{ $chat->message }}</td>
                        <td>
                            <form action="{{ route('deletechat', $chat->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this chat?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('updatechat', $chat->id) }}" class="btn btn-info">Edit</a>
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
