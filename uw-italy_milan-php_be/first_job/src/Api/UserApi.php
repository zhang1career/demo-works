<?php

namespace App\Api;

use App\Model\Entity\User;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class UserApi
{

    public function __construct(private HttpClientInterface $httpClient) {
    }

    public function findOneBy(int $userId) : ?User {
        $requestJson = json_encode(
            [
                'query' => graphql_encode(
                    [
                        'user' => [
                            'field' => 'id',
                            'op' => 'eq',
                            'value' => $userId,
                        ]
                    ]
                )
            ],
            JSON_THROW_ON_ERROR
        );

        $response = $this->httpClient->request(
            'POST',
            'query',
            [
                'headers' => [
                    'Content-Type: application/json',
                    'Accept: application/json',
                ],
                'body' => $requestJson,
                'timeout' => 1
            ]
        );

        if (200 !== $response->getStatusCode()) {
            return null;
        }

        $responseJson = $response->getContent();
        $responseData = json_decode($responseJson, true, 512, JSON_THROW_ON_ERROR);

        $user = new User();
        $user->setId($responseData['id']);
        $user->setName($responseData['name']);
    }
}
