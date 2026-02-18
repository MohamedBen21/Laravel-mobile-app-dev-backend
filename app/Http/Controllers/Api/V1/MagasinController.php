<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Magasin;
use App\Http\Requests\V1\UpdateMagasinRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MagasinResource;
use App\Http\Resources\V1\MagasinCollection;
use App\Filters\V1\MagasinFilter;
use Illuminate\Http\Request;
use App\Http\Requests\V1\StoreMagasinRequest;

class MagasinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new MagasinFilter();
        $filterItems = $filter->transform($request);

        $includeProducts = $request->query('includeProducts');

        $products=  Magasin::where($filterItems);

        if($includeProducts){
            $products = $products ->with('products');

        }
        

            return new MagasinCollection($products->paginate()->appends($request->query()));

       
        
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
    public function store(StoreMagasinRequest $request)
    {
        return new MagasinResource(Magasin::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Magasin $magasin)
    {
        $includeProducts = request()->query('includeProducts');
        if($includeProducts){
            return new MagasinResource($magasin->loadMissing('products'));
        }
        return new MagasinResource($magasin);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Magasin $magasin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMagasinRequest $request, Magasin $magasin)
    {
        $magasin->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Magasin $magasin)
    {
        //
    }
}
