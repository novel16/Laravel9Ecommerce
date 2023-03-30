@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3>Add Category
                    <a href="{{url('admin/category')}}" class="btn btn-danger text-light btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/category')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="Name">Name</label>
                            <input type="text" name="name" class="form-control">
                            
                        </div>
                        @error('name')
                                <p>{{ $message }}</p>
                        @enderror
                        
                        <div class="form-group col-md-6 mb-3">
                            <label for="Slug">Slug</label>
                            <input type="text" name="slug" class="form-control">
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label for="Description">Description</label>
                            <textarea type="text" name="description" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="Image">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="status">Status</label><br>
                            <input type="checkbox" name="status" >
                        </div>

                        <div class="col-md-12 my-3 form-group">
                            <h4 class="text-primary">SEO Tags</h4>
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label for="Meta Title">Meta Title</label>
                            <textarea type="text" name="meta_title" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label for="Meta Keyword">Meta Keyword</label>
                            <textarea type="text" name="meta_keyword" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <label for="Meta Description">Meta Description</label>
                            <textarea type="text" name="meta_description" class="form-control" rows="3"></textarea>
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