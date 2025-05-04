<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\PatientCollection;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use App\Services\PatientService;
use Exception;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    protected PatientService $patientService;
    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $patient = $this->patientService->all();
            if($patient->isEmpty()){
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new PatientCollection($patient));
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
            $patient=$this->patientService->save($request);
            return $this->created(new PatientResource($patient));
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
            $patient=$this->patientService->find($id);
            if($patient){
                return $this->okWithResource(new PatientResource($patient));
            }
            return $this->notFound();
        }catch (Exception $e){
            return $this->respondError('Something went wrong!', $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $patient=$this->patientService->find($id);
            if($patient){
                $patient=$this->patientService->update($request,$id);
                return $this->okWithResource(new PatientResource($patient));
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
            $patient=$this->patientService->find($id);
            if($patient){
                $this->patientService->delete($id);
                return $this->deleted(new EmptyResource($patient));
            }
        }catch (Exception $e){
            return $this->respondError('Something went wrong!', $e);
        }
    }
}
