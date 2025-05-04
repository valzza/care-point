<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppointmentCollection;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\EmptyResource;
use App\Models\Appointment;
use App\Services\AppointmentService;
use Exception;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    protected AppointmentService $appointmentService;
    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $appointment = $this->appointmentService->all();
            if($appointment->isEmpty()){
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new AppointmentCollection($appointment));
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
            $appointment=$this->appointmentService->save($request);
            return $this->created(new AppointmentResource($appointment));
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
            $appointment=$this->appointmentService->find($id);
            if($appointment){
                return $this->okWithResource(new AppointmentResource($appointment));
            }
            return $this->notFound();
        }catch (Exception $e){
            return $this->respondError('Something went wrong!', $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $appointment=$this->appointmentService->find($id);
            if($appointment){
                $appointment=$this->appointmentService->update($request,$id);
                return $this->okWithResource(new AppointmentResource($appointment));
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
            $appointment=$this->appointmentService->find($id);
            if($appointment){
                $this->appointmentService->delete($id);
                return $this->deleted(new EmptyResource($appointment));
            }
        }catch (Exception $e){
            return $this->respondError('Something went wrong!', $e);
        }
    }
}
