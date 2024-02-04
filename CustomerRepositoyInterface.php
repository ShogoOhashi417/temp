<?php

interface CustomerRepositoyInterface {
    public function find(string $mailAddress): array;

    public function save(Customer $customer): void;
}