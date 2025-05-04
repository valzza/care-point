<?php

namespace App\Services;

use App\Repositories\PaymentRepository;

class PaymentService extends BaseService
{
    protected $paymentRepository;
    public function __construct(PaymentRepository $paymentRepository)
    {
        parent::__construct($paymentRepository);
        $this->paymentRepository = $paymentRepository;
    }
}
