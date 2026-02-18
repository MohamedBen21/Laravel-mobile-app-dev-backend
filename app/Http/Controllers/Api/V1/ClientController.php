<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Client;
use App\Http\Requests\V1\UpdateClientRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ClientResource;
use App\Http\Resources\V1\ClientCollection;
use App\Filters\V1\ClientFilter;
use Illuminate\Http\Request;
use App\Http\Requests\V1\StoreClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ClientFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems)==0){
            return new ClientCollection(Client::paginate()) ;
        }else{

            $admins=  Client::where($queryItems)->paginate();

            return new ClientCollection($admins->appends($request->query()));
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
    public function store(StoreClientRequest $request)
    {
        // return new ClientResource(Client::create($request->all()));


        $imagePath = null;
        if ($request->hasFile('clientImage')) {
            $image = $request->file('clientImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        // Create new Client instance and store in database
        $client = Client::create([
            'idUtilisateur' => $request->idUtilisateur,
            'idAdress' => $request->idAdress,
            'Username' => $request->Username,
            'clientImage' => $imagePath,
            'buysCount' => $request->buysCount,
        ]);

        return new ClientResource($client);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return new ClientResource($client);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        // $client->update($request->all());


        $imagePath = $client->clientImage; // Get current image path
        
        if ($request->hasFile('clientImage')) {
            $image = $request->file('clientImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        // Update Client instance and store in database
        $client->update([
            'idUtilisateur' => $request->idUtilisateur,
            'idAdress' => $request->idAdress,
            'Username' => $request->Username,
            'clientImage' => $imagePath,
            'buysCount' => $request->buysCount,
        ]);

        return new ClientResource($client);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
