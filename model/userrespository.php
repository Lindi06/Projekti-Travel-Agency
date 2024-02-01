<?php
include_once('C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\dbConnect.php');
include_once('C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\user.php');

class userrespository {
    private $connection;

    public function __construct() {
        $conn = new databaseconnection;
        $this->connection = $conn->startConnection();
    }

    public function insertUser($user) {
        $conn = $this->connection;

        $emri = $user->getEmri();
        $mbiemri = $user->getMbiemri();
        $emaili = $user->getEmaili();
        $dataelindjes = $user->getDataELindjes();
        $username = $user->getUsername();
        $password = $user->getPasswordi();
        $joined_date = $user->getJoinedDate();

        $sql = "INSERT INTO users (emri, email, datelindja, username, passwordi, joined_date) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->execute([$emri,$mbiemri,$emaili,$dataelindjes,$username,$password,$joined_date]);


    }

    public function getAllUsers() {
        $conn = $this->connection;
    
    $sql = "SELECT * FROM users";
    $statement = $conn->prepare($sql);
    $statement->execute();

    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $users;

    }
    function updateUser($id, $emri, $mbiemri, $email, $dataelindjes, $username, $password) {
        $conn = $this->connection;
    
        $sql = "UPDATE users SET emri=?, mbiemri=?, email=?, datelindja=?, username=?, passwordi=? WHERE id=?";
    
        $statement = $conn->prepare($sql);
    
        $statement->execute([$emri, $mbiemri, $email, $dataelindjes, $username, $password, $id]);
    
        echo "<script>alert('Update was successful'); </script>";
    }
    
    public function deleteUser($id) {
        $conn = $this->connection;
    
        $sql = "DELETE FROM users WHERE Id=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
    }
    
    

    public function getUserById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM users WHERE id='$id'";

        $statement = $conn->query($sql);
        $user = $statement->fetch();

        return $user;
    }

    public function checkLogin($email, $password) {
        $conn = $this->connection;
    
        $sql = "SELECT * FROM users WHERE email = ? AND passwordi = ?";
        $statement = $conn->prepare($sql);
        $statement->bindParam(1, $email);
        $statement->bindParam(2, $password);
        $statement->execute();
    
        $result = $statement->fetch(PDO::FETCH_ASSOC);
    
        return $result;
    }
 



   public function getLoggedInUser() {
    session_start(); 

    if (isset($_SESSION['loggedInUser']) ) {
        return $_SESSION['loggedInUser'];
    }

    return null;
}


}


?>
