<?php
// Start a session to manage user login state
session_start();

// Include database connection file
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "empowerchange";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the login button was clicked
if (isset($_POST['login'])) {
    // Get the submitted email and password
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Check if this is an admin login attempt
    if (isset($_POST['admin_login'])) {
        // Check admin credentials
        $user = check_admin_credentials($email, $password, $conn);
        if ($user) {
            $_SESSION['user'] = $user;
            $_SESSION['is_admin'] = true;
            header('Location: admin_dashboard.html');
            exit();
        }
    } else {
        // Check regular user credentials
        $user = check_user_credentials($email, $password, $conn);
        if ($user) {
            $_SESSION['user'] = $user;
            $_SESSION['is_admin'] = false;
            header('Location: profile.php');
            exit();
        }
    }

    // If we reach here, authentication failed
    echo "<script>
            alert('Invalid email or password. Please try again.');
            window.location.href='profile.html';
          </script>";
}

// Function to check regular user credentials
function check_user_credentials($email, $password, $conn) {
    $query = "SELECT * FROM sign_up WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user['role'] = 'user';
        return $user;
    }
    return false;
}

// Function to check admin credentials
function check_admin_credentials($email, $password, $conn) {
    $query = "SELECT * FROM Admins WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        $admin['role'] = 'admin';
        return $admin;
    }
    return false;
}

// Password reset functionality
if (isset($_POST['reset_password'])) {
    $email = $conn->real_escape_string($_POST['email']);
    
    // Check if it's an admin reset request
    if (isset($_POST['admin_reset'])) {
        $table = "Admins";
    } else {
        $table = "sign_up";
    }
    
    $query = "SELECT * FROM $table WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate password reset token
        $token = bin2hex(random_bytes(32));
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        // Store the reset token in the database
        $update_query = "UPDATE $table SET reset_token = ?, reset_token_expiry = ? WHERE email = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("sss", $token, $expiry, $email);
        $stmt->execute();
        
        // In a real application, send email with reset link
        // For now, just show a success message
        echo "<script>
                alert('Password reset instructions have been sent to your email.');
                window.location.href='profile.html';
              </script>";
    } else {
        echo "<script>
                alert('Email address not found.');
                window.location.href='profile.html';
              </script>";
    }
}

$conn->close();
?>