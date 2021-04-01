<?php

namespace Exolnet\Format\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @phpcs:disable Generic.Files.LineLength.TooLong
 * @method static \Exolnet\Format\Formats\AccountingFormat accounting(float $value, int $places = 2)
 * @method static \Exolnet\Format\Formats\CreditCardFormat creditCard(string $number)
 * @method static \Exolnet\Format\Formats\DateFormat date($time = null, $tz = null)
 * @method static \Exolnet\Format\Formats\DateTimeFormat datetime($time = null, $tz = null)
 * @method static \Exolnet\Format\Formats\DurationFormat duration($duration)
 * @method static \Exolnet\Format\FormatBuilder value($value)
 * @method static \Exolnet\Format\Formats\FractionFormat fraction(float $value, int $denominator)
 * @method static \Exolnet\Format\Formats\MemoryFormat memory(int $octets)
 * @method static \Exolnet\Format\Formats\MoneyFormat money(float $value, int $places = 2)
 * @method static \Exolnet\Format\Formats\NullFormat null(string $emptyText = '')
 * @method static \Exolnet\Format\Formats\NumberFormat number(float $value, int $places = 2)
 * @method static \Exolnet\Format\FormatBuilder|\Exolnet\Format\Formats\NullFormat optional($value, string $emptyText = '')
 * @method static \Exolnet\Format\Formats\PercentageFormat percentage(float $value, int $places = 0)
 * @method static \Exolnet\Format\Formats\PeriodFormat period($from, $to)
 * @method static \Exolnet\Format\Formats\PhoneFormat phone(string $phone)
 * @method static \Exolnet\Format\Formats\RatioFormat ratio(float $value1, float $value2, int $places = 0)
 * @method static \Exolnet\Format\Formats\ScientificFormat scientific(float $value, int $places = 2)
 * @method static \Exolnet\Format\Formats\SiFormat si(float $value, string $units, int $places = 2)
 * @method static \Exolnet\Format\Formats\SocialInsuranceNumberFormat socialInsuranceNumber(string $number)
 * @method static \Exolnet\Format\Formats\TextFormat text(string $text)
 * @method static \Exolnet\Format\Formats\TimeFormat time($time = null, $tz = null)
 * @phpcs:enable
 *
 * @see \Exolnet\Format\Format
 */
class Format extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'format';
    }
}
