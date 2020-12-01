<?php

namespace App\Services\Company;

use App\Brokers\ExternalServices\APIReceitaws\APIReceitawsContract;
use App\Brokers\Repositories\Company\CompanyRepositoryContract;
use App\Models\Company;
use App\Models\Image;
use Exception;
use Illuminate\Support\Str;


class CompanyService implements CompanyServiceContract
{
    private CompanyRepositoryContract $repository;
    private APIReceitawsContract $apiReceita;
    public function __construct(CompanyRepositoryContract $repository, APIReceitawsContract $apiReceita)
    {
        $this->repository = $repository;
        $this->apiReceita = $apiReceita;
    }
    public function createByCnpj(string $cnpj) : Company
    {
        try {
            if(Company::where('cnpj', $cnpj)->first())
            {
                throw new Exception('Já existe uma empresa cadastrada com esse CNPJ.');
            }
            $response = $this->apiReceita->GetCompanyByCnpj($cnpj);
            if($response == null)
            {
                throw new Exception('Não foi identificada uma empresa com esse CNPJ.');
            }
            $slug = empty($response->fantasia) ? $response->nome : $response->fantasia;
             $this->repository->Create(new Company([
                'cnpj' => $cnpj,
                'slug' => Str::slug($slug, '-', config('app.locale')),
                'trading_name' => $response->fantasia === "" ? $response->nome : $response->fantasia,
                'name' => $response->nome
            ]), new Image(['url' => url('/images/default-logo.svg')]));
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
