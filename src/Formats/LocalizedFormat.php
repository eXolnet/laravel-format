<?php

namespace Exolnet\Format\Formats;

use Illuminate\Support\Facades\App;

abstract class LocalizedFormat extends Format
{
    /**
     * @var string|null
     */
    protected static $defaultLocale = null;

    /**
     * @var string|null
     */
    protected $locale;

    /**
     * @param string|null $locale
     * @return $this
     */
    public function locale(string $locale = null): self
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale ?? static::$defaultLocale ?? App::getLocale();
    }

    /**
     * @param string|null $defaultLocale
     */
    public static function setDefaultLocale(string $defaultLocale = null): void
    {
        static::$defaultLocale = $defaultLocale;
    }
}
