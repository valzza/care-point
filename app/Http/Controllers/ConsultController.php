<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\ConsultCollection;
use App\Http\Resources\ConsultResource;
use App\Models\Consult;
use App\Services\ConsultService;
use Exception;
use Illuminate\Http\Request;

class ConsultController extends Controller
{

    protected ConsultService $consultService;
    public function __construct(ConsultService $consultService)
    {
        $this->consultService = $consultService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $consult = $this->consultService->all();
            if($consult->isEmpty()){
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new ConsultCollection($consult));
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
            $consult=$this->consultService->save($request);
            return $this->created(new ConsultResource($consult));
        }catch (Exception $e){
            return $this->respondError('Something went wrong!'.$e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $consult=$this->consultService->find($id);
            if($consult){
                return $this->okWithResource(new ConsultResource($consult));
            }
            return $this->notFound();
        }catch (Exception $e){
            return $this->respondError('Something went wrong!' .$e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consult $consult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $consult=$this->consultService->find($id);
            if($consult){
                $consult=$this->consultService->update($request,$id);
                return $this->okWithResource(new ConsultResource($consult));
            }
            return $this->notFound();
        }catch (Exception $e){
            return $this->respondError('Something went wrong!'. $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $consult=$this->consultService->find($id);
            if($consult){
                $this->consultService->delete($id);
                return $this->deleted(new EmptyResource($consult));
            }
        }catch (Exception $e){
            return $this->respondError('Something went wrong!'. $e);
        }
    }
}
