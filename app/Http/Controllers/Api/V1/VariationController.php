<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Variation;
use App\Http\Requests\V1\StoreVariationRequest;
use App\Http\Requests\V1\UpdateVariationRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\VariationResource;
use App\Http\Resources\V1\VariationCollection;


class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new VariationCollection(Variation::paginate());
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
    public function store(StoreVariationRequest $request)
    {
        return new VariationResource(Variation::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Variation $variation)
    {
        return new VariationResource($variation);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variation $variation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVariationRequest $request, Variation $variation)
    {
        $variation->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variation $variation)
    {
        //
    }
}
