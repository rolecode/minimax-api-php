<?php

namespace Rolecode\PhpMinimax\Services\Requests;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\BaseMinimaxClient;
use Rolecode\PhpMinimax\GuzzleHttpClient;
use Rolecode\PhpMinimax\Models\SearchResult;
use Rolecode\PhpMinimax\Services\JsonMapperService;

class AllRequestService
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
    public static function all( $client, $slug, $className, $parameters = [] )
    {
        // Retrieve organisation id.
        $organisationId = $client->getOrganisationId();

        // Retrieve token.
        $token = $client->getToken();

        // Make request.
        $client = new GuzzleHttpClient( $token, $organisationId );
        $response = $client->get("{$slug}", [
            'query' => $parameters,
        ]);

        $responseJson = $response->getBody();

        // Map response data to SearchResult
        $searchResult = JsonMapperService::mapSingle($responseJson, SearchResult::class);

        // Map SearchResult rows(data) to array of objects.
        $records = JsonMapperService::mapArray($searchResult->Rows, $className, true);

        return $records;
    }
}
