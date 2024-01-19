<?php
    include_once('dbConnect.php');
    include_once('C:\xampp\htdocs\Projekti-Travel-Agency\user.php');

    class userrespository{
        private $connection;

        public function __construct()
        {
            $conn = new DatabaseConnection;
            $this->connection = $conn->startConnection();
        }

        //kur kemi parametra kryesisht e pergatisim sql per marrjen e parametrave me prepare
        //dhe e bejme lidhjen e parametrave permes metodes execute
        //Pikepyetjet neper queries (?) zevendesohen nga parametrat te metoda execute
        //kurse pa parametra, vazhdojme direkt me metoden query
        //metodat fetch/fetchAll perdoren kur duam te kthejme/marrim ndonje vlere
        


        public function insertUser($user){
            $conn = $this->connection;

            $emri = $user->getEmri();
            $mbiemri = $user->getMbiemri();
            $emaili = $user->getEmaili();
            $dataelindjes=$user->getDataELindjes();
            $username=$user->getUsername();
            $password=$user->getPasswordi();
            $joined_date=$user->getJoinedDate();

            $sql = "INSERT INTO users (emri, mbiemri, email, datelindja, username, passwordi, joined_date) VALUES (?,?,?,?,?,?,?)";
            $statement = $conn->prepare($sql);
            $statement->execute([$emri, $mbiemri, $emaili, $dataelindjes, $username, $password, $joined_date]);
            
            echo "<script>alert('U shtua me sukses!')</script>";
        }

        public function getAllUsers(){
            $conn = $this->connection;

            $sql = "SELECT * FROM users";
            $statement = $conn->query($sql);

            $users = $statement->fetchAll();
            return $users;
        }


        //Pjesa tjeter e funksioneve CRUD: update 
        //dergohet parametri ne baze te cilit e identifikojme studentin (ne kete rast id, por mund te jete edhe ndonje atribut tjeter) dhe parametrat e tjere qe mund t'i ndryshojme (emri, mbiemri, etj...)
        public function editStudent($id, $emri, $mbiemri, $emaili, $dataelindjes,$username, $password){
            $conn = $this->connection;
            $sql = "UPDATE users SET emri=?,mbiemri=?, emaili=?, datelindja=?,username=?, passwordi=? WHERE Id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$emri,$mbiemri, $emaili, $dataelindjes,$username,$password,$id]);

            echo "<script>alert('U ndryshua me sukses!')</script>";

        }

        //delete

        function deleteStudent($id){
            $conn = $this->connection;

            $sql = "DELETE FROM users WHERE Id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$id]);
        }

        //shtese per update: merr studentin ne baze te Id

        function getStudentById($id){
            $conn = $this->connection;

            $sql = "SELECT * FROM users WHERE Id=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$id]);
            $users=$statement->fetch();

            return $users;
        }

// Assuming $this->emri is a property of userrespository class
public function checkLogin($email, $password)
{
    $conn = $this->connection;

    $sql = "SELECT * FROM users WHERE email = ? AND passwordi = ?";
    $statement = $conn->prepare($sql);
    $statement->execute([$email, $password]);

    $userArray = $statement->fetch(PDO::FETCH_ASSOC);

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



    public function getRole($r){
        $conn = $this->connection;

            $sql = "SELECT * FROM users WHERE role=?";

            $statement = $conn->prepare($sql);
            $statement->execute([$r]);
            $users=$statement->fetch();

            return $users;


    }


    }

?>