@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Reply to Feedback
        </div>
        <div class="card-body">
            <form action="{{ route('storeReplyContact', $contact->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="reply">Reply</label>
                    <textarea name="reply" class="form-control" required>{{ $contact->reply }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Reply</button>
                <a href="{{ url()->previous() }}" class="btn btn-success" type="button">Go back</a>
            </form>
        </div>
    </div>
</div>
@endsection
