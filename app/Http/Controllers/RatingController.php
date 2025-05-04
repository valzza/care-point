<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\RatingCollection;
use App\Http\Resources\RatingResource;
use App\Models\Rating;
use App\Services\RatingService;
use Exception;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    protected RatingService $ratingService;
    public function __construct(RatingService $ratingService)
    {
        $this->ratingService = $ratingService;
    }

    public function index()
    {
        try {
            $rating = $this->ratingService->all();
            if ($rating->isEmpty()) {
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new RatingCollection($rating));
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
            $rating = $this->ratingService->save($request);
            return $this->created(new RatingResource($rating));
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
            $rating = $this->ratingService->find($id);
            if ($rating) {
                return $this->okWithResource(new RatingResource($rating));
            }
            return $this->notFound();
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $rating = $this->ratingService->find($id);
            if ($rating) {
                $rating = $this->ratingService->update($request, $id);
                return $this->okWithResource(new RatingResource($rating));
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
            $rating = $this->ratingService->find($id);
            if ($rating) {
                $this->ratingService->delete($id);
                return $this->deleted(new EmptyResource($rating));
            }
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }
}
