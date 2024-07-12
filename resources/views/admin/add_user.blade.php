@extends('layouts.admin')
@section('title', 'Add user')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">Details</div>
        <form action="{{ route('storeuser') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="name" class="req_fld">Name</label>
                        <input class="form-control" type="text" name="name">
                        @error('name')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="email" class="req_fld">Email</label>
                        <input class="form-control" type="text" name="email" autocomplete="off">
                        @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="password" class="req_fld">Password</label>
                        <input class="form-control" type="password" name="password" autocomplete="off">
                        @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="password_confirmation" class="req_fld">Confirm Password</label>
                        <input class="form-control" type="password" name="password_confirmation" autocomplete="off">
                        @error('password_confirmation')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="age" class="req_fld">Age</label>
                        <input class="form-control" type="number" name="age">
                        @error('age')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="country" class="req_fld">Country</label>
                        <input class="form-control" type="text" name="country">
                        @error('country')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="mobile" class="req_fld">Mobile</label>
                        <input class="form-control" type="text" name="mobile">
                        @error('mobile')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button class="btn btn-success" type="button" onclick="window.location.href='{{ route('adminhome') }}'">Go Back</button>
                        <button class="btn btn-primary float-right" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
