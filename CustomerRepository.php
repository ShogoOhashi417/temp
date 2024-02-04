<?php
require_once 'CustomerRepositoyInterface.php';
require_once "CustomerModel.php";
require_once "CustomerModel.php";

class CustomerRepository implements CustomerRepositoyInterface {
    public function __construct()
    {   
        // DB接続情報
    }

    public function find($mailAddress): array
    {
        $customerModel = new CustomerModel(new DBServiceDB());

        $result = $customerModel->select(
            ['mail_address'],
            // [
            //     new WhereParam('mail_address', '=', $mailAddress)
            // ]
        );

        return [];
        // return $result;
    }

    public function save(Customer $customer): void
    {
        $customerModel = new CustomerModel(new DBServiceDB());

        $customerModel->insert(
            [
                'mail_address' => $customer->getMailAddress()->getMailAddress(),
                'name' => $customer->getCustomerName()->getName()
            ]
        );
    }
}