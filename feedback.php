<?php
// Database connection settings
$host = "localhost"; // Your MySQL server hostname
$username = "root";  // Your MySQL username
$password = "password";      // Your MySQL password
$database = "empowerchange"; // Database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = $conn->real_escape_string($_POST['first-name']);
    $last_name = $conn->real_escape_string($_POST['last-name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data into the contact table
    $sql = "INSERT INTO contact (email, first_name, last_name, message)
            VALUES ('$email', '$first_name', '$last_name', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Thank you for your feedback!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>