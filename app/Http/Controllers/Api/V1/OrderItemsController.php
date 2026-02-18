<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\OrderItems;
use App\Http\Requests\V1\UpdateOrderItemsRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\OrderItemsResource;
use App\Http\Resources\V1\OrderItemsCollection;
use App\Http\Requests\V1\StoreOrederItemsRequest;

class OrderItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new OrderCollection(OrderItems::paginate());
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
    public function store(StoreOrderItemsRequest $request)
    {
        return new StoreOrderItemsResource(OrderItems::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItems $orderItems)
    {
        return new OrderItemsResource($orderItems);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderItems $orderItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderItemsRequest $request, OrderItems $orderItems)
    {
        $orderItems->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderItems $orderItems)
    {
        //
    }
}
