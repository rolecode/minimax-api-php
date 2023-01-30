<?php

namespace Rolecode\PhpMinimax\Services;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\Models\Country;
use Rolecode\PhpMinimax\Models\Customer;
use Rolecode\PhpMinimax\Services\Requests\AllRequestService;
use Rolecode\PhpMinimax\Services\Requests\CreateRecordRequest;
use Rolecode\PhpMinimax\Services\Requests\DeleteRecordRequest;
use Rolecode\PhpMinimax\Services\Requests\RetrieveRequestService;
use Rolecode\PhpMinimax\Services\Requests\UpdateRecordRequest;

class CountryService extends CoreServiceFactory
{
    /**
     * Retrieve all records.
     *
     * @param array $parameters Parameters are passed to request.
     *
     * @throws ClientException if the request fails
     * @return Country[]
     */
    public function all( $parameters = [] )
    {
        $records = AllRequestService::all( $this->getClient(), "countries", Country::class, $parameters );

        return $records;
    }

    /**
     * Retrieve record by id.
     *
     * @param int $id
     *
     * @throws ClientException if the request fails
     *
     * @return Country
     */
    public function retrieveById( $id )
    {
        $record = RetrieveRequestService::retrieveById( $this->getClient(), "countries", Country::class, $id );

        return $record;
    }

    /**
     * Retrieve record by code.
     *
     * @param string $code
     *
     * @throws ClientException if the request fails
     *
     * @return Country
     */
    public function retrieveByCode( $code )
    {
        $record = RetrieveRequestService::retrieveByCode( $this->getClient(), "countries", Country::class, $code );

        return $record;
    }
}
