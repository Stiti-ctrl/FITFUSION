<?php
// Include database configuration
include 'dbconnect.php';

$message = "";

// 1) Handle deletion when a delete_id is provided
if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id'];

    // Delete the dietitian from the database
    $sql = "DELETE FROM dietitian WHERE dietitian_id = :delete_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':delete_id', $delete_id, PDO::PARAM_INT);

    // Check if deletion was successful
    if ($stmt->execute()) {
        $message = "Dietitian #{$delete_id} deleted successfully.";

        // Check if the dietitian table is empty, and reset the AUTO_INCREMENT if necessary
        $countResult = $pdo->query("SELECT COUNT(*) AS cnt FROM dietitian");
        $countRow = $countResult->fetch(PDO::FETCH_ASSOC);

        if ($countRow['cnt'] == 0) {
            // Reset the AUTO_INCREMENT value to 1 after deleting all records
            $pdo->query("ALTER TABLE dietitian AUTO_INCREMENT = 1");
        }
    } else {
        $message = "Error deleting dietitian: " . htmlspecialchars($stmt->errorInfo()[2]);
    }
}

// 2) Fetch all dietitians for display
$sql = "SELECT * FROM dietitian";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$dietitians = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Dietitians</title>
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

        h1 {
            text-align: center;
            font-size: 2rem;
            color: #333;
        }

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

        /* Table styling */
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
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
        }

        td a:hover {
            text-decoration: underline;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .container {
                width: 90%;
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
    <h1>Dietitians List</h1>

    <!-- Success / Error Message -->
    <?php if ($message): ?>
        <p class="<?php echo $message ? 'success' : 'error'; ?>"><?php echo $message; ?></p>
    <?php endif; ?>

    <!-- Dietitians Table -->
    <?php if ($dietitians && count($dietitians) > 0): ?>
        <table>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Phone No</th>
                <th>Experience</th><th>Age</th><th>Action</th>
            </tr>
            <?php foreach ($dietitians as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['dietitian_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                    <td><?php echo htmlspecialchars($row['experience']); ?></td>
                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                    <td>
                        <a href="delete_dietitian.php?delete_id=<?php echo $row['dietitian_id']; ?>"
                           onclick="return confirm('Are you sure you want to delete this dietitian?')">
                           Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No dietitians found.</p>
    <?php endif; ?>
</div>

</body>
</html>
