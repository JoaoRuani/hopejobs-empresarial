<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobRole extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     * @var array $guarded
     */
    protected $guarded = ['id'];

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }


}
