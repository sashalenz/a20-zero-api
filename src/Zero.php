<?php

namespace Sashalenz\Zero;

use Sashalenz\Zero\ApiModels\Part;

final class Zero
{
    public static function part(): Part
    {
        return new Part();
    }
}
