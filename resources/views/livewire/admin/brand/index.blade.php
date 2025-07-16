<div>
    
    @include('livewire.admin.brand.modal-form')

    <div class="row">
        <div class="col-md-12">
            @if (Session::has('message'))
            <p class="alert alert-success"><i class="fa-solid fa-circle-check me-2 fe-3"></i>{{Session::get('message')}} </p>
             @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="">
                        Brand Lists
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-success text-light btn-sm float-end">Add Brand</a>
                    </h4>
                    
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">

                        <thead >
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)

                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        @if ($brand->category)
                                            {{ $brand->category->name }}
                                        @else
                                            <div class="text-danger">
                                                No Category
                                            </div>
                                           
                                        @endif
                                        
                                    </td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>{{ $brand->status == '1' ? 'Hidden' : 'Visible'}}</td>
                                    <td>
                                        <a href="#" wire:click="editBrand({{ $brand->id }})" data-bs-toggle="modal" data-bs-target="#editBrandModal" class="btn btn-success text-light btn-sm">Edit</a>
                                        <a href="#" wire:click="deleteBrand({{ $brand->id }})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-danger text-light btn-sm">Delete</a>
                                    </td>
                                </tr>
                                
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No record found</td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{$brands->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@push('script')

    <script>
        window.addEventListener('close-modal',event =>{

            $('#addBrandModal').modal('hide');
            $('#editBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');

        });
    </script>
    
@endpush
