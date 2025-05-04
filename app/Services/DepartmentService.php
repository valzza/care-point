<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;

class DepartmentService extends BaseService
{
    protected $departmentRepository;
    public function __construct(DepartmentRepository $departmentRepository)
    {
        parent::__construct($departmentRepository);
        $this->departmentRepository = $departmentRepository;
    }
}
