<?php
class DatabaseConnection{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "projektita";

    function startConnection(){
        try{
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            if(!$conn){
                //echo "Connection failed "; per testim
                return null;
            }else{
                //echo "Connection successful!"; per testim
                return $conn;
            }
            
        }catch(PDOException $e){
            echo "Connection failed ". $e->getMessage();
            return null;
        }
}
}
?>


