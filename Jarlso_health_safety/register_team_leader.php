<?php
include('connect_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $siteName = $_POST['siteName'];
    $siteNumber = $_POST['siteNumber'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password === $confirmPassword) {  
        // Insert team leader into the database
        $sql = "INSERT INTO team_leaders (first_name, last_name, email, site_name, site_number, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $fName, $lName, $email, $siteName, $siteNumber, $password);

        if ($stmt->execute()) {
            echo "Team Leader registered successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Passwords do not match.";
    }
}

$conn->close();
?>