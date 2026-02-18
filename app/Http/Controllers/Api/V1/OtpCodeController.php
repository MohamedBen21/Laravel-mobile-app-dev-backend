<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\OtpCode;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\OtpCodeResource;
use App\Http\Resources\V1\OtpCodeCollection;
use App\Http\Requests\V1\StoreOtpCodeRequest;
use App\Http\Requests\V1\UpdateOtpCodeRequest;
use App\Filters\V1\OtpCodeFilter;
use Illuminate\Http\Request;


class OtpCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new OtpCodeFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems) == 0){
            return new OtpCodeCollection(OtpCode::paginate()) ;
        }else{

            $utilisateurs= OtpCode::where($queryItems)->paginate();

            return new OtpCodeCollection($utilisateurs->appends($request->query()));
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
    public function store(StoreOtpCodeRequest $request)
    {
        return new OtpCodeResource(OtpCode::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
//     public function show($idOtpCode)
// {
//   
//   // Proceed with processing $otpCode (if not null)
// }
        public function show($idOtp)
    {
        $OtpCode = OtpCode::find($idOtp);
        return new OtpCodeResource($OtpCode);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OtpCode $otpCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateOtpCodeRequest $request, OtpCode $otpCode)
    // {
    //     $otpCode->update($request->all());
        
    // }

    public function update(UpdateOtpCodeRequest $request,$idOtp)
    {
        $OtpCode = OtpCode::find($idOtp);
        $OtpCode->update($request->all());
        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OtpCode $otpCode)
    {
        //
    }
}
