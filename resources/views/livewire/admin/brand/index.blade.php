<div>

    @include('livewire.admin.brand.modal-form')

    <div class="row">
        <div class="col-md-12">
            @if (Session::has('message'))
                <p class="alert alert-success"><i
                        class="fa-solid fa-circle-check me-2 fe-3"></i>{{ Session::get('message') }} </p>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="">
                        Brand Lists
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal"
                            class="btn btn-success text-light btn-sm float-end">Add Brand</a>
                    </h4>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
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
                                                <span class="text-danger">No Category</span>
                                            @endif
                                        </td>
                                        <td>{{ $brand->slug }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $brand->status == '1' ? 'secondary' : 'success' }}">
                                                {{ $brand->status == '1' ? 'Hidden' : 'Visible' }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" wire:click="editBrand({{ $brand->id }})"
                                                data-bs-toggle="modal" data-bs-target="#editBrandModal"
                                                class="btn btn-sm btn-success text-light me-1">
                                                Edit
                                            </a>
                                            <a href="#" wire:click="deleteBrand({{ $brand->id }})"
                                                data-bs-toggle="modal" data-bs-target="#deleteBrandModal"
                                                class="btn btn-sm btn-danger text-light">
                                                Delete
                                            </a>
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

                    <div class="mt-2">
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@push('script')
    <script>
        window.addEventListener('close-modal', event => {

            $('#addBrandModal').modal('hide');
            $('#editBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');

        });
    </script>
@endpush
