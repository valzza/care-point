<?php
namespace App\Repositories;

use App\Models\History;
use App\Repositories\IEloquent\IHistoryRepository;

class HistoryRepository extends BaseRepository implements IHistoryRepository
{
    public function __construct(History $model)
    {
        parent::__construct($model);
    }
    
}