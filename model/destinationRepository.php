<?php

include_once('C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\dbConnect.php');
include_once('C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\destination.php');

class destinationrespository {
    private $connection;

    public function __construct() {
        $conn = new DatabaseConnection;
        $this->connection = $conn->startConnection();
    }


    public function insertDestination($destination){

        $conn=$this->connection;
    
      
        $name = $destination->getEmri();
        $location = $destination->getLocation();
        $description = $destination->getDescription();
        $price = $destination->getPrice();
        $photo = $destination->getPhoto();
    
        $sql = "INSERT INTO destinations (emri, location, description, price, photo) VALUES (?,?,?,?,?)";
        $statement=$conn->prepare($sql);
    
        $statement->execute([$name,$location,$description,$price,$photo]);
    
    }
    
    function getAllDestinations(){
        $conn = $this->connection;

        $sql = "SELECT * FROM destinations";

        $statement = $conn->query($sql);
        $destinations = $statement->fetchAll();

        return $destinations;
    }

    
    function getDestinationById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM destinations WHERE id='$id'";

        $statement = $conn->query($sql);
        $destination = $statement->fetch();

        return $destination;
    }
    
    function deleteDestination($id){
        $conn = $this->connection;

        $sql = "DELETE FROM destinations WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);

        echo "<script>alert('delete was successful'); </script>";
   } 

   function insertBooking($ticket){
        $conn= $this->connection;




   }
}
?>

   

