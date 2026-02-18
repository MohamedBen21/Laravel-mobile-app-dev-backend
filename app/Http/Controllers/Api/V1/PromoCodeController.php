<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\PromoCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StorePromoCodeRequest;
use App\Http\Requests\V1\UpdatePromoCodeRequest;
use App\Http\Resources\V1\PromoCodeResource;
use App\Http\Resources\V1\PromoCodeCollection;
use App\Filters\V1\PromoCodeFilter;
use Illuminate\Http\Request;


class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PromoCodeFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems)==0){
            return new PromoCodeCollection(PromoCode::paginate()) ;
        }else{

            $promoCodes=  PromoCode::where($queryItems)->paginate();

            return new PromoCodeCollection($promoCodes->appends($request->query()));
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
    public function store(StorePromoCodeRequest $request)
    {
        return new PromoCodeResource(PromoCode::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(PromoCode $promoCode)
    {
        return new PromoCodeResource($promoCode);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PromoCode $promoCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromoCodeRequest $request, PromoCode $promoCode)
    {
        $promoCode->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PromoCode $promoCode)
    {
        //
    }
}
