<?php
include 'config.php';

// Fetch all customers
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);

// Check for query errors
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Customers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #6C63FF;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 90%;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }
        a:hover {
            color: #45a049;
        }
        .message {
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
            font-size: 16px;
        }
        .message.success {
            background-color: #d4edda;
            color: #155724;
        }
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
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
    <h2>Customers List</h2>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div class="message success">
            Customer updated successfully.
        </div>
    <?php endif; ?>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Height</th>
                <th>Weight</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['customer_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['height']); ?></td>
                    <td><?php echo htmlspecialchars($row['weight']); ?></td>
                    <td><?php echo htmlspecialchars($row['gender']); ?></td>
                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                    <td>
                        <a href="update_customer.php?id=<?php echo $row['customer_id']; ?>">Edit</a> |
                        <a href="delete_customer.php?id=<?php echo $row['customer_id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No customers found.</p>
    <?php endif; ?>
</div>

</body>
</html>
