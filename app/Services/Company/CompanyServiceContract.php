<?php

namespace App\Services\Company;

use App\Models\Company;

interface CompanyServiceContract
{
    /**
     * Cria uma empresa a partir de um cnpj, preenche automaticamento os dados por meio
     * de consulta por cnpj
     */
    function createByCnpj(string $cnpj) : Company;
}