<?php

namespace NickBeen\NintendoBlocksConverter\Exceptions;

use Exception;

class NegativeNumberException extends Exception
{
    public $message = 'Negative numbers are not allowed.';
}
