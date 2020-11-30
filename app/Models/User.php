<?php

namespace App\Models;

use App\Enums\UserRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;

/**
 * Class User
 * @package App\Models
 * @property Company $company
 */
class User extends Authenticatable implements \OwenIt\Auditing\Contracts\Auditable
{
    use HasFactory, Notifiable, Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'cpf'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => UserRoles::class
    ];

    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function getFullName() : string
    {
        return "{$this->first_name} {$this->last_name}";
    }

}
