<?php
// Start session to track user login status
session_start();

// Assume a simple login check: if a user is logged in, the session will store the user's info
// If the user is logged in, set $user_logged_in to true; otherwise, set it to false.
$user_logged_in = isset($_SESSION['user_id']) ? true : false;  // Adjust this condition based on your login system

// Example: User data can be fetched from the database (optional, for display purposes)
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
  <link rel="shortcut icon" href="https://e7.pngegg.com/pngimages/228/116/png-clipart-computer-icons-renovation-graphics-home-improvement-business-homepage-icon-computer-icons-renovation-thumbnail.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <title>HOMEPAGE | Unite to Fight Poverty</title>
</head>
<body>
  <!-- NAV BAR -->
  <section class="header">
    <nav>
      <a href="main.php"><img src="wireframe_pic2/logo.png" alt="Logo of Empowering Change: Unite to Fight Poverty"></a>
      <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
          <li><a class="active" href="main.php">HOME</a></li>
          <li><a href="about.php">ABOUT</a></li>
          <li><a href="blog.php">BLOG</a></li>
          <li><a href="donation.php">SUPPORT HUB</a></li>
          <li><a href="contact.php">CONTACT</a></li>
          <li><a href="profile.php" class="dropdown">PROFILE</a></li>
        </ul>
      </div>
      <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>
  
  <div class="maps">
    <a href="https://www.google.com/maps/place/Riles/@13.9623553,121.1531354,18z/data=!4m10!1m2!2m1!1sriles+brgy+balitawak!3m6!1s0x33bd6d001cda2f67:0xb9f3aa88fe4f6a62!8m2!3d13.9640092!4d121.1547003!15sChVyaWxlcyBicmd5IGJhbGludGF3YWuSARNob3VzaW5nX2RldmVsb3BtZW504AEA!16s%2Fg%2F11y4lk5j7_?entry=ttu&g_ep=EgoyMDI0MTAxNi4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="Visit">Visit Us To Know More</a>
</div>

  </section>

  <main>
    <!-- Main Content Sections with Backgrounds -->
    <section id="main-content1" class="background-cover main-content1"></section>

    <section id="main-content2" class="background-cover main-content2">
    <section class="experience">
      <div class="row">
        <div class="exp-col">
          <img src="wireframe_pictures/grandma.jpg" alt=" ">
          <h2>"A Grandmother’s Struggle for Survival" </h2>
          <p>In the quiet streets of Barangay Balintawak, a grandmother and her grandchild walk hand in hand, 
            collecting recyclables to survive another day. Their meager earnings are barely enough for a meal, 
            yet they persist with unwavering resilience. This image speaks to the daily hardships endured by many families who live on the margins of society,
            where survival is an unending battle.</p>
        </div>

        <div class="exp-col">
          <img src="wireframe_pictures/children.jpg" alt=" ">
          <h2>"Children Denied Their Right to Education" </h2>
          <p>A group of young children huddle in an alley, their curious faces masking the struggles they face. 
            Unable to attend school because of financial difficulties, their dreams are left in limbo, 
            trapped by circumstances beyond their control. These children represent a future at risk, 
            a generation in need of opportunity and support to break free from the cycle of poverty.
          </p>
        </div>

        <div class="exp-col">
          <img src="wireframe_pictures/mother.jpg" alt=" ">
          <h2>"A Mother’s Sacrifice for Her Children’s Future" </h2>
          <p>Sitting amidst a pile of recyclables, a mother works tirelessly, her hands weathered from years of scavenging. 
            Every piece she collects brings her closer to securing a better future for her children, 
            as she dreams of seeing them graduate from school. Her story is a powerful reminder of the strength of parental love, 
            even in the face of overwhelming adversity.</p>
        </div>
      </div>
    </section>
  </section>

    
    <section id="main-content3" class="background-cover main-content3"></section>
  </main>

  <script>
    function enterMainContent() {
      const landingPage = document.getElementById("landing-page");
      if (landingPage) {
        landingPage.style.display = "none";
      }
      document.getElementById("main-content1").style.display = "block";
      document.getElementById("main-content2").style.display = "block";
      document.getElementById("main-content3").style.display = "block";
      document.getElementById("main-content4").style.display = "block";
    }
  </script>
</body>
</html>