<?php
namespace App\Repositories;

use App\Models\Diagnose;
use App\Repositories\IEloquent\IDiagnoseRepository;

class DiagnoseRepository extends BaseRepository implements IDiagnoseRepository
{
    public function __construct(Diagnose $model)
    {
        parent::__construct($model);
    }
    
}