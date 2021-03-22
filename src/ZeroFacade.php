<?php

namespace Sashalenz\Zero;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sashalenz\Zero\Zero
 */
class ZeroFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'a20-zero-api';
    }
}
