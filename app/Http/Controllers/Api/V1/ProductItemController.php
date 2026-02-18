<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\ProductItem;
use App\Http\Requests\V1\StoreProductItemRequest;
use App\Http\Requests\V1\UpdateProductItemRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductItemResource;
use App\Http\Resources\V1\ProductItemCollection;
use App\Filters\V1\ProductItemFilter;
use Illuminate\Http\Request;



class ProductItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ProductItemFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems) == 0){
            return new ProductItemCollection(ProductItem::paginate()) ;
        }else{

            $utilisateurs= ProductItem::where($queryItems)->paginate();

            return new ProductItemCollection($utilisateurs->appends($request->query()));
        }
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
    public function store(StoreProductItemRequest $request)
    {
        return new ProductItemResource(ProductItem::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductItem $productItem)
    {
        return new ProductItemResource($productItem);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductItem $productItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductItemRequest $request, ProductItem $productItem)
    {
        $productItem->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductItem $productItem)
    {
        //
    }
}
