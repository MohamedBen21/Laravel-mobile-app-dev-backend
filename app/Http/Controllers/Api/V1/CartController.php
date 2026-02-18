<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Cart;
use App\Http\Requests\V1\UpdateCartRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CartResource;
use App\Http\Resources\V1\CartCollection;
use App\Http\Requests\V1\StoreCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CartCollection(Cart::all());
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
    public function store(StoreCartRequest $request)
    {
        return new CartResource(Cart::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        return new CartResource($cart);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        $cart->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
