<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}
include_once "navbar2.php";
require_once "db.php";
$db = new Database();
$conn = $db->getConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FITFUSION - Create Workout Plan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* Use the same styles as in index.php or create a separate CSS file */
  </style>
</head>
<body>
  
  <div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">Create Workout Plan</h1>
    </div>

    <div class="row">
      <div class="col-md-8">
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">
            <form id="workoutPlanForm" action="save_workout_plan.php" method="POST">
              <div class="mb-3">
                <label class="form-label">Plan Name</label>
                <input type="text" class="form-control" name="plan_name" required>
              </div>
              
              <div class="mb-3">
                <label class="form-label">Select Client</label>
                <select class="form-select" name="client_id" required>
                  <option value="">Select a client</option>
                  <?php
                  $query = "SELECT client_id, full_name FROM clients WHERE trainer_id = :trainer_id";
                  $stmt = $conn->prepare($query);
                  $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
                  $stmt->execute();
                  $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  
                  foreach ($clients as $client) {
                    echo '<option value="' . $client['client_id'] . '">' . 
                         htmlspecialchars($client['full_name']) . '</option>';
                  }
                  ?>
                </select>
              </div>
              
              <div class="row mb-3">
                <div class="col-md-6">
                  <label class="form-label">Start Date</label>
                  <input type="date" class="form-control" name="start_date" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label">End Date</label>
                  <input type="date" class="form-control" name="end_date" required>
                </div>
              </div>
              
              <div class="mb-3">
                <label class="form-label">Workout Days</label>
                <div class="d-flex flex-wrap gap-2">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="workout_days[]" value="Monday" id="monday">
                    <label class="form-check-label" for="monday">Monday</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="workout_days[]" value="Tuesday" id="tuesday">
                    <label class="form-check-label" for="tuesday">Tuesday</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="workout_days[]" value="Wednesday" id="wednesday">
                    <label class="form-check-label" for="wednesday">Wednesday</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="workout_days[]" value="Thursday" id="thursday">
                    <label class="form-check-label" for="thursday">Thursday</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="workout_days[]" value="Friday" id="friday">
                    <label class="form-check-label" for="friday">Friday</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="workout_days[]" value="Saturday" id="saturday">
                    <label class="form-check-label" for="saturday">Saturday</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="workout_days[]" value="Sunday" id="sunday">
                    <label class="form-check-label" for="sunday">Sunday</label>
                  </div>
                </div>
              </div>
              
              <div class="mb-3">
                <label class="form-label">Exercises (JSON format)</label>
                <textarea class="form-control" name="exercises" rows="6" required placeholder='{
  "Monday": [
    {"name": "Bench Press", "sets": 4, "reps": "8-12", "rest": "60s"},
    {"name": "Squats", "sets": 4, "reps": "8-12", "rest": "90s"}
  ],
  "Tuesday": [
    {"name": "Pull-ups", "sets": 3, "reps": "10-12", "rest": "60s"}
  ]
}'></textarea>
                <small class="text-muted">Enter workout plan in valid JSON format</small>
              </div>
              
              <div class="mb-3">
                <label class="form-label">Notes</label>
                <textarea class="form-control" name="notes" rows="3"></textarea>
              </div>
              
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Save Workout Plan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Plan Guidelines</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">1. Focus on compound movements</li>
              <li class="list-group-item">2. Include proper warm-up sets</li>
              <li class="list-group-item">3. Balance push/pull exercises</li>
              <li class="list-group-item">4. Consider client's fitness level</li>
              <li class="list-group-item">5. Progressive overload principle</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Add form validation and handling
  </script>
</body>
</html>