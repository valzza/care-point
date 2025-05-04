<?php
namespace App\Repositories;

use App\Models\Rating;
use App\Repositories\IEloquent\IRatingRepository;

class RatingRepository extends BaseRepository implements IRatingRepository
{
    public function __construct(Rating $model)
    {
        parent::__construct($model);
    }
    
}