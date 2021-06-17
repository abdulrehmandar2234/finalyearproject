<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\ShoppingCart;
use App\Models\Wishlist;
use App\Providers\RouteServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        $this->storeCarts();
        if (auth()->user()->hasRole('admin')) {
            return redirect()->intended(route('dashboard'));
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function storeCarts()
    {
        if (Cart::instance('default')->count() > 0) {
            $carts = Cart::instance('default')->content();

            $store_carts = [];
            foreach ($carts as $cart) {
                if (!ShoppingCart::where(['product_id' => $cart->id, 'user_id' => auth()->id()])->exists()) {
                    $store_carts[] = ['product_id' => $cart->id,
                        'user_id' => auth()->id(),
                        'quantity' => $cart->qty,
                        'price' => $cart->price,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
            ShoppingCart::insert($store_carts);
            Cart::instance('default')->destroy();
        }
        if (Cart::instance('wishlist')->count() > 0) {
            $wishlists = Cart::instance('wishlist')->content();
            $store_wishlists = [];
            foreach ($wishlists as $wishlist) {
                if (!Wishlist::where(['product_id' => $cart->id, 'user_id' => auth()->id()])->exists()) {
                    $store_wishlists[] = ['product_id' => $wishlist->id,
                        'user_id' => auth()->id(),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
            Wishlist::insert($store_wishlists);
            Cart::instance('wishlist')->destroy();
        }
    }

}
