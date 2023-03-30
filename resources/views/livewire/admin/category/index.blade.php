<div>
    {{-- update modal --}}
    {{-- <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="">Delete Category</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent = "destroyCategory">
                    <div class="modal-body">
                        <h6>Are you sure? you want to delete this category?</h6>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger text-light btn-sm" data-bs-dismiss="modal">Yes. Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-12">
    
           
            @if (Session::has('message'))
                <p class="alert alert-success"><i class="fa-solid fa-circle-check me-2 fe-3"></i>{{Session::get('message')}} </p>
            @endif
            <div class="card shadow">
                <div class="card-header">
                    <h3>Category
                        <a href="{{url('admin/category/create')}}" class="btn btn-success text-light btn-sm float-end">Add Category</a>
                    </h3>
                </div>
                <div class="card-body">
    
                    <table class="table table-borderless table-striped">
    
                        <thead class="bg-dark text-light">
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
                                        <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-success text-light btn-sm">Edit</a>
                                        {{-- <a href="#" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger text-light btn-sm">Delete</a> --}}
                                        <a href="#" onclick="deleteCategory({{  $category->id }})" class="btn btn-danger text-light btn-sm">Delete</a>

                                        <form id="category-delete-action-{{ $category->id }}" action="{{ url('admin/category/delete/'.$category->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{$categories->links()}}
                    </div>
                    
                </div>
            </div>
    
        </div>
    </div>
</div>

<script>
    function deleteCategory(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('category-delete-action-'+id).submit();
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


