<?php

namespace App\Services;

use App\Repositories\NurseRepository;

class NurseService extends BaseService
{
    protected $nurseRepository;
    public function __construct(NurseRepository $nurseRepository)
    {
        parent::__construct($nurseRepository);
        $this->nurseRepository = $nurseRepository;
    }
}