<?php
namespace App\Repositories;

use App\Models\MedicalCard;
use App\Repositories\IEloquent\IMedicalCardRepository;

class MedicalCardRepository extends BaseRepository implements IMedicalCardRepository
{
    public function __construct(MedicalCard $model)
    {
        parent::__construct($model);
    }
    
}