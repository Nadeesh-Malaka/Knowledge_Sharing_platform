@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Feedback Entries
        </div>
        <div class="card-body">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($feedbacks as $feedback)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $feedback->name }}</td>
                        <td>{{ $feedback->email }}</td>
                        <td>{{ $feedback->message }}</td>
                        <td>
                            <form action="{{ route('deleteFeedback', $feedback->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this feedback?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('replyContact', $feedback->id) }}" class="btn btn-success">Reply</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No Feedback Available</td>
                    </tr>
                    @endforelse        
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
