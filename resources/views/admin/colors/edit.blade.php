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
                <form action="{{url('admin/colors/'.$color->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="Name">Color Name</label>
                            <input type="text" name="name" value="{{ $color->name }}" class="form-control">
                            
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="Code">Color Code</label>
                            <input type="text" name="code" value="{{ $color->code }}" class="form-control">
                        </div>
                       
                        <div class="form-group col-md-6 mb-3">
                            <label for="status">status</label><br>
                            <input type="checkbox" name="status" {{ $color->status == '1' ? 'checked' : '' }}> Checked = Hidden, UnChecked = Visible
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