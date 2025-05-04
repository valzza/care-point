<?php

namespace App\Services;

use App\Repositories\MedicalCardRepository;

class MedicalCardService extends BaseService
{
    protected $medicalCardRepository;
    public function __construct(MedicalCardRepository $medicalCardRepository)
    {
        parent::__construct($medicalCardRepository);
        $this->medicalCardRepository = $medicalCardRepository;
    }
}
