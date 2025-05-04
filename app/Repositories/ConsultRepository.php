<?php

namespace App\Repositories;

use App\Models\Consult;
use App\Repositories\IEloquent\IConsultRepository;

class ConsultRepository extends BaseRepository implements IConsultRepository
{
    public function __construct(Consult $model)
    {
        parent::__construct($model);
    }
}