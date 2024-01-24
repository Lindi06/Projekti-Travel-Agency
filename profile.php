<?php



include 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\userrespository.php';


$users=new userrespository();
$user=$users->getLoggedInUser();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: lightblue;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.profile-container {
    text-align: center;
}

.pfp {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
    border: 3px solid #3498db;
    margin-bottom: 20px;
    margin-left: 40px;
 
}

.pfp img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.username {
    font-size: 24px;
    color: #333;
    margin-top: 10px;
}

.user-info {
    font-size: 16px;
    color: #555;
    margin-top: 20px;
}

.user-info p {
    margin-bottom: 10px;
}


.user-info strong {
    margin-right: 10px;
}

.error-message {
    color: #ff0000;
    font-weight: bold;
    margin-top: 20px;
}

    </style>
    <title>Profile Design</title>
</head>

<body>
    <div class="profile-container">
        <?php if ($user): ?>
            <div class="pfp">
                <img src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png" alt="Profile Picture">
            </div>
            <div class="username"><?php echo $user->getUsername(); ?></div>
            <div class="user-info">
                <p><strong>First Name:</strong> <?php echo $user->getEmri(); ?></p>
                <p><strong>Last Name:</strong> <?php echo $user->getMbiemri(); ?></p>
                <p><strong>Email:</strong> <?php echo $user->getEmaili(); ?></p>
                <p><strong>Date of Birth:</strong> <?php echo $user->getDataELindjes(); ?></p>
                <p><strong>Username:</strong> <?php echo $user->getUsername(); ?></p>
                <p><strong>Password:</strong> <?php echo $user->getPasswordi(); ?></p>
                <p><strong>Role:</strong> <?php echo $user->getRole(); ?></p>
                <p><strong>Joined Date:</strong> <?php echo $user->getJoinedDate(); ?></p>
                
              
                

            </div>
        <?php else: ?>
            <p class="error-message">User is not logged in.</p>
        <?php endif; ?>
    </div>
</body>
</html>
