<?php
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "health_safety_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert confirmation details
$confirmName = $_POST['confirmName'];
$confirmDate = $_POST['confirmDate'];

$sql = "INSERT INTO first_aid_kit_checklists (confirm_name, confirm_date) VALUES ('$confirmName', '$confirmDate')";

if ($conn->query($sql) === TRUE) {
    $checklist_id = $conn->insert_id;

    // Insert checklist items
    $i = 1;
    while (isset($_POST["item$i"])) {
        $item = $_POST["item$i"];
        $description = $_POST["description$i"];
        $quantity = $_POST["quantity$i"];

        $sql = "INSERT INTO first_aid_kit_items (checklist_id, item, description, quantity) VALUES ('$checklist_id', '$item', '$description', '$quantity')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $i++;
    }
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>