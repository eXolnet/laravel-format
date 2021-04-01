<?php

namespace Exolnet\Format\Formats;

use Carbon\Carbon;

class DateTimeFormat extends Format
{
    /**
     * @var \Carbon\Carbon
     */
    protected Carbon $time;

    /**
     * @param \DateTime|string|int|null $time
     * @param \DateTimeZone|string|null $tz
     */
    public function __construct($time = null, $tz = null)
    {
        $this->time = Carbon::parse($time, $tz);
    }

    /**
     * @return string
     */
    public function short(): string
    {
        return $this->time->format('Y-m-d H:i');
    }

    /**
     * @return string
     */
    public function medium(): string
    {
        return $this->time->format('M jS, Y H:i:s');
    }

    /**
     * @return string
     */
    public function long(): string
    {
        return $this->time->format('F jS, Y H:i:s T');
    }

    /**
     * @return string
     */
    public function full(): string
    {
        return $this->time->format('l, F jS, Y H:i:s e');
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->short();
    }
}
