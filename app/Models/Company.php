<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Company extends Model
{
    protected $fillable = [
        'cnpj',
        'name',
        'slug',
        'trading_name'
    ];

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function image() : MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
