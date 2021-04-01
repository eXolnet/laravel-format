<?php

namespace Exolnet\Format\Tests\Integration;

use Carbon\Carbon;
use Exolnet\Format\Facades\Format;
use Exolnet\Format\Formats\LocalizedFormat;
use Generator;

class FormatTest extends TestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        setlocale(LC_ALL, 'en_US.UTF-8');
        Carbon::setTestNow(Carbon::parse('2020-02-28 09:06:09'));
        LocalizedFormat::setDefaultLocale('en_US');
    }

    /**
     * @param callable $callback
     * @param string $expected
     * @return void
     * @dataProvider provideTestFormats
     */
    public function testFormats(callable $callback, string $expected): void
    {
        $format = $callback();

        $this->assertEquals($expected, (string)$format);
    }

    /**
     * @return \Generator
     */
    public function provideTestFormats(): Generator
    {
        yield [fn () => Format::text('foo'), 'foo'];
        yield [fn () => Format::accounting(-1234.56, 2), '($1,234.56)'];
        yield [fn () => Format::creditCard('5500000000000004'), '5500 0000 0000 0004'];
        yield [fn () => Format::creditCard('5500000000000004')->hidden(), 'xxxx xxxx xxxx 0004'];
        yield [fn () => Format::date(now()), '2020-02-28'];
        yield [fn () => Format::date(now())->short(), '2020-02-28'];
        yield [fn () => Format::date(now())->medium(), 'Feb 28th, 2020'];
        yield [fn () => Format::date(now())->long(), 'February 28th, 2020'];
        yield [fn () => Format::date(now())->full(), 'Friday, February 28th, 2020'];
        yield [fn () => Format::datetime(now()), '2020-02-28 09:06'];
        yield [fn () => Format::datetime(now())->short(), '2020-02-28 09:06'];
        yield [fn () => Format::datetime(now())->medium(), 'Feb 28th, 2020 09:06:09'];
        yield [fn () => Format::datetime(now())->long(), 'February 28th, 2020 09:06:09 UTC'];
        yield [fn () => Format::datetime(now())->full(), 'Friday, February 28th, 2020 09:06:09 UTC'];
        yield [fn () => Format::fraction(2, 4), '8/4'];
        yield [fn () => Format::fraction(0.75, 4), '3/4'];
        yield [fn () => Format::fraction(0.5, 4)->simplified(), '1/2'];
        yield [fn () => Format::memory(1234), '1,234B'];
        yield [fn () => Format::memory(1234)->octal(), '1,234B'];
        yield [fn () => Format::money(1234.56, 2), '$1,234.56'];
        yield [fn () => Format::money(1234.56, 2)->currency('EUR'), '€1,234.56'];
        yield [fn () => Format::money(1234.56, 2)->locale('fr_CA')->currency('EUR'), '1 234,56 €'];
        yield [fn () => Format::money(1234.56, 2)->iso(), 'USD 1,234.56'];
        yield [fn () => Format::null(), ''];
        yield [fn () => Format::null('n/a'), 'n/a'];
        yield [fn () => Format::number(1234.56, 2), '1,234.56'];
        yield [fn () => Format::number(1234.56, 0), '1,235'];
        yield [fn () => Format::number(1234.56, 4), '1,234.5600'];
        yield [fn () => Format::number(1234.56, 4)->trimTrailingZeros(), '1,234.56'];
        yield [fn () => Format::optional(null)->number(), ''];
        yield [fn () => Format::optional(null, 'n/a')->number(), 'n/a'];
        yield [fn () => Format::optional(1234.56)->number(), '1,234.56'];
        yield [fn () => Format::percentage(0.123456), '12%'];
        yield [fn () => Format::percentage(0.123456, 2), '12.35%'];
        yield [fn () => Format::phone('+15145555555'), '(514) 555-5555'];
        yield [fn () => Format::phone('+15145555555')->national(), '(514) 555-5555'];
        yield [fn () => Format::phone('+15145555555')->international(), '+1 514-555-5555'];
        yield [fn () => Format::phone('+15145555555')->e164(), '+15145555555'];
        yield [fn () => Format::ratio(1, 4), '1:4'];
        yield [fn () => Format::scientific(1234.56, 2), '1.23E3'];
        yield [fn () => Format::si(1234.56, 'g', 2), '1,234.56g'];
        yield [fn () => Format::socialInsuranceNumber('123456789'), '123 456 789'];
        yield [fn () => Format::time(now()), '09:06:09'];
        yield [fn () => Format::time(now())->short(), '09:06'];
        yield [fn () => Format::time(now())->medium(), '09:06:09'];
        yield [fn () => Format::time(now())->long(), '09:06:09 UTC'];
        yield [fn () => Format::time(now())->full(), '09:06:09 UTC'];
    }
}
