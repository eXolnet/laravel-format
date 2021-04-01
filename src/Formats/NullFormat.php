<?php

namespace Exolnet\Format\Formats;

class NullFormat extends TextFormat
{
    /**
     * @param string $text
     */
    public function __construct(string $text = '')
    {
        parent::__construct($text);
    }

    /**
     * @param string $method
     * @param array $args
     * @return $this
     */
    public function __call(string $method, array $args): self
    {
        return $this;
    }
}
