<?php

namespace App\Brokers\Repositories\Company;
use App\Models\Company;
use App\Models\Image;
use InvalidArgumentException;

class CompanyRepository implements CompanyRepositoryContract
{
    public function create(Company $company, Image $logo) : Company
    {
        if ($company === null) {
            throw new InvalidArgumentException('Argumento company não pode ser nulo.');
        }
        if($logo === null)
        {
            throw new InvalidArgumentException('Argumento logo não pode ser nulo.');
        }

        try {
            $company->save();
            $company->image()->save($logo);
            return $company;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
