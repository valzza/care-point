<?php
namespace App\Repositories;

use App\Models\Report;
use App\Repositories\IEloquent\IReportRepository;

class ReportRepository extends BaseRepository implements IReportRepository
{
    public function __construct(Report $model)
    {
        parent::__construct($model);
    }
    
}