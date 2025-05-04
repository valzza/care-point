<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\MedicalCardCollection;
use App\Http\Resources\MedicalCardResource;
use App\Models\MedicalCard;
use App\Services\MedicalCardService;
use Exception;
use Illuminate\Http\Request;

class MedicalCardController extends Controller
{

    protected MedicalCardService $medicalCardService;
    public function __construct(MedicalCardService $medicalCardService)
    {
        $this->medicalCardService = $medicalCardService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $medicalCard = $this->medicalCardService->all();
            if($medicalCard->isEmpty()){
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new MedicalCardCollection($medicalCard));
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
            $medicalCard=$this->medicalCardService->save($request);
            return $this->created(new MedicalCardResource($medicalCard));
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
            $medicalCard=$this->medicalCardService->find($id);
            if($medicalCard){
                return $this->okWithResource(new MedicalCardResource($medicalCard));
            }
            return $this->notFound();
        }catch (Exception $e){
            return $this->respondError('Something went wrong!', $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalCard $medicalCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $medicalCard=$this->medicalCardService->find($id);
            if($medicalCard){
                $medicalCard=$this->medicalCardService->update($request,$id);
                return $this->okWithResource(new MedicalCardResource($medicalCard));
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
            $medicalCard=$this->medicalCardService->find($id);
            if($medicalCard){
                $this->medicalCardService->delete($id);
                return $this->deleted(new EmptyResource($medicalCard));
            }
        }catch (Exception $e){
            return $this->respondError('Something went wrong!', $e);
        }
    }
}
