<?php
include 'config.php';

// 1) Determine the next ID
$res = $conn->query("SELECT IFNULL(MAX(customer_id),0) AS max_id FROM customer");
$row = $res->fetch_assoc();
$next_id = $row['max_id'] + 1;

// 2) Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Server-side validation
    if (
        empty($_POST['name'])   || empty($_POST['email'])    ||
        empty($_POST['password']) || empty($_POST['phone']) ||
        empty($_POST['height']) || empty($_POST['weight'])  ||
        empty($_POST['gender']) || $_POST['gender']==='select' ||
        empty($_POST['age'])
    ) {
        echo "<p style='color:red;'>All fields are mandatory. Please fill in every field.</p>";
    } else {
        // Grab & sanitize inputs
        $id       = $next_id;
        $name     = $_POST['name'];
        $email    = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $phone = $_POST['phone'];
        $height   = $_POST['height'];
        $weight   = $_POST['weight'];
        $gender   = $_POST['gender'];
        $age      = $_POST['age'];

        // 3) Insert including the manually computed ID
        $sql = "INSERT INTO customer
                    (customer_id, name, email, password, phone, height, weight, gender, age)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "isssssssi",
            $id, $name, $email, $password,
            $phone, $height, $weight, $gender, $age
        );

        if ($stmt->execute()) {
            echo "<p style='color:black;'>New customer added successfully with ID {$id}.</p>";
        } else {
            echo "<p style='color:red;'>Error: " . htmlspecialchars($stmt->error) . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Customer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #6C63FF;
            padding: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="number"],
        select {
            width: 97%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
            font-weight: bold;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
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
<h2 style="text-align: center;">Create New Customer</h2>

<form action="create_customer.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>

    <label for="phone">Phone Number:</label>
    <input type="text" name="phone" required><br>

    <label for="height">Height (cm):</label>
    <input type="number" name="height" step="0.1" required><br>

    <label for="weight">Weight (kg):</label>
    <input type="number" name="weight" step="0.1" required><br>

    <label for="gender">Gender:</label>
    <select name="gender" required>
        <option value="select" disabled selected>Select</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select><br>

    <label for="age">Age:</label>
    <input type="number" name="age" required><br>

    <button type="submit">Add Customer</button>
</form>

</body>
</html>
