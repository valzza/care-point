<?php

namespace App\Repositories;

use App\Models\Department;
use App\Repositories\IEloquent\IDepartmentRepository;

class DepartmentRepository extends BaseRepository implements IDepartmentRepository
{
    public function __construct(Department $model)
    {
        parent::__construct($model);
    }
}
