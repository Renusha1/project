<?php
session_start(); // Start the session

// Check if the $_SESSION['donations'] array exists, if not, initialize it
if (!isset($_SESSION['donations'])) {
    $_SESSION['donations'] = array();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $donorName = $_POST['donorName'];
    $phoneNumber = $_POST['phoneNumber'];
    $occupation = $_POST['occupation'];
    $amount = $_POST['amount'];

    // Store the donation information in an array
    $donation = array(
        'donorName' => $donorName,
        'phoneNumber' => $phoneNumber,
        'occupation' => $occupation,
        'amount' => $amount
    );

    // Add the donation to the session donations array
    $_SESSION['donations'][] = $donation;
}

// Display the HTML content
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Donation Information</h1>
    <div class="container">
        <?php
        // Check if there are any donations stored in the session
        if (!empty($_SESSION['donations'])) {
            echo "<h2>Donation Details</h2>";
            echo "<table>";
            echo "<tr><th>Donor Name</th><th>Phone Number</th><th>Occupation</th><th>Amount (USD)</th></tr>";
            
            // Loop through each donation and display it in a table row
            foreach ($_SESSION['donations'] as $donation) {
                echo "<tr>";
                echo "<td>{$donation['donorName']}</td>";
                echo "<td>{$donation['phoneNumber']}</td>";
                echo "<td>{$donation['occupation']}</td>";
                echo "<td>{$donation['amount']}</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            // If there are no donations stored in the session, display a message
            echo "<p>No donations added yet.</p>";
        }
        ?>
    </div>
</body>
</html>
