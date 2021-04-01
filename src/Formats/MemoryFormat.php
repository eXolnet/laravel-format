<?php

namespace Exolnet\Format\Formats;

class MemoryFormat extends SiFormat
{
    /**
     * @var bool
     */
    protected $octal = false;

    /**
     * @param float $octets
     * @param int $places
     */
    public function __construct(float $octets, int $places = 0)
    {
        parent::__construct($octets, 'B', $places);
    }

    /**
     * @param bool $octal
     * @return $this
     */
    public function octal(bool $octal = true): self
    {
        $this->octal = $octal;

        return $this;
    }

    // /**
    //  * @return string
    //  */
    // public function __toString(): string
    // {
    //     if ($this->value >= 1024 * 1024 * 1024) {
    //         return sprintf('%.1fGiB', $this->value / 1024 / 1024 / 1024);
    //     }
    //
    //     if ($this->value >= 1024 * 1024) {
    //         return sprintf('%.1fMiB', $this->value / 1024 / 1024);
    //     }
    //
    //     if ($this->value >= 1024) {
    //         return sprintf('%dKiB', $this->value / 1024);
    //     }
    //
    //     return sprintf('%dB', $this->value);
    // }
}
