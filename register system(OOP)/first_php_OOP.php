<?php
class Customer
{
    public $id;
    public $name;
    public $mail;

    public function getCustomer($id)
    {
        $this->id = $id;
        return 'jon';
    }
}

$customer  = new Customer;
echo $customer->getCustomer(1);
