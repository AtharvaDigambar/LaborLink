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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact_number = $_POST['contact_number'];
    $user_type = $_POST['user_type'];

    // Function to check if username exists in a specific table
    function checkUsernameExists($conn, $username, $table) {
        $sql = "SELECT * FROM $table WHERE username = '$username'";
        $result = $conn->query($sql);
        return $result->num_rows > 0;
    }

    // Check if username already exists in the respective user table
    switch ($user_type) {
        case 'labor':
            if (checkUsernameExists($conn, $username, 'labor_users')) {
                $error_message = "Username already taken. Please choose another username";
            }
            break;
        case 'contractor':
            if (checkUsernameExists($conn, $username, 'contractor_users')) {
                $error_message = "Username already taken. Please choose another username";
            }
            break;
        case 'user':
            if (checkUsernameExists($conn, $username, 'regular_users')) {
                $error_message = "Username already taken. Please choose another username";
            }
            break;
        default:
            die("Invalid user type");
    }

    // Insert user data into the appropriate table based on user type
    if (!isset($error_message)) {
        switch ($user_type) {
            case 'labor':
                // Extract additional labor-specific fields
                $labor_name = $_POST['labor_name'];
                $profession = $_POST['profession']; 
                $gender = $_POST['gender'];
                $experience = $_POST['experience'];
                $labor_address = $_POST['labor_address'];

                // Insert into labor_users table with additional fields
                $sql = "INSERT INTO labor_users (username, password, contact_number, labor_name, profession, gender, experience, labor_address) VALUES ('$username', '$password', '$contact_number', '$labor_name', '$profession', '$gender', '$experience', '$labor_address')";
                break;
            case 'contractor':
                // Extract additional contractor-specific fields
                $name = $_POST['name'];
                $address = $_POST['address'];
                $experience = $_POST['experience'];

                // Insert into contractor_users table with additional fields
                $sql = "INSERT INTO contractor_users (username, password, contact_number, name, address, experience) VALUES ('$username', '$password', '$contact_number', '$name', '$address', '$experience')";
                break;
            case 'user':
                $sql = "INSERT INTO regular_users (username, password, contact_number) VALUES ('$username', '$password', '$contact_number')";
                break;
            default:
                die("Invalid user type");
        }

        if ($conn->query($sql) === TRUE) {
            // User registration successful, redirect to login page
            header('Location: login.php');
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body{
            background-image: url('loginb.jpg'); /* Add your image path here */
            background-size: cover;
            background-position: center;
        }
        form {
            margin: 50px auto;
            width: 300px;
            border: 1px solid #ccc;
            padding: 60px;
            border-radius: 5px;
        }
        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            width: 200px; /* Adjust the width as needed */
            height: auto; /* Maintain aspect ratio */
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="dbms.png">
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <h2>Sign Up</h2>
        <?php if (isset($error_message)) { ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php } ?>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="contact_number" placeholder="Contact Number" required>
        <select name="user_type" required>
            <option value="" disabled selected>Select User Type</option>
            <option value="labor">Labor</option>
            <option value="contractor">Contractor</option>
            <option value="user">User</option>
        </select>

        <!-- Additional fields for labor users -->
        <div id="additional-fields" style="display: none;">
            <input type="text" name="labor_name" placeholder="Name">
            <select name="profession">
                <option value="" disabled selected>Select Profession</option>
                <option value="Carpenter">Carpenter</option>
                <option value="Painter">Painter</option>
                <option value="Appliance Repair">Appliance Repair</option>
                <option value="Plumber">Plumber</option>
                <option value="Electrician">Electrician</option>
                <option value="Construction Worker">Construction Worker</option>
                <option value="Water Proofing">Water Proofing</option>
                <option value="House Cleaning">House Cleaning</option>
                <option value="Pest Control">Pest Control</option>
            </select>
            <select name="gender">
                <option value="" disabled selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <select name="experience">
                <option value="" disabled selected>Select Experience (Years)</option>
                <option value="0-1">0-1</option>
                <option value="1-3">1-3</option>
                <option value="3-5">3-5</option>
                <option value="5+">5+</option>
            </select>
            <input type="text" name="labor_address" placeholder="Address">
        </div>

        
        <!-- Additional fields for contractor users -->
        <div id="additional-fields-contractor" style="display: none;">
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="address" placeholder="Address">
            <select name="experience">
                <option value="" disabled selected>Select Experience (Years)</option>
                <option value="0-1">0-1</option>
                <option value="1-3">1-3</option>
                <option value="3-5">3-5</option>
                <option value="5+">5+</option>
            </select>
        </div>
        
        <input type="submit" value="Sign Up">
    </form>
    <div class="login-link">
        Already have an account? <a href="login.php">Login here</a>
    </div>

    <script>
        // Show additional fields based on selected user type
        document.querySelector('select[name="user_type"]').addEventListener('change', function() {
            if (this.value === 'labor') {
                document.getElementById('additional-fields').style.display = 'block';
                document.getElementById('additional-fields-contractor').style.display = 'none';
            } else if (this.value === 'contractor') {
                document.getElementById('additional-fields').style.display = 'none';
                document.getElementById('additional-fields-contractor').style.display = 'block';
            } else {
                document.getElementById('additional-fields').style.display = 'none';
                document.getElementById('additional-fields-contractor').style.display = 'none';
            }
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>