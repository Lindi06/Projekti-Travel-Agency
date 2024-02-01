<?php
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\dbConnect.php';
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\ticket.php';
include_once 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\ticketRepository.php';


$ticketRepository = new ticketRepository();


$destinations = $ticketRepository->getAvailableDestinations();
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
    background-color: rgba(173, 216, 230, 0.3);
    flex-direction: column;
}

.container {
    width: 90%; 
    max-width: 500px; 
    background-color: lightblue;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.booking-form {
    display: flex;
    padding: 20px;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
}

label, h1 {
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
    box-sizing: border-box; 
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
    <h1>Ticket Booking</h1>


    <form action="process_ticket_booking.php" class="booking-form" method="post">
        <label for="destination">Select Destination:</label>
        <select id="destination" name="destination_id" required>
            <?php foreach ($destinations as $destination): ?>
                <option value="<?php echo $destination['id']; ?>"><?php echo $destination['emri']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="departure_date">Departure Date:</label>
        <input type="date" id="departure_date" name="departure_date" required>

        <label for="arrival_date">Arrival Date:</label>
        <input type="date" id="arrival_date" name="arrival_date" required>

        <label for="number_tickets">Number of Tickets:</label>
        <input type="number" id="number_tickets" name="number_tickets" required>

        <button name="submit" type="submit" >Book Now</button>
    </form>
    </div>
</body>
</html>
