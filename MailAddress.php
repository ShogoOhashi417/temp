<?php

class MailAddress {
    private readonly string $mailAddress;

    public function __construct($mailAddress)
    {
        $this->mailAddress = $mailAddress;
    }

    public function getMailAddress()
    {
        return $this->mailAddress;
    }
}