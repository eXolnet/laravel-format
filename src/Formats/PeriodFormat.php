<?php

namespace Exolnet\Format\Formats;

use Carbon\Carbon;

class PeriodFormat extends Format
{
    /**
     * @var \Carbon\Carbon
     */
    protected Carbon $from;

    /**
     * @var \Carbon\Carbon
     */
    protected Carbon $to;

    /**
     * @param \DateTime|string|int|null $from
     * @param \DateTime|string|int|null $to
     */
    public function __construct($from, $to)
    {
        $this->from = Carbon::parse($from);
        $this->to = Carbon::parse($to);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->from->toDateTimeString() . '/' . $this->to->toDateTimeString();
    }
}
