<?php

namespace Rolecode\PhpMinimax\Models;

class ItemType
{
    // <ul>
    //     <li>B – Goods,</li>
    //     <li>M – Material,</li>
    //     <li>P - Semifinished product,</li>
    //     <li>I – Product,</li>
    //     <li>S – Services,</li>
    //     <li>A - Advance payment,</li>
    //     <li>AS - Pre payments for services</li>
    // </ul>

    const GOOD = "B";
    const MATERIAL = "M";
    const SEMIFINISHED_PRODUCT = "P";
    const PRODUCT = "I";
    const SERVICE = "S";
    const ADVANCE_PAYMENT = "A";
    const PRE_PAYMENT_FOR_SERVICE = "AS";
}
