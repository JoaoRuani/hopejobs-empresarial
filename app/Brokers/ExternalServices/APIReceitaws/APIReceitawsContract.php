<?php

namespace App\Brokers\ExternalServices\APIReceitaws;

use App\Responses\APIReceitaws\CompanyByCnpjResponse;

interface APIReceitawsContract
{
    /**
     * Get a company from ReceitaWS by CNPJ
     * @param string $cnpj
     * @return CompanyByCnpjResponse
     */
    function GetCompanyByCnpj(string $cnpj) : CompanyByCnpjResponse;
}
