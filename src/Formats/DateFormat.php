<?php

namespace Exolnet\Format\Formats;

class DateFormat extends DateTimeFormat
{
    /**
     * @return string
     */
    public function short(): string
    {
        return $this->time->format('Y-m-d');
    }

    /**
     * @return string
     */
    public function medium(): string
    {
        return $this->time->format('M jS, Y');
    }

    /**
     * @return string
     */
    public function long(): string
    {
        return $this->time->format('F jS, Y');
    }

    /**
     * @return string
     */
    public function full(): string
    {
        return $this->time->format('l, F jS, Y');
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->short();
    }
}
