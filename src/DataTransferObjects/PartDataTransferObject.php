<?php

namespace Sashalenz\Zero\DataTransferObjects;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\DataTransferObject;

class PartDataTransferObject extends DataTransferObject
{
    public string $number;
    public string $brand;
    public string $name;
    public Collection $rivals;
    public ?Carbon $parsedAt = null;

    public static function fromArray($array): PartDataTransferObject
    {
        return new self([
            'number' => $array['number'],
            'brand' => $array['brand'],
            'name' => $array['name'],
            'parsedAt' => isset($array['parsedAt']) ? Carbon::createFromFormat('Y-m-d H:i', $array['parsedAt']) : null,
            'rivals' => RivalDataTransferObject::arrayFromArray($array['rivals']),
        ]);
    }
}
