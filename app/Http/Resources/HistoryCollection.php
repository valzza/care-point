<?php

namespace App\Http\Resources;

use App\Http\Resources\AbstractJsonCollection;

class HistoryCollection extends AbstractJsonCollection
{
    public function getModelName()
    {
        return 'History';
    }
}