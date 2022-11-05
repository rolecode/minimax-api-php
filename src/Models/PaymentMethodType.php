<?php

namespace Rolecode\PhpMinimax\Models;

class PaymentMethodType
{
    const TRANSACTION_ACCOUNT = "T";
    const CASH = "G";
    const CASH_WITH_REGISTER = "G";
    const PAYMENT_CARD = "K";
    const OTHER = "D";
}
