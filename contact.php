<?php
// Start the session (if needed)
session_start();

// Define variables and initialize with empty values
$name = $email = $message = "";
$name_err = $email_err = $message_err = "";

// Process the form when it's submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email address.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email address.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate message
    if (empty(trim($_POST["message"]))) {
        $message_err = "Please enter your message.";
    } else {
        $message = trim($_POST["message"]);
    }

    // Check if there are no errors, then send the email
    if (empty($name_err) && empty($email_err) && empty($message_err)) {
        // Email configuration (set your email address here)
        $to = "youremail@example.com"; // Replace with the website admin's email
        $subject = "Contact Form Message from " . $name;
        $body = "Name: " . $name . "\n" . "Email: " . $email . "\n\nMessage:\n" . $message;
        $headers = "From: " . $email;

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            $_SESSION['message'] = "Your message has been sent successfully!";
            header("Location: contact.php"); // Redirect to the same page to display the message
            exit();
        } else {
            $message_err = "Sorry, something went wrong. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .message {
            padding: 10px;
            background-color: #e9f7e9;
            border-left: 5px solid #4CAF50;
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <h1>Contact Us</h1>
    </header>

    <!-- Main Contact Form -->
    <div class="container">
        <h2>We'd love to hear from you!</h2>
        <form method="POST" action="contact.php">

            <!-- Name Input -->
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>">
                <span class="error"><?php echo $name_err; ?></span>
            </div>

            <!-- Email Input -->
            <div class="form-group">
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                <span class="error"><?php echo $email_err; ?></span>
            </div>

            <!-- Message Input -->
            <div class="form-group">
                <label for="message">Your Message:</label>
                <textarea id="message" name="message" rows="5"><?php echo $message; ?></textarea>
                <span class="error"><?php echo $message_err; ?></span>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <input type="submit" value="Send Message">
            </div>

        </form>

        <!-- Display success or error message -->
        <?php
        if (isset($_SESSION['message'])) {
            echo "<div class='message'>{$_SESSION['message']}</div>";
            unset($_SESSION['message']);
        }
        ?>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 My PHP Website</p>
    </footer>

</body>
</html>
