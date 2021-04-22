<?php

namespace Sashalenz\Zero\ApiModels;

use Sashalenz\Zero\DataTransferObjects\PartDataTransferObject;
use Sashalenz\Zero\Exceptions\ZeroException;

class Part extends BaseModel
{
    /**
     * @param string $search
     * @return PartDataTransferObject|null
     * @throws ZeroException
     */
    public function getPrices(string $search):? PartDataTransferObject
    {
        $this->validate([
            'search' => ['required', 'string', 'max:191']
        ]);

        $response = $this
            ->cache(600)
            ->method('parts/' . $search)
            ->request()
            ->toArray();

        return PartDataTransferObject::fromArray($response);
    }
}
