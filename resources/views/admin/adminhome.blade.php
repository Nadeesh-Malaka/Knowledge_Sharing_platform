@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Search
            <a href="{{route('adduser')}}" class="btn btn-info float-right" type="button">Add New Customer</a>
        </div>
    </div>

    <form action="{{ url()->current()}}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" value="{{request()->get('name')}}">
                </div>
                <div class="col-md-4 form-group">
                    <label for="name">Email</label>
                    <input class="form-control" type="text" name="email" value="{{request()->get('email')}}">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <a href="{{url()->current()}}" class="btn btn-secondary" type="button">Reset</a>
                    <button class="btn btn-primary float-right" type="submit">Search</button>
                </div>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-header">
            Results
        </div>
        <div class="card-body">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Mobile</th>
                        <th>Country</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $cus)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cus->name}}</td>
                        <td>{{$cus->email}}</td>
                        <td>{{$cus->age}}</td>
                        <td>{{$cus->mobile}}</td>
                        <td>{{$cus->country}}</td>
                        <td>
                            <img src="{{ $cus->profile_photo ? asset('storage/' . $cus->profile_photo) : asset('assets/img/user-icon.png') }}" class="rounded-circle img-thumbnail" alt="Profile" width="40" height="40">
                        </td>
                        <td>
                            <a href="{{route('showedit', $cus->id)}}" class="btn btn-info">Edit</a>
                            <form action="{{ route('delete', $cus->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No Data Available</td>
                    </tr>
                    @endforelse        
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
