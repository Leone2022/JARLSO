<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.html");
    exit();
}

include('connect_db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT first_name, last_name, email, site_name, site_number FROM team_leaders WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($fName, $lName, $email, $siteName, $siteNumber);
    $stmt->fetch();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $siteName = $_POST['siteName'];
    $siteNumber = $_POST['siteNumber'];

    $sql = "UPDATE team_leaders SET first_name = ?, last_name = ?, email = ?, site_name = ?, site_number = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $fName, $lName, $email, $siteName, $siteNumber, $id);

    if ($stmt->execute()) {
        echo "Team leader updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

    // Redirect back to the team leaders list page
    header("Location: view_team_leaders.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Team Leader</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="form-title">Edit Team Leader</h1>
        <form method="post" action="">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="fName" id="fName" placeholder="First Name" value="<?php echo $fName; ?>" required>
                <label for="fName">First Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="lName" id="lName" placeholder="Last Name" value="<?php echo $lName; ?>" required>
                <label for="lName">Last Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" name="siteName" id="siteName" placeholder="Site Name" value="<?php echo $siteName; ?>" required>
                <label for="siteName">Site Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-hashtag"></i>
                <input type="text" name="siteNumber" id="siteNumber" placeholder="Site Number" value="<?php echo $siteNumber; ?>" required>
                <label for="siteNumber">Site Number</label>
            </div>
            <input type="submit" class="btn" value="Update">
        </form>
    </div>
</body>
</html>