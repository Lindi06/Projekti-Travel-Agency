<?php 


include 'dbConnect.php';

if(isset($_POST['submit'])){
  $_SESSION["destination_id"]= $destination=$_POST['destination_id'];
  $date=$_POST['departure-date'];
  $passengers=$_POST['passengers'];
  $tickets=$_POST['tickets'];


  $sql = "INSERT INTO buyers (destination_id, date, passengers, tickets) VALUES ('$destination', '$date', '$passengers', '$tickets')";
  $result = $conn->query($sql);



}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking System</title>
    <style>
      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color:rgba(173, 216, 230, 0.3);
  }

  .container {
    width: 400px;
    background-color: lightblue;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .booking-form {
    display: flex;
    flex-direction: column;
    padding: 20px;
  }

  .form-group {
    margin-bottom: 15px;
  }

  label,h1 {
    font-weight: bold;
    color: #2980b9;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  }


  input[type="text"],
  input[type="date"],
  input[type="number"],
  select {
    padding: 8px;
    width: 100%;
    margin-top: 5px;
  }

  button {
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    margin-top: 10px;
  }

  button:hover {
    background-color: #2980b9;
  }
    </style>
</head>
<body>
    <div class="container">
        <form class="booking-form" method="post">
          <h1>Ticket Booking</h1>
          <div class="form-group">

            <label>Destination:</label>
            <select class="form-control" name="destination_id" id="destination_id" required>
            <?php
            $sql = "SELECT destination_id, name, location,description, price FROM destinations";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
              
                    echo "<option value='" . $row["destination_id"] . "' style='background-image: url(\"" . $row["name"] . "\"); background-size: cover;'>" .
                        "Destination " . $row["name"] . ", Location: " . $row["location"] . ", Price: " . $row["price"] . "$" .
                        "</option>";
                }
            } else {
                echo "<option>No apartments available</option>";
            }
          
            ?>
            </select>
          </div>
          <div class="form-group">
            <label for="departure-date">Departure Date:</label>
            <input type="date" id="departure-date" name="departure-date" required>
          </div>
          <div class="form-group">
            <label for="passengers">Number of Passengers:</label>
            <input type="number" id="passengers" name="passengers" min="1" required>
          </div>
          <div class="form-group">
            <label for="tickets">Number of Tickets:</label>
            <input type="number" id="tickets" name="tickets" min="1" required>
           </div>
    
          <button name="submit" type="submit">Book Now</button>
        </form>
      </div>
    
</body>
</html>