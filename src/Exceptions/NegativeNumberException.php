<?php

namespace NickBeen\NintendoConverter\Exceptions;

use Exception;

class NegativeNumberException extends Exception
{
    public $message = 'Negative numbers are not allowed.';
}
