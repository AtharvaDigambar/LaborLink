<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContractorLink</title>
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
            padding: 0px 0px;
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
            padding: 100px 0;
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
            cursor: pointer;
        }

        .contractor-list {
            margin-top: 50px;
        }

        .contractor-item {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 5px;
            position: relative;
        }

        .contractor-item h3 {
            margin-bottom: 10px;
        }

        .contractor-item p {
            margin-bottom: 5px;
        }

        .hire-btn {
            position: absolute;
            bottom: 10px;
            right: 10px;
            padding: 10px 60px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #FF0000;
            color:white;
        }

        .hired {
            background-color: #4CAF50;
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
            </div>
        </nav>

        <div class="hero">
            <h1>Find Skilled Contractors for Your Projects</h1>
            <p>Here is the list of skilled contractors:</p>
            <p class="blink">GET UPTO 30% OFF</p>
        </div>
    </header>

    <div class="container contractor-list">
        <?php
        // Database connection
        $servername = "localhost"; // Change this if your database is hosted elsewhere
        $username = "root"; // Change this to your database username
        $password = "Atharva2004"; // Change this to your database password
        $database = "laborlink"; // Change this to your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from the database
        $sql = "SELECT username, contact_number, Experience, Address FROM contractor_users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="contractor-item">';
                echo '<h3>' . $row["username"] . '</h3>';
                echo '<p><strong>Contact Number:</strong> ' . $row["contact_number"] . '</p>';
                echo '<p><strong>Experience:</strong> ' . $row["Experience"] . '</p>';
                echo '<p><strong>Address:</strong> ' . $row["Address"] . '</p>';
                echo '<form method="post">';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
