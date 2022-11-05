<?php

namespace Rolecode\PhpMinimax\Services\Requests;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\BaseMinimaxClient;
use Rolecode\PhpMinimax\GuzzleHttpClient;
use Rolecode\PhpMinimax\Models\DocumentNumbering;
use Rolecode\PhpMinimax\Models\SearchResult;
use Rolecode\PhpMinimax\Services\JsonMapperService;

class DeleteRecordRequest
{

    /**
     * Delete record by id.
     *
     * @param BaseMinimaxClient $client Contains information like organisation id and token, which are mandatory for each request.
     * @param string $slug Request will be made to this slug.
     * @param int $id Passed id of record will be updated.
     *
     * @throws ClientException if the request fails
     *
     * @return void
     */
    public static function delete( $client, $slug, $id )
    {
        // Retrieve organisation id.
        $organisationId = $client->getOrganisationId();

        // Retrieve token.
        $token = $client->getToken();

        // Make request.
        $httpClient = new GuzzleHttpClient( $token, $organisationId );

        $response = $httpClient->delete("{$slug}/{$id}");
    }


}
