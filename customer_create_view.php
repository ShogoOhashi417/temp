<?php

require_once "CustomerModel.php";
require_once "Customer.php";
require_once "CustomerName.php";
require_once "MailAddress.php";
require_once "CustomerDuplicateChecker.php";
require_once "CustomerRepository.php";
require_once "CreateCustomerUseCase.php";

$customerRepository = new CustomerRepository();

$createCustomerUseCase = new CreateCustomerUseCase(
    $customerRepository,
    new CustomerDuplicateChecker($customerRepository)
);

$mailAddress = "sohashi@kairosmarketing.net";
$name = "大橋省吾";

try {
    $customer = $createCustomerUseCase->handle($mailAddress, $name);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

//　データを取り出すことだけに制限できる
echo PHP_EOL;
echo "保存に成功しました。顧客名：" . $customer->getName();