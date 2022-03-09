<?php

namespace NickBeen\NintendoConverter\Exceptions;

use Exception;

class UnnecessaryCalculation extends Exception
{
    /**
     * @return static
     */
    public static function AlreadyinBlocks(): static
    {
        return new static('Cannot convert blocks to blocks. Are you trying to convert to Megabytes?');
    }

    /**
     * @return static
     */
    public static function AlreadyinMegabytes(): static
    {
        return new static('Cannot convert Megabytes to Megabytes. Are you trying to convert to blocks?');
    }
}
