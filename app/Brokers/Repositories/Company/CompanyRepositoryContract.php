<?php

namespace App\Brokers\Repositories\Company;
use App\Models\Company;

interface CompanyRepositoryContract
{
    /**
     * Cria uma empresa
     * @param Company $company
     */
    function create(Company $company) : Company;
}