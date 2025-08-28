<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $service_type = $_POST['service_type'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO appointments (user_id, service_type, appointment_date, appointment_time, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user_id, $service_type, $appointment_date, $appointment_time, $message);

    if ($stmt->execute()) {
        $success = "Appointment booked successfully!";
    } else {
        $error = "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!-- Your existing booking form -->