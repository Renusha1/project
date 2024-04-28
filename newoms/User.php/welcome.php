<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome to the Orphanage</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-image: url("../images/hearshap.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        position: center; /* Make sure the body is positioned relatively */
    }
    .container {
        display: flex;
    }
    .sidebar {
        width: 200px;
        background: #f2f2f2;
        padding: 20px;
    }
    .main-content {
        margin: 0;
        padding: 30px;
        font-weight: bold;
        color: black;
        text-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
    }
    .menu-item {
        margin-bottom: 4px;
        background-color: white; /* Set white background color for menu items */
        padding: 5px; /* Add padding to menu items */
        border-radius: 5px; /* Add border radius to menu items */
    }
    .menu-item a {
        text-decoration: none;
        color: black;
    }
</style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <div class="menu-item">
            <a href="index.php">Home</a>
        </div>
        <div class="menu-item">
            <a href="program.php">Program</a>
        </div>
        <div class="menu-item">
            <a href="donations.php">Donations</a>
        </div>
        <div class="menu-item">
            <a href="Feedback.php">Feedback</a>
        </div>
        <div class="menu-item">
            <a href="Contact.php">Contact Us</a>
        </div>
    </div>
    <div class="main-content">
        <h1>Welcome to Our Orphanage</h1>
        <p id="welcome-message">Loading...</p>
        <p>At our Orphanage, we believe in providing a loving and nurturing environment for every child in our care. 
            Established with the mission to give orphaned and abandoned children a chance at a brighter future, we strive to create a supportive community where every child feels valued and empowered.</p>
        <p>Our Mission: Our mission is to provide orphaned and abandoned children with a safe and loving home, where they can grow, learn, and thrive. 
            We are committed to meeting the physical, emotional, and educational needs of each child, and to equipping them with the skills and resources necessary for a successful future.</p>
    <p>Welcome to [Orphanage Name]

We're delighted to welcome you to [Orphanage Name], where every child's journey is embraced with love and care. Explore our digital home and discover the heartwarming stories, meaningful programs, and incredible impact that define us. Together, let's nurture dreams and create brighter futures for every child in need. Thank you for joining us on this journey of hope and compassion.

</p><br>
        </div>
</div>

<script>
    // Retrieve user's name from local storage
    var userName = localStorage.getItem("userName");

    // Display personalized welcome message
    var welcomeMessage = "Welcome";
    if (userName) {
        welcomeMessage += ", " + userName + "!";
    } else {
        welcomeMessage += "!";
    }
    document.getElementById("welcome-message").textContent = welcomeMessage;
</script>

</body>
</html>
