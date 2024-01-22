<?php
class DatabaseConnection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    // emri i databes per Dorajetin
   private $dbname = "projektita";
   
   // emri i databazes per Lindin
   //private $dbname = "user";
    private $conn;

    public function startConnection() {
        try {
            $dsn = "mysql:host={$this->servername};dbname={$this->dbname}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function closeConnection() {
        $this->conn = null;
    }
}

?>



