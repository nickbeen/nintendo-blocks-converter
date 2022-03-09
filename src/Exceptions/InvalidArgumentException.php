<?php

namespace NickBeen\NintendoConverter\Exceptions;

use Exception;

class InvalidArgumentException extends Exception
{
    public $message = 'Cannot use a negative number.';
}
