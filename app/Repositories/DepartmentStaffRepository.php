<?php

namespace App\Repositories;

use App\Models\DepartmentStaff;
use App\Repositories\IEloquent\IDepartmentStaffRepository;

class DepartmentStaffRepository extends BaseRepository implements IDepartmentStaffRepository
{
    public function __construct(DepartmentStaff $model)
    {
        parent::__construct($model);
    }
}
