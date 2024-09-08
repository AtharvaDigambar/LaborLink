<?php
session_start();

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
    $user_type = $_POST['user_type'];

    // Query to check if user exists and fetch user type based on selected user type
    switch ($user_type) {
        case 'Labor':
            $sql = "SELECT * FROM labor_users WHERE username = '$username' AND password = '$password'";
            break;
        case 'Contractor':
            $sql = "SELECT * FROM contractor_users WHERE username = '$username' AND password = '$password'";
            break;
        case 'User':
            $sql = "SELECT * FROM regular_users WHERE username = '$username' AND password = '$password'";
            break;
        default:
            die("Invalid user type");
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Store username in session if user type is 'Labor'
        if ($user_type === 'Labor' || $user_type === 'Contractor' || $user_type ==='User') {
            $_SESSION['username'] = $username;
        }
        
        // Redirect to appropriate page based on user type after successful login
        if ($user_type === 'Labor') {
            header('Location: labor.php');
        } elseif ($user_type === 'Contractor') {
            header('Location: contractor.php');
        } elseif ($user_type === 'User'){
            header('Location: user.php');
        }
        exit;
    

    }
    else {
        $error_message = "Invalid username or password";
    }    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        .signup-link {
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
        <h2>Login</h2>
        <?php if (isset($error_message)) { ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php } ?>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <select name="user_type" required>
            <option value="" disabled selected>Login As</option>
            <option value="Labor">Labor</option>
            <option value="Contractor">Contractor</option>
            <option value="User">User</option>
        </select>
        <input type="submit" value="Login">
    </form>
    <div class="signup-link">
        Don't have an account? <a href="signup.php">Sign up here</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
