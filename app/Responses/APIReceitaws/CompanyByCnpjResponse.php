<?php

namespace App\Responses\APIReceitaws;

use App\Responses\BaseResponse;
/**
 * Representa o retorno da consulta de uma empresa na api da receita
 */
class CompanyByCnpjResponse
{
    use BaseResponse;
    public array $atividade_principal;
    public string $nome;
    public string $uf;
    public string $fantasia;
}
