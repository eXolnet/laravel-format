<?php

namespace Exolnet\Format\Formats;

use NumberFormatter;

class PercentageFormat extends NumberFormat
{
    /**
     * @var int
     */
    protected $style = NumberFormatter::PERCENT;
}
