<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Repositories\IEloquent\IAdminRepository;

class AdminRepository extends BaseRepository implements IAdminRepository
{
    public function __construct(Admin $model)
    {
        parent::__construct($model);
    }
}