<?php

namespace Exolnet\Format\Tests\Unit\Formats;

use Exolnet\Format\Formats\PercentageFormat;
use PHPUnit\Framework\TestCase;

class PercentageFormatTest extends TestCase
{
    /**
     * @param float $value
     * @param int $places
     * @param string $expected
     * @dataProvider provideTestPercentage
     */
    public function testPercentage(float $value, int $places, string $expected)
    {
        $format = new PercentageFormat($value, $places);

        $this->assertEquals($expected, (string)$format);
    }

    /**
     * @return array
     */
    public function provideTestPercentage()
    {
        return [
            [0.00, 0, '0%'],
            [0.00, 1, '0.0%'],
            [0.00, 2, '0.00%'],
            [0.25, 0, '25%'],
            [0.25, 1, '25.0%'],
            [0.25, 2, '25.00%'],
            [1.00, 0, '100%'],
            [1.00, 1, '100.0%'],
            [1.00, 2, '100.00%'],
            [1.25, 0, '125%'],
            [1.25, 1, '125.0%'],
            [1.25, 2, '125.00%'],
        ];
    }
}
