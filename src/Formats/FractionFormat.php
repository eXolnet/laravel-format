<?php

namespace Exolnet\Format\Formats;

class FractionFormat extends Format
{
    /**
     * @var float
     */
    protected $value;

    /**
     * @var int
     */
    protected $denominator;

    /**
     * @var bool
     */
    protected $simplified;

    /**
     * @param float $value
     * @param int $denominator
     */
    public function __construct(float $value, int $denominator = 1000)
    {
        $this->value = $value;
        $this->denominator = $denominator;
    }

    /**
     * @param bool $simplified
     * @return $this
     */
    public function simplified(bool $simplified = true): self
    {
        $this->simplified = $simplified;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->simplified
            ? $this->formatSimplified()
            : $this->format();
    }

    /**
     * @return string
     */
    protected function format(): string
    {
        $numerator = round($this->value * $this->denominator);

        return $numerator . '/' . $this->denominator;
    }

    /**
     * @return string
     */
    protected function formatSimplified(): string
    {
        $denominator = $this->denominator;
        $numerator = round($this->value * $denominator);

        // Simplify the fraction
        $greatestCommonDivisor = $this->calculateGreatestCommonDivisor($numerator, $denominator);

        $numerator   /= $greatestCommonDivisor;
        $denominator /= $greatestCommonDivisor;

        if ($denominator === 1) {
            return $numerator;
        }

        return $numerator . '/' . $denominator;
    }

    /**
     * @param int $a
     * @param int $b
     * @return int
     */
    protected function calculateGreatestCommonDivisor(int $a, int $b)
    {
        return $b ? $this->calculateGreatestCommonDivisor($b, $a % $b) : $a;
    }
}
