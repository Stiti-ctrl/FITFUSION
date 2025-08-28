<?php
include 'config.php';

$message = "";

// Handle deletion
if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id'];

    $stmt = $conn->prepare("DELETE FROM trainer WHERE trainer_id = ?");
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        $message = "✅ Trainer #{$delete_id} deleted successfully.";

        // Check if table is now empty
        $countResult = $conn->query("SELECT COUNT(*) AS cnt FROM trainer");
        $countRow = $countResult->fetch_assoc();
        if ($countRow['cnt'] == 0) {
            $conn->query("ALTER TABLE trainer AUTO_INCREMENT = 1");
        }
    } else {
        $message = "❌ Error deleting trainer: " . htmlspecialchars($stmt->error);
    }
}

// Fetch trainers
$result = $conn->query("SELECT * FROM trainer");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Trainers</title>
  <style>
    .center-text {
        text-align: center;
    }
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #6C63FF;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    .message {
        text-align: center;
        font-weight: bold;
        padding: 10px;
        margin-bottom: 20px;
    }

    .message.green {
        color: green;
    }

    .message.red {
        color: red;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th, td {
        padding: 10px;
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
        color: #007BFF;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .action-links {
        display: flex;
        gap: 10px;
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
<h1>Trainers List</h1>

<?php if ($message): ?>
    <div class="message <?php echo strpos($message, 'Error') === false ? 'green' : 'red'; ?>">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<?php if ($result && $result->num_rows > 0): ?>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Phone No</th><th>Experience</th>
            <th>Gender</th><th>Category</th><th>Age</th><th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['trainer_id']; ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                <td><?php echo htmlspecialchars($row['experience']); ?></td>
                <td><?php echo htmlspecialchars($row['gender']); ?></td>
                <td><?php echo htmlspecialchars($row['category']); ?></td>
                <td><?php echo htmlspecialchars($row['age']); ?></td>
                <td class="action-links">
                    <a href="update_trainer.php?id=<?php echo $row['trainer_id']; ?>">Edit</a> |
                    <a href="delete_trainer.php?delete_id=<?php echo $row['trainer_id']; ?>"
                       onclick="return confirm('Are you sure you want to delete this trainer?')">
                       Delete
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <?php else: ?>
    <p class="center-text">No trainers found.</p>
<?php endif; ?>

</body>
</html>
