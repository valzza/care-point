<?php

namespace App\Services;

use App\Repositories\ReportRepository;

class ReportService extends BaseService
{
    protected $reportRepository;
    public function __construct(ReportRepository $reportRepository)
    {
        parent::__construct($reportRepository);
        $this->reportRepository = $reportRepository;
    }
}
