<?php

namespace Rolecode\PhpMinimax\Models;

class DocumentAttachment
{
    // Document attachment id.
    // Mandatory field. Ignored on create request.
    public $DocumentAttachmentId;
    // Document.
    public $Document;
    // Attachment description.
    // Mandatory field. Max length: 8000
    public $Description;

    // Attachment data (base64 string)
    public $AttachmentData;

    // Attachment name for file.
    // Max length: 250
    public $FileName;
    // Attachment mime type.
    // Max length: 250
    public $MimeType;
    // Entry date.
    public $EntryDate;
    public $RecordDtModified;
    // Row version is used for concurrency check.
    // Mandatory field. Ignored on create request.
    public $RowVersion;


    /**
     * Decode AttachmentData which is in base64 string.
     */
    public function getDecodedAttachmentData(){
        return base64_decode( $this->AttachmentData );
    }
}
