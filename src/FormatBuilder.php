<?php

namespace Exolnet\Format;

use BadMethodCallException;

/**
 * @method \Exolnet\Format\Formats\AccountingFormat accounting(int $places = 2)
 * @method \Exolnet\Format\Formats\CreditCardFormat creditCard()
 * @method \Exolnet\Format\Formats\DateFormat date($tz = null)
 * @method \Exolnet\Format\Formats\DateTimeFormat datetime($tz = null)
 * @method \Exolnet\Format\Formats\DurationFormat duration()
 * @method \Exolnet\Format\Formats\FractionFormat fraction(int $denominator)
 * @method \Exolnet\Format\Formats\MemoryFormat memory()
 * @method \Exolnet\Format\Formats\MoneyFormat money(int $places = 2)
 * @method \Exolnet\Format\Formats\NumberFormat number(int $places = 2)
 * @method \Exolnet\Format\Formats\PercentageFormat percentage(int $places = 0)
 * @method \Exolnet\Format\Formats\PhoneFormat phone()
 * @method \Exolnet\Format\Formats\ScientificFormat scientific(int $places = 2)
 * @method \Exolnet\Format\Formats\SiFormat si(string $units, int $places = 2)
 * @method \Exolnet\Format\Formats\SocialInsuranceNumberFormat socialInsuranceNumber()
 * @method \Exolnet\Format\Formats\TextFormat text()
 * @method \Exolnet\Format\Formats\TimeFormat time($tz = null)
 *
 * @see \Exolnet\Format\Format
 */
class FormatBuilder
{
    /**
     * @var mixed
     */
    protected $value;

    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call(string $method, array $args)
    {
        $format = $this->makeFormat();

        if (! method_exists($format, $method)) {
            throw new BadMethodCallException("Method $method does not exist.");
        }

        return $format->$method($this->value, ...$args);
    }

    /**
     * @return \Exolnet\Format\Format
     */
    protected function makeFormat(): Format
    {
        return app(Format::class);
    }
}
