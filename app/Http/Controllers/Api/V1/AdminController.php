<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Admin;
use App\Http\Requests\V1\UpdateAdminRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AdminResource;
use App\Http\Resources\V1\AdminCollection;
use App\Filters\V1\AdminFilter;
use Illuminate\Http\Request;
use App\Http\Requests\V1\StoreAdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new AdminFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems)==0){
            return new AdminCollection(Admin::paginate()) ;
        }else{

            $admins=  Admin::where($queryItems)->paginate();

            return new AdminCollection($admins->appends($request->query()));
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
    public function store(StoreAdminRequest $request)
    {
        return new AdminResource(Admin::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
      return new AdminResource($admin);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $admin->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
