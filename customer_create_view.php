<?php

require_once "CustomerModel.php";
require_once "Customer.php";
require_once "CustomerName.php";
require_once "MailAddress.php";
require_once "CustomerDuplicateChecker.php";

try {
    $customer = new Customer(
        new MailAddress("sohashi@kairosmarketing.net"),
        new CustomerName("大橋省吾")
    );
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

// CustomerModelは特定のデータストアに依存している
$customerModel = new CustomerModel(new DBServiceDB());

$customerDuplicatChecker = new CustomerDuplicateChecker($customerModel);

if ($customerDuplicatChecker->exists($customer)) {
    echo $customer->getMailAddress()->getMailAddress() . "はすでに登録されています";
    exit;
}

$customerModel->insert(
    [
        'mail_address' => $customer->getMailAddress()->getMailAddress(),
        'name' => $customer->getCustomerName()->getName()
    ]
);