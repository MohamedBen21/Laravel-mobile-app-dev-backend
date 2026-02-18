<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\ShoppingCartItem;
use App\Http\Requests\V1\StoreShoppingCartItemRequest;
use App\Http\Requests\V1\UpdateShoppingCartItemRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ShoppingCartItemResource;
use App\Http\Resources\V1\ShoppingCartItemCollection;
use App\Filters\V1\ShoppingCartItemFilter;
use Illuminate\Http\Request;


class ShoppingCartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ShoppingCartItemFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems) == 0){
            return new ShoppingCartItemCollection(ShoppingCartItem::paginate()) ;
        }else{

            $utilisateurs= ShoppingCartItem::where($queryItems)->paginate();

            return new ShoppingCartItemCollection($utilisateurs->appends($request->query()));
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
    public function store(StoreShoppingCartItemRequest $request)
    {
        return new ShoppingCartItemResource(ShoppingCartItem::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(ShoppingCartItem $shoppingCartItem)
    {
        return new ShoppingCartItemResource($shoppingCartItem);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShoppingCartItem $shoppingCartItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShoppingCartItemRequest $request, ShoppingCartItem $shoppingCartItem)
    {
        $shoppingCartItem->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShoppingCartItem $shoppingCartItem)
    {
        //
    }
}
