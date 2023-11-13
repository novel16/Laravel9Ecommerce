<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\FlareClient\Flare;

use function PHPSTORM_META\elementType;

class View extends Component
{
    public $category, $product, $productSelectedQuantity;


    public function addToWishlist($productId)
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id',$productId))
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
}
