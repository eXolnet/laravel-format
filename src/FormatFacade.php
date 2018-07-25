<?php

namespace Exolnet\Format;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Exolnet\Format\Format
 */
class FormatFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'format';
    }
}
