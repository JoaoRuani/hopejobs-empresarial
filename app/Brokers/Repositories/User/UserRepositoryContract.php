<?php

namespace App\Brokers\Repositories\User;

use App\Models\Company;
use App\Models\User;

interface UserRepositoryContract
{
    /**
     * Cria o usuário relacionado com a empresa
     */
    function create(User $user, Company $company) : User;
}