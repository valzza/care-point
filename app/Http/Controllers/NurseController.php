<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\NurseCollection;
use App\Http\Resources\NurseResource;
use App\Models\Nurse;
use App\Services\NurseService;
use Exception;
use Illuminate\Http\Request;

class NurseController extends Controller
{

    protected NurseService $nurseService;
    public function __construct(NurseService $nurseService)
    {
        $this->nurseService = $nurseService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $nurse=$this->nurseService->all();
            if($nurse->isEmpty()){
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new NurseCollection($nurse));
        }catch(Exception $e){
            return $this->respondError('Something went wrong! ' .$e);
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
            $nurse=$this->nurseService->save($request);
            return $this->created(new NurseResource($nurse));
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
            $nurse=$this->nurseService->find($id);
            if($nurse){
                return $this->okWithResource(new NurseResource($nurse));
            }
            return $this->notFound();
        }catch(Exception $e){
            return $this->respondError('Something went wrong! ' .$e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nurse $nurse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $nurse=$this->nurseService->find($id);
            if($nurse){
                $nurse=$this->nurseService->update($request,$id);
                return $this->okWithResource(new NurseResource($nurse));
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
            $nurse=$this->nurseService->find($id);
            if($nurse){
                $this->nurseService->delete($id);
                return $this->deleted(new EmptyResource($nurse));
            }
        }catch(Exception $e){
            return $this->respondError('Something went wrong! ' .$e);
        }
    }
}
