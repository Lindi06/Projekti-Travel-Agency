<?php
session_start();
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\user.php';
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\userrespository.php';

if (isset($_POST['signup'])) {
    $emri = $_POST['name'];
    $mbiemri = $_POST['surname'];
    $dataLindjes = $_POST['birthdate'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = null;
    $joined_date = date('Y-m-d');

    if (!preg_match("/^[a-zA-Z]+$/", $emri)) {
        echo "Invalid name format";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    if (!preg_match("/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/", $password)) {
        echo "Invalid password format";
        exit;
    }

 
    $user = new user($emri, $mbiemri, $email, $dataLindjes, $username, $password, $role, $joined_date);

    $userRepository = new userrespository();
    $userRepository->insertUser($user);

    header("location:index.php");
    exit;
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
    <div class="container" id="container" style="padding: 100px;">
        <div class="form-container sign-up">
            <form action="SignUp.php" method="Post" onsubmit="return validateSignUp()">
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
                    <input type="text" name="surname" placeholder="Surname" id="sign-up-surname">
                </div>
                <div class="input-container">
                    <input type="date" name="birthdate" placeholder="Birth Date" id="sign-up-birthday" >
                </div>
                <div class="input-container">
                    <input type="email" name="email" placeholder="Email" id="sign-up-email">
                </div>
                <div class="input-container">
                    <input type="text" name="username" placeholder="Username" id="sign-up-username">
                </div>
                <div class="input-container">
                    <input type="password" name="password" placeholder="Password" id="sign-up-password">
                </div>
                <button name="signup">Sign Up</button>
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