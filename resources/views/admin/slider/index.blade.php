@extends('layouts.admin')


@section('content')


<div class="row">

    <div class="col-md-12">

            @if (Session::has('message'))
            <p class="alert alert-success"><i class="fa-solid fa-circle-check me-2 fe-3"></i>{{Session::get('message')}} </p>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Slider List
                    <a href="{{url('admin/slider/create-slider')}}" class="btn btn-success text-light btn-sm float-end">Add Slider</a>
                </h3>
            </div>
            <div class="card-body">

                <table class="table table-borderless table-striped">

                    <thead class="">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->description }}</td>
                                <td>
                                    
                                    <img src="{{ asset("$slider->image") }}" style="width:70px;height:70px;" alt="Slider">
                                </td>
                                <td>{{ $slider->status == '0' ? 'Visible' : 'Hidden'}}</td>
                                <td>
                                    <a href="{{ url('admin/slider/'.$slider->id.'/edit') }}" class="btn btn-success btn-sm">Edit</a>
                                    <a href="{{ url('admin/slider/'.$slider->id.'/delete') }}" onclick="return confirm('Are you sure? you want to delere this slider ?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No record found</td>
                            </tr>
                            
                        @endforelse
                       
                        
                    </tbody>
                </table>
                
                
            </div>
        </div>

    </div>

</div>



{{-- <script>
    function deleteColor(id) {
        if (confirm("Are you sure, you want to delete this category?")) {
            document.getElementById('color-delete-action-'+id).submit();
        }
    }
</script> --}}




@endsection