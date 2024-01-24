<?php

class blog{
    private $id;
    private $customer;
    private $description;


    public function blog($customer,$description){
        $this->customer=$customer;
    }

    public function getCustomer(){
        return $this->customer;
    }

    public function setCustomer($c){
        $this->customer=$c;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($d){
        $this->description=$d;
    }
}





?>