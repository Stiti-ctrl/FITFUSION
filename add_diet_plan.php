<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("location: login.php");
    exit;
}

require_once "db.php";
$db = new Database();
$conn = $db->getConnection();

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trainer_id = $_SESSION["id"];
    $client_id = trim($_POST["client_id"]);
    $plan_name = trim($_POST["plan_name"]);
    $duration = trim($_POST["duration"]);
    $considerations = trim($_POST["considerations"]);
    $breakfast = trim($_POST["breakfast"]);
    $lunch = trim($_POST["lunch"]);
    $dinner = trim($_POST["dinner"]);
    $snacks = trim($_POST["snacks"]);
    $hydration = trim($_POST["hydration"]);
    $notes = trim($_POST["notes"]);
    
    try {
        $query = "INSERT INTO diet_plans (trainer_id, client_id, plan_name, duration_weeks, considerations, 
                  breakfast, lunch, dinner, snacks, hydration, notes) 
                  VALUES (:trainer_id, :client_id, :plan_name, :duration, :considerations, 
                  :breakfast, :lunch, :dinner, :snacks, :hydration, :notes)";
        
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":trainer_id", $trainer_id);
        $stmt->bindParam(":client_id", $client_id);
        $stmt->bindParam(":plan_name", $plan_name);
        $stmt->bindParam(":duration", $duration);
        $stmt->bindParam(":considerations", $considerations);
        $stmt->bindParam(":breakfast", $breakfast);
        $stmt->bindParam(":lunch", $lunch);
        $stmt->bindParam(":dinner", $dinner);
        $stmt->bindParam(":snacks", $snacks);
        $stmt->bindParam(":hydration", $hydration);
        $stmt->bindParam(":notes", $notes);
        
        if ($stmt->execute()) {
            $success = "Diet plan created successfully!";
        } else {
            $error = "Something went wrong. Please try again.";
        }
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
    
    if ($error) {
        $_SESSION['error'] = $error;
    } else {
        $_SESSION['success'] = $success;
    }
    
    header("location: suggestdietplan.php");
    exit;
}
?>