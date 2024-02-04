<?php

class CustomerModel {
    private readonly DBServiceDB $ldb;

    public function __construct(DBServiceDB $ldb)
    {
        $this->ldb = $ldb;
    }

    public function insert(array $dataList)
    {
        echo $dataList['name'] . "を保存しました";
    }

    public function update(array $dataList)
    {
        echo $dataList['name'] . "に更新しました";
    }

    public function select(array $sql)
    {

    }
}

class DBServiceDB {

}