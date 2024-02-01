<?php
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\dbConnect.php';


class blogRepository{
    private $connection;


    public function __construct()
    {
        $conn=new databaseconnection();
        $this->connection=$conn->startConnection();
        
        
    }

    public function getBlog(){
        $conn=$this->connection;

        $sql="SELECT * FROM blog";


        $statement = $conn->query($sql);
        $blogs = $statement->fetchAll();

        return $blogs;

    }





}




?>