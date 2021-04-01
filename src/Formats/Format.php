<?php

namespace Exolnet\Format\Formats;

abstract class Format
{
    /**
     * @return string
     */
    abstract public function __toString(): string;
}
