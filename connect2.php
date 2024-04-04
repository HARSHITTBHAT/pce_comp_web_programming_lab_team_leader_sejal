<?php
session_start(); // Start the session

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        // Database connection
        $conn = mysqli_connect('localhost', 'root', '', 'test');
        if (!$conn) {
            throw new Exception("Connection failed: " . mysqli_connect_error());
        }

        // Check if email and password are set
        if (empty($_POST['email']) || empty($_POST['pass'])) {
            throw new Exception("Email and password are required");
        }

        $email = $_POST['email'];
        $password = $_POST['pass'];

        // Check if the email already exists in the database
        $check_query = "SELECT * FROM users WHERE email = ?";
        $check_stmt = mysqli_prepare($conn, $check_query);
        mysqli_stmt_bind_param($check_stmt, "s", $email);
        mysqli_stmt_execute($check_stmt);
        mysqli_stmt_store_result($check_stmt);

        if (mysqli_stmt_num_rows($check_stmt) > 0) {
            throw new Exception('Email already exists in the database. Please use a different email.');
        }

        // Prepare the SQL statement using parameterized query
        $sql = "INSERT INTO users (email, password) VALUES (?, SHA1(?))"; // Here, SHA1() is used to hash the password

        // Prepare the statement
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            throw new Exception("SQL error: " . mysqli_error($conn));
        }

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo 'Entry successful';

            // Set session variables
            $_SESSION['email'] = $email;
            $_SESSION['logged_in'] = true;
        } else {
            throw new Exception("Error: Unable to create user. Please try again later.");
        }

        // Close statement
        mysqli_stmt_close($stmt);
        // Close check statement
        mysqli_stmt_close($check_stmt);
        // Close connection
        mysqli_close($conn);
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>