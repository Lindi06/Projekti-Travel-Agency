<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="StyleOfSignIn.css">
    <title>Login In</title>
</head>

<body>
    <div class="container" id="container"><!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="StyleOfSignIn.css">
            <title>Login In</title>
        </head>
        
        <body>
            <div class="container" id="container">
                <div class="form-container sign-up">
                    <form>
                        <h1>Create Account </h1>
                        <div class="social-icons">
                            <img src="./photo/instagram.png" alt="">
                            <img src="./photo/facebook.png" alt="">
                            <img src="./photo/twitter.png" alt="">
                   
                        </div>
                        <span>or use your email for registeration</span>
                        <input type="text" placeholder="Name" id="sign-up-name">
                        <input type="email" placeholder="Email" id="sign-up-email">
                        <input type="password" placeholder="Password" id="sign-up-password">
                        <button id="sign-up-button" onclick="validateSignUp()">Sign Up</button>
                    </form>
                </div>
                <div class="form-container sign-in">
                    <form>
                        <h1>Sign In</h1>
                        <div class="social-icons">
                           <img src="./photo/instagram.png" alt="">
                           <img src="./photo/facebook.png" alt="">
                           <img src="./photo/twitter.png" alt="">
                        </div>
                        <span>or use your email password</span>
                        <input type="email" placeholder="Email" id="sign-in-email">
                        <span id="email-error"></span>
                        <input type="password" placeholder="Password" id="sign-in-password">
                        <span id="password-error"></span>
                        <a href="#">Forget Your Password?</a>
                        <button onclick="validateForm()">Sign In</button>
                    </form>
                </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <hi>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div> 
        </div>
    </div>
    <script src="scriptSI.js"></script>



</body>

</html>