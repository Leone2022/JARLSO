<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $siteID = $_POST['siteID'] ?? '';
    $siteName = $_POST['siteName'] ?? '';
    $projectTitle = $_POST['projectTitle'] ?? '';
    $date = $_POST['date'] ?? '';
    $teamLeaderSignature = $_POST['teamLeaderSignature'] ?? '';
    $teamLeaderName = $_POST['teamLeaderName'] ?? '';
    $teamLeaderDate = $_POST['teamLeaderDate'] ?? '';
    $hseSignature = $_POST['hseSignature'] ?? '';
    $hseName = $_POST['hseName'] ?? '';
    $hseDate = $_POST['hseDate'] ?? '';
    $projectManagerSignature = $_POST['projectManagerSignature'] ?? '';
    $projectManagerName = $_POST['projectManagerName'] ?? '';
    $projectManagerDate = $_POST['projectManagerDate'] ?? '';

    // Capture radio button values
    $ppeChecklist = [
        'safetyBoot' => $_POST['safetyBoot'] ?? '',
        'helmet' => $_POST['helmet'] ?? '',
        'reflectiveJacket' => $_POST['reflectiveJacket'] ?? '',
        'fullBodyHarness' => $_POST['fullBodyHarness'] ?? '',
        'rescueKits' => $_POST['rescueKits'] ?? '',
        'handGloves' => $_POST['handGloves'] ?? '',
        'noseMask' => $_POST['noseMask'] ?? '',
        'earPlugs' => $_POST['earPlugs'] ?? '',
        'firstAiderCertified' => $_POST['firstAiderCertified'] ?? '',
        'firstAidKits' => $_POST['firstAidKits'] ?? '',
        'goggles' => $_POST['goggles'] ?? '',
    ];

    // Database connection
    $servername = "localhost";
    $username = "root"; // Update with your actual username
    $password = ""; // Update with your actual password
    $database = "health_safety_db";

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the main table
    $sql = "INSERT INTO ppe_register (siteID, siteName, projectTitle, date, teamLeaderSignature, teamLeaderName, teamLeaderDate, hseSignature, hseName, hseDate, projectManagerSignature, projectManagerName, projectManagerDate)
            VALUES ('$siteID', '$siteName', '$projectTitle', '$date', '$teamLeaderSignature', '$teamLeaderName', '$teamLeaderDate', '$hseSignature', '$hseName', '$hseDate', '$projectManagerSignature', '$projectManagerName', '$projectManagerDate')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;

        // Insert each PPE checklist item into its own table, linking back to the main entry
        foreach ($ppeChecklist as $ppe => $status) {
            $sql = "INSERT INTO ppe_checklist (ppe_register_id, ppe, status)
                    VALUES ('$last_id', '$ppe', '$status')";

            if (!$conn->query($sql)) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>