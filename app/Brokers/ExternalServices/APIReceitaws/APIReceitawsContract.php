<?php 

namespace App\Brokers\ExternalServices\APIReceitaws;

use App\Responses\APIReceitaws\CompanyByCnpjResponse;

interface APIReceitawsContract
{
    function GetCompanyByCnpj(string $cnpj) : CompanyByCnpjResponse;
}