<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orphanage Dashboard</title>
    <style>
        /* Your existing CSS styles */

        /* New styles for dashboard */
        .dashboard {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Drop shadow effect */
        }

        .dashboard h2 {
            color: #333;
            text-align: center;
        }

        .dashboard-content {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .dashboard-item {
            flex: 1;
            padding: 10px;
            text-align: center;
            background-color: #f0f0f0;
            border-radius: 5px;
        }

        /* Add more styles as needed */
    </style>
</head>
<body>
    <!-- Your existing HTML content -->

    <div class="dashboard">
        <h2>Dashboard</h2>
        <div class="dashboard-content">
            <?php
            // Include database connection or any other necessary files
            
            // Function to fetch child count from managechild.php
            function getChildCount() {
                // Add your code here to fetch child count from database
                // For example, using mysqli
                // $query = "SELECT COUNT(*) as childCount FROM children";
                // $result = mysqli_query($conn, $query);
                // $row = mysqli_fetch_assoc($result);
                // return $row['childCount'];
                // Replace this with your actual query and result fetching logic
                return 100; // Placeholder value
            }

            // Function to fetch total donation from managedonation.php
            function getTotalDonation() {
                // Add your code here to fetch total donation from database
                // For example, using mysqli
                // $query = "SELECT SUM(amount) as totalDonation FROM donations";
                // $result = mysqli_query($conn, $query);
                // $row = mysqli_fetch_assoc($result);
                // return $row['totalDonation'];
                // Replace this with your actual query and result fetching logic
                return 5000; // Placeholder value
            }

            // Display child count
            echo '<div class="dashboard-item">';
            echo '<h3>Total Orphans</h3>';
            echo '<p>' . getChildCount() . '</p>';
            echo '</div>';

            // Display total donation
            echo '<div class="dashboard-item">';
            echo '<h3>Monthly Donations</h3>';
            echo '<p>$' . getTotalDonation() . '</p>';
            echo '</div>';
            ?>
        </div>
    </div>
</body>
</html>
