<?php
// Database connection settings
$host = "localhost";
$username = "root";
$password = "password";
$database = "empowerchange";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Flag for successful submission
$feedback_sent = false;

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
        // Set flag to true if the form is submitted successfully
        $feedback_sent = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1IVn8SI8l_4l3gmlycZ1CDc2RHS9MOCCaWQ&s">
    <title>CONTACT | Unite to Fight Poverty</title>
    <script>
        function confirmAdmin() {
            const isAdmin = confirm("Are you an admin?");
            if (isAdmin) {
                window.location.href = '/admin.html'; // Redirect to admin page
            } else {
                alert("You do not have permission to access the admin page.");
            }
        }

        // Display thank-you message after successful feedback submission
        <?php if ($feedback_sent): ?>
        alert("Thank you for your feedback!");
        <?php endif; ?>
    </script>
</head>
<body>
    <!-- NAV BAR -->
    <section class="headerContact">
      <nav>
        <a href="main.php"><img src="wireframe_pic2/logo.png" alt="Logo of Empowering Change: Unite to Fight Poverty"></a>
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
            <li><a href="main.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="blog.php">BLOG</a></li>
            <li><a href="donation.php">SUPPORT HUB</a></li>
            <li><a class="active" href="contact.php">CONTACT</a></li>
            <li><a href="profile.php" class="dropdown">PROFILE</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
      </nav>
    </section>

    <main>
     <!-- Contact Content Sections with Backgrounds -->
     <section id="contact-content2" class="background-cover contact-content2"></section>
     <section id="contact-content3" class="background-cover contact-content3">
        <div class="feedback-container">
            <h2>Your Feedback</h2>
            <form action="contact.php" method="post">
                <div class="input-group" style="display: flex; justify-content: space-between; gap: 20px;">
                    <div style="width: 48%;">
                        <label for="first-name">First Name *</label>
                        <input type="text" id="first-name" name="first-name" required>
                    </div>
                    <div style="width: 48%;">
                        <label for="last-name">Last Name *</label>
                        <input type="text" id="last-name" name="last-name" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message"></textarea>
                </div>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
    
            <div class="social-media">
                <p>Follow Us</p>
                <p>The easiest way to link to our social media pages</p>
                <a href="https://facebook.com/fightpovertybsu" class="social-link">
                    <img src="wireframe_pic2/icons8-facebook-48.png" alt="Facebook">
                </a>
                <a href="https://instagram.com/fightpoverty_bsu" class="social-link">
                    <img src="wireframe_pic2/icons8-instagram-48.png" alt="Instagram">
                </a>
                <a href="https://twitter.com/fightpoverty_bsu" class="social-link">
                    <img src="wireframe_pic2/icons8-twitter-48.png" alt="Twitter">
                </a>
            </div>
        </div>
    </section>
    </main>
</body>
</html>
