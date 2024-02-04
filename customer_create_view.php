<?php

require_once "CustomerModel.php";

$customerName = '大橋省吾';

// ドメインのルール
if (mb_strlen($customerName) < 3) {
    echo '名前は3文字以上で入力してください';
    exit;
}

$customerModel = new CustomerModel(new DBServiceDB());

$customerModel->insert(
    [
        'name' => $customerName
    ]
);