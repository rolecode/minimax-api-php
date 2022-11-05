<?php

namespace Rolecode\PhpMinimax\Services\Requests;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\BaseMinimaxClient;
use Rolecode\PhpMinimax\GuzzleHttpClient;
use Rolecode\PhpMinimax\Models\DocumentNumbering;
use Rolecode\PhpMinimax\Models\SearchResult;
use Rolecode\PhpMinimax\Services\JsonMapperService;

class UpdateRecordRequest
{

    /**
     * Update record by id.
     *
     * @param BaseMinimaxClient $client Contains information like organisation id and token, which are mandatory for each request.
     * @param string $slug Request will be made to this slug.
     * @param object $object
     * @param int $id Passed id of record will be updated.
     *
     * @throws ClientException if the request fails
     *
     * @return mixed Return updated object.
     */
    public static function update( $client, $slug, $object, $id )
    {
        // Retrieve organisation id.
        $organisationId = $client->getOrganisationId();

        // Retrieve token.
        $token = $client->getToken();

        // Make request.
        $httpClient = new GuzzleHttpClient( $token, $organisationId );


        $response = $httpClient->put("{$slug}/{$id}", [
            'body' => json_encode( $object ),
        ]);

        // Retrieve object by id.
        $object = RetrieveRequestService::retrieveById( $client, $slug, get_class($object), $id );

        return $object;
    }


}
