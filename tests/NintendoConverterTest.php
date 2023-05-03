<?php

namespace NickBeen\NintendoConverter\Tests;

use NickBeen\NintendoConverter\Exceptions\NegativeNumberException;
use NickBeen\NintendoConverter\Exceptions\UnnecessaryCalculation;
use NickBeen\NintendoConverter\NintendoConverter;
use PHPUnit\Framework\TestCase;

class NintendoConverterTest extends TestCase
{
    /**
     * @test
     * @throws NegativeNumberException
     * @throws UnnecessaryCalculation
     */
    public function it_can_convert_blocks_to_megabytes()
    {
        $nC = new NintendoConverter();
        $megabytes = $nC->fromBlocks(8)->toMegabytes();

        $this->assertEquals(1, $megabytes);
    }

    /**
     * @test
     * @throws NegativeNumberException
     * @throws UnnecessaryCalculation
     */
    public function it_can_convert_megabytes_to_blocks()
    {
        $nC = new NintendoConverter();
        $blocks = $nC->fromMegabytes(1)->toBlocks();

        $this->assertEquals(8, $blocks);
    }

    /**
     * @test
     * @throws NegativeNumberException
     * @throws UnnecessaryCalculation
     */
    public function it_cannot_convert_blocks_to_blocks()
    {
        $this->expectException(UnnecessaryCalculation::class);

        $blocks = new NintendoConverter(blocks: 8);
        $blocks = $blocks->toBlocks();

        $this->assertEquals(8, $blocks);
    }

    /**
     * @test
     * @throws NegativeNumberException
     * @throws UnnecessaryCalculation
     */
    public function it_cannot_convert_megabytes_to_megabytes()
    {
        $this->expectException(UnnecessaryCalculation::class);

        $megabytes = new NintendoConverter(megabytes: 8);
        $megabytes = $megabytes->toMegabytes();

        $this->assertEquals(8, $megabytes);
    }

    /**
     * @test
     * @throws NegativeNumberException
     * @throws UnnecessaryCalculation
     */
    public function it_cannot_convert_negative_number_of_blocks()
    {
        $this->expectException(NegativeNumberException::class);

        $blocks = new NintendoConverter(blocks: -8);
        $megabytes = $blocks->toMegabytes();

        $this->assertEquals(-1, $megabytes);
    }

    /**
     * @test
     * @throws NegativeNumberException
     * @throws UnnecessaryCalculation
     */
    public function it_cannot_convert_negative_number_of_megabytes()
    {
        $this->expectException(NegativeNumberException::class);

        $megabytes = new NintendoConverter(megabytes: -1);
        $blocks = $megabytes->toBlocks();

        $this->assertEquals(-8, $blocks);
    }
}
