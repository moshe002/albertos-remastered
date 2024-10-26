<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * return App\Models\Customer[]
     */
    public function index()
    {
        $customers = $this->customer->all();

        return $customers;
    }

    public function create(array $params): bool
    {
        $created = false;
        $customer = $this->customer->create($params);
        if ($customer) {
            $created = true;
        }

        return $created;
    }
}
