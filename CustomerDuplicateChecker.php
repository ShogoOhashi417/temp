<?php

require_once "CustomerModel.php";
require_once "Customer.php";

class CustomerDuplicateChecker {
    private readonly CustomerModel $customerModel;

    public function __construct(CustomerModel $customerModel)
    {
        $this->customerModel = $customerModel;
    }

    public function exists(Customer $customer): bool
    {
        // 究極、ドメインサービスにルールやロジックは全て書くことができる
        if (mb_strlen($customer->getCustomerName()->getName()) < 3) {
            throw new Exception("名前は3文字以上で入力してください");
        }

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