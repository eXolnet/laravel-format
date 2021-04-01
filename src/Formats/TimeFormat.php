<?php

namespace Exolnet\Format\Formats;

class TimeFormat extends DateTimeFormat
{
    /**
     * @return string
     */
    public function short(): string
    {
        return $this->time->format('H:i');
    }

    /**
     * @return string
     */
    public function medium(): string
    {
        return $this->time->format('H:i:s');
    }

    /**
     * @return string
     */
    public function long(): string
    {
        return $this->time->format('H:i:s T');
    }

    /**
     * @return string
     */
    public function full(): string
    {
        return $this->time->format('H:i:s e');
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->medium();
    }
}
