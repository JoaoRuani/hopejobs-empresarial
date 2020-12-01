<?php

namespace App\Brokers\Repositories\Company;
use App\Models\Company;
use App\Models\Image;

interface CompanyRepositoryContract
{
    /**
     * Cria uma empresa
     * @param Company $company
     */
    function create(Company $company, Image $logo) : Company;
}
