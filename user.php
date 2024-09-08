<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaborLink</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links {
            list-style: none;
            display: flex;
        }

        .nav-links li {
            padding: 0 10px;
        }

        .nav-links li a {
            color: #fff;
            text-decoration: none;
        }
        

        .hero {
            text-align: center;
            padding: 50px 0;
        }

        .hero h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2em;
            margin-bottom: 40px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .btn-find {
            background-color: #ff6600;
        }

        .services {
            background-color: #f4f4f4;
            padding: 50px 0;
            text-align: center;
        }

        .services h2 {
            margin-bottom: 40px;
        }

        .service-cards {
            display: flex;
            justify-content: space-around;
        }

        .service-card {
            flex-basis: 30%;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .service-card img {
            width: 100%;
            border-radius: 5px;
        }

        .service-card h3 {
            margin-top: 20px;
        }

        .how-it-works {
            padding: 50px 0;
            text-align: center;
        }

        .steps {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .step {
            flex-basis: 20%;
        }

        .step h3 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .footer-links {
            list-style: none;
            display: flex;
            justify-content: center;
        }

        .footer-links li {
            padding: 0 10px;
        }

        .footer-links li a {
            color: #fff;
            text-decoration: none;
        }

        .logo {
            color: #fff;
            text-decoration: none;
        }

        .logo:hover {
            text-decoration: underline;
        }

        /* Profile circle */
        .profile-circle {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background-color: #00FF00;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .profile-circle img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-dropdown {
            position: absolute;
            top: 70px;
            right: 20px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 10px;
            display: none;
        }
        .profile-dropdown ul li {
            padding: 10px 20px;
            cursor: pointer;
        }

        .profile-dropdown ul li:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <a href="index.php" class="logo">LaborLink</a>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="bot.php">About</a></li>
                    <li><a href="bot.php">Services</a></li>
                    <li><a href="bot.php">Contact</a></li>
                </ul>
                <div class="profile-circle" onclick="toggleProfileDropdown()">
                <div class="profile-button" onclick="toggleProfileMenu()">👤</div>
                    <div class="profile-dropdown" id="profileDropdown">
                        <ul>
                            <li><a href="labor_profile.php">My Profile</a></li>
                            <li><a href="index.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="hero">
            <div class="container">
                <h1>Find Skilled Laborers and Contractors for Your Home Projects</h1>
                <p>Connecting Homeowners with Trusted Laborers and Contractors</p>
                <a href="labor_user.php" class="btn btn-find">Find Labor</a>
                <a href="contractor_user.php" class="btn btn-find">Find Contractor</a>
            </div>
        </div>
    </header>

    <section class="services">
        <div class="container">
            <h2>Our Top Rated Services</h2>
            <div class="service-cards">
                <div class="service-card">
                    <img src="construction.jpg">
                    <h3>Construction Work</h3>
                    <p>Build your dream home with confidence - find skilled construction workers for all your home improvement projects</p>
                </div>
                <div class="service-card">
                    <img src="home.jpg" alt="Electrician">
                    <h3>House Cleaning</h3>
                    <p>Keep your home sparkling clean with our trusted house cleaning services. Find professional cleaners for a pristine living space.</p>
                </div>
                <div class="service-card">
                    <img src="p.jpg" alt="House Cleaning">
                    <h3>Painting</h3>
                    <p>Transform your home with a fresh coat of paint. Find skilled painters to bring color and life to your living space.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="how-it-works">
        <div class="container">
            <h2>How It Works</h2>
            <div class="steps">
                <div class="step">
                    <h3>Step 1</h3>
                    <p>Post Your Project</p>
                </div>
                <div class="step">
                    <h3>Step 2</h3>
                    <p>Get Matched with Skilled Laborers and Contractors</p>
                </div>
                <div class="step">
                    <h3>Step 3</h3>
                    <p>Connect and Hire the Right Professional</p>
                </div>
                <div class="step">
                    <h3>Step 4</h3>
                    <p>Complete Your Project with Confidence</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-logo">
                <a href="index.php" class="logo">LaborLink</a>
            </div>
            <ul class="footer-links">
                <li><a href="bot.php">About Us</a></li>
                <li><a href="bot.php">Services</a></li>
                <li><a href="bot.php">Contact Us</a></li>
            </ul>
            <p>&copy; 2024 LaborLink. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function toggleProfileDropdown() {
            var dropdown = document.getElementById("profileDropdown");
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            } else {
                dropdown.style.display = "block";
            }
        }
    </script>
</body>
</html>
