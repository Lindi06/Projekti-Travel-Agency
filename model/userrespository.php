<?php
include_once('dbConnect.php');
include_once('user.php');

class userrespository {
    private $connection;

    public function __construct() {
        $conn = new DatabaseConnection;
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

        $sql = "INSERT INTO users (emri, mbiemri, email, datelindja, username, passwordi, joined_date) VALUES (?,?,?,?,?,?,?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param("sssssss", $emri, $mbiemri, $emaili, $dataelindjes, $username, $password, $joined_date);
        
        if ($statement->execute()) {
            echo "<script>alert('U shtua me sukses!')</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "')</script>";
        }
    }

    public function getAllUsers() {
        $conn = $this->connection;

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        $users = [];
        while ($userArray = $result->fetch_assoc()) {
            $user = new user(
                $userArray['emri'],
                $userArray['mbiemri'],
                $userArray['email'],
                $userArray['datelindja'],
                $userArray['username'],
                $userArray['passwordi'],
                $userArray['role'],
                $userArray['joined_date']
            );
            $users[] = $user;
        }

        return $users;
    }

    public function editStudent($id, $emri, $mbiemri, $emaili, $dataelindjes, $username, $password) {
        $conn = $this->connection;
        $sql = "UPDATE users SET emri=?,mbiemri=?, emaili=?, datelindja=?, username=?, passwordi=? WHERE Id=?";

        $statement = $conn->prepare($sql);
        $statement->bind_param("ssssssi", $emri, $mbiemri, $emaili, $dataelindjes, $username, $password, $id);

        if ($statement->execute()) {
            echo "<script>alert('U ndryshua me sukses!')</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "')</script>";
        }
    }

    function deleteStudent($id) {
        $conn = $this->connection;

        $sql = "DELETE FROM users WHERE Id=?";
        $statement = $conn->prepare($sql);
        $statement->bind_param("i", $id);

        if ($statement->execute()) {
            echo "<script>alert('U fshi me sukses!')</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "')</script>";
        }
    }

    function getStudentById($id) {
        $conn = $this->connection;

        $sql = "SELECT * FROM users WHERE Id=?";
        $statement = $conn->prepare($sql);
        $statement->bind_param("i", $id);
        $statement->execute();

        $result = $statement->get_result();
        $userArray = $result->fetch_assoc();

        if ($userArray && !empty($userArray)) {
            $user = new user(
                $userArray['emri'],
                $userArray['mbiemri'],
                $userArray['email'],
                $userArray['datelindja'],
                $userArray['username'],
                $userArray['passwordi'],
                $userArray['role'],
                $userArray['joined_date']
            );

            return $user;
        }

        return null;
    }

    public function checkLogin($email, $password) {
        $conn = $this->connection;

        $sql = "SELECT * FROM users WHERE email = ? AND passwordi = ?";
        $statement = $conn->prepare($sql);
        $statement->bind_param("ss", $email, $password);
        $statement->execute();

        $result = $statement->get_result();
        $userArray = $result->fetch_assoc();

        if ($userArray && !empty($userArray)) {
            $user = new user(
                $userArray['emri'],
                $userArray['mbiemri'],
                $userArray['email'],
                $userArray['datelindja'],
                $userArray['username'],
                $userArray['passwordi'],
                $userArray['role'],
                $userArray['joined_date']
            );

            return $user;
        }

        return null;
    }

    public function getRole($r) {
        $conn = $this->connection;

        $sql = "SELECT * FROM users WHERE role=?";
        $statement = $conn->prepare($sql);
        $statement->bind_param("s", $r);
        $statement->execute();

        $result = $statement->get_result();
        $userArray = $result->fetch_assoc();

        return $userArray;
    }
}
?>
