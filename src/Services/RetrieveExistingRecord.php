<?php

namespace Rolecode\PhpMinimax\Services;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\BaseMinimaxClient;
use Rolecode\PhpMinimax\GuzzleHttpClient;
use Rolecode\PhpMinimax\Models\DocumentNumbering;
use Rolecode\PhpMinimax\Models\SearchResult;
use Rolecode\PhpMinimax\Services\JsonMapperService;
use Rolecode\PhpMinimax\Services\Requests\AllRequestService;

class RetrieveExistingRecord
{

    /**
     * Check if same record already exist and retrieve it.
     *
     * @param string $searchString
     * @param BaseMinimaxClient $client Contains information like organisation id and token, which are mandatory for each request.
     * @param string $slug Request will be made to this slug.
     * @param string $className Json data from request will be mapped to this class.
     * @param bool $returnOnlyUniqueRecord If more records are found still return first one.
     *
     * @throws ClientException if the request fails
     *
     * @return mixed|null Return existing record.
     */
    public static function retrieve( $searchString, $client, $slug, $className, $returnOnlyUniqueRecord = false )
    {
        if( !empty($searchString) )
        {
            // Search item by name.
            $records = AllRequestService::all( $client, $slug, $className, [
                'SearchString' => $searchString,
                'SortField' => 'ItemId',
                'Order' => 'A',
            ] );

            // Return existing record.
            if( count($records) == 1 )
            {
                return $records[0];
            }
            // Return first record of existing many.
            else if( $returnOnlyUniqueRecord &&  count($records) > 0){
                return $records[0];
            }
        }

        return null;
    }


}
