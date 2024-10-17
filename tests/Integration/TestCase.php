<?php

namespace Exolnet\Format\Tests\Integration;

use Exolnet\Format\FormatServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
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
