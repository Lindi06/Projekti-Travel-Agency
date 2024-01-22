<?php
$userId = $_GET['id'];
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\userrespository.php';

$userRepository = new userrespository();
$user = $userRepository->getUserById($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
         body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 50px;
            background-color: rgba(173, 216, 230, 0.3);
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container{
            display: flex;
            flex-direction: column;
            background-color: lightblue;
            max-width: 500px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }

        form {
            max-width: 400px;
            padding: 20px;
  
        }

        h3 {
            text-align: center;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        </style>
</head>
<body>
    <div class="container">
    <h3>Edit User</h3>
    <form action="" method="post">
        <input type="text" name="id" value="<?=$user['id']?>" readonly> <br> <br>
        <input type="text" name="emri" value="<?=$user['emri']?>">
        <input type="text" name="mbiemri" value="<?=$user['mbiemri']?>">
        <input type="text" name="email" value="<?=$user['email']?>"> <br> <br>
        <input type="date" name="datelindja" value="<?=$user['datelindja']?>"> <br> <br>
        <input type="text" name="username" value="<?=$user['username']?>"> <br> <br>
        <input type="text" name="password" value="<?=$user['passwordi']?>"> <br> <br>

        <input type="submit" name="editBtn" value="Save"> <br> <br>
    </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['editBtn'])){
    $id = $user['id'];
    $name = $_POST['emri']; 
    $surname = $_POST['mbiemri'];
    $email = $_POST['email'];
    $datelindja = $_POST['datelindja'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userRepository->updateUser($id, $name, $surname, $email, $datelindja, $username, $password);
    header("location:dashboard.php");
}

?>
