<?php

namespace Rolecode\PhpMinimax;

use Rolecode\PhpMinimax\Services\CoreServiceFactory;
use Rolecode\PhpMinimax\Services\CustomerService;
use Rolecode\PhpMinimax\Services\DocumentAttachmentService;
use Rolecode\PhpMinimax\Services\DocumentNumberingService;
use Rolecode\PhpMinimax\Services\EmployeeService;
use Rolecode\PhpMinimax\Services\IssuedInvoiceService;
use Rolecode\PhpMinimax\Services\ItemService;
use Rolecode\PhpMinimax\Services\OrganisationService;
use Rolecode\PhpMinimax\Services\PaymentMethodService;
use Rolecode\PhpMinimax\Services\ReportTemplateService;
use Rolecode\PhpMinimax\Services\VatRateService;


/**
 * List of available properties for API.
 *
 * @property OrganisationService $organisations
 * @property DocumentNumberingService $documentNumberings
 * @property EmployeeService $employees
 * @property ReportTemplateService $reportTemplates
 * @property ItemService $items
 * @property IssuedInvoiceService $issuedInvoices
 * @property CustomerService $customers
 * @property VatRateService $vatRates
 * @property PaymentMethodService $paymentMethods
 * @property DocumentAttachmentService $documentAttachments
 */
class MinimaxClient extends BaseMinimaxClient
{
    /**
     * Selected service that we will call.
     *
     * @var CoreServiceFactory
     */
    private $coreServiceFactory;


    /**
     * Property name is exchanged for service class.
     *
     * @property string
     *
     * @return CoreServiceFactory
     */
    public function __get($name)
    {
        // Property name is mapped to service class.
        $className = CoreServiceFactory::getServiceClass($name);

        // Save service class.
        $this->coreServiceFactory = new $className($this);

        return $this->coreServiceFactory;
    }
}
