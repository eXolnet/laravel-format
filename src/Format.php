<?php

namespace Exolnet\Format;

use Carbon\Carbon;

class Format
{
    /**
     * @param float $value
     * @param int $places
     * @return string
     */
    public function number($value, $places = 0)
    {
        $locale = localeconv();

        return number_format($value, $places, $locale['decimal_point'], $locale['thousands_sep']);
    }

    /**
     * @param float $value
     * @param int $places
     * @return string
     */
    public function currency($value, $places = 2)
    {
        return money_format('%.'. $places .'n', $value);
    }

    /**
     * @param float $value
     * @param int $places
     * @return string
     */
    public function accounting($value, $places = 2)
    {
        return $this->currency($value, $places);
    }

    /**
     * @param float $value
     * @param int $places
     * @return string
     */
    public function percentage($value, $places = 0)
    {
        return $this->number(100 * $value, $places) .'%';
    }

    /**
     * @param \Datetime|string $value
     * @return string
     */
    public function date($value)
    {
        return Carbon::parse($value)->toDateString();
    }

    /**
     * @param \Datetime|string $value
     * @return string
     */
    public function time($value)
    {
        return Carbon::parse($value)->toTimeString();
    }

    /**
     * @param \Datetime|string $value
     * @param string $glue
     * @return string
     */
    public function dateTime($value, $glue = ' ')
    {
        return $this->date($value) . $glue . $this->time($value);
    }

    /**
     * @param float $value
     * @return string
     */
    public function fraction($value)
    {
        //
    }

    /**
     * @param float $value
     * @return string
     */
    public function scientific($value)
    {
        //
    }

    /**
     * @param int $value
     * @return string
     */
    public function memory($bytes)
    {
        if ($bytes >= 1024 * 1024 * 1024) {
            return sprintf('%.1f GiB', $bytes / 1024 / 1024 / 1024);
        }

        if ($bytes >= 1024 * 1024) {
            return sprintf('%.1f MiB', $bytes / 1024 / 1024);
        }

        if ($bytes >= 1024) {
            return sprintf('%d KiB', $bytes / 1024);
        }

        return sprintf('%d B', $bytes);
    }
}
