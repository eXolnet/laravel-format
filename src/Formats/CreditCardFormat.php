<?php

namespace Exolnet\Format\Formats;

class CreditCardFormat extends Format
{
    /**
     * @var string
     */
    protected $number;

    /**
     * @var bool
     */
    protected $hidden = false;

    /**
     * @param string $number
     */
    public function __construct(string $number)
    {
        $this->number = $number;
    }

    /**
     * @param bool $hidden
     * @return $this
     */
    public function hidden($hidden = true): self
    {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $number = $this->number;

        if ($this->hidden) {
            $hidden = str_repeat('x', strlen($number) - 4);
            $number = substr_replace ($number, $hidden, 0, strlen($hidden));
        }

        return wordwrap($number, 4, ' ', true);
    }
}
