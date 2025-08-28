<?php
include 'config.php';

$message = "";

// 1) Handle deletion when a delete_id is provided
if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id'];

    $sql = "DELETE FROM customer WHERE customer_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $delete_id);
        if ($stmt->execute()) {
            $message = "Customer #{$delete_id} deleted successfully.";
        } else {
            $message = "Error deleting customer: " . htmlspecialchars($stmt->error);
        }
    } else {
        $message = "Database error: " . htmlspecialchars($conn->error);
    }
}

// 2) Fetch all customers for display
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete Customers</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #6C63FF;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 900px;
        margin: 50px auto;
        padding: 20px;
        background-color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    h1 {
        text-align: center;
        color: #333;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 12px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    td a {
        color: #e74c3c;
        text-decoration: none;
        font-weight: bold;
    }
    td a:hover {
        color: #c0392b;
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
  <h1>Delete Customers</h1>

  <?php if ($message): ?>
    <p class="message <?php echo (strpos($message, 'Error') !== false) ? 'error-message' : 'success-message'; ?>">
      <?php echo $message; ?>
    </p>
  <?php endif; ?>

  <?php if ($result->num_rows > 0): ?>
    <table>
      <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Phone</th>
        <th>Height</th><th>Weight</th><th>Gender</th><th>Age</th><th>Action</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['customer_id']; ?></td>
          <td><?php echo htmlspecialchars($row['name']); ?></td>
          <td><?php echo htmlspecialchars($row['email']); ?></td>
          <td><?php echo htmlspecialchars($row['phone']); ?></td>
          <td><?php echo htmlspecialchars($row['height']); ?></td>
          <td><?php echo htmlspecialchars($row['weight']); ?></td>
          <td><?php echo htmlspecialchars($row['gender']); ?></td>
          <td><?php echo htmlspecialchars($row['age']); ?></td>
          <td>
            <a href="delete_customer.php?delete_id=<?php echo $row['customer_id']; ?>"
               onclick="return confirm('Are you sure you want to delete this customer?')">
               Delete
            </a>
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
