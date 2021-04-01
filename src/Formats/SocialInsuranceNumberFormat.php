<?php

namespace Exolnet\Format\Formats;

class SocialInsuranceNumberFormat extends Format
{
    /**
     * @var string
     */
    protected $number;

    /**
     * @param string $number
     */
    public function __construct(string $number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return wordwrap($this->number, 3, ' ', true);
    }
}
