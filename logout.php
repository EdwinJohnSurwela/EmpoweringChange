<?php
// Start the session
session_start();

// Destroy the session to log the user out
session_destroy();

// Redirect to User login page
header("Location: profile.html");
exit();
?>
