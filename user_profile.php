<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Database connection
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Change this to your database username
$password = "Atharva2004"; // Change this to your database password
$database = "laborlink"; // Change this to your database name

// Establish connection to MySQL database
$mysqli = new mysqli($servername, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get username from session
$username = $_SESSION['username'];

// Fetch user's account information from labor_users table using the username from session
$sql = "SELECT * FROM labor_users WHERE username = '$username'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Output user's account information in a form
    $row = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Update user's profile in the database
        $name = $_POST['name'];
        $contact_number = $_POST['contact_number'];
        $profession = $_POST['profession'];
        $gender = $_POST['gender'];
        $experience = $_POST['experience'];
        $address = $_POST['address'];

        $update_sql = "UPDATE labor_users SET labor_name='$name', contact_number='$contact_number', profession='$profession', gender='$gender', experience='$experience', labor_address='$address' WHERE username='$username'";

        if ($mysqli->query($update_sql) === TRUE) {
            $profile_update_message = "Profile updated successfully";
        } else {
            $profile_update_message = "Error updating profile: " . $mysqli->error;
        }
    }

    if (isset($_POST['delete_account'])) {
        // Delete user's account from the database
        $delete_sql = "DELETE FROM labor_users WHERE username='$username'";

        if ($mysqli->query($delete_sql) === TRUE) {
            // Successfully deleted account, clear session and redirect to index.php
            session_unset();
            session_destroy();
            header("Location: index.php");
            exit;
        } else {
            // Error occurred while deleting account
            $delete_message = "Error deleting account: " . $mysqli->error;
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Labor Profile</title>
        <style>
            /* CSS styles for the form */
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .header {
                background-color: black;
                padding: 20px 0;
                text-align: center;
            }
            .logo {
                width: 280px; /* Adjust as needed */
                height: auto;
                display: inline-block;
                align: center;
            }
            .container {
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h2 {
                text-align: center;
                color: #000;
                margin-bottom: 20px;
            }
            form {
                margin-top: 20px;
            }
            label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
            input[type="text"],
            input[type="password"],
            select,
            input[type="radio"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
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
            .message {
                margin-top: 10px;
                text-align: center;
                font-weight: bold;
                color: green;
            }
            .delete-btn {
                position: absolute;
                top: 120px;
                right: 20px;
                background-color: red; /* Red color */
                color: white;
                padding: 9px 19 px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <img src="logo.png" alt="LaborLink Logo" class="logo">
            <form method="post">
                <input type="submit" class="delete-btn" name="delete_account" value="Delete Account">
            </form>
        </div>
        <div class="container">
            <h2>Labor Profile</h2>
            <?php if(isset($profile_update_message)) { ?>
                <div class="message"><?php echo $profile_update_message; ?></div>
            <?php } ?>
            <?php if(isset($delete_message)) { ?>
                <div class="message"><?php echo $delete_message; ?></div>
            <?php } ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" readonly>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($row['password']); ?>" readonly>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($row['labor_name']); ?>" required>
                <label for="contact_number">Contact Number:</label>
                <input type="text" id="contact_number" name="contact_number" value="<?php echo htmlspecialchars($row['contact_number']); ?>" required>
                <label for="profession">Profession:</label>
                <select name="profession" required>
                    <option value="" disabled>Select Profession</option>
                    <option value="Carpenter" <?php if ($row['profession'] == "Carpenter") echo "selected"; ?>>Carpenter</option>
                    <option value="Painter" <?php if ($row['profession'] == "Painter") echo "selected"; ?>>Painter</option>
                    <option value="Appliance Repair" <?php if ($row['profession'] == "Appliance Repair") echo "selected"; ?>>Appliance Repair</option>
                    <option value="Plumber" <?php if ($row['profession'] == "Plumber") echo "selected"; ?>>Plumber</option>
                    <option value="Electrician" <?php if ($row['profession'] == "Electrician") echo "selected"; ?>>Electrician</option>
                    <option value="Construction Worker" <?php if ($row['profession'] == "Construction Worker") echo "selected"; ?>>Construction Worker</option>
                    <option value="Water Proofing" <?php if ($row['profession'] == "Water Proofing") echo "selected"; ?>>Water Proofing</option>
                    <option value="House Cleaning" <?php if ($row['profession'] == "House Cleaning") echo "selected"; ?>>House Cleaning</option>
                    <option value="Pest Control" <?php if ($row['profession'] == "Pest Control") echo "selected"; ?>>Pest Control</option>
                </select>
                <label for="gender">Gender:</label>
                <select name="gender" required>
                    <option value="" disabled>Select Gender</option>
                    <option value="Male" <?php if ($row['gender'] == "Male") echo "selected"; ?>>Male</option>
                    <option value="Female" <?php if ($row['gender'] == "Female") echo "selected"; ?>>Female</option>
                </select>
                <label for="experience">Experience:</label>
                <select name="experience" required>
                    <option value="" disabled>Select Experience (Years)</option>
                    <option value="0-1" <?php if ($row['experience'] == "0-1") echo "selected"; ?>>0-1</option>
                    <option value="1-3" <?php if ($row['experience'] == "1-3") echo "selected"; ?>>1-3</option>
                    <option value="3-5" <?php if ($row['experience'] == "3-5") echo "selected"; ?>>3-5</option>
                    <option value="5+" <?php if ($row['experience'] == "5+") echo "selected"; ?>>5+</option>
                </select>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($row['labor_address']); ?>" required>
                <input type="submit" value="Update Profile">
            </form>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "No user found with the provided username.";
}

// Close database connection
$mysqli->close();
?>