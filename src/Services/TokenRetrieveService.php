<?php

namespace Rolecode\PhpMinimax\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\BaseMinimaxClient;
use Rolecode\PhpMinimax\Models\Token;

class TokenRetrieveService
{
    /**
     * Exchanges user credentials for token.
     *
     * @param string $clientId
     * @param string $clientSecret
     * @param string $username
     * @param string $password
     *
     * @throws ClientException if the request fails
     *
     * @return Token
     */
    public static function retrieve(string $clientId, string $clientSecret, string $username, string $password)
    {
        // Set parameters.
        $requestParameters = [
            'client_id'=> $clientId,
            'client_secret'=> $clientSecret,
            'grant_type'=> 'password',
            'username'=> $username,
            'password'=> $password,
            'scope' => 'minimax.si'
        ];

        // Retrieve token.
        $client = new Client();
        $response = $client->post('', [
            'base_uri' => BaseMinimaxClient::API_TOKEN_ENDPOINT,
            'headers' => [
                'Content-type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => $requestParameters,
        ]);

        $responseJson = $response->getBody();

        // Map response to UserOrganisation.
        $token = JsonMapperService::mapSingle($responseJson, Token::class);

        return $token;
    }
}
