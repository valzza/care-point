<?php

namespace App\Services;

use App\Repositories\ConsultRepository;

class ConsultService extends BaseService
{
    protected $consultRepository;
    public function __construct(ConsultRepository $consultRepository)
    {
        parent::__construct($consultRepository);
        $this->consultRepository = $consultRepository;
    }
}