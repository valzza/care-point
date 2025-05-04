<?php

namespace App\Services;

use App\Repositories\RatingRepository;

class RatingService extends BaseService
{
    protected $ratingRepository;
    public function __construct(RatingRepository $ratingRepository)
    {
        parent::__construct($ratingRepository);
        $this->ratingRepository = $ratingRepository;
    }
}
