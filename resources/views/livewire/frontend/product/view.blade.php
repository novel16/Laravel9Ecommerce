<div>
    <div class="py-3 py-md-5">
        <div class="container">

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if (isset($product->productImages[0]))
                            <x-no-image src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}"
                                class="w-100" />
                        @else
                            <x-no-image />
                        @endif

                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}


                            <label class="label-stock bg-success">In Stock</label>
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">&#8369;{{ $product->selling_price }}</span>
                            {{-- <span class="original-price">${{$product->original_price}}</span> --}}
                        </div>
                        <div>
                            @if ($product->productColors->count() > 0)

                                @if ($product->productColors)
                                    @foreach ($product->productColors as $colorItem)
                                        {{-- <input type="radio" name="colorSelection" value="{{ $colorItem->id }}" /> {{ $colorItem->color->name }} --}}
                                        <label class="colorSelectionLabel"
                                            style="background-color: {{ $colorItem->color->code }} "
                                            wire:click = "colorSelected({{ $colorItem->id }})">
                                            {{ $colorItem->color->name }}
                                        </label>
                                    @endforeach
                                @endif

                                @if ($this->productSelectedQuantity == 'outOfStock')
                                    <br> <label class="btn btn-sm text-light mt-1 label-stock bg-danger">Out of
                                        Stock</label>
                                @elseif ($this->productSelectedQuantity > 0)
                                    <br><label class="btn btn-sm text-light mt-1 label-stock bg-success">In
                                        Stock</label>
                                @endif
                            @else
                                @if ($product->quantity)
                                    <label class="btn btn-sm text-light label-stock bg-success">In Stock</label>
                                @else
                                    <label class="btn btn-sm text-light label-stock bg-danger">Out of Stock</label>
                                @endif
                            @endif


                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <button type="button" wire:click="productQuantityDecrement()" class="btn btn1"><i
                                        class="fa fa-minus"></i></button>
                                <input type="text" wire:model="inputQuantity" value="1" class="input-quantity"
                                    readonly />
                                <button type="button" wire:click="productQuantityIncrement()" class="btn btn1"><i
                                        class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:click="addToCart({{ $product->id }})"
                                class="btn  rounded-0 btn-outline-primary">
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </button>
                            <button type="button" wire:click="addToWishlist({{ $product->id }})"
                                class="btn  rounded-0 btn-outline-primary">
                                <span wire:loading.remove wire:target = "addToWishlist({{ $product->id }})">
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                </span>
                                <span wire:loading wire:target = "addToWishlist({{ $product->id }})">
                                    Adding...
                                </span>

                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {!! $product->small_description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {!! $product->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
