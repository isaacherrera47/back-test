<?php

namespace App\Http\Services;

use GuzzleHttp\Client;

class ImageUploader
{

    /** @var Client */
    private $client;

    const ENDPOINT = 'https://test.rxflodev.com';

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $base64Image string
     *
     * @return array
     */
    public function __invoke(string $base64Image): array
    {
        $response = $this->client->post(self::ENDPOINT, [
            'form_params' => [
                'imageData' => $base64Image
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
