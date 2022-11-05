<?php

namespace Rolecode\PhpMinimax\Services;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\Models\ReportTemplate;
use Rolecode\PhpMinimax\Services\Requests\AllRequestService;
use Rolecode\PhpMinimax\Services\Requests\RetrieveRequestService;

class ReportTemplateService extends CoreServiceFactory
{

    /**
     * Retrieve all records.
     *
     * @param array $parameters Parameters are passed to request.
     *
     * @throws ClientException if the request fails
     * @return ReportTemplate[]
     */
    public function all( $parameters = [] )
    {
        $records = AllRequestService::all( $this->getClient(), "report-templates", ReportTemplate::class, $parameters );

        return $records;
    }

    /**
     * Retrieve record by id.
     *
     * @param int $id
     *
     * @throws ClientException if the request fails
     *
     * @return ReportTemplate
     */
    public function retrieve( $id )
    {
        $record = RetrieveRequestService::retrieveById( $this->getClient(), "report-templates", ReportTemplate::class, $id );

        return $record;
    }
}
