<?php

namespace Exolnet\Format;

use Exolnet\Format\Formats\AccountingFormat;
use Exolnet\Format\Formats\CreditCardFormat;
use Exolnet\Format\Formats\DateFormat;
use Exolnet\Format\Formats\DateTimeFormat;
use Exolnet\Format\Formats\DurationFormat;
use Exolnet\Format\Formats\FractionFormat;
use Exolnet\Format\Formats\MemoryFormat;
use Exolnet\Format\Formats\MoneyFormat;
use Exolnet\Format\Formats\NullFormat;
use Exolnet\Format\Formats\NumberFormat;
use Exolnet\Format\Formats\PercentageFormat;
use Exolnet\Format\Formats\PeriodFormat;
use Exolnet\Format\Formats\PhoneFormat;
use Exolnet\Format\Formats\RatioFormat;
use Exolnet\Format\Formats\ScientificFormat;
use Exolnet\Format\Formats\SiFormat;
use Exolnet\Format\Formats\SocialInsuranceNumberFormat;
use Exolnet\Format\Formats\TextFormat;
use Exolnet\Format\Formats\TimeFormat;
use Illuminate\Support\Traits\Macroable;

class Format
{
    use Macroable;

    /**
     * @param float $value
     * @param int $places
     * @return \Exolnet\Format\Formats\AccountingFormat
     */
    public function accounting(float $value, int $places = 2): AccountingFormat
    {
        return new AccountingFormat($value, $places);
    }

    /**
     * @param string $number
     * @return \Exolnet\Format\Formats\CreditCardFormat
     */
    public function creditCard(string $number): CreditCardFormat
    {
        return new CreditCardFormat($number);
    }

    /**
     * @param \DateTime|string|int|null $time
     * @param \DateTimeZone|string|null $tz
     * @return \Exolnet\Format\Formats\DateFormat
     */
    public function date($time = null, $tz = null): DateFormat
    {
        return new DateFormat($time, $tz);
    }

    /**
     * @param \DateTime|string|int|null $time
     * @param \DateTimeZone|string|null $tz
     * @return \Exolnet\Format\Formats\DateTimeFormat
     */
    public function datetime($time = null, $tz = null): DateTimeFormat
    {
        return new DateTimeFormat($time, $tz);
    }

    /**
     * @param \DateInterval|string $duration
     * @return \Exolnet\Format\Formats\DurationFormat
     */
    public function duration($duration): DurationFormat
    {
        return new DurationFormat($duration);
    }

    /**
     * @param mixed $value
     * @return \Exolnet\Format\FormatBuilder
     */
    public function value($value): FormatBuilder
    {
        return new FormatBuilder($value);
    }

    /**
     * @param float $value
     * @param int $denominator
     * @return \Exolnet\Format\Formats\FractionFormat
     */
    public function fraction(float $value, int $denominator): FractionFormat
    {
        return new FractionFormat($value, $denominator);
    }

    /**
     * @param int $octets
     * @return \Exolnet\Format\Formats\MemoryFormat
     */
    public function memory(int $octets): MemoryFormat
    {
        return new MemoryFormat($octets);
    }

    /**
     * @param float $value
     * @param int $places
     * @return \Exolnet\Format\Formats\MoneyFormat
     */
    public function money(float $value, int $places = 2): MoneyFormat
    {
        return new MoneyFormat($value, $places);
    }

    /**
     * @param string $emptyText
     * @return \Exolnet\Format\Formats\NullFormat
     */
    public function null(string $emptyText = ''): NullFormat
    {
        return new NullFormat($emptyText);
    }

    /**
     * @param float $value
     * @param int $places
     * @return \Exolnet\Format\Formats\NumberFormat
     */
    public function number(float $value, int $places = 2): NumberFormat
    {
        return new NumberFormat($value, $places);
    }

    /**
     * @param mixed $value
     * @param string $emptyText
     * @return \Exolnet\Format\FormatBuilder|\Exolnet\Format\Formats\NullFormat
     */
    public function optional($value, string $emptyText = '')
    {
        if ($value === null) {
            return $this->null($emptyText);
        }

        return $this->value($value);
    }

    /**
     * @param float $value
     * @param int $places
     * @return \Exolnet\Format\Formats\PercentageFormat
     */
    public function percentage(float $value, int $places = 0): PercentageFormat
    {
        return new PercentageFormat($value, $places);
    }

    /**
     * @param \DateTime|string|int|null $from
     * @param \DateTime|string|int|null $to
     * @return \Exolnet\Format\Formats\PeriodFormat
     */
    public function period($from, $to): PeriodFormat
    {
        return new PeriodFormat($from, $to);
    }

    /**
     * @param string $phone
     * @return \Exolnet\Format\Formats\PhoneFormat
     */
    public function phone(string $phone): PhoneFormat
    {
        return new PhoneFormat($phone);
    }

    /**
     * @param float $value1
     * @param float $value2
     * @param int $places
     * @return \Exolnet\Format\Formats\RatioFormat
     */
    public function ratio(float $value1, float $value2, int $places = 0): RatioFormat
    {
        return new RatioFormat($value1, $value2, $places);
    }

    /**
     * @param float $value
     * @param int $places
     * @return \Exolnet\Format\Formats\ScientificFormat
     */
    public function scientific(float $value, int $places = 2): ScientificFormat
    {
        return new ScientificFormat($value, $places);
    }

    /**
     * @param float $value
     * @param string $units
     * @param int $places
     * @return \Exolnet\Format\Formats\SiFormat
     */
    public function si(float $value, string $units, int $places = 2): SiFormat
    {
        return new SiFormat($value, $units, $places);
    }

    /**
     * @param string $number
     * @return \Exolnet\Format\Formats\SocialInsuranceNumberFormat
     */
    public function socialInsuranceNumber(string $number): SocialInsuranceNumberFormat
    {
        return new SocialInsuranceNumberFormat($number);
    }

    /**
     * @param string $text
     * @return \Exolnet\Format\Formats\TextFormat
     */
    public function text(string $text): TextFormat
    {
        return new TextFormat($text);
    }

    /**
     * @param \DateTime|string|int|null $time
     * @param \DateTimeZone|string|null $tz
     * @return \Exolnet\Format\Formats\TimeFormat
     */
    public function time($time = null, $tz = null): TimeFormat
    {
        return new TimeFormat($time, $tz);
    }
}
