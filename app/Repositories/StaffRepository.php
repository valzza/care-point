<?php

namespace App\Repositories;

use App\Models\Staff;
use App\Repositories\IEloquent\IStaffRepository;

class StaffRepository extends BaseRepository implements IStaffRepository
{
    public function __construct(Staff $model)
    {
        parent::__construct($model);
    }
}