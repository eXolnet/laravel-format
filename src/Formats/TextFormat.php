<?php

namespace Exolnet\Format\Formats;

class TextFormat extends Format
{
    /**
     * @var string
     */
    protected $text;

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->text;
    }
}
