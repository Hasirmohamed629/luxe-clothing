<?php
  // Start the session (if needed)
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Luxe Clothing</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9; /* Light background color */
            color: #333;
        }

        header {
            background-color: #66bb6a; /* Fresh green color */
            color: white;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        nav {
            background-color: #333;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        nav a {
            color: white;
            padding: 14px 20px;
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #5a5a5a; /* Darker grey hover */
            color: white;
        }

        .content {
            padding: 40px 20px;
            max-width: 1100px;
            margin: 0 auto;
            text-align: center;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            width: 100%;
            bottom: 0;
            font-size: 14px;
        }

        h1 {
            font-size: 36px;
            margin: 0;
            text-transform: uppercase;
            font-weight: bold;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #66bb6a;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
        }

        .message {
            padding: 10px;
            background-color: #f1f1f1;
            border-left: 5px solid #66bb6a;
            margin-top: 20px;
            font-style: italic;
        }

        .about-image {
            width: 100%;
            max-width: 600px;
            height: auto;
            margin: 20px auto;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <header>
        <h1>About Luxe Clothing</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
    </nav>

    <div class="content">
        <h2>Welcome to Luxe Clothing!</h2>
        <p>Luxe Clothing is a premier fashion brand offering the latest trends in high-quality apparel. Our goal is to provide exceptional clothing that reflects the latest styles and ensures that our customers look their best no matter the occasion.</p>
        
        <p>At Luxe Clothing, we believe in combining sophistication, comfort, and style. Our collections are made from high-quality fabrics and materials to ensure you not only look great but feel great too. Whether you're shopping for casual wear or a formal event, we have something for everyone.</p>

        <h3>Our Mission</h3>
        <p>Our mission is to inspire confidence and empower our customers through fashion. We strive to provide a seamless shopping experience and to offer garments that help you feel both comfortable and stylish.</p>

        <h3>Our Values</h3>
        <ul>
            <li><strong>Quality:</strong> We use only the finest fabrics and materials to create clothing that lasts.</li>
            <li><strong>Style:</strong> We keep up with the latest trends to ensure you're always in style.</li>
            <li><strong>Customer Satisfaction:</strong> Our customers are at the heart of everything we do.</li>
            <li><strong>Integrity:</strong> We uphold the highest standards of integrity and transparency in everything we do.</li>
        </ul>

        <h3>Our Vision</h3>
        <p>We envision Luxe Clothing becoming a global leader in fashion, known for our commitment to quality, style, and customer satisfaction. We aspire to be a go-to destination for fashion-conscious individuals around the world.</p>

        <img src="images/about_us.jpg" alt="Luxe Clothing" class="about-image">

        <?php
        // Display session message if exists
        if (isset($_SESSION['message'])) {
            echo "<div class='message'>{$_SESSION['message']}</div>";
            unset($_SESSION['message']);
        }
        ?>
    </div>

    <footer>
        <p>&copy; 2025 Luxe Clothing. All Rights Reserved.</p>
    </footer>

</body>
</html>
