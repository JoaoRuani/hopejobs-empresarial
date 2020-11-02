<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HiringPhase extends Model
{
    public function job() : BelongsTo
    {
        return $this->belongsTo('App\Models\Job');
    }
}
