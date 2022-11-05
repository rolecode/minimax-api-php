<?php

namespace Rolecode\PhpMinimax\Services;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\Models\DocumentAttachment;
use Rolecode\PhpMinimax\Models\Employee;
use Rolecode\PhpMinimax\Services\Requests\RetrieveRequestService;

class DocumentAttachmentService extends CoreServiceFactory
{
    /**
     * Retrieve record by id.
     *
     * @param int $documentId
     * @param int $documentAttachmentId
     *
     * @throws ClientException if the request fails
     *
     * @return DocumentAttachment
     */
    public function retrieve( $documentId, $documentAttachmentId )
    {
        $record = RetrieveRequestService::retrieveById( $this->getClient(), "documents/{$documentId}/attachments", DocumentAttachment::class, $documentAttachmentId );

        return $record;
    }
}
