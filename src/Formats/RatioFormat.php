<?php

namespace Exolnet\Format\Formats;

use Exolnet\Format\Facades\Format as FormatFacade;

class RatioFormat extends Format
{
    /**
     * @var float
     */
    protected $value1;

    /**
     * @var float
     */
    protected $value2;

    /**
     * @var int
     */
    protected $places;

    /**
     * @param float $value1
     * @param float $value2
     * @param int $places
     */
    public function __construct(float $value1, float $value2, int $places = 0)
    {
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->places = $places;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        if (abs($this->value1) > abs($this->value2)) {
            $value1 = $this->value1 / $this->value2;
            $value2 = 1;
        } else {
            $value1 = 1;
            $value2 = $this->value2 / $this->value1;
        }

        return sprintf(
            '%s:%s',
            $this->formatNumber($value1),
            $this->formatNumber($value2)
        );
    }

    /**
     * @param float $value
     * @return string
     */
    protected function formatNumber(float $value): string
    {
        return FormatFacade::number($value, $this->places);
    }
}
