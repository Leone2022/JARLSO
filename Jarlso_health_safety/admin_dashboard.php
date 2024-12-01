<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background: #f4f7fc;
        }

        /* Sidebar styling */
        .sidebar {
            width: 200px;
            background-color: #2a5298;
            color: #fff;
            position: fixed;
            top: 0;
            bottom: 0;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 1.5em;
            text-align: center;
        }

        .sidebar ul {
            list-style: none;
            width: 100%;
            padding: 0;
        }

        .sidebar ul li {
            width: 100%;
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            display: block;
            padding: 12px;
            color: #fff;
            text-decoration: none;
            background-color: #1e3c72;
            text-align: center;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #16325c;
        }

        /* Main content styling */
        .main-content {
            margin-left: 220px; /* Shift the main content to the right of the sidebar */
            padding: 40px;
            width: calc(100% - 220px);
            background-color: #f4f7fc;
            text-align: right; /* Right-align the text */
        }

        .main-content h1 {
            color: #2a5298;
            font-size: 2.5em;
            margin-bottom: 30px;
            text-align: center; /* Center the title */
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            justify-items: center; /* Center items in the grid */
        }

        .dashboard-grid .card {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center the text in each card */
            width: 300px; /* Set a fixed width for cards */
        }

        .dashboard-grid .card h3 {
            color: #2a5298;
            margin-bottom: 10px;
        }

        .dashboard-grid .card a {
            display: inline-block;
            margin-top: 15px;
            background-color: #2a5298;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .dashboard-grid .card a:hover {
            background-color: #1e3c72;
        }

        /* Logout button */
        .logout-btn {
            position: fixed;
            bottom: 30px;
            right: 50px; /* Adjusted to be on the right */
            background-color: #e74c3c;
            color: #fff;
            padding: 15px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.1em;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        /* Responsive Design */
        @media (max-width: 900px) {
            .dashboard-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 20px;
                text-align: center; /* Center content on smaller screens */
            }

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>

    <!-- Main Content Section -->
    <div class="main-content">
        <h1>Welcome to Your Admin Dashboard</h1>
        <br><br>
        <div class="dashboard-grid">
            <div class="card">
                <h3>Team Leaders</h3>
                <p>Manage and view all registered team leaders.</p>
                <a href="view_team_leaders.php">View Team Leaders</a>
            </div>
            <div class="card">
                <h3>Register New Team Leader</h3>
                <p>Quickly add new team leaders to the system.</p>
                <a href="register_team_leader.html">Register Team Leader</a>
            </div>
            <div class="card">
                <h3>Reports</h3>
                <p>View all reports submitted by team leaders.</p>
                <a href="Reports/all_reports.php">View Reports</a>
            </div>
        </div>
    </div>

    <!-- Logout Button -->
    <a href="admin_login.php" class="logout-btn">Logout</a>

</body>
</html>
