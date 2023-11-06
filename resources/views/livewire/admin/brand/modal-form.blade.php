


{{-- add brand modal --}}
<div wire:ignore.self class="modal fade"  id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="storeBrand">

                    <div class="mb-3">
                        <label >Select Category</label>
                        <select wire:model="category_id" id="" class="form-control" required>
                            <option value="">--Select Category--</option>

                            @foreach ($categories as $categoryItem)
                                
                                <option value="{{ $categoryItem->id }}">{{ $categoryItem->name }}</option>

                            @endforeach
                           

                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror

                    </div>

                    <div class="mb-3 form-group">
                        <label for="Brand Name">Brand Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror 
                    </div>
                    <div class="mb-3 form-group">
                        <label for="Brand Name">Brand Slug</label>
                        <input type="text" wire:model="slug"  class="form-control">
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>
                    <div class=" form-group">
                        <label for="Brand Name">Status</label><br>
                        <input type="checkbox" wire:model="status" > Checked = <span class="text-muted">Hidden</span>  | Unchecked = <span class="text-muted">Visible</span>
                    </div>
                
            </div>

            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary btn-sm " data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary text-light btn-sm">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>
 {{-- end brand modal --}}




 {{-- Edit brand modal --}}
<div wire:ignore.self class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
            </div>
            <div wire:loading>
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">loading...</span>
                </div>loading...
            </div>
            <div wire:loading.remove>

                    <div class="modal-body">

                        <form wire:submit.prevent="updateBrand">
                            
                            <div class="mb-3">
                                <label >Select Category</label>
                                <select wire:model.defer="category_id" id="" class="form-control" required>
                                    <option value="">--Select Category--</option>
        
                                    @foreach ($categories as $categoryItem)
                                        
                                        <option value="{{ $categoryItem->id }}">{{ $categoryItem->name }}</option>
        
                                    @endforeach
                                   
        
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small> 
                                @enderror
        
                            </div>
        
                            <div class="mb-3 form-group">
                                <label for="Brand Name">Brand Name</label>
                                <input type="text" wire:model.defer="name" class="form-control">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>
                            <div class="mb-3 form-group">
                                <label for="Brand Name">Brand Slug</label>
                                <input type="text" wire:model.defer="slug"  class="form-control">
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>
                            <div class=" form-group">
                                <label for="Brand Name">Status</label><br>
                                <input type="checkbox" wire:model.defer="status" > Checked = <span class="text-muted">Hidden</span>  | Unchecked = <span class="text-muted">Visible</span>
                            </div>
                        
                    </div>

                
                

                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary btn-sm " data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary text-light btn-sm">Update</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
 {{-- End Edit brand modal --}}



 
{{-- delete brand modal --}}
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="destroyBrand">
                
                    <h4>Are you sure. you want to delete this brand?</h4>
                
            </div>

            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary btn-sm " data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger text-light btn-sm">Yes.Delete</button>
            </div>
        </form>
        </div>
    </div>
</div>
 {{-- delete brand modal --}}
