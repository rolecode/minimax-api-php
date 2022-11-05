<?php

namespace Rolecode\PhpMinimax\Services;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\Models\IssuedInvoice;
use Rolecode\PhpMinimax\Services\Requests\AllRequestService;
use Rolecode\PhpMinimax\Services\Requests\CreateRecordRequest;
use Rolecode\PhpMinimax\Services\Requests\CustomActionRequest;
use Rolecode\PhpMinimax\Services\Requests\RetrieveRequestService;

class IssuedInvoiceService extends CoreServiceFactory
{
    /**
     * Retrieve all records.
     *
     * @param array $parameters Parameters are passed to request.
     *
     * @throws ClientException if the request fails
     * @return IssuedInvoice[]
     */
    public function all( $parameters = [] )
    {
        $records = AllRequestService::all( $this->getClient(), "issuedinvoices", IssuedInvoice::class, $parameters );

        return $records;
    }

    /**
     * Retrieve record by id.
     *
     * @param int $id
     *
     * @throws ClientException if the request fails
     *
     * @return IssuedInvoice
     */
    public function retrieveById( $id )
    {
        $record = RetrieveRequestService::retrieveById( $this->getClient(), "issuedinvoices", IssuedInvoice::class, $id );

        return $record;
    }

    /**
     * Create record.
     *
     * @param IssuedInvoice $object
     * @param array $options
     *
     * @throws ClientException if the request fails
     *
     * @return IssuedInvoice
     */
    public function create( $object, $options = [] )
    {
        $record = CreateRecordRequest::create( $this->getClient(), "issuedinvoices", $object );

        return $record;
    }

    /**
     * Perform custom action.
     *
     * @param IssuedInvoice $object
     * @param array $options
     *
     * @throws ClientException if the request fails
     *
     * @return IssuedInvoice
     */
    public function performAction( $id, $rowVersion, $actionName )
    {
        $record = CustomActionRequest::performAction( $this->getClient(), "issuedinvoices", IssuedInvoice::class, $id, $rowVersion,  $actionName );

        return $record;
    }
}
