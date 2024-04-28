<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Feedback - Orphanage Management System</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
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
<h1>Feedback</h1>

<div class="container">
    <form action="#" method="POST" onsubmit="return validateForm()">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>
        <span id="nameError" class="error"></span>

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required>
        <span id="emailError" class="error"></span>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>
        <span id="messageError" class="error"></span>

        <input type="submit" value="Submit">
    </form>
</div>

<script>
function validateForm() {
    var name = document.getElementById("name").value.trim();
    var email = document.getElementById("email").value.trim();
    var message = document.getElementById("message").value.trim();

    var nameError = document.getElementById("nameError");
    var emailError = document.getElementById("emailError");
    var messageError = document.getElementById("messageError");

    // Reset previous error messages
    nameError.textContent = "";
    emailError.textContent = "";
    messageError.textContent = "";

    var valid = true;

    // Validate name
    if (name === "") {
        nameError.textContent = "Name is required";
        valid = false;
    }

    // Validate email
    if (email === "") {
        emailError.textContent = "Email is required";
        valid = false;
    } else if (!isValidEmail(email)) {
        emailError.textContent = "Invalid email format";
        valid = false;
    }

    // Validate message
    if (message === "") {
        messageError.textContent = "Message is required";
        valid = false;
    }

    return valid;
}

function isValidEmail(email) {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}
</script>

</body>
</html>
