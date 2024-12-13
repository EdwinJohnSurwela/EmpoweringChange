<?php
// Step 2: Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Step 3: Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $amount = htmlspecialchars($_POST['amount']);
    $customAmount = htmlspecialchars($_POST['custom-amount']);
    $paymentMethod = htmlspecialchars($_POST['payment-method']);

    // Use custom amount if selected
    if ($amount === 'custom') {
        $amount = $customAmount;
    }

    // Validate required fields
    if (empty($name) || empty($email) || empty($amount) || empty($paymentMethod)) {
        echo '<script>alert("All fields are required."); window.history.back();</script>';
        exit;
    }

    // Establish database connection
    $conn = new mysqli('localhost', 'root', 'password', 'EmpowerChange');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert donation into database
    $stmt = $conn->prepare("INSERT INTO donations (name, email, amount, payment_method) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $email, $amount, $paymentMethod);

    if ($stmt->execute()) {
        echo '<script>alert("Success! Thank you for your donation."); window.location.href = "donation.php";</script>';
    } else {
        echo '<script>alert("Error: ' . $stmt->error . '"); window.history.back();</script>';
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStAR0Hw9GckCIZkjry24v8XYMR4Xq3H46Vtg&s">
    <title>DONATION | Unite to Fight Poverty</title>
</head>
<style>
    .transparent-link {
      color: transparent; /* Make the link text transparent */
      text-decoration: none; /* Remove underline */
      letter-spacing: 2px; /* Adds space between characters */
      line-height: 1.5; /* Adds space between lines of text (if it's multiline) */
    }
    .transparent-link:visited,
    .transparent-link:hover,
    .transparent-link:active {
      color: transparent; /* Ensures the link remains transparent in all states */
    }
  </style>
<body>
    <!-- NAV BAR -->
    <section class="headerDonation">
        <nav>
            <a href="main.php"><img src="wireframe_pic2/logo.png" alt="Logo of Empowering Change: Unite to Fight Poverty"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="main.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="blog.php">BLOG</a></li>
                    <li><a class="active" href="support_hub.php">SUPPORT HUB</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                    <li><a href="profile.php" class="dropdown">PROFILE</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
    </section>

<main>

    <section class="info-section">
      <div class="container">
        <div class="info-box">
          <h2>Skill Development Programs</h2>
          <p>Your donation supports workshops and training programs that equip individuals with valuable skills such as carpentry, handicrafts, food preparation, and digital literacy so they can earn a stable income.</p>
        </div>
    
        <div class="info-box">
          <h2>Job Placement and Micro-Business Support</h2>
          <p>Contributions help us connect community members to local job opportunities and provide resources to start small businesses. By offering mentorship, tools, and initial funding, we aim to help individuals become self-reliant, reducing dependency on external aid.</p>
        </div>
    
        <div class="info-box">
          <h2>Educational Resources for Sustainable Livelihoods</h2>
          <p>Part of your donation goes toward educational resources that focus on financial literacy, entrepreneurship, and sustainable farming or crafting techniques. With this knowledge, families can gain the confidence and know-how to maintain a steady income.</p>
        </div>
      </div>
    
      <style>
        .info-box {
          width: 100%;
          height: 200px; /* Adjust height as needed */
          background-size: cover;
          background-position: center;
          margin-bottom: 20px;
          border: 1px solid #ffe9a5;
          transition: transform 0.3s ease-in-out;
        }
    
        .info-box:hover {
          transform: scale(1.05); /* Slight zoom effect on hover */
        }
    
        .info-section {
          padding: 40px 20px;
          color: white;
          background-image: url(wireframe_pic2/EMPOWER\ CHANGE\ \(11\).png);
          background-position: center;
         background-size: cover;
         position: relative;
        }
    
        .container {
          max-width: 1200px;
          margin: 0 auto;
          display: flex;
          flex-direction: column;
          gap: 20px;
         margin-top: 90px;

        }
    
        .info-box {
          background-color: #363535;
          border: 2px solid #ffe9a5;
          border-radius: 25px;
          padding: 30px;
          position: relative;
        }
    
        .info-box h2 {
          font-size: 28px;
          margin-bottom: 15px;
          font-style: italic;
          color: white;
        }
    
        .info-box p {
          font-size: 16px;
          line-height: 1.6;
          color: #ffffff;
          margin: 0;
        }
    
        @media (max-width: 768px) {
          .info-box {
            padding: 20px;
          }
    
          .info-box h2 {
            font-size: 24px;
          }
    
          .info-box p {
            font-size: 14px;
          }
    
          #support_hub-content1 {
            height: 150px; /* Adjust height for smaller screens */
          }
        }
      </style>
    </section>
    

    <section id="support_hub-content2" class="background-cover support_hub-content2">
        <div>
            <a 
              href="https://bit.ly/LipaCityPesoFB" 
              target="_blank" 
              rel="noopener noreferrer" 
              class="transparent-link"
              style="margin-left: 200px; margin-top: 575px; display: inline-block;"
            >
              (https://bit.ly/LipaCityPesoFB)
            </a>
          </div> 
      </section>
    <section id="support_hub-content3" class="background-cover support_hub-content3"></section>
    <section id="support_hub-content4" class="background-cover support_hub-content4"></section>
    <section id="support_hub-content5" class="background-cover support_hub-content5"></section>
 
    <!-- Donation Form Section -->
<!-- Donation Form Section -->
<section id="donation-section-5" class="donation-section-5">
    <div class="donation-container">

        <section class="donation-form-section">
            <h2>Donate Now</h2>
            <form action="donation.php" method="POST" id="donation-form">
                <label for="donor-name">Full Name:</label>
                <input type="text" id="donor-name" name="name" required>

                <label for="donor-email">Email Address:</label>
                <input type="email" id="donor-email" name="email" required>

                <label for="donation-amount">Choose Your Donation Amount:</label>
                <select id="donation-amount" name="amount" required>
                    <option value="500">₱500</option>
                    <option value="1000">₱1,000</option>
                    <option value="2500">₱2,500</option>
                    <option value="custom">Custom Amount</option>
                </select>
                <input type="number" id="custom-donation-amount" name="custom-amount" placeholder="Enter custom amount" style="display:none;" min="1" step="0.01">

                <label for="payment-method-selector">Choose Your Payment Method:</label>
                <select id="payment-method-selector" name="payment-method" required>
                    <option value="credit-debit">Credit/Debit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="gcash">GCash</option>
                </select>

                <div id="gcash-qr-code" style="display:none; margin-top: 20px; text-align: center;">
                    <h3>Scan to Pay</h3>
                    <img src="pictures/qr_code.jpg" alt="GCash QR Code" id="gcash-qr-code-img" style="max-width: 200px;">
                </div>

                <button type="submit" class="donate-button">Donate</button>
            </form>
        </section>
    </div>
</section>

        </div>
    </section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const donationAmountSelect = document.getElementById('donation-amount');
    const customDonationAmountInput = document.getElementById('custom-donation-amount');
    const paymentMethodSelect = document.getElementById('payment-method-selector');
    const gcashQrCodeDiv = document.getElementById('gcash-qr-code');

    // Show/hide custom amount input
    donationAmountSelect.addEventListener('change', function() {
        customDonationAmountInput.style.display = this.value === 'custom' ? 'block' : 'none';
    });

    // Show/hide GCash QR code
    paymentMethodSelect.addEventListener('change', function() {
        gcashQrCodeDiv.style.display = this.value === 'gcash' ? 'block' : 'none';
    });
});

</script>
</main>
</body>
</html>
