<?php

namespace Rolecode\PhpMinimax\Models;

class VatRate
{
    // Vat rate id.
    // Mandatory field. Ignored on create request.
    public $VatRateId;
    // VAT rate codes:
    // <ul>
    //     <li>S - Standard rate</li>
    //     <li>Z - Reduced rate</li>
    //     <li>P - Flat rate</li>
    //     <li>0 - Lower rate</li>
    //     <li>O - Exempted</li>
    //     <li>N - Non-taxable</li>
    // <ul>
    // Mandatory field. Max length: 30
    public $Code;
    // Interest percent.
    public $Percent;

    // VatRate Percentage.
    /** @var mMApiFkField */
    public $VatRatePercentage;
}
