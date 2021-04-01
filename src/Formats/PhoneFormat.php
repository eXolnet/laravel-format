<?php

namespace Exolnet\Format\Formats;

use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

class PhoneFormat extends Format
{
    /**
     * @var string
     */
    protected $phoneNumber;

    /**
     * @var string|null
     */
    protected $region;

    /**
     * @var int
     */
    protected $format = PhoneNumberFormat::NATIONAL;

    /**
     * @param string $phoneNumber
     * @param string|null $region
     */
    public function __construct(string $phoneNumber, string $region = null)
    {
        $this->phoneNumber = $phoneNumber;
        $this->region = $region;
    }

    /**
     * @return $this
     */
    public function e164(): self
    {
        $this->format = PhoneNumberFormat::E164;

        return $this;
    }

    /**
     * @return $this
     */
    public function international(): self
    {
        $this->format = PhoneNumberFormat::INTERNATIONAL;

        return $this;
    }

    /**
     * @return $this
     */
    public function national(): self
    {
        $this->format = PhoneNumberFormat::NATIONAL;

        return $this;
    }

    /**
     * @param string|null $region
     * @return $this
     */
    public function region(string $region = null): self
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return string
     * @throws \libphonenumber\NumberParseException
     */
    public function __toString(): string
    {
        $phoneUtil = PhoneNumberUtil::getInstance();

        $number = $phoneUtil->parse($this->phoneNumber, $this->region);

        return $phoneUtil->format($number, $this->format);
    }
}
