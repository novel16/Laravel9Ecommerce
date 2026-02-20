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
                    <h3>Colors
                        <a href="{{ url('admin/colors/create-color') }}"
                            class="btn btn-success text-light btn-sm float-end">Add Colors</a>
                    </h3>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Color Name</th>
                                    <th>Color Code</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($colors as $color)
                                    <tr>
                                        <td>{{ $color->id }}</td>
                                        <td>{{ $color->name }}</td>
                                        <td>
                                            <span class="d-inline-block px-2 py-1 rounded"
                                                style="background-color: {{ $color->code }};">
                                                {{ $color->code }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $color->status == '1' ? 'secondary' : 'success' }}">
                                                {{ $color->status == '1' ? 'Hidden' : 'Visible' }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('admin/colors/' . $color->id . '/edit') }}"
                                                class="btn btn-success btn-sm text-light me-1">
                                                Edit
                                            </a>
                                            <a href="#" onclick="deleteColor({{ $color->id }})"
                                                class="btn btn-danger btn-sm text-light">
                                                Delete
                                            </a>

                                            <form id="color-delete-action-{{ $color->id }}"
                                                action="{{ url('admin/colors/delete/' . $color->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>

        </div>

    </div>



    <script>
        function deleteColor(id) {
            if (confirm("Are you sure, you want to delete this category?")) {
                document.getElementById('color-delete-action-' + id).submit();
            }
        }
    </script>
@endsection
