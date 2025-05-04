<?php

namespace App\Services;

use App\Repositories\AdminRepository;

class AdminService extends BaseService
{
    protected $adminRepository;
    public function __construct(AdminRepository $adminRepository)
    {
        parent::__construct($adminRepository);
        $this->adminRepository = $adminRepository;
    }
}