
<?php

include 'dbConnect.php';

$sql = "SELECT * FROM destinations"; 
$result = $conn->query($sql);

$destinations = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $destinations[] = $row;
    }
}




$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
      
        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:rgba(173, 216, 230, 0.3);
            color: #2980b9;
        }

        .container {
            width: 80%;
            margin: auto;
            padding-top: 50px;
           
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .card-deck {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;

        }

        .card {
            width: calc(33.33% - 20px);
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: rgba(135, 206, 250, 0.3);
            display:  flex;
            flex-direction: column;
        
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card .card-body {
            padding: 20px;
        }

        .card h5 {
            margin-bottom: 15px;
            font-size: 1.5em;
        }

        .card p {
            color: #555;
            font-size: 0.9em;
        }

        .btn-primary {
            display: block;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding-right: 10px;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-second{
            display: block;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #e74c3c;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding-right: 10px;

        }

        .btns form{
            display: flex;
           gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Available Destinations</h1>
        <div class="card-deck">
      
      <?php  foreach ($destinations as $destination) { ?>
    <div class="card">
        <img src="<?php echo $destination['photo_path']; ?>" alt="Destination Image">
        <div class="card-body">
            <h5><?php echo $destination['name']; ?></h5>
            <p>
                Location: <?php echo $destination['location']; ?><br><br>
                Description: <?php echo $destination['description']; ?><br><br>
                Price: $<?php echo $destination['price']; ?><br>
            </p>
            <span>Added by: <?php echo $destination['added_by']; ?></span>

        <div class="btns">
            <form action="" method="post">
            <a class="btn-primary" href="tickets.php">BOOK NOW</a>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>
                <button class="btn-second" type="submit" name="delete">Delete</button>
            <?php }?>
            </form>
            </div>
        
        </div>
    </div>
<?php } ?>
        </div>
        
       

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>
            <a class="btn-primary" href="add-destination.php">ADD A DESTINATION</a>
         
        <?php } ?>
        
    </div>
</body>
</html>
