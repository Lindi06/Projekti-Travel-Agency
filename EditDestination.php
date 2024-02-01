<?php
$destinationId = $_GET['id'];
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\destinationRepository.php';

$destinationRepository = new destinationrespository();
$destination = $destinationRepository->getDestinationById($destinationId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Destination</title>
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
    <h3>Edit Destination</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="id" value="<?=$destination['id']?>" readonly> <br> <br>
        <input type="text" placeholder="emri" name="emri" value="<?=$destination['emri']?>">
        <input type="text" placeholder="location" name="location" value="<?=$destination['location']?>">
        <input type="text" placeholder="description" name="description" value="<?=$destination['description']?>"> <br> <br>
        <input type="number" placeholder="price" name="price" value="<?=$destination['price']?>"> <br> <br>
   

        <input type="submit" name="editBtn" value="Save"> <br> <br>
    </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['editBtn'])){
    $id = $destination['id'];
    $emri = $_POST['emri']; 
    $location = $_POST['location'];
    $description = $_POST['description'];
    $price = $_POST['price'];
  


    $destinationRepository->updateDestination($id, $emri, $location, $description, $price);
    header("location:destinations.php");
}
?>