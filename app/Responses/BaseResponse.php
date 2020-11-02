<?php
namespace App\Responses;
/**
 * Util na criação de responses para API, construtor permite receber um array preenche
 * os atributos da response
 */
trait BaseResponse 
{
    public function __construct(Array $properties = [])
    {
        // Thanks to https://stackoverflow.com/questions/2715465/converting-a-php-array-to-class-variables
        foreach($properties as $key => $value){
            if(property_exists(self::class, $key))
            {
                $this->{$key} = $value;
            }
        }
    }
}
