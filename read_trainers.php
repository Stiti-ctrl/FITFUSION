<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Trainers</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        td a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }

        td a:hover {
            text-decoration: underline;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            th, td {
                padding: 8px;
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
<h2>Trainers List</h2>

<?php
// Include database configuration
include 'config.php';

// Fetch all trainers from the database
$sql = "SELECT * FROM trainer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Experience</th>
                <th>Gender</th>
                <th>Category</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>";
    // Loop through each trainer and display their data in table rows
    while($trainer = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$trainer['trainer_id']}</td>
                <td>{$trainer['name']}</td>
                <td>{$trainer['email']}</td>
                <td>{$trainer['phone_number']}</td>
                <td>{$trainer['experience']}</td>
                <td>{$trainer['gender']}</td>
                <td>{$trainer['category']}</td>
                <td>{$trainer['age']}</td>
                <td>
                    <a href='update_trainer.php?id={$trainer['trainer_id']}'>Edit</a> |
                    <a href='delete_trainer.php?id={$trainer['trainer_id']}'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No trainers found.";
}
?>

</body>
</html>
