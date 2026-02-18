<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Method;
use App\Http\Requests\V1\UpdateMethodRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MethodResource;
use App\Http\Resources\V1\MethodCollection;
use App\Http\Requests\V1\StoreMethodRequest;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new MethodCollection(Method::paginate());
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
    public function store(StoreMethodRequest $request)
    {
        return new MethodResource(Method::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Method $method)
    {
        return new MethodResource($method);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Method $method)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMethodRequest $request, Method $method)
    {
        $method->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Method $method)
    {
        //
    }
}
