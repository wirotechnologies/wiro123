<?php
// api/src/Controller/CustomersInitController.php

namespace App\Controller;

use App\Entity\Customers;
use App\Entity\Addresses;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class CustomersInitController
{
    private $customers;

    public function __construct(HomeController $customers)
    {
        $this->customers = $customers;
    }

    /**
     * @Route(
     *     name="get_customers",
     *     path="/init",
     *     methods={"GET"},
     *     defaults={
     *         "_api_item_operation_name"="customers"
     *     }
     * )
     */
    public function __invoke($data): JsonResponse
    {
        

        return $this->customers->handle($data);
    }
}