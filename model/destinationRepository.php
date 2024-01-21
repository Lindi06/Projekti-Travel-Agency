<?php
include_once('C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\dbConnect.php');
include_once('C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\destination.php');

class destinationrespository {
    private $connection;

    public function __construct() {
        $conn = new DatabaseConnection;
        $this->connection = $conn->startConnection();
    }

    public function insertDestination($destination) {
        $conn = $this->connection;
    
        $name = $destination->getEmri();
        $location = $destination->getLocation();
        $description = $destination->getDescription();
        $price = $destination->getPrice();
        $photo = $destination->getPhoto();
    
        $sql = "INSERT INTO destinations (emri, location, description, price, photo) 
                VALUES (?, ?, ?, ?, ?)";
    
        // Prepare and execute the SQL statement
        $statement = $conn->prepare($sql);
        $statement->bind_param("sssss", $name, $location, $description, $price, $photo);
    
     
    
        $statement->close();
    }
    

    public function getAllDestinations() {
        $conn = $this->connection;
    
        $sql = "SELECT * FROM destinations";
        $result = $conn->query($sql);
    
        $destinations = [];
        while ($row = $result->fetch_assoc()) {
            $destination = new destination();
            $destination->setId($row['id']);
            $destination->setEmri($row['emri']);
            $destination->setLocation($row['location']);
            $destination->setDescription($row['description']);
            $destination->setPrice($row['price']);
            $destination->setPhoto($row['photo']);
    
            $destinations[] = $destination;
        }
    
        return $destinations;
    }
    
    function getDestinationById($id) {
        $conn = $this->connection;
    
        $sql = "SELECT * FROM destinations WHERE id=?";
        $statement = $conn->prepare($sql);
        $statement->bind_param("i", $id); 
        $statement->execute();
    
        $result = $statement->get_result();
        
        // Check if a row is found
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
    
            $destination = new destination();
            $destination->setId($row['id']);
            $destination->setEmri($row['emri']);
            $destination->setLocation($row['location']);
            $destination->setDescription($row['description']);
            $destination->setPrice($row['price']);
            $destination->setPhoto($row['photo']);
    
            return $destination;
        } else {
            return null; // Return null if no destination found
        }
        
        $statement->close();
    }
    

    public function deleteDestination($destinationId) {
        $conn = $this->connection;

        try {
            $sql = "DELETE FROM destinations WHERE id = ?";
            $statement = $conn->prepare($sql);
            $statement->bind_param("i", $destinationId);
            $statement->execute();

            echo "Destination deleted successfully";
        } catch (Exception $e) {
            echo "Error deleting destination: " . $e->getMessage();
        }
    }
    }

   
?>
