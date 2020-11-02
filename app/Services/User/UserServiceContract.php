<?php

namespace App\Services\User;

use App\Models\User;
interface UserServiceContract
{
    /**
     * Cria o usuário e sua empresa relacionada
     */
    function create(User $user, string $cnpj) : User;
}