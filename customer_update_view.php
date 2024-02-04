<?php

require_once "CustomerModel.php";

$customerName = '大橋省吾';

// 顧客名を保存する箇所全てでこの条件を書かなければならない
// そもそも書き忘れる場合もある
if (mb_strlen($customerName) < 3) {
    echo '名前は3文字以上で入力してください';
    exit;
}

$customerModel = new CustomerModel(new DBServiceDB());

$customerModel->update(
    [
        'name' => $customerName
    ]
);