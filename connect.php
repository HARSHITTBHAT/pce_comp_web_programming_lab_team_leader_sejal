<?php
session_start();

$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$gender = $_POST['gender'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$number = $_POST['number'] ?? '';

// Validate input fields
$errors = [];

// Validate first name
if (empty($firstName)) {
    $errors[] = "First name is required.";
}

// Validate last name
if (empty($lastName)) {
    $errors[] = "Last name is required.";
}

// Validate gender
if (empty($gender)) {
    $errors[] = "Gender is required.";
}

// Validate email
if (empty($email)) {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
} else {
    // Check if email already exists in database
    $conn = new mysqli('localhost', 'root', '', 'test');
    $stmt = $conn->prepare("SELECT * FROM registration WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $errors[] = "Email is already in use.";
    }
    $stmt->close();
    $conn->close();
}

// Validate password
if (empty($password)) {
    $errors[] = "Password is required.";
}

// Validate phone number
if (empty($number)) {
    $errors[] = "Phone number is required.";
} elseif (!preg_match("/^[0-9]{10}$/", $number)) {
    $errors[] = "Invalid phone number format.";
}

// If there are errors, display them and exit
if (!empty($errors)) {
    echo "<h2>Registration Failed</h2>";
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
    exit;
}

// Hash the password using bcrypt
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration(firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstName, $lastName, $gender, $email, $hashedPassword, $number);
    $execval = $stmt->execute();
    if ($execval) {
        // Store user data in session
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['email'] = $email;
        
        echo "<h2>Registration Successful</h2>";
        echo "<p>Thank you, $firstName $lastName, for registering!</p>";
    } else {
        echo "<h2>Registration Failed</h2>";
        echo "<p>Sorry, an error occurred during registration. Please try again later.</p>";
    }
    $stmt->close();
    $conn->close();
}
?>
