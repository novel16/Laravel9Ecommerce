@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">

        
        <div class="card">
            <div class="card-header">
                <h3>Update Category
                    <a href="{{url('admin/category')}}" class="btn btn-danger text-light btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="Name">Name</label>
                            <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="Slug">Slug</label>
                            <input type="text" name="slug" value="{{ $category->slug }}" class="form-control">
                            @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
    
                        </div>
                       
                        <div class="form-group col-md-12 mb-3">
                            <label for="Description">Description</label>
                            <textarea type="text" name="description" class="form-control" value="" rows="4">{{ $category->description }}</textarea>
                            @error('description')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                       

                        <div class="form-group col-md-6 mb-3">
                            <label for="Image">Image</label>
                            <input type="file" name="image"  class="form-control">
                            <img class="mt-2" src="{{ asset('/uploads/category/'.$category->image) }}" alt="" width="150px">
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="status">Status</label><br>
                            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }} >
                        </div>

                        <div class="col-md-12 my-3 form-group">
                            <h4 class="text-primary">SEO Tags</h4>
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label for="Meta Title">Meta Title</label>
                            <textarea type="text" name="meta_title" class="form-control" rows="3">{{ $category->meta_title }}</textarea>
                            @error('meta_title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                       

                        <div class="form-group col-md-12 mb-3">
                            <label for="Meta Keyword">Meta Keyword</label>
                            <textarea type="text" name="meta_keyword" class="form-control" value="" rows="3">{{ $category->meta_keyword }}</textarea>
                            @error('meta_keyword')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
    
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label for="Meta Description">Meta Description</label>
                            <textarea type="text" name="meta_description" value="" class="form-control" rows="3">{{ $category->meta_description }}</textarea>
                            @error('meta_description')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
    
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