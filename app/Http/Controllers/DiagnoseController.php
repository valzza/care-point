<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiagnoseCollection;
use App\Http\Resources\DiagnoseResource;
use App\Http\Resources\EmptyResource;
use App\Models\Diagnose;
use App\Services\DiagnoseService;
use Exception;
use Illuminate\Http\Request;

class DiagnoseController extends Controller
{

    protected DiagnoseService $diagnoseService;
    public function __construct(DiagnoseService $diagnoseService)
    {
        $this->diagnoseService = $diagnoseService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $diagnose = $this->diagnoseService->all();
            if($diagnose->isEmpty()){
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new DiagnoseCollection($diagnose));
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
            $diagnose=$this->diagnoseService->save($request);
            return $this->created(new DiagnoseResource($diagnose));
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
            $diagnose=$this->diagnoseService->find($id);
            if($diagnose){
                return $this->okWithResource(new DiagnoseResource($diagnose));
            }
            return $this->notFound();
        }catch (Exception $e){
            return $this->respondError('Something went wrong!', $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diagnose $diagnose)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $diagnose=$this->diagnoseService->find($id);
            if($diagnose){
                $diagnose=$this->diagnoseService->update($request,$id);
                return $this->okWithResource(new DiagnoseResource($diagnose));
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
            $diagnose=$this->diagnoseService->find($id);
            if($diagnose){
                $this->diagnoseService->delete($id);
                return $this->deleted(new EmptyResource($diagnose));
            }
        }catch (Exception $e){
            return $this->respondError('Something went wrong!', $e);
        }
    }
}
