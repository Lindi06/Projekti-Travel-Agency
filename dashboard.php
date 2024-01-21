<?php
include_once 'dbConnect.php';

class Dashboard
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getTotalUsers()
    {
        $sql = "SELECT COUNT(*) AS total_users FROM users";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['total_users'];
    }

    public function getTotalLastMonth()
    {
        $sql_last_month = "SELECT COUNT(*) AS last_month FROM users WHERE joined_date >= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
        $result = $this->conn->query($sql_last_month);
        $row = $result->fetch_assoc();
        return $row['last_month'];
    }

    public function getTotalLastWeek()
    {
        $sql_last_week = "SELECT COUNT(*) AS last_week FROM users WHERE joined_date >= DATE_SUB(NOW(), INTERVAL 1 WEEK)";
        $result = $this->conn->query($sql_last_week);
        $row = $result->fetch_assoc();
        return $row['last_week'];
    }

    public function getTotalLastDay()
    {
        $sql_last_day = "SELECT COUNT(*) AS last_day FROM users WHERE joined_date >= DATE_SUB(NOW(), INTERVAL 1 DAY)";
        $result = $this->conn->query($sql_last_day);
        $row = $result->fetch_assoc();
        return $row['last_day'];
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}

$dbConnection = new DatabaseConnection();
$conn = $dbConnection->startConnection();

if (!$conn) {
    die("Connection failed");
}

$dashboard = new Dashboard($conn);

$total_users = $dashboard->getTotalUsers();
$users_last_month = $dashboard->getTotalLastMonth();
$users_last_week = $dashboard->getTotalLastWeek();
$users_last_day = $dashboard->getTotalLastDay();

$dashboard->closeConnection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container">
        <div class="sidebar" style=" background-color: #3498db;">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="#users">Manage Users</a></li>
                <li><a href="ManageReservations.php">Manage Reservations</a></li>
            </ul>
        </div>

        <div class="content" style="background-color:rgba(173, 216, 230, 0.3);">
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
