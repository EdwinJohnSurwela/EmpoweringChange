<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "password";
$database = "empowerchange";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];  // Store the plain text password directly
    $role = 'user'; // Default role

    // Insert into database
    $sql = "INSERT INTO sign_up (first_name, last_name, email, dob, phone, password, role)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $first_name, $last_name, $email, $dob, $phone, $password, $role);

    if ($stmt->execute()) {
        echo "Sign Up successful! You can now log in.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
