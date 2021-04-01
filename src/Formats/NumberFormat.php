<?php

namespace Exolnet\Format\Formats;

use NumberFormatter;

class NumberFormat extends LocalizedFormat
{
    /**
     * @var int
     */
    protected $style = NumberFormatter::DECIMAL;

    /**
     * @var float
     */
    protected $value;

    /**
     * @var int
     */
    protected $places;

    /**
     * @var bool
     */
    protected $trimTrailingZeros = false;

    /**
     * @param float $value
     * @param int $places
     */
    public function __construct(float $value, int $places = 2)
    {
        $this->value = $value;
        $this->places = $places;
    }

    /**
     * @param bool $trimTrailingZeros
     * @return $this
     */
    public function trimTrailingZeros($trimTrailingZeros = true): self
    {
        $this->trimTrailingZeros = $trimTrailingZeros;

        return $this;
    }

    /**
     * @return int
     */
    public function getPlaces(): int
    {
        return $this->places;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->makeNumberFormatter()->format($this->getValue());
    }

    /**
     * @return \NumberFormatter
     */
    protected function makeNumberFormatter(): NumberFormatter
    {
        $formatter = new NumberFormatter($this->getLocale(), $this->style);

        $formatter->setAttribute(NumberFormatter::ROUNDING_MODE, NumberFormatter::ROUND_HALFUP);

        if ($this->trimTrailingZeros) {
            $formatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, 0);
            $formatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, $this->places);
        } else {
            $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, $this->places);
        }

        return $formatter;
    }
}
