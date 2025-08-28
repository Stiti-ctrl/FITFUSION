<?php
include 'config.php'; // Ensure the database connection is correct

// Fetch all dietitians from the database
$sql = "SELECT * FROM dietitian";
$result = $conn->query($sql);

// Check for query errors
if ($result === false) {
    die("Error executing query: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Dietitians</title>
    <style>
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
        }
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
    <h2>Dietitians List</h2>

    <!-- Display the Dietitians in Table -->
    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Phone No</th>
                <th>Experience</th><th>Age</th><th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['dietitian_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                    <td><?php echo htmlspecialchars($row['experience']); ?></td>
                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                    <td>
                        <a href="update_dietitian.php?id=<?php echo $row['dietitian_id']; ?>">Edit</a> |
                        <a href="delete_dietitian.php?id=<?php echo $row['dietitian_id']; ?>" 
                           onclick="return confirm('Are you sure you want to delete this dietitian?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No dietitians found.</p>
    <?php endif; ?>
</div>

</body>
</html>
