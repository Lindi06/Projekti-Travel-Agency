<?php

include 'dbConnect.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}



$sql_total_users = "SELECT COUNT(*) AS total_users FROM login";
$result_total_users = $conn->query($sql_total_users);
$row_total_users = $result_total_users->fetch_assoc();
$total_users = $row_total_users['total_users'];


$sql_last_month = "SELECT COUNT(*) AS last_month FROM login WHERE joined_date >= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
$result_last_month = $conn->query($sql_last_month);
$row_last_month = $result_last_month->fetch_assoc();
$users_last_month = $row_last_month['last_month'];

$sql_last_week = "SELECT COUNT(*) AS last_week FROM login WHERE joined_date >= DATE_SUB(NOW(), INTERVAL 1 WEEK)";
$result_last_week = $conn->query($sql_last_week);
$row_last_week = $result_last_week->fetch_assoc();
$users_last_week = $row_last_week['last_week'];


$sql_last_day = "SELECT COUNT(*) AS last_day FROM login WHERE joined_date >= DATE_SUB(NOW(), INTERVAL 1 DAY)";
$result_last_day = $conn->query($sql_last_day);
$row_last_day = $result_last_day->fetch_assoc();
$users_last_day = $row_last_day['last_day'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

</head>

<body>
<div class="container">
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="#users">Manage Users</a></li>
            <li><a href="ManageReservations.php">Manage Reservations</a></li>
            <li><a href="#settings">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Admin Dashboard</h1>

        <div>
            <ul>
                <li id="total">Total Users: <?php echo $total_users; ?></li>
                <li id="lastmonth">Users Joined Last Month: <?php echo $users_last_month; ?></li>
                <li id="lastweek">Users Joined Last Week: <?php echo $users_last_week; ?></li>
                <li id="today">Users Joined Last Day: <?php echo $users_last_day; ?></li>
            </ul>

            <canvas id="userChart"></canvas>
        </div>
    </div>
    </div>
    <script>
    var ctx = document.getElementById('userChart').getContext('2d');
    var userChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Total Users', 'Last Month', 'Last Week', 'Last Day'],
            datasets: [{
                label: 'User Analytics',
                data: [
                    <?php echo $total_users; ?>,
                    <?php echo $users_last_month; ?>,
                    <?php echo $users_last_week; ?>,
                    <?php echo $users_last_day; ?>
                ],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.4,
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


</body>

</html>

