<?php

namespace Rolecode\PhpMinimax\Models;

// Link with id, name and url to related data.
class mMApiFkField
{
    // Record id.
    public $ID;
    // Record name.
    public $Name;
    // Url to full record details.
    public $ResourceUrl;

    public function __construct( $id ){
        $this->ID = $id;
    }
}
