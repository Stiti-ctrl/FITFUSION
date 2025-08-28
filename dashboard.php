<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Get user details
$stmt = $conn->prepare("SELECT name, email, phone FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_result = $stmt->get_result();
$user = $user_result->fetch_assoc();
$stmt->close();

// Get appointments
$stmt = $conn->prepare("SELECT * FROM appointments WHERE user_id = ? ORDER BY appointment_date DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$appointments = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head content -->
</head>
<body>
    <!-- Navbar -->
    
    <div class="container py-5">
        <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?></h2>
        
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Profile</h5>
                        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
                        <p>Phone: <?php echo htmlspecialchars($user['phone']); ?></p>
                        <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Appointments</h5>
                        <?php if ($appointments->num_rows > 0): ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Service</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = $appointments->fetch_assoc()): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['service_type']); ?></td>
                                            <td><?php echo date('M j, Y', strtotime($row['appointment_date'])); ?></td>
                                            <td><?php echo date('g:i A', strtotime($row['appointment_time'])); ?></td>
                                            <td><span class="badge bg-<?php 
                                                echo $row['status'] == 'confirmed' ? 'success' : 
                                                     ($row['status'] == 'completed' ? 'secondary' : 'warning'); 
                                            ?>"><?php echo ucfirst($row['status']); ?></span></td>
                                        </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p>You have no upcoming appointments.</p>
                        <?php endif; ?>
                        <a href="physiotherapy.php#booking" class="btn btn-primary">Book New Appointment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
</body>
</html>