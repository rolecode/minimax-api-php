<?php

namespace Rolecode\PhpMinimax;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\Models\Token;

class GuzzleHttpClient extends Client
{

    /**
     * Predefine config for guzzle client.
     *
     * @param Token $token
     * @param int $organisationId Is not required when retrieving list of organisations.
     */
    public function __construct(Token $token, int $organisationId = null)
    {
        // Config for most requests.
        $config = [
            'base_uri' => BaseMinimaxClient::API_URL . "{$organisationId}/",
            'headers' => [
                'Authorization' => "Bearer {$token->access_token}",
                'Content-type' => 'application/json',
            ],
        ];


        // When retrieving user organisations.
        if( empty($organisationId) ){
            $config["base_uri"] = BaseMinimaxClient::API_ORGANISATIONS_ENDPOINT;
        }


        // Pass predefined configs to guzzle client.
        parent::__construct( $config );
    }
}
