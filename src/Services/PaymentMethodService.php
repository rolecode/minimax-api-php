<?php

namespace Rolecode\PhpMinimax\Services;

use GuzzleHttp\Exception\ClientException;
use Rolecode\PhpMinimax\Models\Customer;
use Rolecode\PhpMinimax\Models\PaymentMethod;
use Rolecode\PhpMinimax\Services\Requests\AllRequestService;

class PaymentMethodService extends CoreServiceFactory
{
    /**
     * Retrieve all records.
     *
     * @param array $parameters Parameters are passed to request.
     *
     * @throws ClientException if the request fails
     * @return PaymentMethod[]
     */
    public function all( $parameters = [] )
    {
        $records = AllRequestService::all( $this->getClient(), "paymentMethods", PaymentMethod::class, $parameters );

        return $records;
    }
}
