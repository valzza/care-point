<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\TestsCollection;
use App\Http\Resources\TestsResource;
use App\Models\Tests;
use App\Services\TestsService;
use Exception;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    protected TestsService $testsService;
    public function __construct(TestsService $testsService)
    {
        $this->testsService = $testsService;
    }

    public function index()
    {
        try {
            $tests = $this->testsService->all();
            if ($tests->isEmpty()) {
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new TestsCollection($tests));
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
            $tests = $this->testsService->save($request);
            return $this->created(new TestsResource($tests));
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
            $tests = $this->testsService->find($id);
            if ($tests) {
                return $this->okWithResource(new TestsResource($tests));
            }
            return $this->notFound();
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tests $tests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $tests = $this->testsService->find($id);
            if ($tests) {
                $tests = $this->testsService->update($request, $id);
                return $this->okWithResource(new TestsResource($tests));
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
            $tests = $this->testsService->find($id);
            if ($tests) {
                $this->testsService->delete($id);
                return $this->deleted(new EmptyResource($tests));
            }
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }
}
