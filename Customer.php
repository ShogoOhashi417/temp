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
}