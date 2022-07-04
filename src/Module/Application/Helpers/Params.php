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

    /**
     * Funkcja pobiera wartość z tablicy superglobalnej $_GET lub zwraca domyslna wartosc
     * @param $paramName Nazwa pobieranego parametru
     * @param $defaultValue Wartosc domyslna
     * @return mixed Wartosc parametru
     */
    public function getParam($paramName, $defaultValue){
        if (array_key_exists($paramName, $_GET)){
            return $_GET[$paramName];
        }
        return $defaultValue;
    }
}