<?php

namespace Rolecode\PhpMinimax\Services\Requests;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\BaseMinimaxClient;
use Rolecode\PhpMinimax\GuzzleHttpClient;
use Rolecode\PhpMinimax\Models\DocumentNumbering;
use Rolecode\PhpMinimax\Models\SearchResult;
use Rolecode\PhpMinimax\Services\JsonMapperService;

class RetrieveRequestService
{

    /**
     * Retrieve single record by id.
     *
     * @param BaseMinimaxClient $client Contains information like organisation id and token, which are mandatory for each request.
     * @param string $slug Request will be made to this slug.
     * @param string $className Json data from request will be mapped to this class.
     * @param int $id Passed id of record will be retrieved.
     *
     * @throws ClientException if the request fails
     *
     * @return mixed
     */
    public static function retrieveById( $client, $slug, $className, $id )
    {
        // Retrieve organisation id.
        $organisationId = $client->getOrganisationId();

        // Retrieve token.
        $token = $client->getToken();

        // Make request.
        $client = new GuzzleHttpClient( $token, $organisationId );

        // Trim slashed before and after. Happens in case of organisation service because slug is empty and we end up with two trailing slashes.
        $url = trim( "{$slug}/{$id}", "/" );

        $response = $client->get( $url );

        $responseJson = $response->getBody();

        // Map resposne data to object.
        $record = JsonMapperService::mapSingle($responseJson, $className);

        return $record;
    }


    /**
     * Retrieve single record by code.
     *
     * @param BaseMinimaxClient $client Contains information like organisation id and token, which are mandatory for each request.
     * @param string $slug Request will be made to this slug.
     * @param string $className Json data from request will be mapped to this class.
     * @param string $code Passed code of record will be retrieved.
     *
     * @throws ClientException if the request fails
     *
     * @return mixed
     */
    public static function retrieveByCode( $client, $slug, $className, $code )
    {
        // Retrieve organisation id.
        $organisationId = $client->getOrganisationId();

        // Retrieve token.
        $token = $client->getToken();

        // Make request.
        $client = new GuzzleHttpClient( $token, $organisationId );

        // Trim slashed before and after. Happens in case of organisation service because slug is empty and we end up with two trailing slashes.
        $url = trim( "{$slug}/code({$code})", "/" );

        $response = $client->get( $url );

        $responseJson = $response->getBody();

        // Map resposne data to object.
        $record = JsonMapperService::mapSingle($responseJson, $className);

        return $record;
    }

}
