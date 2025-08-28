<?php
include 'config.php';

$customer = null;
$customers = [];
$message = '';

// Get all customers for dropdown
$result = $conn->query("SELECT customer_id, name FROM customer ORDER BY name");
while ($row = $result->fetch_assoc()) {
    $customers[] = $row;
}

// Handle form submission for selecting a customer
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['select_customer'])) {
    $id = intval($_POST['select_customer']);

    $stmt = $conn->prepare("SELECT * FROM customer WHERE customer_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $customer = $stmt->get_result()->fetch_assoc();
}

// Handle update form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['customer_id']) && isset($_POST['update_customer'])) {
    $id = intval($_POST['customer_id']);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    if (empty($name) || empty($email) || empty($phone) || empty($height) || empty($weight) || empty($gender) || empty($age)) {
        $message = "<p class='error-message'>All fields are required.</p>";
    } else {
        $stmt = $conn->prepare("UPDATE customer SET name=?, email=?, phone=?, height=?, weight=?, gender=?, age=? WHERE customer_id=?");
        $stmt->bind_param("ssssssii", $name, $email, $phone, $height, $weight, $gender, $age, $id);

        if ($stmt->execute()) {
            $message = "<p class='success-message'>✅ Customer updated successfully!</p>";
        } else {
            $message = "<p class='error-message'>❌ Error updating customer: " . htmlspecialchars($stmt->error) . "</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Customer</title>
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
        label {
            font-weight: bold;
            margin-bottom: 6px;
        }
        input, select, button {
            width: 97%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .error-message {
            color: #e74c3c;
            font-size: 16px;
            text-align: center;
            margin-bottom: 20px;
        }
        .success-message {
            color: #2ecc71;
            font-size: 16px;
            text-align: center;
            margin-bottom: 20px;
        }
        select {
            cursor: pointer;
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
    <h2>Select Customer to Update</h2>

    <?php echo $message; ?>

    <!-- Customer selection dropdown -->
    <form method="POST">
        <select name="select_customer" required onchange="this.form.submit()">
            <option value="">-- Select Customer --</option>
            <?php foreach ($customers as $c): ?>
                <option value="<?php echo $c['customer_id']; ?>" <?php if (isset($customer) && $c['customer_id'] == $customer['customer_id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($c['name']) . " (ID: " . $c['customer_id'] . ")"; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <?php if ($customer): ?>
        <h2>Update Customer</h2>
        <form method="POST">
            <input type="hidden" name="customer_id" value="<?php echo $customer['customer_id']; ?>">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($customer['name']); ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>" required>

            <label>Phone Number:</label>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($customer['phone']); ?>" required>

            <label>Height (cm):</label>
            <input type="number" step="0.1" name="height" value="<?php echo htmlspecialchars($customer['height']); ?>" required>

            <label>Weight (kg):</label>
            <input type="number" step="0.1" name="weight" value="<?php echo htmlspecialchars($customer['weight']); ?>" required>

            <label>Gender:</label>
            <select name="gender" required>
                <option value="male" <?php if ($customer['gender'] == 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if ($customer['gender'] == 'female') echo 'selected'; ?>>Female</option>
                <option value="other" <?php if ($customer['gender'] == 'other') echo 'selected'; ?>>Other</option>
            </select>

            <label>Age:</label>
            <input type="number" name="age" value="<?php echo htmlspecialchars($customer['age']); ?>" required>

            <button type="submit" name="update_customer">Update Customer</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
