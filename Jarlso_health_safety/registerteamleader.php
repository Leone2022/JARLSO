<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Team Leader</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="form-title">Register Team Leader</h1>
        <form method="post" action="register_team_leader.php">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="fName" id="fName" placeholder="First Name" required>
                <label for="fName">First Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="lName" id="lName" placeholder="Last Name" required>
                <label for="lName">Last Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" name="siteName" id="siteName" placeholder="Site Name" required>
                <label for="siteName">Site Name</label>
            </div>
            <div class="input-group">
                <i class="fas fa-hashtag"></i>
                <input type="text" name="siteNumber" id="siteNumber" placeholder="Site Number" required>
                <label for="siteNumber">Site Number</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
                <label for="confirmPassword">Confirm Password</label>
            </div>
            <input type="submit" class="btn" value="Register" name="register">
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>