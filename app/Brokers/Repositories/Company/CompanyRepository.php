<?php

namespace App\Brokers\Repositories\Company;
use App\Models\Company;
use InvalidArgumentException;

class CompanyRepository implements CompanyRepositoryContract
{
    public function create(Company $company) : Company
    {
        if ($company == null) {
            throw new InvalidArgumentException('Argumento company não pode ser nulo.');
        }
        try {
            $company->save();
            return $company;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}