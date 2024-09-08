<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labor Profile</title>
    <style>
        /* CSS styles for the layover form */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
        .overlay-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        /* CSS styles for the page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: #000; /* Changed color to black */
            margin: 0;
        }
        .page-heading {
            background-color: #000;
            padding: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: center;
            color: #fff; /* Changed color to white */
            position: relative; /* Added position relative */
        }
        .logo {
            width: 150px;
            height: auto;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .page-heading p {
            font-size: 25px; /* Increased font size */
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        select,
        input[type="radio"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="radio"] {
            width: auto;
            margin-right: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        /* CSS styles for the profile button */
        .profile-button {
            position: absolute;
            top: 75px;
            right: 29px;
            width: 50px;
            height: 50px;
            background-color: #4CAF50;
            border-radius: 50%;
            color: #fff;
            font-size: 24px;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
            z-index: 1000;
        }
        /* CSS styles for close button */
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #555;
            cursor: pointer;
        }
        /* CSS styles for the black text */
        .black-text {
            color: #000;
        }

        /* CSS styles for the status toggle button */
        .status-toggle {
            position: absolute; /* Changed to absolute */
            top: 200px; /* Positioned at the bottom */
            right: 20px; /* Adjusted for alignment */
            display: flex;
            align-items: center;
            color: #000; /* Changed color to black */
        }

        .status-toggle .toggle-label {
            margin-right: 10px;
        }

        .toggle-label{
            font-size: 18px;
        }

        .toggle {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #4CAF50; /* Default green color */
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #FF5733; /* Changed to red when toggled */
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        /* CSS styles for the profile menu */
        .profile-menu {
            position: fixed;
            top: 75px;
            right: 90px;
            display: none;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 1001;
            width: 250px; /* Increased width */
        }

        .profile-menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .profile-menu ul li {
            margin-bottom: 10px;
        }

        .profile-menu ul li a {
            color: #000;
            text-decoration: none;
            font-size: 16px; /* Changed font size */
        }

        .profile-menu ul li a:hover {
            color: #4CAF50; /* Hover color */
        }

        /* Additional styles for contractor list */
        .contractor-list {
            margin-top: 20px;
        }

        .contractor {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .contractor h3 {
            color: #000;
            margin-top: 0;
        }

        .contractor p {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="page-heading">
        <img src="logo.png" alt="LaborLink Logo" class="logo">
        <p style="color: white; font-size: 24px;">Connect, Collaborate, Succeed with LaborLink</p> <!-- Font size increased -->
    </div>

    <!-- The rest of your existing HTML code -->

    <div class="overlay" id="overlay">
        <div class="overlay-content">
            <span class="close-button" onclick="closeProfileForm()">×</span>
            <h1>Edit Profile</h1>
            <form action="update_profile.php" method="POST">
                <!-- Profile editing fields go here -->
            </form>
        </div>
    </div>
    
    <div class="container">
        <h2>Want to Work Under a Contractor?</h2>
        <p class="black-text">Contractors registered on our portal</p>
        <!-- Detailed list of contractors -->
        <div class="contractor-list">
            <?php
            // Establish connection to MySQL database
            $mysqli = new mysqli('localhost', 'root','Atharva2004', 'laborlink');

            // Check connection
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            // Fetch list of contractors from the database
            $result = $mysqli->query("SELECT username, contact_number, address, experience FROM contractor_users");

            // Output details for each contractor
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="contractor">';
                    echo '<h3>' . $row["username"] . '</h3>';
                    echo '<p>Contact Number: ' . $row["contact_number"] . '</p>';
                    echo '<p>Address: ' . $row["address"] . '</p>';
                    echo '<p>Experience: ' . $row["experience"] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No contractors available</p>';
            }

            // Close database connection
            $mysqli->close();
            ?>
        </div>
    </div>

    <!-- Profile button -->
    <div class="profile-button" onclick="toggleProfileMenu()">👤</div>

    <!-- Profile menu -->
    <div class="profile-menu" id="profileMenu">
        <ul>
            <li><a href="labor_profile.php">View Profile</a></li> <!-- Changed link to redirect to labor_profile.php -->
            <li><a href="index.php">Logout</a></li> <!-- Redirects to homepage -->
        </ul>
    </div>

    <!-- Status toggle button -->
    <div class="status-toggle">
        <div class="toggle-label">Availability Status:</div>
        <label class="toggle">
            <input type="checkbox" id="statusToggle" onclick="toggleStatus()" <?php if(isset($status_checked)) { echo $status_checked; } ?>>
            <span class="slider round"></span>
        </label>
    </div>

    <script>
        // Function to toggle profile menu
        function toggleProfileMenu() {
            var profileMenu = document.getElementById("profileMenu");
            if (profileMenu.style.display === "block") {
                profileMenu.style.display = "none";
            } else {
                profileMenu.style.display = "block";
            }
        }

        // Function to close profile editing form
        function closeProfileForm() {
            document.getElementById("overlay").style.display = "none";
        }

        // Function to toggle status between available and occupied
        function toggleStatus() {
            var statusToggle = document.getElementById("statusToggle");
            if (statusToggle.checked) {
                // If toggle is checked, labor is occupied
                alert("Labor is now occupied.");
            } else {
                // If toggle is unchecked, labor is available
                alert("Labor is now available.");
            }
        }
    </script>
</body>
</html>
