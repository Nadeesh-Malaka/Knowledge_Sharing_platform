@extends('layouts.admin')
@section('title', 'Edit user')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">Details</div>
        <form action="{{ route('edituser', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="name" class="req_fld">Name</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="email" class="req_fld">Email</label>
                        <input class="form-control" type="text" name="email" autocomplete="off" value="{{ old('email', $user->email) }}">
                        @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="age" class="req_fld">Age</label>
                        <input class="form-control" type="number" name="age" value="{{ old('age', $user->age) }}">
                        @error('age')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="country" class="req_fld">Country</label>
                        <input class="form-control" type="text" name="country" value="{{ old('country', $user->country) }}">
                        @error('country')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="mobile" class="req_fld">Mobile</label>
                        <input class="form-control" type="text" name="mobile" value="{{ old('mobile', $user->mobile) }}">
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
                        <button class="btn btn-primary float-right" type="submit">Edit</button>
                        <button class="btn btn-success" type="button" onclick="window.location.href='{{ route('adminhome') }}'">Go Back</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
