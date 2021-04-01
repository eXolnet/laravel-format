<?php

namespace Exolnet\Format\Formats;

use NumberFormatter;

class ScientificFormat extends NumberFormat
{
    /**
     * @var int
     */
    protected $style = NumberFormatter::SCIENTIFIC;

    /**
     * @return \NumberFormatter
     */
    protected function makeNumberFormatter(): NumberFormatter
    {
        $formatter = parent::makeNumberFormatter();

        $formatter->setAttribute(NumberFormatter::INTEGER_DIGITS, 1);

        return $formatter;
    }
}
