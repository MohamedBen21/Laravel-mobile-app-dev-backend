<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\VariationOption;
use App\Http\Requests\V1\StoreVariationOptionRequest;
use App\Http\Requests\V1\UpdateVariationOptionRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\VariationOptionResource;
use App\Http\Resources\V1\VariationOptionCollection;


class VariationOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new VariationOptionCollection(VariationOption::paginate());
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
    public function store(StoreVariationOptionRequest $request)
    {
        return new VariationOptionResource(VariationOption::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(VariationOption $variationOption)
    {
        return new VariationOptionResource($variationOption);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VariationOption $variationOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVariationOptionRequest $request, VariationOption $variationOption)
    {
        $variationOption->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VariationOption $variationOption)
    {
        //
    }
}
