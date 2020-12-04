<?php

namespace App\Models;

use App\Enums\ApplicationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Represents a job application
 * Class Applicant
 * @package App\Models
 */
class Applicant extends Model
{
    protected $guarded = ['id', 'job_id'];
    protected $casts = [
        'status' => ApplicationStatus::class
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo('App\Models\Job');
    }
}
