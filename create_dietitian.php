<?php
// Include database connection
include 'dbconnect.php';

$message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get POST data safely
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $experience = $_POST['experience'];

    // Prepare SQL Insert statement (No need for dietitian_id as it auto-increments)
    $sql = "INSERT INTO dietitian (name, age, email, phone_number, experience) VALUES (?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    // Execute the query
    try {
        $stmt->execute([$name, $age, $email, $phone_number, $experience]);
        $message = "✅ New dietitian added successfully.";
    } catch (PDOException $e) {
        $message = "❌ Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Dietitian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #6C63FF;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"], input[type="email"], input[type="number"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            width: 100%;
        }
        button {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .success-message {
            color: #2ecc71;
        }
        .error-message {
            color: #e74c3c;
        }
    </style>
</head>
<body>
<div style="padding: 20px; text-align: right;">
  <a href="adminhomepage.php" style="
      background-color: #fff;
      color: #6C63FF;
      border: 2px solid #6C63FF;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      transition: background-color 0.3s, color 0.3s;">
    ← Back to Homepage
  </a>
</div>
<div class="container">
    <h2>Add New Dietitian</h2>

    <!-- Display success or error message -->
    <?php if ($message): ?>
        <p class="message <?php echo (strpos($message, 'Error') !== false) ? 'error-message' : 'success-message'; ?>">
            <?php echo $message; ?>
        </p>
    <?php endif; ?>

    <!-- Dietitian Form -->
    <form method="POST" action="create_dietitian.php">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Age:</label>
        <input type="number" name="age" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Phone Number:</label>
        <input type="text" name="phone_number" required>

        <label>Experience:</label>
        <input type="text" name="experience" required>

        <button type="submit">Add Dietitian</button>
    </form>
</div>

</body>
</html>
