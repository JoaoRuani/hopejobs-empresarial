<?php

namespace App\Brokers\Repositories\User;

use App\Brokers\Repositories\Company\CompanyRepositoryContract;
use App\Models\Company;
use App\Models\User;
use InvalidArgumentException;

class UserRepository implements UserRepositoryContract
{
    private CompanyRepositoryContract $companyRepository;
    public function __construct(CompanyRepositoryContract $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }
    public function create(User $user, Company $company) : User
    {
        if ($user == null) { throw new InvalidArgumentException('Argumento user não pode ser nulo.');}
        if ($company == null) { throw new InvalidArgumentException('Argumento company não pode ser nulo.');}
        try {
            $company->users()->save($user);
            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}