<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmptyResource;
use App\Http\Resources\PaymentCollection;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use App\Services\PaymentService;
use Exception;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected PaymentService $paymentService;
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        try {
            $payment = $this->paymentService->all();
            if ($payment->isEmpty()) {
                return $this->okNoRecords();
            }
            return $this->okWithCollection(new PaymentCollection($payment));
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
            $payment = $this->paymentService->save($request);
            return $this->created(new PaymentResource($payment));
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
            $payment = $this->paymentService->find($id);
            if ($payment) {
                return $this->okWithResource(new PaymentResource($payment));
            }
            return $this->notFound();
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $payment = $this->paymentService->find($id);
            if ($payment) {
                $payment = $this->paymentService->update($request, $id);
                return $this->okWithResource(new PaymentResource($payment));
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
            $payment = $this->paymentService->find($id);
            if ($payment) {
                $this->paymentService->delete($id);
                return $this->deleted(new EmptyResource($payment));
            }
        } catch (Exception $e) {
            return $this->respondError('Something went wrong!' . $e);
        }
    }
}
