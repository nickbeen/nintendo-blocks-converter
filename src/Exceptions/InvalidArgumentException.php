<?php

namespace NickBeen\NintendoBlocksConverter\Exceptions;

use Exception;

/**
 * @deprecated since 1.2.0, use NegativeNumberException instead
 */
class InvalidArgumentException extends Exception
{
    public $message = 'Cannot use a negative number.';
}
