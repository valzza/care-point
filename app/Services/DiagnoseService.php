<?php

namespace App\Services;

use App\Repositories\DiagnoseRepository;

class DiagnoseService extends BaseService
{
    protected $diagnoseRepository;
    public function __construct(DiagnoseRepository $diagnoseRepository)
    {
        parent::__construct($diagnoseRepository);
        $this->diagnoseRepository = $diagnoseRepository;
    }
}
