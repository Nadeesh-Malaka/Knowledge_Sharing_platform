@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Update Chat
        </div>
        <div class="card-body">
            <form action="{{ route('updatechat', $chat->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" required>{{ $chat->message }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Chat</button>
            </form>
        </div>
    </div>
</div>
@endsection
