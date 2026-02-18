<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Report;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreReportRequest;
use App\Http\Requests\V1\UpdateReportRequest;
use App\Http\Resources\V1\ReportResource;
use App\Http\Resources\V1\ReportCollection;
use App\Filters\V1\ReportFilter;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ReportFilter();
        $queryItems = $filter->transform($request);

        if(count($queryItems)==0){
            return new ReportCollection(Report::paginate()) ;
        }else{

            $reports=  Report::where($queryItems)->paginate();

            return new ReportCollection($reports->appends($request->query()));
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
    public function store(StoreReportRequest $request)
    {
        return new ReportResource(Report::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return new ReportResource($report);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        $report->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
