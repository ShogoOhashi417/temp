<?php

class CustomerName {
    private string $name;

    public function __construct(string $name)
    {
        if (mb_strlen($name) < 3) {
            throw new Exception("名前は3文字以上で入力してください");
        }
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}