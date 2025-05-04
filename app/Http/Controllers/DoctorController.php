<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\DoctorCollection;
use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use App\Services\DoctorService;
use Exception;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    protected DoctorService $doctorService;
    public function __construct(DoctorService $doctorService)
    {
        $this->doctorService = $doctorService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $doctor = $this->doctorService->all();
            if($doctor->isEmpty()){
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new DoctorCollection($doctor));
        }catch(Exception $e){
            return $this->respondError('Something went wrong! '.$e);
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
        try{
            $doctor=$this->doctorService->save($request);
            return $this->created(new DoctorResource($doctor));
        }catch(Exception $e){
            return $this->respondError('Something went wrong! ' .$e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $doctor=$this->doctorService->find($id);
            if($doctor){
                return $this->okWithResource(new DoctorResource($doctor));
            }
            return $this->notFound();
        }catch(Exception $e){
            return $this->respondError('Something went wrong! ' .$e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $doctor=$this->doctorService->find($id);
            if($doctor){
                $doctor=$this->doctorService->update($request,$id);
                return $this->okWithResource(new DoctorResource($doctor));
            }
            return $this->notFound();
        }catch(Exception $e){
            return $this->respondError('Something went wrong! ' .$e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $doctor=$this->doctorService->find($id);
            if($doctor){
                $this->doctorService->delete($id);
                return $this->deleted(new EmptyResource($doctor));
            }
        }catch(Exception $e){
            return $this->respondError('Something went wrong! ' .$e);
        }
    }
}
