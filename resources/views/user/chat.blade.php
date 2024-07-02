@extends('layouts.header',['title' => 'Chat', 'pageCss' => 'assets/css/chat.css'])

@section('content')
<div class="container mt-5">
    
    <div id="message-container" class="message-container">
        @foreach($chats as $chat)
        <div class="message mb-3">
            <img class="profile rounded-circle me-2" src="{{ $chat->user->profile_photo ? asset('storage/' . $chat->user->profile_photo) : asset('assets/img/user-icon.png') }}" alt="Avatar" width="30" height="30">
            <span class="username"> {{ $chat->user->name }} :&nbsp;</span>
            <p> {{ $chat->message }}</p>
            <span class="time-right">{{ $chat->created_at->format('d M Y H:i') }}</span>
        </div>
        @endforeach
    </div>

    <div class="input-container mt-4">
        <form action="{{ route('chat.store') }}" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" name="message" id="message-input" class="form-control" placeholder="Type your message..." required>
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const messageContainer = document.getElementById('message-container');
        messageContainer.scrollTop = messageContainer.scrollHeight;
    });
</script>
@endsection

<br><br>
@endsection
