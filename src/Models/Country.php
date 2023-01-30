<?php

namespace Rolecode\PhpMinimax\Models;

class Country
{
    // Country id.
    // Mandatory field. Ignored on create request.
    public $CountryId;
    // Country code.
    // Max length: 30
    public $Code;
    // Country name.
    // Max length: 250
    public $Name;
    // Country currency.
    public $Currency;

}
