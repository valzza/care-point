<?php

namespace App\Services;

use App\Repositories\DepartmentStaffRepository;

class DepartmentStaffService extends BaseService
{
    protected $departmentStaffRepository;
    public function __construct(DepartmentStaffRepository $departmentStaffRepository)
    {
        parent::__construct($departmentStaffRepository);
        $this->departmentStaffRepository = $departmentStaffRepository;
    }
}
