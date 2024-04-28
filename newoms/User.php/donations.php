<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Donation - Orphanage Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    margin-top: 20px;
    color: #333;
}

.container {
    max-width: 500px;
    margin: 20px auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    text-align: center;
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

input[type="text"],
input[type="tel"],
input[type="number"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.error {
    color: red;
    margin-top: -10px;
    margin-bottom: 10px;
}

    </style>

<script>
    function validateForm() {
        var donorName = document.getElementById("donorName").value.trim();
        var phoneNumber = document.getElementById("phoneNumber").value.trim();
        var occupation = document.getElementById("occupation").value.trim();
        var amount = document.getElementById("amount").value.trim();

        // Validate donor name
        var namePattern = /^[a-zA-Z][a-zA-Z\s]*$/;
        if (!namePattern.test(donorName)) {
            alert("Donor name must contain only letters and spaces");
            return false;
        }

        // Validate phone number
        var phonePattern = /^\d{10}$/;
        if (!phonePattern.test(phoneNumber)) {
            alert("Please enter a valid 10-digit phone number");
            return false;
        }

        // Validate occupation
        if (occupation === "") {
            alert("Please enter donor's occupation");
            return false;
        }

        // Validate amount
        if (amount === "" || isNaN(amount) || parseFloat(amount) <= 0) {
            alert("Please enter a valid donation amount");
            return false;
        }

        return true;
    }
</script>
<body>
    <h1>Add Donation</h1>
    <div class="container">
        <form action="process_donation.php" method="POST" onsubmit="return validateForm()">
            <label for="donorName">Donor Name:</label>
            <input type="text" id="donorName" name="donorName" required><br><br>
            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]{10}" required><br><br>
            <label for="occupation">Occupation:</label>
            <input type="text" id="occupation" name="occupation" required><br><br>
            <label for="amount">Amount (USD):</label>
            <input type="number" id="amount" name="amount" min="100" step="100" required><br><br>
            <input type="submit" name="add_donation" value="Add Donation">
        </form>
    </div>
</body>
</html>

