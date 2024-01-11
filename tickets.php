<?php 

include 'dbConnect.php';

if(isset($_POST['submit'])){
  $destination=$_POST['destination_id'];
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
    <link rel="stylesheet" href="tickets.css">
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