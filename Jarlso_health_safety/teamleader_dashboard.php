<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Leader Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your existing CSS file -->
    <link rel="stylesheet" href="forms.css"> <!-- Link to the new forms CSS file -->
    <style>
        /* Include the provided CSS directly for simplicity */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        
        body {
            background: linear-gradient(to right, #1e3c72, #2a5298); /* Gradient blue background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full height for vertical centering */
        }
        
        .container {
            background: #ffffff; /* White background for container */
            width: 450px;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1); /* Softer shadow for a more professional look */
            text-align: center; /* Center text inside the container */
        }
        
        h1 {
            margin-bottom: 1.5rem; /* Spacing below the heading */
            color: #1e3c72; /* Dark blue color for heading */
        }
        
        .button-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 20px; /* Space between buttons */
        }
        
        .btn {
            font-size: 1.1rem;
            padding: 10px 20px; /* Padding for button */
            border-radius: 5px;
            outline: none;
            border: none;
            background: #2a5298; /* Blue color for button */
            color: #ffffff; /* White text color */
            cursor: pointer;
            transition: 0.3s; /* Smooth transition on hover */
        }
        
        .btn:hover {
            background: #1e3c72; /* Darker blue color on hover */
            color: #ffffff; /* Ensure text remains white on hover */
        }
        
        .welcome-message {
            margin-bottom: 1.5rem;
            color: #1e3c72;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Team Leader Dashboard</h1>
        <p class="welcome-message">Welcome to your dashboard! Here you can access and fill out the necessary forms.</p>
        <div class="button-container">
        <a href="forms_scripts/first_aid_kit.html" class="btn">First Aid Kit Form</a>
            <a href="forms_scripts/Incident_report_form.html" class="btn">Incident Report Form</a>
            <a href="forms_scripts/ppe_register_form.html" class="btn">PPE Register Form</a>
            <a href="forms_scripts/site_induction_form.html" class="btn">Site Induction Form</a>
            <a href="forms_scripts/walk_test_services_technical_proposal.html" class="btn">Walk Test Services Technical Proposal</a>
        </div>
    </divv>
</body>
</html>