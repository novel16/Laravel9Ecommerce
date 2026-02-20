@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3>Add User
                    <a href="{{url('admin/users')}}" class="btn btn-danger text-light btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/users')}}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="Name">Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="Email">Email</label>
                            <input type="email" name="email" value="{{old('email')}}" class="form-control">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
    
                        </div>
                         <div class="form-group col-md-6 mb-3">
                            <label for="Password">Password</label>
                            <input type="password" name="password" value="{{old('password')}}" class="form-control">
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
    
                        </div>
                         <div class="form-group col-md-6 mb-3">
                            <label for="Role As">Role As</label>
                            <select name="role_as" class="form-select">
                                <option value="">- Select Role -</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                            @error('role_as')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
    
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary text-light btn-sm float-end">Save</button>
                        </div>
                    </div>
                </form>
            </div>
                
                
        </div>

    </div>
</div>

@endsection
