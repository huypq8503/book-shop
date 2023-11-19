<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1, $productColorId;
    //wishlist start 
    public function addToWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {

                session()->flash('message', 'Product already Added to whislist');

                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product already Added to Whislist',
                    'type' => 'info',
                    'status' => 409
                ]);
                return false;
            } else {
                $wishlist = Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Added to Whislist Succesfully',
                    'type' => 'info',
                    'status' => 200
                ]);
                session()->flash('message', 'Product Added  to Whislist Succesfully');
                //this is an livewire event for updating the wishlist count instantaly
                $this->emit('wishlistAddedUpdated');
            }
        } else {
            session()->flash('message', 'Please Login to Continue');

            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login To Continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }


    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;
        if ($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity == 'outOfStock';
        }
    }
    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }
    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }
    public function addToCart(int $productId)
    {


        if (Auth::check()) {

            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {

                if ($this->product->productColors()->count() > 1) {
                    if ($this->prodColorSelectedQuantity != NULL) {
                        if (Cart::where('user_id', auth()->user()->id)
                            ->where('product_id', $productId)
                            ->where('product_color_id', $this->productColorId)
                            ->exists()
                        ) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product Already added to cart',
                                'type' => 'warning',
                                'status' => 401
                            ]);
                        } else {
                            $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();

                            if ($productColor->quantity > 0) {
                                if ($productColor->quantity > $this->quantityCount) {
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount
                                    ]);


                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product Added To Cart',
                                        'type' => 'info',
                                        'status' => 200
                                    ]);
                                    $this->emit('CartAddedUpdated');
                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only ' . $productColor->quantity . 'is Available',
                                        'type' => 'info',
                                        'status' => 401
                                    ]);
                                }
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product is out of stock',
                                    'type' => 'info',
                                    'status' => 401
                                ]);
                            }
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select Your Color',
                            'type' => 'info',
                            'status' => 401
                        ]);
                    }
                } else {
                    if ($this->product->quantity > 0) {
                        if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product already added to cart',
                                'type' => 'info',
                                'status' => 401
                            ]);
                        } else {
                            if ($this->product->quantity > $this->quantityCount) {
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,

                                    'quantity' => $this->quantityCount
                                ]);

                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product Added To Cart',
                                    'type' => 'info',
                                    'status' => 200
                                ]);
                                $this->emit('CartAddedUpdated');
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only ' . $this->product->quantity . 'is Available',
                                    'type' => 'info',
                                    'status' => 401
                                ]);
                            }
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product is out of stock',
                            'type' => 'info',
                            'status' => 401
                        ]);
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Not found',
                    'type' => 'info',
                    'status' => 401
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login To Continue',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }


    //mount is a livewire function 
    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
