<?php

namespace Exolnet\Format\Tests\Unit\Formats;

use Exolnet\Format\Formats\NullFormat;
use PHPUnit\Framework\TestCase;

class NullFormatTest extends TestCase
{
    /**
     * @return void
     */
    public function testReturnsAnEmptyString(): void
    {
        $format = new NullFormat();

        $this->assertEquals('', (string)$format);
    }

    /**
     * @return void
     */
    public function testEmptyTextCanBeDefined(): void
    {
        $format = new NullFormat('-');

        $this->assertEquals('-', (string)$format);
    }

    /**
     * @return void
     */
    public function testAllMethodsAreProxied(): void
    {
        $format = new NullFormat();

        $this->assertEquals($format, $format->foo()->bar()->baz());
    }
}
