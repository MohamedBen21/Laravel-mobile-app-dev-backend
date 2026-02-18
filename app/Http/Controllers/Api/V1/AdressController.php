<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Adress;
use App\Http\Requests\V1\UpdateAdressRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AdressResource;
use App\Http\Resources\V1\AdressCollection;
use App\Http\Requests\V1\StoreAdressRequest;

class AdressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new AdressCollection(Adress::paginate());
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
    public function store(StoreAdressRequest $request)
    {
        return new AdressResource(Adress::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Adress $adress)
    {
        return new AdressResource($adress);
        // return $adress;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adress $adress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdressRequest $request, Adress $adress)
    {
        $adress->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adress $adress)
    {
        //
    }
}
