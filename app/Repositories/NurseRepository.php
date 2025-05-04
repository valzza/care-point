<?php

namespace App\Repositories;

use App\Models\Nurse;
use App\Repositories\IEloquent\INurseRepository;

class NurseRepository extends BaseRepository implements INurseRepository
{
    public function __construct(Nurse $model)
    {
        parent::__construct($model);
    }
}
