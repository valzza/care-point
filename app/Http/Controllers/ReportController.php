<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\ReportCollection;
use App\Http\Resources\ReportResource;
use App\Models\Report;
use App\Services\ReportService;
use Exception;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    protected ReportService $reportService;
    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $report = $this->reportService->all();
            if($report->isEmpty()){
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new ReportCollection($report));
        }catch(Exception $e){
            return $this->respondError('Something went wrong! ' . $e);
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
    public function store(Request $request)
    {
        try {
            $report=$this->reportService->save($request);
            return $this->created(new ReportResource($report));
        }catch (Exception $e){
            return $this->respondError('Something went wrong!',$e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $report=$this->reportService->find($id);
            if($report){
                return $this->okWithResource(new ReportResource($report));
            }
            return $this->notFound();
        }catch (Exception $e){
            return $this->respondError('Something went wrong!', $e);
        }
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
    public function update(Request $request, $id)
    {
        try {
            $report=$this->reportService->find($id);
            if($report){
                $report=$this->reportService->update($request,$id);
                return $this->okWithResource(new ReportResource($report));
            }
            return $this->notFound();
        }catch (Exception $e){
            return $this->respondError('Something went wrong!', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $report=$this->reportService->find($id);
            if($report){
                $this->reportService->delete($id);
                return $this->deleted(new EmptyResource($report));
            }
        }catch (Exception $e){
            return $this->respondError('Something went wrong!', $e);
        }
    }
}
