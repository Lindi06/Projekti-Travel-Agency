
<?php
session_start();



class Database{
    private $servername = "localhost";
    private $usernameDB = "root";
    private $passwordDB = "";
    private $dbname = "travel";
    private $conn;


    public function __construct()
    {
       $this->conn = new mysqli($this->servername,$this->usernameDB, $this->passwordDB, $this->dbname);

    if ($this->conn->connect_error) {
        die("No connection: " . $this->conn->connect_error);
    }

        
    }


    public function SignUp($emri,$email,$password){
        $sql = "INSERT INTO login (emri, email, password) VALUES ('$emri', '$email', '$password')";
        $result = $this->conn->query($sql);
    
        if ($result) {
            $_SESSION['emri'] = $emri;
            header("Location: index.php");
            exit();
        } else {
            echo '<script>alert("Something went wrong")</script>';
            
     }


    }
   
    public function connectionClose(){
    $this->conn->close();
     }

 }


    if(isset($_POST["signup"])){
        $email=$_POST["email"];
        $password=$_POST["password"];
        $emri=$_POST["name"];

        $db=new Database();
        $db->SignUp($emri,$email,$password);
        $db->connectionClose();
    

}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleofSignUp.css">
    <title>Sign Up</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="SignUp.php" method="Post">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <img src="./photo/instagram.png" alt="">
                    <img src="./photo/facebook.png" alt="">
                    <img src="./photo/twitter.png" alt="">
                </div>
                <span>or use your email for registration</span>
                <div class="input-container">
                    <input type="text" name="name" placeholder="Name" id="sign-up-name">
                </div>
                <div class="input-container">
                    <input type="email" name="email" placeholder="Email" id="sign-up-email">
                </div>
                <div class="input-container">
                    <input type="password" name="password" placeholder="Password" id="sign-up-password">
                </div>
                <button name="signup" onclick="validateSignUp()">Sign Up</button>
                <a href="SignIn.php">Already have an account? Sign In</a>
            </form>
        </div>
    </div>
    <script >

        
let emailRegex = /^[^\s@]+@[^\s@]+.[^\s@]+$/;
let passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
let nameRegex = /^[a-zA-Z]+$/;




function validateSignUp(){
        let name=document.getElementById('sign-up-name').value;
        let email = document.getElementById('sign-up-email').value;
    let password = document.getElementById('sign-up-password').value;

    if(!nameRegex.test(name)){
        alert("name invalid")
        return;
    }

    if (!emailRegex.test(email)) {
        alert('email invalid')
        return;
    }

    if (!passwordRegex.test(password)) {
        alert('password invalid')
        return;
    }

    else{

    alert('Sign up successful! ');
  }

    }

    </script>
</body>




</html>
