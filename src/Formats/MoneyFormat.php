<?php

namespace Exolnet\Format\Formats;

use NumberFormatter;

class MoneyFormat extends NumberFormat
{
    /**
     * @var int
     */
    protected $style = NumberFormatter::CURRENCY;

    /**
     * @var string|null
     */
    protected $currency;

    /**
     * @var bool
     */
    protected $iso = false;

    /**
     * @param string|null $currency
     * @return $this
     */
    public function currency(string $currency = null): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param bool $iso
     * @return $this
     */
    public function iso(bool $iso = true): self
    {
        $this->iso = $iso;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->makeNumberFormatter()->format($this->getValue());
    }

    protected function makeNumberFormatter(): NumberFormatter
    {
        $formatter = parent::makeNumberFormatter();

        $currency = $this->currency ?? $formatter->getSymbol(NumberFormatter::INTL_CURRENCY_SYMBOL);

        $formatter->setTextAttribute(NumberFormatter::CURRENCY_CODE, $currency);

        if ($this->iso) {
            $formatter->setSymbol(NumberFormatter::CURRENCY_SYMBOL, $currency);
        }

        return $formatter;
    }
}
