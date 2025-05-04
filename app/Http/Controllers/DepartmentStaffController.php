<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\DepartmentStaffCollection;
use App\Http\Resources\DepartmentStaffResource;
use App\Models\DepartmentStaff;
use App\Services\DepartmentStaffService;
use Exception;
use Illuminate\Http\Request;

class DepartmentStaffController extends Controller
{
    protected DepartmentStaffService $departmentStaffService;
    public function __construct(DepartmentStaffService $departmentStaffService)
    {
        $this->departmentStaffService = $departmentStaffService;
    }

    public function index()
    {
        try {
            $departmentStaff = $this->departmentStaffService->all();
            if ($departmentStaff->isEmpty()) {
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new DepartmentStaffCollection($departmentStaff));
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
            $departmentStaff = $this->departmentStaffService->save($request);
            return $this->created(new DepartmentStaffResource($departmentStaff));
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
            $departmentStaff = $this->departmentStaffService->find($id);
            if ($departmentStaff) {
                return $this->okWithResource(new DepartmentStaffResource($departmentStaff));
            }
            return $this->notFound();
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DepartmentStaff $departmentStaff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $departmentStaff = $this->departmentStaffService->find($id);
            if ($departmentStaff) {
                $departmentStaff = $this->departmentStaffService->update($request, $id);
                return $this->okWithResource(new DepartmentStaffResource($departmentStaff));
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
            $departmentStaff = $this->departmentStaffService->find($id);
            if ($departmentStaff) {
                $this->departmentStaffService->delete($id);
                return $this->deleted(new EmptyResource($departmentStaff));
            }
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }
}
