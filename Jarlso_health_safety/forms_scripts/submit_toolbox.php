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

// Get data from the form
$siteID = $_POST['siteID'];
$siteName = $_POST['siteName'];
$date = $_POST['date'];
$activityDetails = $_POST['activityDetails'];
$declaration = $_POST['declaration'];
$declarationSignature = $_POST['declarationSignature'];
$declarationDate = $_POST['declarationDate'];

// Insert data into toolbox_meeting table
$sql = "INSERT INTO toolbox_meeting (site_id, site_name, date, activity_details, declaration, declaration_signature, declaration_date) 
        VALUES ('$siteID', '$siteName', '$date', '$activityDetails', '$declaration', '$declarationSignature', '$declarationDate')";

if ($conn->query($sql) === TRUE) {
    $toolboxID = $conn->insert_id; // Get the ID of the inserted record

    // Insert data into attendance table
    $rowCount = 1;
    while (isset($_POST["name$rowCount"])) {
        $name = $_POST["name$rowCount"];
        $role = $_POST["role$rowCount"];
        $contact = $_POST["contact$rowCount"];
        $signature = $_POST["signature$rowCount"];

        $attendanceSQL = "INSERT INTO attendance (toolbox_id, name, role, contact, signature) 
                          VALUES ('$toolboxID', '$name', '$role', '$contact', '$signature')";
        $conn->query($attendanceSQL);

        $rowCount++;
    }

    echo "Records inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>