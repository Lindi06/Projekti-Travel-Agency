<?php
class destination{
    private $id;
    private $emri;
    private $location;
    private $description;
    private $price;
    private $photo;

    public function __construct($id='',$emri = '', $location = '', $description = '', $price = 0, $photo = ''){
        $this->id=$id;
        $this->emri=$emri;
        $this->location=$location;
        $this->description=$description;
        $this->price=$price;
        $this->photo=$photo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id){
        $this->id=$id;
    }


    public function getEmri(){
        return $this->emri;
    }

    public function setEmri($emri){
        $this->emri=$emri;
    }

    public function getLocation(){
        return $this->location;
    }

    public function setLocation($location){
        $this->location=$location;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description=$description;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price=$price;
    }

    public function getPhoto(){
        return $this->photo;
    }

    public function setPhoto($photo){
        $this->photo=$photo;
    }


   






}


?>