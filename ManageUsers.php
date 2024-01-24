<?php
include 'dbConnect.php';
include 'C:\xampp\htdocs\Projekti-Travel-Agency\Projekti-Travel-Agency\model\userrespository.php';

$userRepository=new userrespository();
$users=$userRepository->getAllUsers();

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
            background-color: rgba(173, 216, 230, 0.3);
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .container {
            max-width: 1000px; 
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
            padding: 4px; 
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .edit {
        background-color: #3498db;
        border-radius: 4px;
        padding: 2px;
        text-align: center;
    
        
}
        .edit-link{
            text-decoration: none;
            color: white;

        }

        .delete{
            background-color: #e74c3c;
        border-radius: 4px;
        padding: 2px;
        text-align: center;

        }

        .delete-link{
            text-decoration: none;
            color: white;


        }

        </style>
</head>
<body>
    <div class="container">
        <h1>Manage Users</h1>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Emri</th>
                    <th>Mbiemri</th>
                    <th>Email</th>
                    <th>Datelindja</th>
                    <th>role</th>
                    <th>username</th>
                    <th>passwordi</th>
                    <th>joined_date</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>" . $user['id'] . "</td>";
                    echo "<td>" . $user['emri'] . "</td>";
                    echo "<td>" . $user['mbiemri'] . "</td>";
                    echo "<td>" . $user['email'] . "</td>";
                    echo "<td>" . $user['datelindja'] . "</td>";
                    echo "<td>" . $user['role'] . "</td>";
                    echo "<td>" . $user['username'] . "</td>";
                    echo "<td>" . $user['passwordi'] . "</td>";
                    echo "<td>" . $user['joined_date'] . "</td>";
                    echo "<td class='edit'><a class='edit-link' href='edit.php?id=$user[id]'>Edit</a></td>";
                    echo "<td class='delete'><a class='delete-link' href='DeleteUser.php?id=$user[id]'>Delete</a></td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
