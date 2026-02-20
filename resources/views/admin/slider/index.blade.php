@extends('layouts.admin')


@section('content')
    <div class="row">

        <div class="col-md-12">

            @if (Session::has('message'))
                <p class="alert alert-success"><i class="fa-solid fa-circle-check me-2 fe-3"></i>{{ Session::get('message') }}
                </p>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Slider List
                        <a href="{{ url('admin/slider/create-slider') }}"
                            class="btn btn-success text-light btn-sm float-end">Add Slider</a>
                    </h3>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($sliders as $slider)
                                    <tr>
                                        <td>{{ $slider->id }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td style="max-width: 200px;">
                                            <div class="text-truncate" style="max-width: 180px;">
                                                {{ $slider->description }}
                                            </div>
                                        </td>
                                        <td>
                                            <img src="{{ asset($slider->image) }}" alt="Slider" class="img-thumbnail"
                                                style="width: 70px; height: 70px;">
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $slider->status == '0' ? 'success' : 'secondary' }}">
                                                {{ $slider->status == '0' ? 'Visible' : 'Hidden' }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('admin/slider/' . $slider->id . '/edit') }}"
                                                class="btn btn-success btn-sm me-1">Edit</a>
                                            <a href="{{ url('admin/slider/' . $slider->id . '/delete') }}"
                                                onclick="return confirm('Are you sure you want to delete this slider?')"
                                                class="btn btn-danger btn-sm">Delete</a>
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

    </div>



    {{-- <script>
    function deleteColor(id) {
        if (confirm("Are you sure, you want to delete this category?")) {
            document.getElementById('color-delete-action-'+id).submit();
        }
    }
</script> --}}
@endsection
