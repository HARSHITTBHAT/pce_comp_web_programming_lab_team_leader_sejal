
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Database connection
    $conn = mysqli_connect('localhost', 'root', '', 'test1');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if email and password are set
    if (!empty($_POST['email']) && !empty($_POST['pass'])) {
        $email = $_POST['email'];
        $password = $_POST['pass'];

        // Prepare the SQL statement using parameterized query
        $sql = "INSERT INTO `users` (`email`, `password`) VALUES (?, ?)";
        
        // Prepare the statement
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            die("SQL error: " . mysqli_error($conn));
        }

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo 'Entry successful';
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo 'Email and password are required';
    }

    // Close connection
    mysqli_close($conn);
}
?>
