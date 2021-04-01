<?php

namespace Exolnet\Format\Tests\Unit\Formats;

use Exolnet\Format\Formats\FractionFormat;
use PHPUnit\Framework\TestCase;

class FractionFormatTest extends TestCase
{
    /**
     * @param float $value
     * @param int $denominator
     * @param string $expected
     * @dataProvider provideTestFraction
     */
    public function testFraction(float $value, int $denominator, string $expected)
    {
        $format = new FractionFormat($value, $denominator);

        $this->assertEquals($expected, (string)$format);
    }

    /**
     * @return array
     */
    public function provideTestFraction()
    {
        return [
            [0.25, 2, '1/2'],
            [0.25, 4, '1/4'],
            [0.25, 10, '3/10'],
            [0.25, 100, '25/100'],
            [0.25, 1000, '250/1000'],
            [0.5, 2, '1/2'],
            [0.5, 4, '2/4'],
            [0.5, 10, '5/10'],
            [0.5, 100, '50/100'],
            [0.5, 1000, '500/1000'],
            [0.75, 2, '2/2'],
            [0.75, 4, '3/4'],
            [0.75, 10, '8/10'],
            [0.75, 100, '75/100'],
            [0.75, 1000, '750/1000'],
            [1.00, 2, '2/2'],
            [1.00, 4, '4/4'],
            [1.00, 10, '10/10'],
            [1.00, 100, '100/100'],
            [1.00, 1000, '1000/1000'],
            [1.25, 2, '3/2'],
            [1.25, 4, '5/4'],
            [1.25, 10, '13/10'],
            [1.25, 100, '125/100'],
            [1.25, 1000, '1250/1000'],
        ];
    }

    /**
     * @param float $value
     * @param int $denominator
     * @param string $expected
     * @dataProvider provideTestFractionSimplified
     */
    public function testFractionSimplified(float $value, int $denominator, string $expected)
    {
        $format = (new FractionFormat($value, $denominator))->simplified();

        $this->assertEquals($expected, (string)$format);
    }

    /**
     * @return array
     */
    public function provideTestFractionSimplified()
    {
        return [
            [0.25, 2, '1/2'],
            [0.25, 4, '1/4'],
            [0.25, 10, '3/10'],
            [0.25, 100, '1/4'],
            [0.25, 1000, '1/4'],
            [0.5, 2, '1/2'],
            [0.5, 4, '1/2'],
            [0.5, 10, '1/2'],
            [0.5, 100, '1/2'],
            [0.5, 1000, '1/2'],
            [0.75, 2, '1'],
            [0.75, 4, '3/4'],
            [0.75, 10, '4/5'],
            [0.75, 100, '3/4'],
            [0.75, 1000, '3/4'],
            [1.00, 2, '1'],
            [1.00, 4, '1'],
            [1.00, 10, '1'],
            [1.00, 100, '1'],
            [1.00, 1000, '1'],
            [1.25, 2, '3/2'],
            [1.25, 4, '5/4'],
            [1.25, 10, '13/10'],
            [1.25, 100, '5/4'],
            [1.25, 1000, '5/4'],
        ];
    }
}
