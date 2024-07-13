@extends('layouts.header', ['title' => 'Chat', 'pageCss' => 'assets/css/chat.css'])

@section('content')
<div class="container mt-5">
    <div id="message-container" class="message-container">
        @foreach($chats as $chat)
        <div class="message mb-3" id="chat-{{ $chat->id }}">
            <img class="profile rounded-circle me-2" src="{{ $chat->user->profile_photo ? asset('storage/' . $chat->user->profile_photo) : asset('assets/img/user-icon.png') }}" alt="Avatar" width="30" height="30">
            <span class="username">{{ $chat->user->name }} :&nbsp;</span>
            <p class="chat-message">{{ $chat->message }}</p>
            <span class="time-right">{{ $chat->created_at->format('d M Y H:i') }}</span>

            @if($chat->user_id == Auth::id())
            <div class="chat-actions mt-2">
                <button class="btn btn-success btn-sm" onclick="editChat({{ $chat->id }})">Edit</button>
                <form action="{{ route('chat.destroy', $chat->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this chat?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
            <form action="{{ route('chat.update', $chat->id) }}" method="POST" class="edit-chat-form mt-2" id="edit-form-{{ $chat->id }}" style="display:none;">
                @csrf
                @method('PUT')
                <div class="input-group">
                    <input type="text" name="message" value="{{ $chat->message }}" class="form-control" required>
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="cancelEdit({{ $chat->id }})">Cancel</button>
                </div>
            </form>
            @endif
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

    function editChat(chatId) {
        document.getElementById('edit-form-' + chatId).style.display = 'block';
        document.querySelector('#chat-' + chatId + ' .chat-message').style.display = 'none';
        document.querySelector('#chat-' + chatId + ' .chat-actions').style.display = 'none';
    }

    function cancelEdit(chatId) {
        document.getElementById('edit-form-' + chatId).style.display = 'none';
        document.querySelector('#chat-' + chatId + ' .chat-message').style.display = 'block';
        document.querySelector('#chat-' + chatId + ' .chat-actions').style.display = 'block';
    }
</script>
@endsection
@endsection
