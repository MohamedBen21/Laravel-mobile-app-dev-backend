<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Promotion;
use App\Http\Requests\V1\StorePromotionRequest;
use App\Http\Requests\V1\UpdatePromotionRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PromotionResource;
use App\Http\Resources\V1\PromotionCollection;


class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new PromotionCollection(Promotion::paginate());
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
    public function store(StorePromotionRequest $request)
    {
        return new PromotionResource(Promotion::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        return new PromotionResource($promotion);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromotionRequest $request, Promotion $promotion)
    {
        $promotion->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}
