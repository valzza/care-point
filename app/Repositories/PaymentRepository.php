<?php
namespace App\Repositories;

use App\Models\Payment;
use App\Repositories\IEloquent\IPaymentRepository;

class PaymentRepository extends BaseRepository implements IPaymentRepository
{
    public function __construct(Payment $model)
    {
        parent::__construct($model);
    }
    
}