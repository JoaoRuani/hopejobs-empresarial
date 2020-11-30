<?php

namespace App\Models;

use App\Enums\HiringTypes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array $guarded
     */
    protected $guarded = ['id'];

    protected $casts = [
        'hiringType' => HiringTypes::class
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Applicant::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function hiringPhases(): HasMany
    {
        return $this->hasMany(HiringPhase::class);
    }

    public function JobRole(): BelongsTo
    {
        return $this->belongsTo(JobRole::class);
    }

}
