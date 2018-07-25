<?php

namespace Exolnet\Format\Tests\Integration;

use Exolnet\Format\FormatServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            FormatServiceProvider::class,
        ];
    }
}
