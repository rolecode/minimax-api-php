<?php

namespace Rolecode\PhpMinimax\Services\Requests;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\BaseMinimaxClient;
use Rolecode\PhpMinimax\GuzzleHttpClient;
use Rolecode\PhpMinimax\Models\IssuedInvoice;
use Rolecode\PhpMinimax\Models\SearchResult;
use Rolecode\PhpMinimax\Services\JsonMapperService;

class CustomActionRequest
{
    /**
     * Retrieve all records.
     *
     * @param BaseMinimaxClient $client Contains information like organisation id and token, which are mandatory for each request.
     * @param string $slug Request will be made to this slug.
     * @param string $className Json data from request will be mapped to this class.
     * @param array $parameters Parameters passed to request.
     *
     * @throws ClientException if the request fails
     *
     * @return mixed
     */
    public static function performAction( $client, $slug, $className, $id, $rowVersion, $actionName )
    {
        // Retrieve organisation id.
        $organisationId = $client->getOrganisationId();

        // Retrieve token.
        $token = $client->getToken();

        // Make request.
        $httpClient = new GuzzleHttpClient( $token, $organisationId );
        $response = $httpClient->put("{$slug}/{$id}/actions/{$actionName}", [
            'query' => [
                'rowVersion' => $rowVersion,
            ]
        ]);

        // Retrieve object by id.
        $object = RetrieveRequestService::retrieveById( $client, $slug, $className, $id );

        return $object;
    }
}
