<?php

class CustomerNoSQLRepository implements CustomerRepositoyInterface {
    public function __construct()
    {
        // DB接続情報
    }

    public function find($mailAddress): array
    {
        // DBからデータを取得して返す
    }

    public function save(Customer $customer): void
    {
        // DBにデータを保存する
    }
}