<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Orphan Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:gray;
        }
        form {
            width: 50%;
            margin: 0 auto;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #0073e6;
        }
    </style>
</head>
<body>
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_orphan"])) {
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = ""; // Provide your database password here
        $dbname = "project";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the orphan ID from the form
        $id = $_POST["id"];

        // Retrieve other details of the orphan from the database
        $sql = "SELECT * FROM orphans WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row["name"];
            $age = $row["age"];
            $gender = $row["gender"];
        } else {
            echo "Orphan not found.";
            exit;
        }


        // Update the orphan information if form fields are provided
        if (isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["gender"])) {
            $name = $_POST["name"];
            $age = $_POST["age"];
            $gender = $_POST["gender"];

            // Update the orphan record in the database
            $sql = "UPDATE orphans SET name='$name', age='$age', gender='$gender' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Please fill out all the fields.";
        }

        // Close the database connection
        $conn->close();
    } else {
        // Redirect if accessed directly
        header("Location: process.php");
        exit;
    }
    ?>
    <h1>Update Orphan Information</h1>
    <form action="update.php" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br>
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" value="<?php echo $age; ?>"><br>
        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender">
            <option value="Male" <?php if ($gender == "Male") echo "selected"; ?>>Male</option>
            <option value="Female" <?php if ($gender == "Female") echo "selected"; ?>>Female</option>
        </select><br><br>
        <input type="submit" name="update_orphan" value="Update">
    </form>

    <script>
        function validateForm() {
            var name = document.getElementById("name").value.trim();
            var age = document.getElementById("age").value.trim();

            // Validate name
            var namePattern = /^[a-zA-Z\s]+$/;
            if (!namePattern.test(name)) {
                alert("Name must contain only letters and spaces");
                return false;
            }
// Validate age
if (age === "" || isNaN(age) || age < 1 || age > 18) {
    alert("Age must be a number between 1 and 18");
    return false;
}

    return true;       
        }
    </script>
</body>
</html>
    