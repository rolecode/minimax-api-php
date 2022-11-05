<?php

namespace Rolecode\PhpMinimax\Services;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\GuzzleHttpClient;
use Rolecode\PhpMinimax\Models\Employee;
use Rolecode\PhpMinimax\Models\Organisation;
use Rolecode\PhpMinimax\Models\SearchResult;
use Rolecode\PhpMinimax\Models\UserOrganisation;
use Rolecode\PhpMinimax\Services\Requests\AllRequestService;
use Rolecode\PhpMinimax\Services\Requests\RetrieveRequestService;

class OrganisationService extends CoreServiceFactory
{
    /**
     * Retrieve all records.
     *
     * @throws ClientException if the request fails
     *
     * @return UserOrganisation[]
     */
    public function all()
    {
        $records = AllRequestService::all( $this->getClient(), "", UserOrganisation::class );

        return $records;
    }

    /**
     * Retrieve record by id.
     *
     * @param string $id
     *
     * @throws ClientException if the request fails
     *
     * @return Organisation
     */
    public function retrieve( $id )
    {
        $this->getClient()->setOrganisationId( $id );

        $record = RetrieveRequestService::retrieveById( $this->getClient(), "", Organisation::class, "" );

        return $record;
    }
}
