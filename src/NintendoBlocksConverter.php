<?php

namespace NickBeen\NintendoBlocksConverter;

use NickBeen\NintendoBlocksConverter\Exceptions\InvalidArgumentException;
use NickBeen\NintendoBlocksConverter\Exceptions\NegativeNumberException;
use NickBeen\NintendoBlocksConverter\Exceptions\UnnecessaryCalculation;

class_alias(NegativeNumberException::class, InvalidArgumentException::class);

class NintendoBlocksConverter
{
    private ?int $bytes = null;

    public function __construct(
        public ?int $blocks = null,
        public ?float $megabytes = null,
    ) {
        if (!is_null($megabytes)) {
            $this->fromMegabytes($megabytes);
        }

        return $this;
    }

    /**
     * Number of Nintendo Blocks to convert from.
     */
    public function fromBlocks(int $blocks): self
    {
        $this->blocks = $blocks;

        return $this;
    }

    /**
     * Number of megabytes to convert from.
     */
    public function fromMegabytes(int|float $megabytes): self
    {
        $this->bytes = $megabytes * pow(1024, 2);

        return $this;
    }

    /**
     * Convert Nintendo blocks to number of Megabytes
     *
     * @throws NegativeNumberException
     * @throws UnnecessaryCalculation
     */
    public function toMegabytes(): int|float
    {
        if (is_null($this->blocks)) {
            throw UnnecessaryCalculation::AlreadyInMegabytes();
        }

        if ($this->blocks < 0) {
            throw new NegativeNumberException();
        }

        return $this->blocks / pow(2, 3);
    }

    /**
     * Convert number of Megabytes to Nintendo blocks
     *
     * @throws NegativeNumberException
     * @throws UnnecessaryCalculation
     */
    public function toBlocks(): int|float
    {
        if (is_null($this->bytes)) {
            throw UnnecessaryCalculation::AlreadyinBlocks();
        }

        if ($this->bytes < 0) {
            throw new NegativeNumberException();
        }

        return $this->bytes / pow(2, 17);
    }
}
