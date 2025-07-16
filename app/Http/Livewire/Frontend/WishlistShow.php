<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistShow extends Component
{
    public function render()
    {
        $wishlists  = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', ['wishlists' => $wishlists]);
    }

    public function removeWishlistItem(int $wishlistId)
    {
        Wishlist::where('user_id', auth()->user()->id)->where('id', $wishlistId)->delete();

             // Emit event to update wishlist count
            $this->emit('wishlistUpdated');
             $this->dispatchBrowserEvent('message', [
                    'text' => 'Item removed from wishlist',
                    'type' => 'success',
                    'status' => 200
                ]);

    }
}
