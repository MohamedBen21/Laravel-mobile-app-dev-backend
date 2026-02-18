<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Magasinier;
use App\Http\Requests\V1\UpdateMagasinierRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MagasinierResource;
use App\Http\Resources\V1\MagasinierCollection;
use App\Filters\V1\MagasinierFilter;
use Illuminate\Http\Request;
use App\Http\Requests\V1\StoreMagasinierRequest;

class MagasinierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new MagasinierFilter();
        $FilterItems = $filter->transform($request);

        $includeMagasins = $request->query('includeMagasins');

        $magasins=  Magasinier::where($FilterItems);
        
        if($includeMagasins){
            $magasins =$magasins->with('magasins');
        }

            return new MagasinierCollection($magasins->paginate()->appends($request->query()));

        
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
    public function store(StoreMagasinierRequest $request)
    {
        // return new MagasinierResource(Magasinier::create($request->all()));



        $imagePath = null;
        if ($request->hasFile('imageMagasinier')) {
            $image = $request->file('imageMagasinier');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        // Create new Magasinier instance and store in database
        $magasinier = Magasinier::create([
            'idUtilisateur' => $request->idUtilisateur,
            'idAdress' => $request->idAdress,
            'Username' => $request->Username,
            'imageMagasinier' => $imagePath,
            'salesCount' => $request->salesCount,
            'isValid' => $request->isValid,
        ]);

        return new MagasinierResource($magasinier);
    }

    /**
     * Display the specified resource.
     */
    public function show(Magasinier $magasinier)
    {
        $includeMagasins = request()->query('includeMagasins');
        if($includeMagasins){
             return new MagasinierResource($magasinier->loadMissing('magasins'));
        }
        return new MagasinierResource($magasinier);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Magasinier $magasinier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMagasinierRequest $request, Magasinier $magasinier)
    {
        // $magasinier->update($request->all());

        $imagePath = $magasinier->imageMagasinier; // Get current image path
        
        if ($request->hasFile('imageMagasinier')) {
            $image = $request->file('imageMagasinier');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        // Update Magasinier instance and store in database
        $magasinier->update([
            'idUtilisateur' => $request->idUtilisateur,
            'idAdress' => $request->idAdress,
            'Username' => $request->Username,
            'imageMagasinier' => $imagePath,
            'salesCount' => $request->salesCount,
            'isValid' => $request->isValid,
        ]);

        return new MagasinierResource($magasinier);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Magasinier $magasinier)
    {
        //
    }
}
