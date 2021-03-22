<?php

namespace Sashalenz\Zero;

class Zero
{
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    private function request($url):? array
    {
        try {
            $response = $this->client
                ->request('GET', $url)
                ->getBody()
                ->getContents();

            return json_decode($response, true)['data'];
        } catch (GuzzleException) {
            return null;
        }
    }

    public function getPrices(string $search):? PartDataTransferObject
    {
        $response = $this->request('/parts/'.$search);

        if (is_null($response)) {
            return null;
        }

        return PartDataTransferObject::fromArray($response);
    }

}
