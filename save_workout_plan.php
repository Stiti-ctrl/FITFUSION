<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

require_once "db.php";
$db = new Database();
$conn = $db->getConnection();

// Get workout plans
$query = "SELECT wp.plan_id, wp.plan_name, wp.start_date, wp.end_date, 
                 c.full_name as client_name, 
                 GROUP_CONCAT(DISTINCT wd.day_name ORDER BY wd.day_name SEPARATOR ', ') as days
          FROM workout_plans wp
          JOIN clients c ON wp.client_id = c.client_id
          LEFT JOIN workout_days wd ON wp.plan_id = wd.plan_id
          WHERE wp.trainer_id = :trainer_id
          GROUP BY wp.plan_id
          ORDER BY wp.start_date DESC";
$stmt = $conn->prepare($query);
$stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
$stmt->execute();
$plans = $stmt->fetchAll(PDO::FETCH_ASSOC);

include_once "navbar2.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FITFUSION - Workout Plans</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* Use the same styles as in index.php */
  </style>
</head>
<body>
  
  <div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">Workout Plans</h1>
      <a href="create_plan.php" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i> New Plan
      </a>
    </div>

    <div class="card border-0 shadow-sm">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Plan Name</th>
                <th>Client</th>
                <th>Duration</th>
                <th>Workout Days</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if (count($plans) > 0): ?>
                <?php foreach ($plans as $plan): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($plan['plan_name']); ?></td>
                    <td><?php echo htmlspecialchars($plan['client_name']); ?></td>
                    <td>
                      <?php echo date('M j, Y', strtotime($plan['start_date'])) . ' - ' . 
                           date('M j, Y', strtotime($plan['end_date'])); ?>
                    </td>
                    <td><?php echo htmlspecialchars($plan['days']); ?></td>
                    <td>
                      <a href="view_workout_plan.php?id=<?php echo $plan['plan_id']; ?>" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-eye me-1"></i> View
                      </a>
                      <a href="edit_workout_plan.php?id=<?php echo $plan['plan_id']; ?>" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-edit me-1"></i> Edit
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="5" class="text-center py-4">No workout plans found</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>