<?php

namespace NickBeen\NintendoConverter;

use NickBeen\NintendoConverter\Exceptions\InvalidArgumentException;
use NickBeen\NintendoConverter\Exceptions\UnnecessaryCalculation;

class NintendoConverter
{
    public function __construct(
        public ?int $blocks = null,
        public ?float $megabytes = null,
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
        if (is_null($this->blocks)) {
            throw UnnecessaryCalculation::AlreadyInMegabytes();
        }

        if ($this->blocks < 0) {
            throw new InvalidArgumentException();
        }

        return $this->blocks / pow(2, 3);
    }

    /**
     * Convert number of Megabytes to Nintendo blocks
     *
     * @return int|float
     * @throws UnnecessaryCalculation| InvalidArgumentException
     */
    public function toBlocks(): int|float
    {
        if (is_null($this->megabytes)) {
            throw UnnecessaryCalculation::AlreadyinBlocks();
        }

        if ($this->megabytes < 0) {
            throw new InvalidArgumentException();
        }

        return $this->megabytes * pow(2, 3);
    }
}
