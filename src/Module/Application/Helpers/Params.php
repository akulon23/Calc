<?php

namespace Application\Helpers;

class Params
{
    /**
     * The function takes a value from the $_POST superglobal array or returns a default value
     * @param string $paramName Name of the downloaded parameter
     * @param mixed $defaultValue Default value
     * @return mixed Parameter value
     */
    public function getPostParam(string $paramName, $defaultValue)
    {
        if (array_key_exists($paramName, $_POST)) {
            return $_POST[$paramName];
        }
        return $defaultValue;
    }

    /**
     * The function takes a value from the $_GET superglobal array or returns a default value
     * @param $paramName Name of the downloaded parameter
     * @param $defaultValue Default value
     * @return mixed Parameter value
     */
    public function getParam($paramName, $defaultValue){
        if (array_key_exists($paramName, $_GET)){
            return $_GET[$paramName];
        }
        return $defaultValue;
    }
}