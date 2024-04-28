<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Orphan - Orphanage Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<script>
        function validateForm() {
        var name = document.getElementById("name").value.trim();
        var age = document.getElementById("age").value.trim();

        // Validate name
        var namePattern = ^[a-zA-Z][a-zA-Z0-9_]*$;
        if (!namePattern.test(name)) {
            alert("Name must contain only letters and spaces");
            return false;
            
    }
        }

        // Validate age
        if (age === "" || isNaN(age) || age < 1 || age > 18) {
            alert("Age must be a number between 1 and 18");
            return false;
        }

        return true;
    
    </script>
<body>
    <h1>Add Orphan</h1>
    <div class="container">
        <form action="process.php" method="POST" onsubmit="return validateForm()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" min="1" max="18" required><br><br>
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <input type="submit" name="add_orphan" value="Add Orphan">
    </form>
</body>
</html>
