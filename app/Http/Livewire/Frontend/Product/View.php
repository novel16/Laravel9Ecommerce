<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;
use Livewire\Component;
use Spatie\FlareClient\Flare;

use function PHPSTORM_META\elementType;

class View extends Component
{
    public $category, $product, $productSelectedQuantity, $inputQuantity=1, $productColorId;


    public function productQuantityIncrement()
    {
        $this->inputQuantity++;

    }
     public function productQuantityDecrement()
    {
        if($this->inputQuantity > 1)
        {
            // Prevent decrementing below 1
            $this->inputQuantity--;
        }

    }

    public function addToWishlist($productId)
    {
        if(Auth::check())
        {
            // dd($productId, auth()->user()->id);
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id',$productId)->exists())
            {
                session()->flash('message', 'Already added to wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already added to wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }
            else
            {
               Wishlist::create([

                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
    
                ]);

                session()->flash('message', 'Item added to wishlist');
                $this->emit('wishlistUpdated');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Item added to wishlist',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
           

           
        }
        else
        {
            session()->flash('message', 'Please login to continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }

    public function colorSelected($productColorId)
    {
        // dd($productColorId);
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->productSelectedQuantity = $productColor->quantity;

        if($this->productSelectedQuantity == 0)
        {
            $this->productSelectedQuantity = 'outOfStock';
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view',[

            'category' => $this->category,
            'product' => $this->product

        ]);
    }

    public function addToCart(int $productId)
    {
        if(Auth::check()){
            
            if($this->product->where('id', $productId)->where('status', '0')->exists()){

                //check for product color quantity
                if($this->product->productColors()->count() > 0)
                {
                    if($this->productSelectedQuantity != NUll){

                         if(Cart::where('user_id', auth()->user()->id)
                            ->where('product_id', $productId)
                            ->where('product_color_id', $this->productColorId)
                            ->exists()){
                                return $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product already exists in cart',
                                    'type' => 'warning',
                                    'status' => 200
                                ]);
                         }

                        $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                        if($productColor->quantity > 0){

                            if($productColor->quantity >= $this->inputQuantity){

                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'product_color_id' => $this->productColorId,
                                    'quantity' => $this->inputQuantity
                                ]);
                                $this->emit('cartCountUpdated');
                                 $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product added to cart',
                                        'type' => 'success',
                                        'status' => 200
                                    ]); 

                            }else{
                                $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only' .' '.$productColor->quantity.' '. 'quantity available',
                                        'type' => 'warning',
                                        'status' => 200
                                    ]);    
                            }

                        }else{
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out of stock',
                                'type' => 'warning',
                                'status' => 200
                            ]);  
                        }
                        

                    }else{
                         $this->dispatchBrowserEvent('message', [
                            'text' => 'Select your product color',
                            'type' => 'info',
                            'status' => 200
                        ]);   
                    }
                }
                else{
                    
                    if(Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()){

                         $this->dispatchBrowserEvent('message', [
                            'text' => 'Product already exists in cart',
                            'type' => 'warning',
                            'status' => 200
                        ]); 

                    }else{
                        if($this->product->quantity > 0){

                            if($this->product->quantity > $this->inputQuantity){

                                Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'quantity' => $this->inputQuantity
                                    ]);
                                    $this->emit('cartCountUpdated');
                                    $this->dispatchBrowserEvent('message', [
                                            'text' => 'Product added to cart',
                                            'type' => 'success',
                                            'status' => 200
                                        ]); 

                            }else{
                                $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only' .' '.$this->product->quantity.' '. 'quantity available',
                                        'type' => 'warning',
                                        'status' => 200
                                    ]);    
                            }

                        }else{
                            $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out of stock',
                                    'type' => 'warning',
                                    'status' => 200
                                ]);    
                        }
                    }

                   
                }


            }else{
                $this->dispatchBrowserEvent('message', [
                        'text' => 'Product does not exist',
                        'type' => 'warning',
                        'status' => 404
                    ]);    
            }

        }else{
            $this->dispatchBrowserEvent('message', [
                    'text' => 'Please login to add to cart',
                    'type' => 'warning',
                    'status' => 200
                ]);
        }
    }
}
