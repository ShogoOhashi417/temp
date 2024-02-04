<?php

require_once "CustomerModel.php";
require_once "Customer.php";

class CustomerDuplicateChecker {
    private readonly CustomerModel $customerModel;

    // CustomerModelは特定のデータストアに依存している
    // ドメインサービスなのに、永続化の責務も持ってしまっている
    public function __construct(CustomerModel $customerModel)
    {
        $this->customerModel = $customerModel;
    }

    public function exists(Customer $customer): bool
    {
        $result = $this->customerModel->select(
            ['name'],
            // [
            //     new WhereParam('mail_address', '=', $customer->getMailAddress()->getMailAddress())
            // ]
        );

        return true;

        // return (bool)$result[0]['name'];
    }
}