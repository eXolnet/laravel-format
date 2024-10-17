<?php

namespace Exolnet\Format\Tests\Unit\Formats;

use Exolnet\Format\Formats\NumberFormat;
use PHPUnit\Framework\TestCase;

class NumberFormatTest extends TestCase
{
    /**
     * @param float $value
     * @param int $places
     * @param string $expected
     * @dataProvider provideTestNumber
     */
    public function testNumber(float $value, int $places, string $expected)
    {
        $format = new NumberFormat($value, $places);

        $format->locale('en_US');

        $this->assertEquals($expected, (string)$format);
    }

    /**
     * @return array
     */
    public static function provideTestNumber()
    {
        return [
            [0.00, 0, '0'],
            [0.00, 1, '0.0'],
            [0.00, 2, '0.00'],
            [0.25, 0, '0'],
            [0.25, 1, '0.3'],
            [0.25, 2, '0.25'],
            [1.00, 0, '1'],
            [1.00, 1, '1.0'],
            [1.00, 2, '1.00'],
            [1.25, 0, '1'],
            [1.25, 1, '1.3'],
            [1.25, 2, '1.25'],
        ];
    }
}
