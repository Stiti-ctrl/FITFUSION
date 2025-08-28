<?php
include 'config.php';

$selectedTrainer = null;
$message = ''; // Make sure this is initialized to an empty string

// Step 1: If trainer is selected (from dropdown), fetch their data
if (isset($_POST['select_trainer'])) {
    $trainer_id = $_POST['trainer_id'];

    $stmt = $conn->prepare("SELECT * FROM trainer WHERE trainer_id = ?");
    $stmt->bind_param("i", $trainer_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $selectedTrainer = $result->fetch_assoc();
}

// Step 2: If form is submitted to update
if (isset($_POST['update_trainer'])) {
    $id = $_POST['trainer_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $experience = $_POST['experience'];
    $gender = $_POST['gender'];
    $category = $_POST['category'];
    $age = $_POST['age'];

    $stmt = $conn->prepare("UPDATE trainer SET name=?, email=?, phone_number=?, experience=?, gender=?, category=?, age=? WHERE trainer_id=?");
    $stmt->bind_param("ssssssii", $name, $email, $phone_number, $experience, $gender, $category, $age, $id);

    if ($stmt->execute()) {
        $message = "✅ Trainer updated successfully!";
    } else {
        $message = "❌ Error: " . $stmt->error;
    }
}

// Fetch all trainers for the dropdown
$trainers = $conn->query("SELECT trainer_id, name FROM trainer");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Trainer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #6C63FF;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        select {
            width: auto;
        }

        .message {
            text-align: center;
            font-weight: bold;
        }

        .message.green {
            color: green;
        }

        .message.red {
            color: red;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            form {
                padding: 15px;
            }

            input, select, button {
                font-size: 14px;
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
<h2>Update Trainer</h2>

<?php if ($message): ?>
    <div class="message <?php echo strpos($message, 'Error') === false ? 'green' : 'red'; ?>">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<!-- Trainer selection dropdown -->
<form method="POST">
    <label>Select Trainer:</label>
    <select name="trainer_id" required>
        <option value="">-- Select --</option>
        <?php while ($row = $trainers->fetch_assoc()): ?>
            <option value="<?php echo $row['trainer_id']; ?>" 
                <?php if ($selectedTrainer && $selectedTrainer['trainer_id'] == $row['trainer_id']) echo 'selected'; ?>>
                <?php echo htmlspecialchars($row['name']); ?>
            </option>
        <?php endwhile; ?>
    </select>
    <button type="submit" name="select_trainer">Load</button>
</form>

<?php if ($selectedTrainer): ?>
<!-- Form to edit the selected trainer -->
<form method="POST">
    <input type="hidden" name="trainer_id" value="<?php echo $selectedTrainer['trainer_id']; ?>" />

    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $selectedTrainer['name']; ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $selectedTrainer['email']; ?>" required>

    <label>Phone Number:</label>
    <input type="text" name="phone_number" value="<?php echo $selectedTrainer['phone_number']; ?>" required>

    <label>Experience:</label>
    <input type="text" name="experience" value="<?php echo $selectedTrainer['experience']; ?>" required>

    <label>Gender:</label>
    <select name="gender" required>
        <option value="Male" <?php if ($selectedTrainer['gender'] == 'Male') echo 'selected'; ?>>Male</option>
        <option value="Female" <?php if ($selectedTrainer['gender'] == 'Female') echo 'selected'; ?>>Female</option>
        <option value="Other" <?php if ($selectedTrainer['gender'] == 'Other') echo 'selected'; ?>>Other</option>
    </select>

    <label>Category:</label>
    <select name="category" required>
        <option value="Fitness" <?php if ($selectedTrainer['category'] == 'Fitness') echo 'selected'; ?>>Fitness</option>
        <option value="Yoga" <?php if ($selectedTrainer['category'] == 'Yoga') echo 'selected'; ?>>Yoga</option>
        <option value="Nutrition" <?php if ($selectedTrainer['category'] == 'Nutrition') echo 'selected'; ?>>Nutrition</option>
    </select>

    <label>Age:</label>
    <input type="number" name="age" value="<?php echo $selectedTrainer['age']; ?>" required>

    <button type="submit" name="update_trainer">Update</button>
</form>
<?php endif; ?>

</body>
</html>
