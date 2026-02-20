<div>

    <div class="row">
        <div class="col-md-12">


            @if (Session::has('message'))
                <p class="alert alert-success"><i
                        class="fa-solid fa-circle-check me-2 fe-3"></i>{{ Session::get('message') }} </p>
            @endif
            <div class="card shadow-md">
                <div class="card-header">
                    <h3>Category
                        <a href="{{ url('admin/category/create-category') }}"
                            class="btn btn-success text-light btn-sm float-end">Add Category</a>
                    </h3>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead >
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                        <td>
                                            <a href="{{ url('admin/category/' . $category->id . '/edit') }}"
                                                class="btn btn-success btn-sm text-white">Edit</a>

                                            <a href="#" onclick="deleteCategory({{ $category->id }})"
                                                class="btn btn-danger btn-sm text-white">Delete</a>

                                            <form id="category-delete-action-{{ $category->id }}"
                                                action="{{ url('admin/category/delete/' . $category->id) }}"
                                                method="post" style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-2">
                        {{ $categories->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function deleteCategory(id) {
        if (confirm("Are you sure, you want to delete this category?")) {
            document.getElementById('category-delete-action-' + id).submit();
        }
    }
</script>


{{-- @push('script')
    <script>
        
        window.addEventListener('close-modal', event =>{

            $('#deleteModal').modal('hide');

        });

    </script>
@endpush --}}
