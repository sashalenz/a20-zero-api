<?php

namespace Sashalenz\Zero\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class BrandDataTransferObject extends DataTransferObject
{
    public string $name;

    public static function fromArray($array): BrandDataTransferObject
    {
        return new self([
            'name' => $array['name'],
        ]);
    }

}
