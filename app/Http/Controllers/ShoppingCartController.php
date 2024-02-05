<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\StoreShoppingCartRequest;
use App\Http\Requests\UpdateShoppingCartRequest;
use App\Models\Item;
use App\Models\ShoppingCart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return View('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Item $item):RedirectResponse
    {
        $cart = session()->get('cart');
        if($cart==null){
            $cart = [];
        }
        array_push($cart,$item);
        session()->put('cart',$cart);
        return redirect()->back();
    }

    public function remove(Item $item):RedirectResponse
    {
        $cart = session()->get('cart');
        if($cart==null){
            return redirect()->back();
        }
        $cart = array_filter($cart, function ($cartItem) use ($item) {
            return $cartItem->id !== $item->id;
        });
        session()->put('cart',$cart);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShoppingCartRequest $request, ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShoppingCart $shoppingCart)
    {
        //
    }
}
