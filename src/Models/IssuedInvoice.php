<?php

namespace Rolecode\PhpMinimax\Models;

class IssuedInvoice
{
    // Issued invoice id.
    // Mandatory field. Ignored on create request.
    public $IssuedInvoiceId;
    // Invoice year.
    public $Year;
    // Invoice number.
    public $InvoiceNumber;

    // Document numbering.
    /** @var mMApiFkField */
    public $DocumentNumbering;

    // Customer.
    /** @var mMApiFkField */
    public $Customer;

    // Invoice date.
    // Mandatory field.
    public $DateIssued;
    // Date of transaction.
    public $DateTransaction;
    // Start date of transaction.
    public $DateTransactionFrom;
    // Invoice due date.
    // Mandatory field.
    public $DateDue;
    // Addressee name.
    // Max length: 250
    public $AddresseeName;
    // Addressee address.
    // Max length: 250
    public $AddresseeAddress;
    // Addressee postal code.
    // Max length: 30
    public $AddresseePostalCode;
    // Addressee city.
    // Max length: 250
    public $AddresseeCity;
    // Addressee country name. Prohibited use when AddresseeCountry is set as home country.
    // Max length: 250
    public $AddresseeCountryName;

    // Addressee country.
    /** @var mMApiFkField */
    public $AddresseeCountry;

    // Recipient name.
    // Max length: 250
    public $RecipientName;
    // Recipient address.
    // Max length: 250
    public $RecipientAddress;
    // Recipient postal code.
    // Max length: 30
    public $RecipientPostalCode;
    // Recipient city.
    // Max length: 250
    public $RecipientCity;
    // Recipient country name. Prohibited use when RecipientCountry is set as home country.
    // Max length: 250
    public $RecipientCountryName;
    // Recipient country.
    public $RecipientCountry;
    // Rabate percent.
    public $Rabate;
    // Exchange rate.
    public $ExchangeRate;
    // Document reference.
    public $DocumentReference;
    // Payment reference.
    public $PaymentReference;

    // Currency.
    /** @var mMApiFkField */
    public $Currency;

    // Analytic.
    public $Analytic;

    /** @var mMApiFkField */
    // Document.
    public $Document;

    // Report settings for issued invoices:
    // <ul>
    //     <li>IR – for issued invoice,</li>
    //     <li>DP – for credit note,</li>
    //     <li>UP – for issued invoice with order for payment.</li>
    // </ul>
    // Report settings for proforma invoices:
    // <ul>
    //     <li>PR – for proforma invoice,</li>
    //     <li>PUPN – for proforma invoice with order for payment.</li>
    // </ul>
    /** @var mMApiFkField */
    public $IssuedInvoiceReportTemplate;

    // Report settings for delivery note:
    // <ul>
    //     <li>DO – for delivery note </li>
    // </ul>
    /** @var mMApiFkField */
    public $DeliveryNoteReportTemplate;

    // Issued invoice and proforma invoice status:
    // <ul>
    //     <li>O – Draft,</li>
    //     <li>I - Issued</li>
    // </ul>
    // Mandatory field. Max length: 1
    public $Status;
    // The description that appears on issued invoice and proforma invoice above.
    // Max length: 8000
    public $DescriptionAbove;
    // The description that appears on issued invoice and proforma invoice below.
    // Max length: 8000
    public $DescriptionBelow;
    // The description that appears on delivery note above.
    // Max length: 8000
    public $DeliveryNoteDescriptionAbove;
    // The description that appears on delivery note below.
    // Max length: 8000
    public $DeliveryNoteDescriptionBelow;
    // Notes.
    // Max length: 1000
    public $Notes;

    // Employee.
    /** @var mMApiFkField */
    public $Employee;

    // Price calculation type(VAT):
    // <ul>
    //     <li>D - VAT is included in the price</li>
    //     <li>N - VAT is added to the prices</li>
    // </ul>
    // Max length: 1
    public $PricesOnInvoice;
    // Recurring Invoice:
    // <ul>
    //     <li>D – yes,</li>
    //     <li>N – no.</li>
    // </ul>
    // Max length: 1
    public $RecurringInvoice;

    // Invoice attachment (PDF invoice document).
    /** @var mMApiFkField */
    public $InvoiceAttachment;

    // e-invoice XML file.
    /** @var mMApiFkField */
    public $EInvoiceAttachment;

    // Input type:
    // <ul>
    //     <li>R – issued invoice,</li>
    //     <li>P – proforma invoice.</li>
    // </ul>
    // Mandatory field. Max length: 1
    public $InvoiceType;
    // Source document type for e-invoice:
    // <ul>
    //     <li>IV - invoice</li>
    //     <li>AAB – proforma invoice</li>
    //     <li>AAK – delivery note</li>
    //     <li>CD – credit note</li>
    //     <li>CT - contract</li>
    //     <li>ON - purchase order</li>
    //     <li>VN - sales order</li>
    //     <li>AEP - project</li>
    //     <li>ALO - recipient</li>
    //     <li>GC - public tender</li>
    //     <li>ATS - object</li>
    // </ul>
    // Max length: 30
    public $OriginalDocumentType;
    // Source document date for e-invoice.
    public $OriginalDocumentDate;
    // Purpose code for e-invoice and invoice with order for payment.
    public $PurposeCode;
    // Payment status:
    // <ul>
    //     <li>Placan – Paid</li>
    //     <li>DelnoPlacanZapadel – Partially paid, Overdue</li>
    //     <li>DelnoPlacanNezapadel – Partially paid, Not yet due</li>
    //     <li>NeplacanZapadel – Unpaid, Overdue</li>
    //     <li>NeplacanNezapadel – Unpaid, Not yet due</li>
    //     <li>Osnutek – Draft</li>
    //     <li>Avans – Advance payment</li>
    // </ul>
    // Max length: 20
    public $PaymentStatus;
    // Invoice value (domestic currency).
    public $InvoiceValue;
    // Paid value (domestic currency).
    public $PaidValue;
    // Association With Issue From Stock:
    // <ul>
    //     <li>N – no</li>
    //     <li>D – yes</li>
    // </ul>
    // Max length: 1
    public $AssociationWithStock;

    // Invoice rows.
    /** @var IssuedInvoiceRow[] */
    public $IssuedInvoiceRows;

    // Payment methods.
    /** @var IssuedInvoicePaymentMethod[] */
    public $IssuedInvoicePaymentMethods;

    public $RecordDtModified;
    // Row version is used for concurrency check.
    // Mandatory field. Ignored on create request.
    public $RowVersion;
}
