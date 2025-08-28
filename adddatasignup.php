<?php
// adddatasignup.php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php'; // DB connection

// 1) Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['add_customer'])) {
    header("Location: signup.php");
    exit();
}

// 2) Collect & trim
$name            = trim($_POST['name'] ?? '');
$email           = trim($_POST['email'] ?? '');
$phone           = trim($_POST['phone'] ?? '');
$password        = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';
$height          = trim($_POST['height'] ?? '');
$weight          = trim($_POST['weight'] ?? '');
$gender          = trim($_POST['gender'] ?? '');
$age             = trim($_POST['age'] ?? '');

// 3) Validate presence
if (!$name || !$email || !$phone || !$password || !$confirmPassword || !$height || !$weight || !$gender || !$age) {
    die("Please fill in all required fields.");
}

// 4) Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

// 5) Password rules
if (strlen($password) < 8) {
    die("Password must be at least 8 characters long.");
}
if ($password !== $confirmPassword) {
    die("Passwords do not match.");
}

// 6) Check duplicate email
$check = $conn->prepare("SELECT customer_id FROM customer WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();
if ($check->num_rows > 0) {
    die("Email already exists. Please use a different email.");
}
$check->close();

// 7) Prepare INSERT
$stmt = $conn->prepare("
    INSERT INTO customer 
      (name, email, password, phone_no, height, weight, gender, age, created_at)
    VALUES
      (?, ?, ?, ?, ?, ?, ?, ?, NOW())
");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// 8) Hash & bind
$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt->bind_param("ssssdisi", $name, $email, $hash, $phone, $height, $weight, $gender, $age);

// 9) Execute & redirect
if ($stmt->execute()) {
    $_SESSION['registration_success'] = true;
    header("Location: signin.php?status=success");
    exit();
} else {
    die("Execute failed: " . $stmt->error);
}
?>
