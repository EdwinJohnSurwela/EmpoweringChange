<?php
$host = "localhost";
$username = "root";
$password = "password";
$database = "empowerchange";

// Database connection
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_FILES['import_file']) && $_FILES['import_file']['type'] == 'text/csv') {
    $file = fopen($_FILES['import_file']['tmp_name'], 'r');

    // Skip the header row
    fgetcsv($file);

    while (($row = fgetcsv($file)) !== false) {
        $email = $conn->real_escape_string($row[0]);
        $first_name = $conn->real_escape_string($row[1]);
        $last_name = $conn->real_escape_string($row[2]);
        $message = $conn->real_escape_string($row[3]);

        $sql = "INSERT INTO contact (email, first_name, last_name, message) 
                VALUES ('$email', '$first_name', '$last_name', '$message')
                ON DUPLICATE KEY UPDATE 
                first_name='$first_name', last_name='$last_name', message='$message'";
        $conn->query($sql);
    }

    fclose($file);
    echo "Data imported successfully!";
} else {
    echo "Please upload a valid CSV file!";
}

$conn->close();
?>
