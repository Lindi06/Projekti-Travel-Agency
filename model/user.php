<?php
class user{
    private $Id; //e kemi shtu Id direkt ne db me AutoIncrement
    private $Emri;
    private $Mbiemri;
    private $Emaili;
    private $username;
    private $DataELindjes;
    private $passwordi;
    private $role;
    private $joined_date;
  


    public function __construct($emri, $mbiemri, $emaili, $datelindja, $username, $passwordi, $role, $joined_date){
        $this->Emri=$emri;
        $this->Mbiemri=$mbiemri;
        $this->Emaili=$emaili;
        $this->DataELindjes=$datelindja;
        $this->role=$role;
        $this->username=$username;
        $this->passwordi=$passwordi;
        $this->joined_date=$joined_date;
    
    }



    public function getEmri(){
        return $this->Emri;
    }
    public function setEmri($e){
        $this->Emri = $e;
    }

    public function getMbiemri(){
        return $this->Mbiemri;
    }
    public function setMbiemri($e){
        $this->Mbiemri = $e;
    }

    public function getEmaili(){
        return $this->Emaili;
    }
    public function setEmaili($e){
        $this->Emaili = $e;
    }

    public function getDataELindjes(){
        return $this->DataELindjes;
    }
    public function setDataELindjes($e){
        $this->DataELindjes = $e;
    }

    public function getUsername(){
        return $this->username;
    }
    public function setUsername($un){
        $this->username = $un;
    }

    


    public function getPasswordi(){
        return $this->passwordi;
    }
    public function setPasswordi($p){
        $this->passwordi=$p;
    }

    public function getRole(){
        return $this->role;
    }
    public function setRole($r){
        $this->role=$r;
    } 
    
    public function getJoinedDate(){
        return $this->joined_date;
    }
    public function setJoinedDate($jd){
        $this->joined_date=$jd;
    }

  



    public function __toString(){
        return "Emri: ".$this->Emri." dhe mbiemri ".$this->Mbiemri;
    }
}
?>