<?php

namespace App\Brokers\ExternalServices\APIReceitaws;

use App\Responses\APIReceitaws\CompanyByCnpjResponse;
use Illuminate\Support\Facades\Http;

class APIReceitaws implements APIReceitawsContract
{
    const ENDPOINT = "https://www.receitaws.com.br/v1";

    public function GetCompanyByCnpj(string $cnpj) : CompanyByCnpjResponse
    {
        $response = Http::get(self::ENDPOINT."/cnpj/$cnpj");
        if($response->successful())
        {
            return new CompanyByCnpjResponse($response->json());
        }
        return null;
    }
}