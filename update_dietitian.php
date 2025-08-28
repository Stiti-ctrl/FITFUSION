<?php
// Include the database connection
include 'dbconnect.php';

// Initialize the dietitian data variable
$dietitian = null;

// Handle form submission for selecting a dietitian
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['select_dietitian'])) {
    // Get the selected dietitian ID from the dropdown
    $dietitian_id = $_POST['dietitian_id'];

    // Fetch the selected dietitian's details
    $sql = "SELECT * FROM dietitian WHERE dietitian_id = :dietitian_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':dietitian_id', $dietitian_id, PDO::PARAM_INT);
    $stmt->execute();
    $dietitian = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Handle form submission for updating dietitian details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_dietitian'])) {
    // Get the updated details from the form
    $dietitian_id = $_POST['dietitian_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $experience = $_POST['experience'];

    // Update the dietitian details in the database
    $sql = "UPDATE dietitian SET name = :name, age = :age, email = :email, phone_number = :phone_number, experience = :experience WHERE dietitian_id = :dietitian_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
    $stmt->bindParam(':experience', $experience, PDO::PARAM_STR);
    $stmt->bindParam(':dietitian_id', $dietitian_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<p class='success'>✅ Dietitian updated successfully!</p>";
    } else {
        echo "<p class='error'>❌ Error updating dietitian details!</p>";
    }
}

// Fetch all dietitians to populate the dropdown for selection
$sql = "SELECT * FROM dietitian";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$dietitians = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Dietitian</title>
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #6C63FF;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            font-size: 1.8rem;
            color: #333;
        }

        h3 {
            font-size: 1.5rem;
            color: #333;
        }

        /* Table styling for displaying dietitians */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td a {
            color: #007bff;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }

        /* Form styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            font-size: 1rem;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        select {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            padding: 10px 15px;
            font-size: 1rem;
            color: white;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 200px;
            align-self: center;
        }

        button:hover {
            background-color: #218838;
        }

        /* Success/Error message styling */
        p {
            font-size: 1rem;
            text-align: center;
        }

        p.success {
            color: #28a745;
        }

        p.error {
            color: #dc3545;
        }

        /* Dropdown select styling */
        select {
            font-size: 1rem;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .container {
                width: 90%;
            }

            button {
                width: 100%;
            }
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
    <h2>Update Dietitian Details</h2>

    <!-- Form to select a dietitian -->
    <form method="POST" action="update_dietitian.php">
        <label>Select Dietitian:</label><br>
        <select name="dietitian_id" required>
            <option value="">-- Select Dietitian --</option>
            <?php foreach ($dietitians as $dietitian_option): ?>
                <option value="<?php echo htmlspecialchars($dietitian_option['dietitian_id']); ?>">
                    <?php echo htmlspecialchars($dietitian_option['name']); ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>
        <button type="submit" name="select_dietitian">Select Dietitian</button>
    </form>

    <!-- Display dietitian's details and allow editing if a dietitian is selected -->
    <?php if ($dietitian): ?>
        <h3>Edit Dietitian Details</h3>
        <form method="POST" action="update_dietitian.php">
            <input type="hidden" name="dietitian_id" value="<?php echo htmlspecialchars($dietitian['dietitian_id']); ?>">

            <label>Name:</label><br>
            <input type="text" name="name" value="<?php echo htmlspecialchars($dietitian['name']); ?>" required><br><br>

            <label>Age:</label><br>
            <input type="number" name="age" value="<?php echo htmlspecialchars($dietitian['age']); ?>" required><br><br>

            <label>Email:</label><br>
            <input type="email" name="email" value="<?php echo htmlspecialchars($dietitian['email']); ?>" required><br><br>

            <label>Phone Number:</label><br>
            <input type="text" name="phone_number" value="<?php echo htmlspecialchars($dietitian['phone_number']); ?>" required><br><br>

            <label>Experience:</label><br>
            <input type="text" name="experience" value="<?php echo htmlspecialchars($dietitian['experience']); ?>" required><br><br>

            <button type="submit" name="update_dietitian">Update Dietitian</button>
        </form>
    <?php endif; ?>

</div>

</body>
</html>
