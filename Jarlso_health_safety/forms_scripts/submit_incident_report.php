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

// Retrieve form data
$reportedBy = $_POST['reportedBy'];
$dateReported = $_POST['dateReported'];
$incidentNo = $_POST['incidentNo'];
$reportedByClient = $_POST['reportedByClient'];
$clientName = $_POST['clientName'];
$affectedProject = $_POST['affectedProject'];
$projectName = $_POST['projectName'];
$hseAspects = $_POST['hseAspects'];
$incidentDescription = $_POST['incidentDescription'];
$correctiveActions = $_POST['correctiveActions'];
$rootCauseAnalysis = $_POST['rootCauseAnalysis'];
$carriedOutBy = $_POST['carriedOutBy'];
$dateCarriedOut = $_POST['dateCarriedOut'];
$verificationComments = $_POST['verificationComments'];
$preventiveActions = $_POST['preventiveActions'];
$verificationCommentsPreventive = $_POST['verificationCommentsPreventive'];
$reportName = $_POST['reportName'];
$reportDate = $_POST['reportDate'];

// Insert incident report data
$sql = "INSERT INTO incident_reports (
    reported_by,
    date_reported,
    incident_no,
    reported_by_client,
    client_name,
    affected_project,
    project_name,
    hse_aspects,
    incident_description,
    corrective_actions,
    root_cause_analysis,
    carried_out_by,
    date_carried_out,
    verification_comments,
    preventive_actions,
    verification_comments_preventive,
    report_name,
    report_date
) VALUES (
    '$reportedBy',
    '$dateReported',
    '$incidentNo',
    '$reportedByClient',
    '$clientName',
    '$affectedProject',
    '$projectName',
    '$hseAspects',
    '$incidentDescription',
    '$correctiveActions',
    '$rootCauseAnalysis',
    '$carriedOutBy',
    '$dateCarriedOut',
    '$verificationComments',
    '$preventiveActions',
    '$verificationCommentsPreventive',
    '$reportName',
    '$reportDate'
)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>