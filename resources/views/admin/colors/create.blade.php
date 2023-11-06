@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3>Add Category
                    <a href="{{url('admin/colors')}}" class="btn btn-danger text-light btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/colors')}}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="Name">Color Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="Code">Color Code</label>
                            <input type="text" name="code" value="{{old('code')}}" class="form-control">
                            @error('code')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
    
                        </div>
                       
                        <div class="form-group col-md-6 mb-3">
                            <label for="status">status</label><br>
                            <input type="checkbox" name="status" {{old('status')}}> Checked = Hidden, UnChecked = Visible
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