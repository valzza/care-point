<?php

namespace App\Services;

use App\Repositories\HistoryRepository;

class HistoryService extends BaseService
{
    protected $historyRepository;
    public function __construct(HistoryRepository $historyRepository)
    {
        parent::__construct($historyRepository);
        $this->historyRepository = $historyRepository;
    }
}
