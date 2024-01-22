<?php
include 'dbConnect.php';
include 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\ticketRepository.php';


$ticketRepository=new ticketRepository();
$tickets=$ticketRepository->getAllBookedTickets();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reservations</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color:rgba(173, 216, 230, 0.3);
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: lightblue;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Reservations</h1>
        <table>
            <thead>
                <tr>
                    <th>Ticket ID</th>
                    <th>Destination ID</th>
                    <th>Departure Date</th>
                    <th>Arrival Date</th>
                    <th>No. Tickets</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tickets as $ticket) {
                    echo "<tr>";
                    echo "<td>" . $ticket['id'] . "</td>";
                    echo "<td>" . $ticket['destination_id'] . "</td>";
                    echo "<td>" . $ticket['depart_time'] . "</td>";
                    echo "<td>" . $ticket['arrival_time'] . "</td>";
                    echo "<td>" . $ticket['tickets'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
