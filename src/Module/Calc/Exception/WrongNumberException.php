<?php

namespace Calc\Exception;

use Exception;

class WrongNumberException extends Exception
{
    /**
     * @return WrongNumberException
     */
    public static function divideByNull(): WrongNumberException
    {
        return new self('Nie można wykonać dzielenia przez 0');
    }
}