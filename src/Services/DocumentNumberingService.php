<?php

namespace Rolecode\PhpMinimax\Services;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\GuzzleHttpClient;
use Rolecode\PhpMinimax\Models\DocumentNumbering;
use Rolecode\PhpMinimax\Models\ReportTemplate;
use Rolecode\PhpMinimax\Models\SearchResult;
use Rolecode\PhpMinimax\Services\Requests\AllRequestService;
use Rolecode\PhpMinimax\Services\Requests\RetrieveRequestService;

class DocumentNumberingService extends CoreServiceFactory
{

    /**
     * Retrieve all records.
     *
     * @param array $parameters Parameters are passed to request.
     *
     * @throws ClientException if the request fails
     * @return DocumentNumbering[]
     */
    public function all( $parameters = [] )
    {
        $records = AllRequestService::all( $this->getClient(), "document-numbering", DocumentNumbering::class, $parameters );

        return $records;
    }



    /**
     * Retrieve record by id.
     *
     * @param int $id
     *
     * @throws ClientException if the request fails
     *
     * @return DocumentNumbering
     */
    public function retrieve( $id )
    {
        $record = RetrieveRequestService::retrieveById( $this->getClient(), "document-numbering", DocumentNumbering::class, $id );

        return $record;
    }
}
