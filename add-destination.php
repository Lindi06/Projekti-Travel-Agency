<?php
include 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\dbConnect.php';
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\destination.php';
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\destinationRepository.php';

if (isset($_POST['submit'])) {
    $emri = $_POST['name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $photo = uploadPhoto();

    if ($photo !== null) {
        $destination = new destination($emri, $location, $description, $price, $photo);

        $destinationRepository = new destinationrespository(); 
        $destinationRepository->insertDestination($destination);
        header("Location:destinations.php");
    } else {
        echo "Error: Photo upload failed.";
    }
}

function uploadPhoto()
{
    $targetDirectory = "uploads/";
    $originalFileName = basename($_FILES["photo"]["name"]);
    $targetFile = $targetDirectory . uniqid() . '_' . $originalFileName;

    // Check if it's an image
    if (!getimagesize($_FILES["photo"]["tmp_name"])) {
        echo "Error: The uploaded file is not an image.";
        return null;
    }

    // Check the file format
    $allowedFormats = array("jpg", "jpeg", "png");
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Error: Only JPG, JPEG, and PNG files are allowed.";
        return null;
    }

    // Check for file existence and generate a new name if necessary
    while (file_exists($targetFile)) {
        $targetFile = $targetDirectory . uniqid() . '_' . $originalFileName;
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
        echo "File uploaded successfully!";
        return $targetFile;
    } else {
        echo "Error: There was an error uploading your file.";
        return null;
    }
}

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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

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

        <input type="submit" name="submit" value="Add Destination">
    </form>
</body>


</html>
