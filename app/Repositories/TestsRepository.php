<?php

namespace App\Repositories;

use App\Models\Tests;
use App\Repositories\IEloquent\ITestsRepository;

class TestsRepository extends BaseRepository implements ITestsRepository
{
    public function __construct(Tests $model)
    {
        parent::__construct($model);
    }
}
