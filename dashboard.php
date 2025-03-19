<?php
  // Start the session
  session_start();

  // Check if the user is logged in
  if (!isset($_SESSION['user_id'])) {
      // Redirect to login page if user is not logged in
      header("Location: login.php");
      exit();
  }

  // Sample user data (in a real app, this would come from a database)
  $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
  $role = isset($_SESSION['role']) ? $_SESSION['role'] : 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .container {
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            height: 100vh;
            padding-top: 20px;
            padding-left: 20px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .content {
            padding: 20px;
            flex-grow: 1;
            background-color: white;
        }

        .content h2 {
            color: #4CAF50;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .welcome-message {
            background-color: #e9e9e9;
            padding: 15px;
            margin-top: 20px;
            border-radius: 4px;
        }

        .welcome-message h3 {
            margin: 0;
        }

        .welcome-message p {
            margin: 5px 0;
        }

        .message {
            padding: 10px;
            background-color: #f1f1f1;
            border-left: 5px solid #4CAF50;
            margin-top: 20px;
            font-style: italic;
        }

        /* New Styling for Admin Stats */
        .stats {
            background-color: #e9e9e9;
            padding: 15px;
            margin-top: 20px;
            border-radius: 4px;
        }

        .stats h3 {
            margin: 0;
            color: #333;
        }

        .stats ul {
            list-style-type: none;
            padding-left: 0;
        }

        .stats li {
            margin: 5px 0;
        }

        /* Notification Box */
        .notifications {
            background-color: #f9f9f9;
            padding: 10px;
            margin-top: 20px;
            border-radius: 4px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .notifications h3 {
            color: #e67e22;
        }

        .notifications ul {
            list-style-type: none;
            padding-left: 0;
        }

        .notifications li {
            background-color: #fff;
            padding: 8px;
            margin: 5px 0;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .notifications li:hover {
            background-color: #f1f1f1;
        }

    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <!-- Main Container with Sidebar and Content -->
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="Home.php">Home</a>
            <a href="dashboard.php">Dashboard</a>
            <a href="profile.php">Profile</a>
            <a href="settings.php">Settings</a>
            <a href="logout.php">Logout</a>
        </div>

        <!-- Content Area -->
        <div class="content">
            <div class="welcome-message">
                <h3>Welcome, <?php echo $username; ?>!</h3>
                <p>You are logged in as: <strong><?php echo $role; ?></strong></p>
            </div>

            <!-- Session Message (if any) -->
            <?php
            if (isset($_SESSION['message'])) {
                echo "<div class='message'>{$_SESSION['message']}</div>";
                unset($_SESSION['message']);
            }
            ?>

            <h2>Dashboard Overview</h2>
            <p>This is your dashboard where you can view your profile, update settings, and more.</p>

            <!-- Admin Stats Section -->
            <div class="stats">
                <h3>Admin Stats:</h3>
                <ul>
                    <li>Total Users: 120</li> <!-- Replace with dynamic data -->
                    <li>Total Orders: 450</li> <!-- Replace with dynamic data -->
                    <li>Total Products: 150</li> <!-- Replace with dynamic data -->
                </ul>
            </div>

            <!-- Notifications Section -->
            <div class="notifications">
                <h3>Notifications:</h3>
                <ul>
                    <li>New user registration: John Doe</li>
                    <li>Product "Red Shirt" needs stock update</li>
                    <li>Settings updated successfully.</li>
                </ul>
            </div>

            <!-- Example content (can be replaced with dynamic data) -->
            <div class="stats">
                <h3>Recent Activity:</h3>
                <ul>
                    <li>Logged in at <?php echo date('Y-m-d H:i:s'); ?></li>
                    <li>Last login: <?php echo isset($_SESSION['last_login']) ? $_SESSION['last_login'] : 'Not available'; ?></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 My Dashboard</p>
    </footer>

</body>
</html>
