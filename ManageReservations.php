<?php
include 'dbConnect.php';

$sql = "SELECT * FROM buyers";
$result = $conn->query($sql);

$buyers = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $buyers[] = $row;
    }
}
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
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
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
                    <th>Buyer ID</th>
                    <th>Destination ID</th>
                    <th>Date</th>
                    <th>Passengers</th>
                    <th>Tickets</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($buyers as $buyer) {
                    echo "<tr>";
                    echo "<td>" . $buyer['buyer_id'] . "</td>";
                    echo "<td>" . $buyer['destination_id'] . "</td>";
                    echo "<td>" . $buyer['date'] . "</td>";
                    echo "<td>" . $buyer['passengers'] . "</td>";
                    echo "<td>" . $buyer['tickets'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
