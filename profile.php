<?php
// Start the session
session_start();

// Database connection details
$servername = "localhost"; 
$username = "root"; 
$password = "password"; 
$dbname = "EmpowerChange"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in by verifying the session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch user data from the database
    $stmt = $conn->prepare("SELECT name, email, dob, phone FROM sign_up WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($name, $email, $dob, $phone);
        $stmt->fetch();

        // Store the user data in an array for easy access
        $user_data = [
            'name' => $name,
            'email' => $email,
            'dob' => $dob,
            'phone' => $phone
        ];
    } else {
        echo "No user found.";
    }

    $stmt->close();
} else {
    echo "User not logged in.";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Add your styles here */
        .profile-item {
            position: relative;
        }

        .profile-options {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #333;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            padding: 10px 0;
            z-index: 10;
        }

        .profile-item:hover .profile-options {
            display: block;
        }

        .profile-options a {
            color: white;
            padding: 10px;
            display: block;
            text-decoration: none;
        }

        .profile-options a:hover {
            background-color: black;
        }

        .form-container, .dashboard-container {
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            margin: 20px auto;
            color: white;
        }

        h2 {
            margin: 0 0 20px;
            text-align: center;
            color: white;
            font-size: 24px;
        }

        h3 {
            text-align: center;
            color: white;
            font-size: 20px;
        }

        li {
            color: white;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #444;
            color: white;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: black;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: black;
        }

        .error {
            color: #E55451;
            text-align: center;
        }

        .forgot-password {
            text-align: center;
            color: white;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #E55451;
            text-decoration: underline;
            cursor: pointer;
        }

        .signup-link {
            text-align: center;
            color: white;
            margin-top: 10px;
        }

        .signup-link a {
            color: #E55451;
            text-decoration: underline;
            cursor: pointer;
        }

        /* Forgot Password Modal */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 100;
        }

        .popup-content {
            background-color: #444;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            color: white;
        }

        .popup h2 {
            text-align: center;
        }

        .popup button {
            background-color: blue;
            margin-top: 10px;
        }

        .popup button:hover {
            background-color: lightblue;
        }

        .popup a {
            color: #E55451;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- NAV BAR -->
<section class="header1">
    <nav>
        <a href="main.php"><img src="pictures/logoo.png" alt="Logo of Empowering Change: Unite to Fight Poverty"></a>
        <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i>
            <ul>
                <li><a href="main.php">HOME</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="blog.php">BLOG</a></li>
                <li><a href="donation.php">DONATION</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <li class="profile-item">
                    <a href="javascript:void(0);" class="active">PROFILE</a>
                    <div class="profile-options">
                        <a href="javascript:void(0);" onclick="logout()">LOGOUT</a>
                    </div>
                </li>
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
</section>

<script>
// JavaScript function to handle logout and redirect to profile.html
function logout() {
    // Add your logout logic here, e.g., clearing session storage, cookies, or sending a logout request to the server
    window.location.href = "profile.html"; // Redirect to profile page after logout
}
</script>
</body>
</html>
