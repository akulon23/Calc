<?php
namespace Application\Helpers;

class Params
{
    /**
     * Funkcja pobiera wartosc z tablicy superglobalnej $_POST lub zwraca domyslna wartosc
     * @param string $paramName Nazwa pobieranego parametru
     * @param mixed $defaultValue Wartosc domyślna
     * @return mixed Wartosc parametru
     */
    public function getPostParam(string $paramName, $defaultValue)
    {
        if (array_key_exists($paramName, $_POST)) {
            return $_POST[$paramName];
        }
        return $defaultValue;
    }
}