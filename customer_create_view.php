<?php

require_once "CustomerModel.php";
require_once "Customer.php";
require_once "CustomerName.php";
require_once "MailAddress.php";
require_once "CustomerDuplicateChecker.php";
require_once "CustomerRepository.php";

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
// $customerModel = new CustomerModel(new DBServiceDB());

// DBの切り替えが安全でシンプル
$customerRepository = new CustomerRepository();
// $customerRepository = new CustomerNoSQLRepository();

// $customerDuplicatChecker = new CustomerDuplicateChecker($customerModel);
$customerDuplicatChecker = new CustomerDuplicateChecker($customerRepository);

if ($customerDuplicatChecker->exists($customer)) {
    echo $customer->getMailAddress()->getMailAddress() . "はすでに登録されています";
    exit;
}

$customerRepository->save($customer);

// $customerModel->insert(
//     [
//         'mail_address' => $customer->getMailAddress()->getMailAddress(),
//         'name' => $customer->getCustomerName()->getName()
//     ]
// );