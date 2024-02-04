<?php

require_once "CustomerModel.php";
require_once "CustomerName.php";

try {
    $customerName = new CustomerName("大橋省吾");
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

$customerModel = new CustomerModel(new DBServiceDB());

$customerModel->insert(
    [
        'name' => $customerName->getName()
    ]
);