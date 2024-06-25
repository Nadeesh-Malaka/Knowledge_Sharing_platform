@extends('layouts.header',['title' => 'profile', 'pageCss' => 'assets/css/profile.css'])

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
                <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $user->age) }}"  required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $user->country) }}"  required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="mobile" value="{{ old('mobile', $user->mobile) }}"   required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Add new photo</label>
                <input type="file" id="uploadPhoto" class="form-control" name="profile_photo"  onchange="previewImage(this)">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
</div>

{{-- For delete account --}}
<br><br>
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
    function previewImage(input) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profilePhoto').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }

    function deleteAccount() {
        if (confirm('Are you sure you want to delete your account?')) {
            alert('Account deletion initiated...');
            return true; 
        } else {
            return false;
        }
    }
</script>

@endsection
