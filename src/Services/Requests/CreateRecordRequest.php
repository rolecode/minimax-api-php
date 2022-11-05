<?php

namespace Rolecode\PhpMinimax\Services\Requests;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\BaseMinimaxClient;
use Rolecode\PhpMinimax\GuzzleHttpClient;
use Rolecode\PhpMinimax\Models\DocumentNumbering;
use Rolecode\PhpMinimax\Models\SearchResult;
use Rolecode\PhpMinimax\Services\JsonMapperService;

class CreateRecordRequest
{

    /**
     * Create record.
     *
     * @param BaseMinimaxClient $client Contains information like organisation id and token, which are mandatory for each request.
     * @param string $slug Request will be made to this slug.
     * @param object $object
     *
     * @throws ClientException if the request fails
     *
     * @return mixed Return created object.
     */
    public static function create( $client, $slug, $object )
    {
        // Retrieve organisation id.
        $organisationId = $client->getOrganisationId();

        // Retrieve token.
        $token = $client->getToken();

        // Make request.
        $httpClient = new GuzzleHttpClient( $token, $organisationId );


        $response = $httpClient->post("{$slug}", [
            'body' => json_encode( $object ),
        ]);

        // Object id is located in header Location: "https://moj.minimax.si/SI/API/api/orgs/183818/items/7299224?id=7299224"
        $location = $response->getHeader('Location')[0];
        $id = substr( $location, strripos( $location, "?id=" ) + 4, strlen($location) );

        // Retrieve object by id.
        $object = RetrieveRequestService::retrieveById( $client, $slug, get_class($object), $id );

        return $object;
    }


}
