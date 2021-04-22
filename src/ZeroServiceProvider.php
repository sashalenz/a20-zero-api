<?php

namespace Sashalenz\Zero;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ZeroServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('a20-zero-api')
            ->hasConfigFile();
    }
}
