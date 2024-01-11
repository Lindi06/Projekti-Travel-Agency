<?php
include 'dbConnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $photo_path = '';

    if ($_FILES['photo']['name']) {
        $target_dir = "uploads/"; 
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

     
        
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        ) {
            echo "Sorry, only JPG, JPEG, PNG files are allowed.";
            $uploadOk = 0;
        }

    
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
      
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                $photo_path = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    $sql = "INSERT INTO destinations (name, location, description, photo_path, price) 
            VALUES ('$name', '$location', '$description', '$photo_path', '$price')";

    if ($conn->query($sql) === TRUE) {
       header('Location:destinations.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Destination</title>
    <style>
        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color:rgba(173, 216, 230, 0.3);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: lightblue;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="file"] {
            margin-bottom: 15px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>Add Destination</h1>
    <form action="add-destination.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">

        <label for="location">Location:</label>
        <input type="text" id="location" name="location">

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price">

        <label for="photo">Photo:</label>
        <input type="file" id="photo" name="photo">

        <input type="submit" value="Add Destination">
    </form>
</body>
</html>
