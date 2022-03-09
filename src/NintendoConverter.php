<?php

namespace NickBeen\NintendoConverter;

use NickBeen\NintendoConverter\Exceptions\InvalidArgumentException;
use NickBeen\NintendoConverter\Exceptions\UnnecessaryCalculation;

class NintendoConverter
{
    public function __construct(
        public int $blocks = 0,
        public float $megabytes = 0.0
    ) {
        return $this;
    }

    /**
     * Convert Nintendo blocks to number of Megabytes
     *
     * @return float
     * @throws UnnecessaryCalculation|InvalidArgumentException
     */
    public function toMegabytes(): float
    {
        if ($this->blocks === 0) {
            throw UnnecessaryCalculation::AlreadyInMegabytes();
        }

        if ($this->blocks < 0) {
            throw new InvalidArgumentException();
        }

        return $this->blocks / 8;
    }

    /**
     * Convert number of Megabytes to Nintendo blocks
     *
     * @return int|float
     * @throws UnnecessaryCalculation| InvalidArgumentException
     */
    public function toBlocks(): int|float
    {
        if ($this->megabytes === 0.0) {
            throw UnnecessaryCalculation::AlreadyinBlocks();
        }

        if ($this->megabytes < 0) {
            throw new InvalidArgumentException();
        }

        return $this->megabytes * 8;
    }
}
