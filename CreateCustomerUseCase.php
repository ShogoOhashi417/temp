<?php

class CreateCustomerUseCase {
    private readonly CustomerRepositoyInterface $customerRepository;
    private readonly CustomerDuplicateChecker $customerDuplicateChecker;

    public function __construct(
        CustomerRepositoyInterface $customerRepository,
        CustomerDuplicateChecker $customerDuplicateChecker)
    {
        $this->customerRepository = $customerRepository;
        $this->customerDuplicateChecker = $customerDuplicateChecker;
    }

    public function handle(string $mailAddress, string $name)
    {
        try {
            $customer = new Customer(
                new MailAddress($mailAddress),
                new CustomerName($name)
            );
        } catch (Exception $e) {
            throw $e;
        }

        if ($this->customerDuplicateChecker->exists($customer)) {
            throw new Exception('すでに同じ名前が登録されています');
        };

        $this->customerRepository->save($customer);

        return $customer;
    }
}