<?php

namespace Rolecode\PhpMinimax\Models;

class VatRateCode
{
    // VAT rate codes:
    // <ul>
    //     <li>S - Standard rate</li>
    //     <li>Z - Reduced rate</li>
    //     <li>P - Flat rate</li>
    //     <li>0 - Lower rate</li>
    //     <li>O - Exempted</li>
    //     <li>N - Non-taxable</li>
    // <ul>

    const STANDARD = "S";
    const REDUCED = "Z";
    const FLAT = "P";
    const LOWER = "0";
    const EXEMPTED = "O";
    const NON_TAXABLE = "N";
}
