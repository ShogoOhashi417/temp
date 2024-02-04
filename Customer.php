<?php

require_once "CustomerName.php";
require_once "MailAddress.php";

class Customer {
    private readonly MailAddress $mailAddress; //識別子

    private readonly CustomerName $customerName;

    public function __construct(MailAddress $mailAddress, CustomerName $customerName)
    {
        $this->mailAddress = $mailAddress;
        $this->customerName = $customerName;
    }

    public function getMailAddress()
    {
        return $this->mailAddress;
    }

    public function getCustomerName()
    {
        return $this->customerName;
    }

    // CustomerNameだけについてテストしたくても、DBの接続についても考えないといけない
    public function exists(Customer $customer)
    {
        $customerModel = new CustomerModel(new DBServiceDB());
        $result = $customerModel->select(
            ['name'],
            // [
            //     new WhereParam('mail_address', '=', $customer->getMailAddress()->getMailAddress())
            // ]
        );

        return true;
        // return (bool)$result[0]['name'];
    }
}