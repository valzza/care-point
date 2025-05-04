<?php

namespace App\Services;

use App\Repositories\TestsRepository;

class TestsService extends BaseService
{
    protected $testsRepository;
    public function __construct(TestsRepository $testsRepository)
    {
        parent::__construct($testsRepository);
        $this->testsRepository = $testsRepository;
    }
}
