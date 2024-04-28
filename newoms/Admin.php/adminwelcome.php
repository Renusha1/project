<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>
<style> 
     body {
        font-family: Arial, sans-serif;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url("images/play.jpg");
        background-size: 50%; 
        background-position: center;
    }
    .container {
        display: flex;
        background colour :black;
    }
    .sidebar {
        width: 200px;
        background: colour #f2f2f2;
        padding: 20px;
    }
    .main-content {
         margin:0;
        padding: 20px;
        font-weight: bold;
        color: white;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    .menu-item {
        margin-bottom: 4px;
        background-color: white; 
        padding: 5px;
        border-radius: 5px; 
    }
    .menu-item a {
        text-decoration: none;
        color: black;
    }
 
</style>
</head>
<body>

<div class="container">
  <ul class="menu">
    <diV class ="menu-item">  
       <li> <a href="Dashboard.php">Dashboard</a></li>
        </div>
        <div class="menu-item">
        <li><a href="managechild.php">Manage Children</a></li>
        </div>
        <div class="menu-item">
           <li> <a href="Managedonation.php">Donations</a></li>
        </div>
        <div class="menu-item">
        <li><a href="logout.php">Logout</a></li>
        </div>
  </ul>
  <div class="content">
  </div>
</div>

</body>
</html>
