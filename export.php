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

// Fetch data from the database
$sql = "SELECT email, first_name, last_name, message FROM contact";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Set the header to force download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="contact_data.csv"');

    // Open output stream
    $output = fopen('php://output', 'w');

    // Write the column headers
    fputcsv($output, ['Email', 'First Name', 'Last Name', 'Message']);

    // Write each row of data
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit;
} else {
    echo "No data found!";
}

$conn->close();
?>
