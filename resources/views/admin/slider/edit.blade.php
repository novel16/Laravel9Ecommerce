@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3>Update Slider
                    <a href="{{url('admin/slider')}}" class="btn btn-danger text-light btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/slider/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="form-group col-md-12 mb-3">
                            <label for="Title">Title</label>
                            <input type="text" name="title" value="{{ $slider->title }}" class="form-control">
                        
                        <div class="form-group col-md-12 mb-3">
                            <label for="Description">Description</label>
                            <textarea name="description" class="form-control"  rows="3">{{ $slider->description }}</textarea>
    
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="Image">Image</label>
                            <input type="file" name="image" value="{{old('image')}}" class="form-control">
                            <img src="{{ asset("$slider->image") }}" style= "width:50px;height:50px" alt="Slider">
                            
                        </div>
                       
                        <div class="form-group col-md-12 mb-3">
                            <label for="status">status</label><br>
                            <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked' : 'unchecked' }} > Checked = Hidden, UnChecked = Visible
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary text-light btn-sm float-end">Update</button>
                        </div>
                    </div>
                </form>
            </div>
                
                
        </div>

    </div>
</div>

@endsection