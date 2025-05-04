<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\AdminCollection;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use App\Services\AdminService;
use Exception;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected AdminService $adminService;
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $admin = $this->adminService->all();
            if($admin->isEmpty()){
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new AdminCollection($admin));
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
            $admin=$this->adminService->save($request);
            return $this->created(new AdminResource($admin));
        }catch(Exception $e){
            return $this->respondError('Something went wrong! '. $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $admin=$this->adminService->find($id);
            if($admin){
                return $this->okWithResource(new AdminResource($admin));
            }
            return $this-> notFound();
        }catch(Exception $e){
            return $this->respondError('Something went wrong! ' .$e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $admin=$this->adminService->find($id);
            if($admin){
                $admin=$this->adminService->update($request,$id);
                return $this->okWithResource(new AdminResource($admin));
            }
            return $this->notFound();
        }catch(Exception $e){
            return $this->respondError('Something went wrong! '.$e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $admin=$this->adminService->find($id);
            if($admin){
                $this->adminService->delete($id);
                return $this->deleted(new EmptyResource($admin));
            }
        }catch(Exception $e){
            return $this->respondError('Something went wrong! ' .$e);
        }
    }
}
