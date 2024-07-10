@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Search
            {{-- <a href="{{ route('customer.create') }}" class="btn btn-info float-right" type="button">Add New Customer</a> --}}
        </div>

    </div>

      <form action="{{ url()->current()}}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="name">Name</label>
                    {{-- <input class="form-control" type="text" name="name" value="{{request()->get('name')}}"> --}}
                </div>

                <div class="col-md-4 form-group">
                    <label for="name">Email</label>
                    {{-- <input class="form-control" type="text" name="email" value="{{request()->get('email')}}"> --}}
                </div>


            </div>

            
        </div>

        <div class="card-footer">
            <div class="row">
                <div class="col">

                    {{-- <a href="{{url()->current()}}" class="btn btn-secondary" type="button">Reset </a> --}}
                    <button class="btn btn-primary float-right" type="submit" >Search </button>
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
                        <th>age</th>
                        <th>Mobile</th>
                        <th>country</th>
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
                        <td><img src="{{ $cus->profile_photo ? asset('storage/' . $cus->profile_photo) : asset('assets/img/user-icon.png') }}" class="rounded-circle img-thumbnail" alt="Profile" width="40" height="40"></td>
                         <td>
                           <a href="" class="btn btn-info">edit</a>
                           <a href="" class="btn btn-danger">delete</a>

                            {{--  <a href="{{route('customer.edit',['customer' => $cus->id])}}" class="btn btn-warning">Update</a>
                            <form action="{{ route('customer.destroy') }}" method="POST" style="display:inline">
                                @csrf
                                <input type="hidden" name="customer" value="{{ $cus->id }}">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                          --}}
                     </tr>
                     
                     @empty
                     
                     <tr>
                        <td colspan="6" class="text-center">
                            No Data Available
                        </td>
                     </tr>
                     @endforelse        
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
