<?php

namespace Exolnet\Format\Formats;

class SiFormat extends NumberFormat
{
    /**
     * @var string
     */
    protected $units;

    /**
     * @param float $value
     * @param string $units
     * @param int $places
     */
    public function __construct(float $value, string $units, int $places = 2)
    {
        parent::__construct($value, $places);

        $this->units = $units;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('%s%s', parent::__toString(), $this->units);
    }
}
