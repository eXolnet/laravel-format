<?php

namespace Exolnet\Format\Tests\Unit;

use Exolnet\Format\Format;

class FormatTest extends UnitTest
{
    /**
     * @var \Exolnet\Format\Format
     */
    protected $format;

    /**
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        $this->format = new Format();
    }

    /**
     * @param float $value
     * @param int $places
     * @param string $expected
     * @dataProvider provideTestNumber
     */
    public function testNumber($value, $places, $expected)
    {
        $actual = $this->format->number($value, $places);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function provideTestNumber()
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

    /**
     * @param string $locale
     * @param float $value
     * @param int $places
     * @param string $expected
     * @dataProvider provideTestCurrency
     */
    public function testCurrency($locale, $value, $places, $expected)
    {
        setlocale(LC_MONETARY, $locale);

        $actual = $this->format->currency($value, $places);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function provideTestCurrency()
    {
        return [
            ['en_US.UTF-8', 0.00, 0, '$0'],
            ['en_US.UTF-8', 0.00, 1, '$0.0'],
            ['en_US.UTF-8', 0.00, 2, '$0.00'],
            ['en_US.UTF-8', 0.25, 0, '$0'],
            ['en_US.UTF-8', 0.25, 1, '$0.2'],
            ['en_US.UTF-8', 0.25, 2, '$0.25'],
            ['en_US.UTF-8', 1.00, 0, '$1'],
            ['en_US.UTF-8', 1.00, 1, '$1.0'],
            ['en_US.UTF-8', 1.00, 2, '$1.00'],
            ['en_US.UTF-8', 1.25, 0, '$1'],
            ['en_US.UTF-8', 1.25, 1, '$1.2'],
            ['en_US.UTF-8', 1.25, 2, '$1.25'],
        ];
    }

    /**
     * @param float $value
     * @param int $places
     * @param string $expected
     * @dataProvider provideTestPercentage
     */
    public function testPercentage($value, $places, $expected)
    {
        $actual = $this->format->percentage($value, $places);

        $this->assertEquals($expected, $actual);
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

    /**
     * @param float $value
     * @param int $denominator
     * @param string $expected
     * @dataProvider provideTestFraction
     */
    public function testFraction($value, $denominator, $expected)
    {
        $actual = $this->format->fraction($value, $denominator);

        $this->assertEquals($expected, $actual);
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
    public function testFractionSimplified($value, $denominator, $expected)
    {
        $actual = $this->format->fractionSimplified($value, $denominator);

        $this->assertEquals($expected, $actual);
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
