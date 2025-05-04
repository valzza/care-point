<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;

class DepartmentService extends BaseService
{
    protected $DepartmentRepository;
    public function __construct(DepartmentRepository $DepartmentRepository)
    {
        parent::__construct($DepartmentRepository);
        $this->DepartmentRepository = $DepartmentRepository;
    }
}
