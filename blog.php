<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>
            alert('You need to log in first.');
            window.location.href = 'profile.html';
          </script>";
    exit();
}

// Example: User data can be fetched from the database
$user_data = [
    'name' => 'Paul',
    'email' => 'pauldoe@gmail.com',
    'dob' => '1981-12-03',
    'phone' => '09198728278'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRae8p3OgKBme9bAm2Nf9dA_2hceuP58N1kHQ&s">
    <title>BLOG | Unite to Fight Poverty</title>
</head>

<body>
    <!-- NAV BAR -->
    <section class="headerBlog">
      <nav>
        <a href="main.php"><img src="wireframe_pic2/logo.png" alt="Logo of Empowering Change: Unite to Fight Poverty"></a>
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
            <li><a href="main.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a class="active" href="blog.php">BLOG</a></li>
            <li><a href="donation.php">SUPPORT HUB</a></li>
            <li><a href="contact.php">CONTACT</a></li>
            <li><a href="profile.php" class="dropdown">PROFILE</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
      </nav>
    
    </section>

<main>

 <!-- Blog Content Sections with Backgrounds -->
 <section id="blog-content1" class="background-cover blog-content1">
    <iframe src="facesPoverty.php" style="width: 100%; margin-top: 8%; border: none;" title="Example Site"></iframe>

</section>

 <section id="blog-content2" class="background-cover blog-content2"></section>
 <section id="blog-content3" class="background-cover blog-content3"></section>
 <section id="blog-content4" class="background-cover blog-content4"></section>
 <section id="blog-content5" class="background-cover blog-content5"></section>
 <section id="blog-content6" class="background-cover blog-content6"></section>
 <section id="blog-content7" class="background-cover blog-content7"></section>
 <section id="blog-content8" class="background-cover blog-content8">
  <div class="container">
    <div class="hexagon-grid">
      <div class="hexagon">
        <div class="hexagon-content">
          <h3>Support a Family</h3>
          <p>Consider donating to help families like Ana's, John's, and Maria's overcome their challenges.</p>
        </div>
      </div>
      <div class="hexagon">
        <div class="hexagon-content">
          <h3>Join the Conversation</h3>
          <p>Comment, like, and share posts to show your support. Your voice makes a difference.</p>
        </div>
      </div>
      <div class="hexagon">
        <div class="hexagon-content">
          <h3>Follow Us</h3>
          <p>Stay connected to see updates and new stories from our community.</p>
        </div>
      </div>
    </div>
  </div>

  <style>
    .background-cover {
      background-color: #1a1a1a;
      padding: 40px 20px;
    }
    .container {
      max-width: 1500px;
      margin: 0 auto;
    }
    .hexagon-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 70px;
    }
    .hexagon {
      width: 350px;
      height: 330px;
      position: relative;
      clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
      background-color: rgba(255, 215, 0, 0.2);
      display: flex;
      align-items: center;
      justify-content: center;
      transition: transform 0.3s ease-in-out;
      border: 1px solid #ffe9a5;
    }
    .hexagon:hover {
      transform: scale(1.05);
    }
    .hexagon::before {
      content: '';
      position: absolute;
      top: 2px;
      left: 2px;
      right: 2px;
      bottom: 2px;
      background-color: #363535;
      clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);
      z-index: 1;
    }
    .hexagon-content {
      position: relative;
      z-index: 2;
      text-align: center;
      padding: 20px;
      color: white;
      padding: 15%;
    }
    h3 {
      font-size: 40px;
      margin-bottom: 10px;
    }
    p {
      margin-top: 10%;
      font-size: 20px;
    }
  </style>
</section>

<script>
// Mock data for user login status
let isLoggedIn = false; // Change this to true if the user is logged in

// Function to populate user data (for display purposes)
function populateUserInfo() {
  document.getElementById("username").innerText = "User Name"; // Replace with dynamic username
  document.getElementById("profileStatus").innerText = "Public"; // Replace with actual profile status
}

// Function to check login status before commenting
function checkLoginAndSubmitComment() {
  if (!isLoggedIn) {
    alert("Need to Log In First to Comment");
  } else {
    // Code to submit comment here (if logged in)
    alert("Comment submitted");
  }
}

// Function to handle story submission (if needed)
function submitStory() {
  const storyInput = document.getElementById("storyInput").value;
  if (storyInput.trim()) {
      alert(`Story submitted: ${storyInput}`); // Fixed the syntax here
      document.getElementById("storyInput").value = ""; // Clear the input
  } else {
      alert("Please enter a story.");
  }
}

// Populate user data when the page loads
window.onload = populateUserInfo;
</script>

</main>

</body>
</html>
