<?php

namespace Sashalenz\Zero\DataTransferObjects;

use Illuminate\Support\Collection;
use Money\Currency;
use Money\Money;
use Spatie\DataTransferObject\DataTransferObject;

class RivalDataTransferObject extends DataTransferObject
{
    public string $name;
    public BrandDataTransferObject $brand;
    public string $city;
    public Money $price;
    public ?int $delivery = null;
    public bool $isUsed;
    public bool $isWholesale;

    public static function fromArray($array): RivalDataTransferObject
    {
        return new self([
            'name' => $array['name'],
            'brand' => BrandDataTransferObject::fromArray($array['brand']),
            'price' => new Money($array['price']['amount'], new Currency($array['price']['currency'])),
            'city' => $array['city'],
            'delivery' => $array['delivery'],
            'isUsed' => (bool) $array['isUsed'],
            'isWholesale' => (bool) $array['isWholesale']
        ]);
    }

    public static function arrayFromArray($array) : Collection
    {
        return collect($array)
            ->map(fn ($parameters) => static::fromArray($parameters));
    }
}
