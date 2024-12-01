<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_safety_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$siteName = $_POST['siteName'];
$siteNumber = $_POST['siteNumber'];
$inductionDeclaration = $_POST['inductionDeclaration'];
$visitorSignature = $_POST['visitorSignature'];
$inductionDate = $_POST['inductionDate'];

// Insert induction data
$sql = "INSERT INTO site_induction (siteName, siteNumber, inductionDeclaration, visitorSignature, inductionDate)
VALUES ('$siteName', '$siteNumber', '$inductionDeclaration', '$visitorSignature', '$inductionDate')";

if ($conn->query($sql) === TRUE) {
    $inductionId = $conn->insert_id;

    // Insert visitor log
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'date') === 0) {
            $index = substr($key, 4);
            $date = $_POST["date$index"];
            $time = $_POST["time$index"];
            $name = $_POST["name$index"];
            $company = $_POST["company$index"];
            $signature = $_POST["signature$index"];

            $sql = "INSERT INTO visitor_log (inductionId, date, time, name, company, signature)
            VALUES ('$inductionId', '$date', '$time', '$name', '$company', '$signature')";

            $conn->query($sql);
        }
    }

    echo "Records added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>