<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["user_type"] !== "trainer") {
    header("Location: login.php");
    exit;
}

require_once "db.php";
$db = new Database();
$conn = $db->getConnection();

$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs
    $client_id = trim($_POST["client_id"]);
    $plan_name = trim($_POST["plan_name"]);
    $start_date = trim($_POST["start_date"]);
    $end_date = trim($_POST["end_date"]);
    $meals = trim($_POST["meals"]);
    $notes = trim($_POST["notes"]);
    $trainer_id = $_SESSION["trainer_id"];

    // Basic validation
    if (empty($client_id)) {
        $errors[] = "Please select a client";
    }
    
    if (empty($plan_name)) {
        $errors[] = "Plan name is required";
    }
    
    if (empty($start_date) || empty($end_date)) {
        $errors[] = "Both start and end dates are required";
    } elseif (strtotime($start_date) > strtotime($end_date)) {
        $errors[] = "End date must be after start date";
    }
    
    if (!empty($meals)) {
        json_decode($meals);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $errors[] = "Invalid JSON format for meals";
        }
    }

    // If no errors, proceed with saving
    if (empty($errors)) {
        try {
            // Check if client belongs to this trainer
            $stmt = $conn->prepare("SELECT client_id FROM clients WHERE client_id = :client_id AND trainer_id = :trainer_id");
            $stmt->bindParam(":client_id", $client_id);
            $stmt->bindParam(":trainer_id", $trainer_id);
            $stmt->execute();
            
            if ($stmt->rowCount() == 1) {
                // Insert diet plan
                $query = "INSERT INTO diet_plans (client_id, trainer_id, plan_name, start_date, end_date, meals, notes, created_at) 
                          VALUES (:client_id, :trainer_id, :plan_name, :start_date, :end_date, :meals, :notes, NOW())";
                
                $stmt = $conn->prepare($query);
                $stmt->bindParam(":client_id", $client_id);
                $stmt->bindParam(":trainer_id", $trainer_id);
                $stmt->bindParam(":plan_name", $plan_name);
                $stmt->bindParam(":start_date", $start_date);
                $stmt->bindParam(":end_date", $end_date);
                $stmt->bindParam(":meals", $meals);
                $stmt->bindParam(":notes", $notes);
                
                if ($stmt->execute()) {
                    $success = true;
                    
                    // Send notification to client (you would implement your notification system)
                    // $notificationMessage = "Your trainer has created a new diet plan for you: " . $plan_name;
                    // sendNotificationToClient($client_id, $notificationMessage);
                } else {
                    $errors[] = "Error saving diet plan. Please try again.";
                }
            } else {
                $errors[] = "Invalid client selected";
            }
        } catch (PDOException $e) {
            $errors[] = "Database error: " . $e->getMessage();
        }
    }
}

// Return JSON response for AJAX or redirect
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // AJAX request
    header('Content-Type: application/json');
    echo json_encode([
        'success' => $success,
        'message' => $success ? 'Diet plan created successfully!' : implode('<br>', $errors),
        'errors' => $errors
    ]);
    exit;
} else {
    // Regular form submission
    if ($success) {
        $_SESSION['success_message'] = "Diet plan created successfully!";
        header("Location: view_diet_plans.php?client_id=" . $client_id);
    } else {
        $_SESSION['error_messages'] = $errors;
        header("Location: trainer_portal.php");
    }
    exit;
}
?>