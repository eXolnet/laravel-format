<?php

namespace Exolnet\Format\Formats;

use Carbon\CarbonInterval;

class DurationFormat extends Format
{
    /**
     * @var \Carbon\CarbonInterval
     */
    protected $duration;

    /**
     * @param \DateInterval|string $duration
     */
    public function __construct($duration)
    {
        $this->duration = CarbonInterval::make($duration);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->duration->spec();
    }
}
