@extends('layouts.header',['title' => 'profile', 'pageCss' => 'assets/css/profile.css'])
   

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <img id="profilePhoto" src="src/profile.jpg" class="rounded-circle img-thumbnail" alt="Profile Photo" width="150" height="150">
                <div class="mt-3">
                    <input type="file" id="uploadPhoto" class="form-control" style="display:none;">
                    <button class="btn btn-primary" onclick="document.getElementById('uploadPhoto').click();">Change Photo</button>
                    <button class="btn btn-danger" onclick="removePhoto();">Remove Photo</button>
                </div>
            </div>
            <div class="col-md-8">
                <form id="profileForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" value="John Doe">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" value="john.doe@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" value="30">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" value="New York">
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" value="USA">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" value="123-456-7890">
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-danger" onclick="deleteAccount();">Delete Account</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('uploadPhoto').addEventListener('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePhoto').src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });

        function removePhoto() {
            document.getElementById('profilePhoto').src = 'src/default-profile.png';
        }

        function deleteAccount() {
            if (confirm('Are you sure you want to delete your account?')) {
                alert('Account deleted.');
                
            }
        }

        document.getElementById('profileForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Profile saved.');
            
        });
    </script>
    
@endsection
