<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\PromotionProductItem;
use App\Http\Requests\V1\StorePromotionProductItemRequest;
use App\Http\Requests\V1\UpdatePromotionProductItemRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PromotionProductItemResource;
use App\Http\Resources\V1\PromotionProductItemCollection;


class PromotionProductItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new PromotionProductItemCollection(PromotionProductItem::paginate());
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
    public function store(StorePromotionProductItemRequest $request)
    {
        return new PromotionProductItemResource(PromotionProductItem::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(PromotionProductItem $promotionProductItem)
    {
        return new PromotionProductItemResource($promotionProductItem);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PromotionProductItem $promotionProductItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromotionProductItemRequest $request, PromotionProductItem $promotionProductItem)
    {
        $promotionProductItem->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PromotionProductItem $promotionProductItem)
    {
        //
    }
}
