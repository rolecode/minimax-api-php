<?php

namespace Rolecode\PhpMinimax\Services;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\Models\Customer;
use Rolecode\PhpMinimax\Models\VatRate;
use Rolecode\PhpMinimax\Services\Requests\AllRequestService;
use Rolecode\PhpMinimax\Services\Requests\RetrieveRequestService;

class VatRateService extends CoreServiceFactory
{
    /**
     * Retrieve all records.
     *
     * @param array $parameters Parameters are passed to request.
     *
     * @throws ClientException if the request fails
     * @return VatRate[]
     */
    public function all( $parameters = [] )
    {
        $records = AllRequestService::all( $this->getClient(), "vatrates", VatRate::class, $parameters );

        return $records;
    }

    /**
     * Retrieve record by id.
     *
     * @param int $id
     *
     * @throws ClientException if the request fails
     *
     * @return VatRate
     */
    public function retrieveById( $id )
    {
        $record = RetrieveRequestService::retrieveById( $this->getClient(), "vatrates", VatRate::class, $id );

        return $record;
    }

    /**
     * Retrieve record by code.
     *
     * @param string $code
     *
     * @throws ClientException if the request fails
     *
     * @return VatRate
     */
    public function retrieveByCode( $code )
    {
        $record = RetrieveRequestService::retrieveByCode( $this->getClient(), "vatrates", VatRate::class, $code );

        return $record;
    }
}
