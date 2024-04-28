<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orphan Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 50%;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;   
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin-bottom: 20px;
        }
        th, td {
            padding: 0px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center; /* Align items vertically */
        }
        .action-buttons form {
            display: inline-block;
        }
        .action-buttons input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
        .action-buttons input[type="submit"]:hover {
            background-color: #45a049;
        }
        .update-form,
        .delete-form {
            display: flex; /* Use flexbox for layout */
            align-items: center; /* Center items vertically */
        }
        .update-form input[type="submit"] {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 10px;
            text-decoration: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .update-form input[type="submit"]:hover {
            background-color: #0073e6;
        }
    </style>
</head>
<body>
    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process form submission for adding a new orphan
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_orphan"])) {
        $name = $_POST["name"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];

        $sql = "INSERT INTO orphans (name, age, gender) VALUES ('$name', '$age', '$gender')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Process form submission for deleting an orphan
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_orphan"])) {
        $id = $_POST["id"];
        $sql = "DELETE FROM orphans WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    // Display all orphan records
    echo "<h1>All Orphan Records:</h1>";

    $sql = "SELECT * FROM orphans";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Action</th></tr>";
        $count= 1;
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td class='action-buttons'>";
            echo "<form action='process.php' method='post' class='delete-form'>";
            echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
            echo "<input type='submit' name='delete_orphan' value='Delete'>";
            echo "</form>";

            // Update form
            echo "<form action='update.php' method='post' class='update-form'>";
            echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
            echo "<input type='submit' name='update_orphan' value='Update'>";
            echo "</form>";

            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No orphan records found";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
