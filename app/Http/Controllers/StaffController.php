<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\StaffCollection;
use App\Http\Resources\StaffResource;
use App\Models\Staff;
use App\Services\StaffService;
use Exception;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    protected StaffService $staffService;
    public function __construct(StaffService $staffService)
    {
        $this->staffService = $staffService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $staff = $this->staffService->all();
            if($staff->isEmpty()){
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new StaffCollection($staff));
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
            $staff=$this->staffService->save($request);
            return $this->created(new StaffResource($staff));
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
            $staff=$this->staffService->find($id);
            if($staff){
                return $this->okWithResource(new StaffResource($staff));
            }
            return $this->notFound();
        }catch (Exception $e){
            return $this->respondError('Something went wrong!', $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $staff=$this->staffService->find($id);
            if($staff){
                $staff=$this->staffService->update($request,$id);
                return $this->okWithResource(new StaffResource($staff));
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
            $staff=$this->staffService->find($id);
            if($staff){
                $this->staffService->delete($id);
                return $this->deleted(new EmptyResource($staff));
            }
        }catch (Exception $e){
            return $this->respondError('Something went wrong!', $e);
        }
    }
}
