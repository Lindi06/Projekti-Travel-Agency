
<?php
session_start();

if(isset($_POST["signin"])){
    $email=$_POST["email"];
    $password=$_POST["password"];


    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "loginform";

    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    if ($conn->connect_error) {
        die("No connection: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['email'] = $email;
        $_SESSION['emri'] = $user['emri'];
        header("Location: index.php");
        exit();
    } else {
        echo '<script>alert("Wrong email or password")</script>';
        
 }
    $conn->close();




}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleOfSignIn.css">
    <title>Login In</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="SignIn.php" method="post">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <img src="./photo/instagram.png" alt="">
                    <img src="./photo/facebook.png" alt="">
                    <img src="./photo/twitter.png" alt="">
                </div>
                <span>or use your email and password</span>
                <input type="email" name="email" placeholder="Email" id="sign-in-email">
      
                <input type="password" name="password" placeholder="Password" id="sign-in-password">
           
                <a href="SignUp.php">Don't have an account? Sign Up</a>
                <a href="#">Forgot Your Password?</a>
                <button name="signin" onclick="validateForm()">Sign In</button>
            </form>
        </div>
    </div>
    <script>

let emailRegex = /^[^\s@]+@[^\s@]+.[^\s@]+$/;
let passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
let nameRegex = /^[a-zA-Z]+$/;


 

function validateForm(){
    let email = document.getElementById('sign-in-email').value;
    let password = document.getElementById('sign-in-password').value;

    if (!emailRegex.test(email)) {
        console.log('Invalid email format');
        return;
    }

    if (!passwordRegex.test(password)) {
        console.log('Password must have at least 8 characters including one uppercase, one lowercase, one number, and one special character');
        return;
    }

     console.log('Login successful!');
}
    </script>
</body>

</html>
