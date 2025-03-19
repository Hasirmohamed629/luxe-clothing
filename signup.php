<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            animation: fadeInBody 1s ease-out;
            background: linear-gradient(45deg, #6A11CB, #2575FC, #8E44AD);
            background-size: 400% 400%;
            animation: gradientAnimation 5s ease infinite;
            color: white;
        }

        @keyframes fadeInBody {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            width: 400px;
            text-align: center;
            opacity: 0;
            animation: fadeInContainer 1s ease-out forwards;
            animation-delay: 0.5s;
        }

        @keyframes fadeInContainer {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-size: 26px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 14px;
            margin: 10px 0;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            outline: none;
            text-align: center;
            background: rgba(255, 255, 255, 0.3);
            color: white;
            opacity: 0;
            animation: fadeInInput 1s ease-out forwards;
        }

        input::placeholder {
            color: white;
        }

        input:nth-child(1) {
            animation-delay: 1s;
        }

        input:nth-child(2) {
            animation-delay: 1.2s;
        }

        input:nth-child(3) {
            animation-delay: 1.4s;
        }

        @keyframes fadeInInput {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn {
            background: #FFD700;
            color: #333;
            border: none;
            padding: 14px;
            cursor: pointer;
            width: 100%;
            border-radius: 30px;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
            opacity: 0;
            animation: fadeInButton 1s ease-out forwards;
            animation-delay: 1.6s;
        }

        .btn:hover {
            background: #FFA500;
            transform: scale(1.05);
        }

        @keyframes fadeInButton {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .error {
            color: #FF6347;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Sign Up</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Sign Up</button>
        </form>
    </div>
</body>
</html>
