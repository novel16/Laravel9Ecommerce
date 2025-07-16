@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3>Add Slider
                    <a href="{{url('admin/slider')}}" class="btn btn-danger text-light btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/slider')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="form-group col-md-12 mb-3">
                            <label for="Title">Title</label>
                            <input type="text" name="title" value="{{old('title')}}" class="form-control">
                            @error('title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="Description">Description</label>
                            <textarea name="description" class="form-control" value="{{old('description')}}"  rows="3"></textarea>
                            @error('description')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
    
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="Image">Image</label>
                            <input type="file" name="image" value="{{old('image')}}" class="form-control">
                            @error('image')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                       
                        <div class="form-group col-md-12 mb-3">
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