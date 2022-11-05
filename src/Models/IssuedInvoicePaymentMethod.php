<?php

namespace Rolecode\PhpMinimax\Models;

class IssuedInvoicePaymentMethod
{
    // Issued invoice payment method id.
    // Mandatory field. Ignored on create request.
    public $IssuedInvoicePaymentMethodId;

    // Issued invoice.
    /** @var mMApiFkField */
    public $IssuedInvoice;

    // Payment method.
    /** @var mMApiFkField */
    public $PaymentMethod;

    // Cash register, if payment goes through a cash register.
    public $CashRegister;
    // Revenue, if payment goes through a cash register.
    public $Revenue;
    // Revenue date, if payment goes through a cash register.
    public $RevenueDate;
    // Payment amount in invoice currency.
    public $Amount;
    // Payment amount in domestic currency.
    public $AmountInDomesticCurrency;
    // Already paid flag:
    // <ul>
    //     <li>D – amount was already paid at the time of issuing the invoice,</li>
    //     <li>N – amount was not already paid at the time of issuing the invoice.</li>
    // </ul>
    // Mandatory field. Max length: 1
    public $AlreadyPaid;
    public $RecordDtModified;
    // Row version is used for concurrency check.
    // Mandatory field. Ignored on create request.
    public $RowVersion;
}
