<?php

require_once "CustomerModel.php";
require_once "Customer.php";
require_once "CustomerName.php";
require_once "MailAddress.php";

try {
    $customer = new Customer(
        new MailAddress("sohashi@kairosmarketing.net"),
        new CustomerName("大橋省吾")
    );
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

$customerModel = new CustomerModel(new DBServiceDB());

$customerModel->insert(
    [
        'mail_address' => $customer->getMailAddress()->getMailAddress(),
        'name' => $customer->getCustomerName()->getName()
    ]
);