<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Models\Customer;
use App\Services\CustomerService;
use Exception;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        try {
            $customers = $this->customerService->index();
            $this->response['data'] = $customers;
        } catch (Exception $e) {
            $this->response = [
                'error' => $e->getMessage(),
                'code' => 500,
            ];
        }

        return response()->json($this->response, $this->response['code']);
    }

    public function store(CreateCustomerRequest $request)
    {
        try {
            $formData = [
                'name' => $request->getName(),
                'address' => $request->getAddress(),
                'phone_number' => $request->getPhoneNumber(),
                'email' => $request->getEmail(),
                'password' => $request->getPassword(),
            ];

            $created = $this->customerService->create($formData);
            $this->response['data'] = $created;
        } catch (Exception $e) {
            $this->response = [
                'error' => $e->getMessage(),
                'code' => 500,
            ];
        }

        return response()->json($this->response, $this->response['code']);
    }

    public function destroy(int $id)
    {
        $deleted = Customer::destroy(1);

        if ($deleted) {
            return response()->json('Customer deleted.', 200);
        } else {
            return response()->json('Customer deletion unsuccessful.', 500);
        }
    }
}
