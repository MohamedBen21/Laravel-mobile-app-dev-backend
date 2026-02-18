<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\ProductConfiguration;
use App\Http\Requests\V1\UpdateProductConfigurationRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductConfigurationResource;
use App\Http\Resources\V1\ProductConfigurationCollection;
use App\Http\Requests\V1\StoreProductConfigurationRequest;


class ProductConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProductConfigurationCollection(ProductConfiguration::paginate());
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
    public function store(StoreProductConfigurationRequest $request)
    {
        return new ProductConfigurationResource(ProductConfiguration::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductConfiguration $productConfiguration)
    {
        return new ProductConfigurationResource($productConfiguration);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductConfiguration $productConfiguration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductConfigurationRequest $request, ProductConfiguration $productConfiguration)
    {
        $productConfiguration->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductConfiguration $productConfiguration)
    {
        //
    }
}
