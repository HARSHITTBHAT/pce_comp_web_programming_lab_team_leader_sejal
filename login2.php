<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: linear-gradient(to bottom, rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(https://png.pngtree.com/thumb_back/fh260/background/20230416/pngtree-jungle-forest-environment-natural-ecology-background-image_2332896.jpg);
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 300px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            text-align: center;
            color: #49DC0A;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 30px;
            font-size: 28px;
        }

        input[type="email"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: none;
            border-bottom: 2px solid #49DC0A;
            background: transparent;
            margin-bottom: 20px;
            color: white;
            font-size: 16px;
            outline: none;
        }

        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-bottom: 2px solid #49DC0A;
        }

        .submit {
            text-align: center;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 25px;
            background-color: #49DC0A;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #388E3C;
        }

        .signin {
            text-align: center;
            margin-top: 20px;
        }

        .signin a {
            color: #49DC0A;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .signin a:hover {
            color: #388E3C;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="connect.php" method="POST">
            <input id="email" name="email" type="email" placeholder="Email" required>
            <input id="pass" name="pass" type="password" placeholder="Password" required>
            <div class="submit">
                <button type="submit" name="submit">Login</button>
            </div>
        </form>
        <div class="signin">
            <span>New user? </span>
            <a href="signin.html">Sign up here</a>
        </div>
    </div>
    <script src="lg.js"></script>
</body>
</html>