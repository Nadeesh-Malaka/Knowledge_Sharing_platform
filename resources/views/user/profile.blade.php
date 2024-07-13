@extends('layouts.header',['title' => 'Profile', 'pageCss' => 'assets/css/profile.cs'])

@section('content')

<div class="row">
    <div class="col-md-4 text-center">
        <div id="photoContainer">
            <img id="profilePhoto" src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('assets/img/user-icon.png') }}" class="rounded-circle img-thumbnail" alt="Profile Photo" width="150" height="150">
            <div class="mt-3">
                <input type="file" id="uploadPhoto" class="form-control" name="profile_photo" style="display:none;" onchange="previewImage(this)">
                <h5 class="user-name">{{ old('name', $user->name) }}</h5>
                <h6 class="user-email">{{ old('email', $user->email) }}</h6>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <form id="profileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $user->age) }}" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $user->country) }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="mobile" value="{{ old('mobile', $user->mobile) }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Add new photo</label>
                <input type="file" id="uploadPhoto" class="form-control" name="profile_photo" onchange="previewImage(this)">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
</div>

{{-- For managing posts --}}
<div class="row mt-4">
    <div class="col-md-12">
        <h3>My Posts</h3>

        <div class="card">
            <div class="card-header">
                Results
            </div>
            <div class="card-body">
                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Content</th>
                            <th>is approved</th>
                            <th>Post_image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user->posts as $post)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <div class="edit-content" data-id="{{ $post->id }}">
                                    <span class="post-content">{{ $post->content }}</span>
                                    <input type="text" class="form-control post-edit" style="display:none;" value="{{ $post->content }}">
                                    <button class="btn btn-sm btn-primary save-edit" style="display:none;">Save</button>
                                    <button class="btn btn-sm btn-secondary cancel-edit" style="display:none;">Cancel</button>
                                </div>
                            </td>
                            <td>{{ $post->is_approved ? 'Approved' : 'Pending' }}</td>
                            <td>
                                @if($post->post_image)
                                <img src="{{ asset('storage/' . $post->post_image) }}" alt="post" width="100" height="60">
                                @else
                                No post image
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-info edit-post">Edit</button>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No Data Available</td>
                        </tr>
                        @endforelse        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- For managing comments
<div class="row mt-4">
    <div class="col-md-12">
        <h3>My Comments</h3>
        <ul id="commentList" class="list-group">
            @foreach ($user->posts->comments as $comment)
                <li class="list-group-item">
                    <input type="text" class="form-control mb-2" value="{{ $comment->content }}" onchange="updateComment(this, {{ $comment->id }})">
                    <button class="btn btn-danger" onclick="deleteComment({{ $comment->id }})">Delete</button>
                </li>
            @endforeach
        </ul>
    </div>
</div> --}}



<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.edit-post').forEach(function(button) {
            button.addEventListener('click', function() {
                var row = this.closest('tr');
                row.querySelector('.post-content').style.display = 'none';
                row.querySelector('.post-edit').style.display = 'inline-block';
                row.querySelector('.save-edit').style.display = 'inline-block';
                row.querySelector('.cancel-edit').style.display = 'inline-block';
            });
        });

        document.querySelectorAll('.save-edit').forEach(function(button) {
            button.addEventListener('click', function() {
                var row = this.closest('tr');
                var postId = row.querySelector('.edit-content').getAttribute('data-id');
                var newContent = row.querySelector('.post-edit').value;

                fetch('/posts/' + postId, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ content: newContent })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        row.querySelector('.post-content').textContent = newContent;
                        row.querySelector('.post-content').style.display = 'inline';
                        row.querySelector('.post-edit').style.display = 'none';
                        row.querySelector('.save-edit').style.display = 'none';
                        row.querySelector('.cancel-edit').style.display = 'none';
                    } else {
                        alert('Failed to update the post');
                    }
                });
            });
        });

        document.querySelectorAll('.cancel-edit').forEach(function(button) {
            button.addEventListener('click', function() {
                var row = this.closest('tr');
                row.querySelector('.post-content').style.display = 'inline';
                row.querySelector('.post-edit').style.display = 'none';
                row.querySelector('.save-edit').style.display = 'none';
                row.querySelector('.cancel-edit').style.display = 'none';
            });
        });
    });

    function previewImage(input) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profilePhoto').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>


<br><br>

{{-- For delete account --}}
<form method="post" action="{{ route('profile.destroy') }}" class="p-6" onsubmit="return deleteAccount()">
    @csrf
    @method('delete')

    <h2>Account Delete</h2>

    <p>Please enter your password to confirm you would like to permanently delete your account.</p>

    <div class="mt-6">
        <label for="password">Password:</label>
        <input id="password" name="password" type="password" class="mt-1 block w-3/4" placeholder="Enter here" required />

        <button type="submit" class="btn btn-danger">Delete Account</button>
    </div>
</form>

<script>
    function deleteAccount() {
        if (confirm('Are you sure you want to delete your account?')) {
            alert('Account deletion initiated...');
            return true; 
        } else {
            return false;
        }
    }
</script>

<br><br><br>

@endsection
