<?php

namespace Rolecode\PhpMinimax\Services;

use Exception;
use Rolecode\PhpMinimax\BaseMinimaxClient;

abstract class CoreServiceFactory
{
    /**
     * Minimax client.
     *
     * @var  BaseMinimaxClient
     */
    private $client;

    /**
     * List of services.
     *
     * @var  array
     */
    private static $classMap = [
        'organisations' => OrganisationService::class,
        'documentNumberings' => DocumentNumberingService::class,
        'employees' => EmployeeService::class,
        'reportTemplates' => ReportTemplateService::class,
        'items' => ItemService::class,
        'issuedInvoices' => IssuedInvoiceService::class,
        'customers' => CustomerService::class,
        'vatRates' => VatRateService::class,
        'paymentMethods' => PaymentMethodService::class,
        'documentAttachments' => DocumentAttachmentService::class,
        'countries' => CountryService::class,
    ];

    /**
     * @param  BaseMinimaxClient
     */
    public function __construct(BaseMinimaxClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return  BaseMinimaxClient
     */
    protected function getClient()
    {
        return $this->client;
    }

    /**
     * Retrieve service class name.
     *
     * @param string $name
     *
     * @return string
     */
    public static function getServiceClass($name)
    {
        if(array_key_exists($name, self::$classMap))
            return self::$classMap[$name];

        throw new Exception("Service class with name '{$name}' dont exist.");
    }
}
