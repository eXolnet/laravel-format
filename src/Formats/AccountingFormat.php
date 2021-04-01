<?php

namespace Exolnet\Format\Formats;

use NumberFormatter;

class AccountingFormat extends MoneyFormat
{
    /**
     * @var int
     */
    protected $style = NumberFormatter::CURRENCY_ACCOUNTING;

    /**
     * @return float
     */
    public function getValue(): float
    {
        return abs($this->value);
    }

    /**
     * @return bool
     */
    public function isNegative(): bool
    {
        return $this->value < 0.0;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $format = $this->isNegative() ? '(%s)' : '%s';

        return sprintf($format, parent::__toString());
    }
}
