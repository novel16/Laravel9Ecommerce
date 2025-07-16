<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistCount extends Component
{
    public $count;

    protected $listeners = ['wishlistUpdated' => 'checkWishlistCount'];

    public function checkWishlistCount()
    {
        if(Auth::check()) {
            $this->count = Wishlist::where('user_id', auth()->user()->id)->count();
        } else {
            $this->count = 0;
        }
    }
    public function render()
    {
        $this->checkWishlistCount();
        return view('livewire.frontend.wishlist-count', [
            'wishlistCount' => $this->count
        ]);
    }
}
