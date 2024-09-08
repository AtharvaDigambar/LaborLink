<?php
// Your PHP code can go here if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to LaborLink</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative; /* Added */
        }
        .header .logo {
            position: relative; /* Added */
        }
        .header .logo img {
            width: 200px;
            height: auto;
            text-align: center;
            z-index: 1; /* Added */
        }
        .btn-container {
            margin-left: auto;
        }
        .title{
            margin-left: 350px;
        }
        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
            margin-top: 20px;
            border-radius: 5px;
        }
        .signup-btn {
            background-color: #009688;
            margin-right: 10px;
        }
        .unique-feature-btn {
            background-color: #2196F3;
            margin-right: 10px;
        }
        .unique-feature-text {
            animation: blinker 1s linear infinite;
        }
        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 10px;
            text-align: center;
        }
        .search-bar {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .search-input {
            width: 300px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }
        .search-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .service-boxes {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; 
            margin-top: 20px;
        }
        .service-box {
            width: calc(33.33% - 70px); /* Allignment the box -33.33% means 3 in one */
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            margin: 0 10px 20px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .service-box img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .service-box h3 {
            margin-top: 0;
        }
        .service-box p {
            font-size: 16px;
        }
        .service-box:hover {
            transform: scale(1.05);
        }
        .footer {
            text-align: left;
            padding: 20px;
            background-color: #333;
            color: white;
        }
        .footer .logo img {
            width: 160px;
            height: 40px;
        }
        .footer .sections {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .footer .section {
            flex-basis: 30%;
        }
        .footer .section h3 {
            margin-top: 0;
        }
        .footer .section ul {
            list-style-type: none;
            padding: 0;
        }
        .footer .section ul li {
            margin-bottom: 10px;
        }
        /* Added CSS for clickable circle */
        .logo-overlay {
            position: absolute;
            bottom: -120px;
            left: 0px;
            width: 60px;
            height: 60px;
            background-color: #4CAF50;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2;
            overflow: hidden;
        }
        .logo-overlay img {
            width: 30px;
            height: auto;
            transition: transform 0.3s ease;
            overflow: hidden;
        }
        .logo-overlay:hover img {
            transform: scale(1.1);
        }
    </style>
</head>
<body>

<div class="header">
    <div class="logo">
        <img src="logo.png">     
        <!-- Added clickable circle -->
        <a href="bot.php" class="logo-overlay">
            <img src="bot3.jpg">
        </a>
    </div>
    <div class="title">
        <h1>&nbsp Welcome to LaborLink</h1>
        <p>The platform connecting User to Labor and Contractor.</p>
    </div>
    <div class="btn-container">
        <a class="btn unique-feature-btn" href="unique_feature.php"><span class="unique-feature-text">Our Unique Feature</span></a>
        <a class="btn signup-btn" href="signup.php">Join Us</a>
        <a class="btn" href="login.php">Login</a>
    </div>
</div>

<div class="container">
<!-- Hero Section -->
<section id="hero" class="text-center">
  <div class="container">
    <h1 class="display-4">Find Skilled Laborers for Your Home Projects</h1>
    <p class="lead">Connecting Homeowners with Trusted Contractors and Laborers</p>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="#" method="GET">
          <div class="form-row">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
    <div class="search-bar">
        <input type="text" id="searchInput" class="search-input" placeholder="Search for">
        <button class="search-btn" onclick="search()">⌕</button>
    </div>

    <div class="service-boxes">
        <a href="login.php" class="service-box">
            <img src="p.jpg">
            <h3>Painting</h3>
        </a>
        <a href="login.php" class="service-box">
            <img src="e.jpg">
            <h3>Electrician</h3>
        </a>
        <a href="login.php" class="service-box">
            <img src="home.jpg">
            <h3>House Cleaning</h3>
        </a>
        <a href="login.php" class="service-box">
            <img src="carpanter.jpg">
            <h3>Carpenter</h3>
        </a>
        <a href="login.php" class="service-box">
            <img src="construction.jpg" alt="Service 5">
            <h3>Construction Worker</h3>
        </a>
        <a href="login.php" class="service-box">
            <img src="water.jpg" alt="Service 6">
            <h3>Waterproofing</h3>
        </a>
        <a href="login.php" class="service-box">
            <img src="pest.jpg">
            <h3>Pest Control</h3>
        </a>
        <a href="login.php" class="service-box">
            <img src="appliance.jpg">
            <h3>Appliance Repair</h3>
        </a>
        <a href="login.php" class="service-box">
            <img src="p2.jpg">
            <h3>Plumber</h3>
        </a>
    </div>
</div>
<!-- How It Works Section -->
<section id="how-it-works">
  <div class="container">
    <h2 class="text-center">How It Works</h2>
    <div class="row">
      <div class="col-md-3">
        <h4>Step 1</h4>
        <p>Post Your Project</p>
      </div>
      <div class="col-md-3">
        <h4>Step 2</h4>
        <p>Get Matched with Skilled Laborers</p>
      </div>
      <div class="col-md-3">
        <h4>Step 3</h4>
        <p>Connect and Hire</p>
      </div>
      <div class="col-md-3">
        <h4>Step 4</h4>
        <p>Complete Your Project</p>
      </div>
    </div>
  </div>
</section>
<!-- Why Choose Us Section -->
<section id="why-choose-us">
  <div class="container">
    <h2 class="text-center">Why Choose Us</h2>
    <div class="row">
      <div class="col-md-3">
        <h4>Trusted and Verified Contractors</h4>
        <p>Connecting you with trustworthy and certified contractors.</p>
      </div>
      <div class="col-md-3">
        <h4>Easy to Use Platform</h4>
        <p>An intuitive and user-friendly platform for seamless project management.</p>
      </div>
      <div class="col-md-3">
        <h4>Wide Range of Services</h4>
        <p>A diverse array of services to meet all your home project needs.</p>
      </div>
      <div class="col-md-3">
        <h4>Safe and Secure Transactions</h4>
        <p>Secure and reliable payment transactions for your peace of mind.</p>
      </div>
    </div>
  </div>
</section>
<!-- Testimonials Section -->
<section id="testimonials">
  <div class="container">
    <h2 class="text-center">What Our Customers Say</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <p class="card-text">"LaborLink made finding a skilled electrician effortless! Quick response, excellent service!"</p>
            <p class="text-right">- Atharva A Digambar</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <p class="card-text">"Found a fantastic plumber through LaborLink, highly recommended for home projects!"</p>
            <p class="text-right">- Vaibhav Agade</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <p class="card-text">"Great experience using LaborLink, connected me with a reliable carpenter in no time!"</p>
            <p class="text-right">- Aditya Adak</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <p class="card-text">"I needed urgent house cleaning, LaborLink got me the best service within hours!"</p>
            <p class="text-right">- Jasshan Bhalgat</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="footer">
    <div class="container">
        <div class="logo">
            <img src="logo.png">
        </div>
        <div class="sections">
            <div class="section">
                <h3>Company</h3>
                <ul>
                    <li>About Us</li>
                    <li>Terms and Conditions</li>
                    <li>Privacy Policy</li>
                    <li>Anti-discrimination Policy</li>
                    <li>LL Impact</li>
                    <li>Careers</li>
                </ul>
            </div>
            <div class="section">
                <h3>For Customers</h3>
                <ul>
                    <li>LL Reviews</li>
                    <li>Categories Near You</li>
                    <li>Blog</li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const searchTerms = ['Plumber', 'Carpenter', 'Electrician', 'Construction Worker'];
    let currentIndex = 0;

    function search() {
        searchInput.value = searchTerms[currentIndex];
        currentIndex = (currentIndex + 1) % searchTerms.length;
    }

    setInterval(search, 1500);
</script>

</body>
</html>

<?php
// More PHP code can go here if needed
?>
