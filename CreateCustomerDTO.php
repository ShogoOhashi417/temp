<?php

class CreateCustomerDTO {
    private readonly string $mailAddress;
    private readonly string $name;

    public function __construct(string $mailAddress, string $name)
    {
        $this->mailAddress = $mailAddress;
        $this->name = $name;
    }

    public function getMailAddress()
    {
        return $this->mailAddress;
    }

    public function getName()
    {
        return $this->name;
    }
}