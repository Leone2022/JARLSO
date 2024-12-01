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
    <title>All Reports</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            color: #fff;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            max-width: 800px;
            width: 100%;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            color: #2a5298;
            font-size: 2.5em;
            margin-bottom: 30px;
        }

        .buttons-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .report-btn {
            display: inline-block;
            background-color: #2a5298;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.1em;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            width: calc(50% - 40px);
            max-width: 300px;
            text-align: center;
        }

        .report-btn:hover {
            background-color: #1e3c72;
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
        }

        .report-btn:active {
            transform: translateY(0);
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            h1 {
                font-size: 2em;
            }

            .report-btn {
                width: 100%;
                max-width: none;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Submitted Reports</h1>
    <div class="buttons-container">
        <a href="view_first_aid_kit_report.php" class="report-btn">First Aid Kit Reports</a>
        <a href="view_incident_reports.php" class="report-btn">Incident Reports</a>
        <a href="view_ppe_reports.php" class="report-btn">PPE Register Reports</a>
        <a href="view_site_induction_reports.php" class="report-btn">Site Induction Reports</a>
        <a href="view_all_toolbox_reports.php" class="report-btn">Walk Test Service Technical Proposal Reports</a>
    </div>
</div>

</body>
</html>
