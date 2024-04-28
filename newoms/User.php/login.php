<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "", "project");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define variables to store user input for login
$logEmail = $logPassword = "";

// Define variables to store error messages for login
$logPasswordErr = "";

// Check if the form is submitted for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {

    $logEmail = test_input($_POST["logEmail"]);

    $logPassword = test_input($_POST["logPassword"]);

    // Retrieve hashed password from the database based on the entered Email
    $stmt = $conn->prepare("SELECT password FROM signup WHERE email = ?");
    $stmt->bind_param("s", $logEmail);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    if ($stmt->num_rows > 0) {
        $logPasswordErr = "Wrong email or password";
    }
    $stmt->close();

    // Verify the entered password against the hashed password
    if (password_verify($logPassword, $hashedPassword)) {
        // Password is correct, redirect to the home page or perform other actions
        session_start();
        $_SESSION["username"] = $name;
        header("Location: welcome.php");
        exit();
    } else {
        // Password is incorrect
        $logPasswordErr = "Incorrect password";
    }
}

// Function to sanitize user input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    body{
        border: 1px solid black;
    width: 500px;
    height: 400px;
    margin-left:400px;
    margin-top: 100px;
    background: url('dark.jpg');
    color:black ;
    border-radius: 50px;
    box-shadow: 0px 0px 20px 5px rgba(0, 0, 0, 0.75);
    background-size: cover;
    background-position: center;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .container {
    max-width: 100%;
    margin-left: 50px;
    padding: 400px;
    border-radius: 2px;
    }
    form{
        background-color: rgb(238, 238, 218);
    backdrop-filter: blur(100px);
    padding: 20px;
    border-radius: 8px; 
    box-shadow: 0 0 10px rgba(0,0,0,0.1); 
    max-width: 22vw;
    }

    .input-group {
        margin-bottom: 15px;
        padding: 5px;
        width:100%;

    }

    h2{
        text-align: center;
    }

    .input-group label {
        display: block;
        margin-bottom: 5px;
    }

    .input-group input {
        width: 100%;
        border-radius: 2px;
        border: 1px solid #ccc;
    }

    .error {
        color: red;
        font-size: 14px;
    }

    .button{
        display:flex;
        justify-content:center;
    }
    .btn {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 2px;
        cursor: pointer;
    }
    </style>
    
   
</head>
<body>
<div id="login-form" class="container">
    <h2>User Login</h2>
        <form method="post" action="login.php" onsubmit="return validateForm()">
            <!-- Login form fields go here -->
            <label for="logEmail">Email:</label>
            <input type="text" name="logEmail" id="logEmail" value="<?php echo $logEmail; ?>">
            <span class="error" id="logEmailErr"></span>
            <br><br>

            <label for="logPassword">Password:</label>
            <input type="password" name="logPassword" id="logPassword" value="<?php echo $logPassword; ?>">
            <span class="error" id="logPasswordErr"><?php echo $logPasswordErr; ?></span>
            <br><br>
            <input class="submit-button" type="submit" name="login" value="Login">
            <br>

            <p>Don't have an account? <a class="toggle-button" href="signup.php">Click here</a> to signup.</p>

        </form>
</div>

</body>
</html>