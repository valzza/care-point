<?php

namespace App\Services;

use App\Repositories\StaffRepository;

class StaffService extends BaseService
{
    protected $staffRepository;
    public function __construct(StaffRepository $staffRepository)
    {
        parent::__construct($staffRepository);
        $this->staffRepository = $staffRepository;
    }
}