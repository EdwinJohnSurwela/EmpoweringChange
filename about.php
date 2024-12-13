<?php
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
  <link rel="shortcut icon" href="https://icons.veryicon.com/png/o/miscellaneous/test-5/icon-my-page.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <title>ABOUT | Unite to Fight Poverty</title>
</head>

<body>
    <!-- NAV BAR -->
    <section class="headerAbout">
      <nav>
        <a href="main.php"><img src="wireframe_pic2/logo.png" alt="Logo of Empowering Change: Unite to Fight Poverty"></a>
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
            <li><a href="main.php">HOME</a></li>
            <li><a class="active" href="about.php">ABOUT</a></li>
            <li><a href="blog.php">BLOG</a></li>
            <li><a href="donation.php">SUPPORT HUB</a></li>
            <li><a href="contact.php">CONTACT</a></li>
            <li><a href="profile.php" class="dropdown">PROFILE</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
      </nav>
    </section>

    <main>
      <!-- About Content Sections with Backgrounds -->
      <section id="about-content1" class="background-cover about-content1"></section>
      <section id="about-content2" class="background-cover about-content2"></section>
      <section id="about-content3" class="background-cover about-content3"></section>
      <section id="about-content4" class="background-cover about-content4"></section>
      <section id="about-content5" class="background-cover about-content5">
        <div class="container">
          <div class="team-section">
            <br>
            <div class="team-member">
              <img src="pictures/ruffa_pic.jpg" alt="ANOYA, RUFFA F.">
              <div class="member-info">
                <h3>ANOYA, RUFFA F.</h3>
                <p>Age: 19 years old</p>
                <p>Adressed: Brgy. Tangob, Lipa City, Batangas, Philippines</p>
              </div>
            </div>
            <div class="team-member">
              <img src="pictures/carvey_pic.jpg" alt="BRIONES, CARVEY ADRIAN">
              <div class="member-info">
                <h3>BRIONES, CARVEY ADRIAN</h3>
                <p>Age: 21 years old</p>
                <p>Adressed: Brgy. San Jose, Lipa City, Batangas, Philippines</p>
              </div>
            </div>
            <div class="team-member">
              <img src="pictures/reymark_pic.jpg" alt="LEVITA, REYMARK A.">
              <div class="member-info">
                <h3>LEVITA, REYMARK A.</h3>
                <p>Age: 19 years old</p>
                <p>Adressed: Brgy. Pusil, Lipa City, Batangas, Philippines</p>
              </div>
            </div>
            <div class="team-member">
              <img src="pictures/edwin_pic.jpg" alt="SURWELA, EDWIN JOHN L.">
              <div class="member-info">
                <h3>SURWELA, EDWIN JOHN L.</h3>
                <p>Age: 19 years old</p>
                <p>Adressed: Brgy. Sabang, Lipa City, Batangas, Philippines</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
</body>
</html>
