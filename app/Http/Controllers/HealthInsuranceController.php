<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\HealthInsuranceCollection;
use App\Http\Resources\HealthInsuranceResource;
use App\Models\HealthInsurance;
use App\Services\HealthInsuranceService;
use Exception;
use Illuminate\Http\Request;

class HealthInsuranceController extends Controller
{
    protected HealthInsuranceService $healthInsuranceService;
    public function __construct(HealthInsuranceService $healthInsuranceService)
    {
        $this->healthInsuranceService = $healthInsuranceService;
    }


    public function index()
    {
        try {
            $healthInsurance = $this->healthInsuranceService->all();
            if ($healthInsurance->isEmpty()) {
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new HealthInsuranceCollection($healthInsurance));
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
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
            $healthInsurance = $this->healthInsuranceService->save($request);
            return $this->created(new HealthInsuranceResource($healthInsurance));
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $healthInsurance = $this->healthInsuranceService->find($id);
            if ($healthInsurance) {
                return $this->okWithResource(new HealthInsuranceResource($healthInsurance));
            }
            return $this->notFound();
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    /*public function edit(Health_insurance $health_insurance)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $healthInsurance = $this->healthInsuranceService->find($id);
            if ($healthInsurance) {
                $healthInsurance = $this->healthInsuranceService->update($request, $id);
                return $this->okWithResource(new HealthInsuranceResource($healthInsurance));
            }
            return $this->notFound();
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $healthInsurance = $this->healthInsuranceService->find($id);
            if ($healthInsurance) {
                $this->healthInsuranceService->delete($id);
                return $this->deleted(new EmptyResource($healthInsurance));
            }
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }
}
