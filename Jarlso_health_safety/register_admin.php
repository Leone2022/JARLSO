<?php
include('connect_db.php');

function register_admin($email, $plainPassword) {
    global $conn;

    // Hash the password
    $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

    // Insert admin into the database
    $sql = "INSERT INTO admins (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Admin registered successfully.<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
}

// Example usage
register_admin("admin1@example.com", "password123");
register_admin("admin2@example.com", "securepassword");

$conn->close();
?>