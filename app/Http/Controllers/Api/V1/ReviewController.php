<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Review;
use App\Http\Requests\V1\StoreReviewRequest;
use App\Http\Requests\V1\UpdateReviewRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ReviewResource;
use App\Http\Resources\V1\ReviewCollection;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ReviewCollection(Review::paginate());
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
    public function store(StoreReviewRequest $request)
    {
        return new ReviewResource(Review::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        $review->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
