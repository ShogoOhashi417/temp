<?php

require_once "CustomerModel.php";
require_once "Customer.php";
require_once "CustomerRepositoyInterface.php";

class CustomerDuplicateChecker {
    private readonly CustomerRepositoyInterface $customerRepository;

    public function __construct(CustomerRepositoyInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function exists(Customer $customer): bool
    {
        $result = $this->customerRepository->find($customer->getMailAddress()->getMailAddress());

        return true;
        // return (bool)$result;
    }
}