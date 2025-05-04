<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\HistoryCollection;
use App\Http\Resources\HistoryResource;
use App\Services\HistoryService;
use Exception;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    protected HistoryService $historyService;
    public function __construct(HistoryService $historyService)
    {
        $this->historyService = $historyService;
    }
    public function index()
    {
        try {
            $history = $this->historyService->all();
            if ($history->isEmpty()) {
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new HistoryCollection($history));
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
            $history = $this->historyService->save($request);
            return $this->created(new HistoryResource($history));
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {
        try {
            $history = $this->historyService->find($id);
            if ($history) {
                return $this->okWithResource(new HistoryResource($history));
            }
            return $this->notFound();
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, History $history)
    {
        try {
            $history = $this->historyService->find($id);
            if ($history) {
                $history = $this->historyService->update($request, $id);
                return $this->okWithResource(new HistoryResource($history));
            }
            return $this->notFound();
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        try {
            $history = $this->historyService->find($id);
            if ($history) {
                $this->historyService->delete($id);
                return $this->deleted(new EmptyResource($history));
            }
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }
}
