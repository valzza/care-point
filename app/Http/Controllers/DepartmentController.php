<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\DepartmentCollection;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use App\Services\DepartmentService;
use Exception;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected DepartmentService $departmentService;
    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function index()
    {
        try {
            $department = $this->departmentService->all();
            if ($department->isEmpty()) {
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new DepartmentCollection($department));
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
            $department = $this->departmentService->save($request);
            return $this->created(new DepartmentResource($department));
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
            $department = $this->departmentService->find($id);
            if ($department) {
                return $this->okWithResource(new DepartmentResource($department));
            }
            return $this->notFound();
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $department = $this->departmentService->find($id);
            if ($department) {
                $department = $this->departmentService->update($request, $id);
                return $this->okWithResource(new DepartmentResource($department));
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
            $department = $this->departmentService->find($id);
            if ($department) {
                $this->departmentService->delete($id);
                return $this->deleted(new EmptyResource($department));
            }
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }
}
