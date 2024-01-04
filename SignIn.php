

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
            <form>
                <h1>Sign In</h1>
                <div class="social-icons">
                    <img src="./photo/instagram.png" alt="">
                    <img src="./photo/facebook.png" alt="">
                    <img src="./photo/twitter.png" alt="">
                </div>
                <span>or use your email and password</span>
                <input type="email" placeholder="Email" id="sign-in-email">
      
                <input type="password" placeholder="Password" id="sign-in-password">
           
                <a href="SignUp.php">Don't have an account? Sign Up</a>
                <a href="#">Forgot Your Password?</a>
                <button onclick="validateForm()">Sign In</button>
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
        alert('Invalid email format');
        return;
    }

    if (!passwordRegex.test(password)) {
        alert('Password must have at least 8 characters including one uppercase, one lowercase, one number, and one special character');
        return;
    }

    alert('Login successful!');
}
    </script>
</body>

</html>
