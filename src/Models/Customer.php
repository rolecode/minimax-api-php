<?php

namespace Rolecode\PhpMinimax\Models;

class Customer
{
    // Customer id.
    // Mandatory field. Ignored on create request.
    public $CustomerId;
    // Customer code, unique within organisation.
    // Max length: 10
    public $Code;
    // Customer name.
    // Max length: 250
    public $Name;
    // Customer address.
    // Max length: 250
    public $Address;
    // Customer postal code.
    // Max length: 30
    public $PostalCode;
    // Customer city.
    // Max length: 250
    public $City;
    // Customer country.
    public $Country;
    // Country name.
    // Max length: 250
    public $CountryName;
    // Customer tax number.
    // Max length: 30
    public $TaxNumber;
    // Customer registration number.
    // Max length: 30
    public $RegistrationNumber;
    // Customer VAT Identification Number.
    // Max length: 30
    public $VATIdentificationNumber;
    // Customer VAT settings.<br/>
    // For EU customers:
    // <ul>
    //     <li>D - Legal person or a person with business who is subject to VAT,</li>
    //     <li>M - Legal person or a person with business who is NOT subject to VAT,</li>
    //     <li>N – Enduser.</li>
    // </ul>
    // For customers outside EU:
    // <ul>
    //     <li>D - Legal person (VAT on the issued invoice is not to be accounted for),</li>
    //     <li>N – Enduser.</li>
    // </ul>
    // Mandatory field. Max length: 1
    public $SubjectToVAT;
    // Take customers country into account for bookkeeping (Foreign endusers only).
    // Usage:
    // <ul>
    //     <li>D - Yes,</li>
    //     <li>N - No.</li>
    // </ul>
    // Max length: 1
    public $ConsiderCountryForBookkeeping;
    // Default currency.
    public $Currency;
    // Invoice expiration days.
    // Mandatory field.
    public $ExpirationDays;
    // Rebate (%)
    // Mandatory field.
    public $RebatePercent;
    // Web site.
    // Max length: 100
    public $WebSiteURL;
    // e-Invoices issuing type:
    // <ul>
    //     <li>SeNePripravlja  - None(won't be prepared)</li>
    //     <li>RocniIzvoz  - Import to bank</li>
    //     <li>Ponudnik  -Import to ZZInet</li>
    //     <li>EPosta  - Send by email</li>
    // <ul>
    // Mandatory field. Max length: 1
    public $EInvoiceIssuing;
    // Internal reference for e-invoices.
    // Max length: 30
    public $InternalCustomerNumber;
    // Usage:
    // <ul>
    //     <li>D - Yes,</li>
    //     <li>N - No.</li>
    // </ul>
    // Mandatory field. Max length: 1
    public $Usage;
    public $RecordDtModified;
    // Row version is used for concurrency check.
    // Mandatory field. Ignored on create request.
    public $RowVersion;
}
