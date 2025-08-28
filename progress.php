<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

require_once "db.php";
$db = new Database();
$conn = $db->getConnection();

$error = '';
$success = '';

// Get clients for dropdown
$query = "SELECT client_id, full_name FROM clients WHERE trainer_id = :trainer_id ORDER BY full_name";
$stmt = $conn->prepare($query);
$stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
$stmt->execute();
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle form submission for adding progress
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_progress"])) {
    $client_id = trim($_POST["client_id"]);
    $date = trim($_POST["date"]);
    $weight = trim($_POST["weight"]);
    $body_fat = trim($_POST["body_fat"]);
    $muscle_mass = trim($_POST["muscle_mass"]);
    $measurements = json_encode(array(
        'chest' => trim($_POST["chest"]),
        'waist' => trim($_POST["waist"]),
        'hips' => trim($_POST["hips"]),
        'arms' => trim($_POST["arms"]),
        'thighs' => trim($_POST["thighs"])
    ));
    $notes = trim($_POST["notes"]);

    // Validate inputs
    if (empty($client_id) ){
        $error = "Please select a client.";
    } else {
        try {
            $query = "INSERT INTO progress_tracking (client_id, trainer_id, date, weight, body_fat, muscle_mass, measurements, notes) 
                      VALUES (:client_id, :trainer_id, :date, :weight, :body_fat, :muscle_mass, :measurements, :notes)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":client_id", $client_id);
            $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
            $stmt->bindParam(":date", $date);
            $stmt->bindValue(":weight", !empty($weight) ? $weight : null);
            $stmt->bindValue(":body_fat", !empty($body_fat) ? $body_fat : null);
            $stmt->bindValue(":muscle_mass", !empty($muscle_mass) ? $muscle_mass : null);
            $stmt->bindParam(":measurements", $measurements);
            $stmt->bindParam(":notes", $notes);

            if ($stmt->execute()) {
                $success = "Progress record added successfully!";
                // Clear form
                $_POST = array();
            } else {
                $error = "Something went wrong. Please try again later.";
            }
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}

// Get progress data for selected client
$progress_data = [];
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["client_id"])) {
    $client_id = $_GET["client_id"];
    
    $query = "SELECT pt.*, c.full_name 
              FROM progress_tracking pt
              JOIN clients c ON pt.client_id = c.client_id
              WHERE pt.client_id = :client_id AND pt.trainer_id = :trainer_id
              ORDER BY pt.date DESC";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":client_id", $client_id);
    $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
    $stmt->execute();
    $progress_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Progress Tracking | FITFUSION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f7fa;
      font-family: 'Poppins', sans-serif;
    }
    .card {
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .form-control, .form-select {
      border-radius: 8px;
      padding: 10px 15px;
    }
    .btn-primary {
      background-color: #6C63FF;
      border-color: #6C63FF;
      padding: 10px 20px;
    }
    .btn-primary:hover {
      background-color: #564fd3;
      border-color: #564fd3;
    }
    .progress-table th {
      background-color: #6C63FF;
      color: white;
    }
    .nav-tabs .nav-link.active {
      color: #6C63FF;
      font-weight: 600;
    }
    .nav-tabs .nav-link {
      color: #6c757d;
    }
  </style>
</head>
<body>
  <?php include_once "navbar2.php"; ?>

  <div class="container py-5">
    <div class="row">
      <div class="col-12">
        <h2 class="fw-bold mb-4">Client Progress Tracking</h2>
        
        <?php if (!empty($error)): ?>
          <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <?php if (!empty($success)): ?>
          <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="card border-0 mb-4">
          <div class="card-body">
            <h5 class="card-title">Track New Progress</h5>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="mb-3">
                <label for="client_id" class="form-label">Client</label>
                <select class="form-select" id="client_id" name="client_id" required>
                  <option value="">Select Client</option>
                  <?php foreach ($clients as $client): ?>
                    <option value="<?php echo $client['client_id']; ?>" <?php echo (isset($_POST['client_id']) && $_POST['client_id'] == $client['client_id']) ? 'selected' : ''; ?>>
                      <?php echo htmlspecialchars($client['full_name']); ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              
              <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" 
                       value="<?php echo isset($_POST['date']) ? htmlspecialchars($_POST['date']) : date('Y-m-d'); ?>" required>
              </div>
              
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="weight" class="form-label">Weight (kg)</label>
                  <input type="number" step="0.1" class="form-control" id="weight" name="weight" 
                         value="<?php echo isset($_POST['weight']) ? htmlspecialchars($_POST['weight']) : ''; ?>">
                </div>
                <div class="col-md-6">
                  <label for="body_fat" class="form-label">Body Fat (%)</label>
                  <input type="number" step="0.1" class="form-control" id="body_fat" name="body_fat" 
                         value="<?php echo isset($_POST['body_fat']) ? htmlspecialchars($_POST['body_fat']) : ''; ?>">
                </div>
              </div>
              
              <div class="mb-3">
                <label for="muscle_mass" class="form-label">Muscle Mass (kg)</label>
                <input type="number" step="0.1" class="form-control" id="muscle_mass" name="muscle_mass" 
                       value="<?php echo isset($_POST['muscle_mass']) ? htmlspecialchars($_POST['muscle_mass']) : ''; ?>">
              </div>
              
              <h6 class="mt-4 mb-3">Measurements (cm)</h6>
              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="chest" class="form-label">Chest</label>
                  <input type="number" step="0.1" class="form-control" id="chest" name="chest" 
                         value="<?php echo isset($_POST['chest']) ? htmlspecialchars($_POST['chest']) : ''; ?>">
                </div>
                <div class="col-md-4">
                  <label for="waist" class="form-label">Waist</label>
                  <input type="number" step="0.1" class="form-control" id="waist" name="waist" 
                         value="<?php echo isset($_POST['waist']) ? htmlspecialchars($_POST['waist']) : ''; ?>">
                </div>
                <div class="col-md-4">
                  <label for="hips" class="form-label">Hips</label>
                  <input type="number" step="0.1" class="form-control" id="hips" name="hips" 
                         value="<?php echo isset($_POST['hips']) ? htmlspecialchars($_POST['hips']) : ''; ?>">
                </div>
              </div>
              
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="arms" class="form-label">Arms</label>
                  <input type="number" step="0.1" class="form-control" id="arms" name="arms" 
                         value="<?php echo isset($_POST['arms']) ? htmlspecialchars($_POST['arms']) : ''; ?>">
                </div>
                <div class="col-md-6">
                  <label for="thighs" class="form-label">Thighs</label>
                  <input type="number" step="0.1" class="form-control" id="thighs" name="thighs" 
                         value="<?php echo isset($_POST['thighs']) ? htmlspecialchars($_POST['thighs']) : ''; ?>">
                </div>
              </div>
              
              <div class="mb-3">
                <label for="notes" class="form-label">Notes</label>
                <textarea class="form-control" id="notes" name="notes" rows="3"><?php echo isset($_POST['notes']) ? htmlspecialchars($_POST['notes']) : ''; ?></textarea>
              </div>
              
              <button type="submit" name="add_progress" class="btn btn-primary w-100">Save Progress</button>
            </form>
          </div>
        </div>
      </div>
      
      <div class="col-md-8">
        <div class="card border-0 mb-4">
          <div class="card-body">
            <h5 class="card-title">View Client Progress</h5>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mb-4">
              <div class="row">
                <div class="col-md-8">
                  <select class="form-select" name="client_id" onchange="this.form.submit()">
                    <option value="">Select Client to View Progress</option>
                    <?php foreach ($clients as $client): ?>
                      <option value="<?php echo $client['client_id']; ?>" <?php echo (isset($_GET['client_id']) && $_GET['client_id'] == $client['client_id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($client['full_name']); ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary w-100">View</button>
                </div>
              </div>
            </form>
            
            <?php if (!empty($progress_data)): ?>
              <ul class="nav nav-tabs mb-3" id="progressTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="table-tab" data-bs-toggle="tab" data-bs-target="#table" type="button" role="tab">Table View</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="charts-tab" data-bs-toggle="tab" data-bs-target="#charts" type="button" role="tab">Charts</button>
                </li>
              </ul>
              
              <div class="tab-content" id="progressTabsContent">
                <div class="tab-pane fade show active" id="table" role="tabpanel">
                  <div class="table-responsive">
                    <table class="table table-hover progress-table">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Weight</th>
                          <th>Body Fat</th>
                          <th>Muscle Mass</th>
                          <th>Measurements</th>
                          <th>Notes</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($progress_data as $progress): 
                          $measurements = json_decode($progress['measurements'], true);
                        ?>
                          <tr>
                            <td><?php echo date('M j, Y', strtotime($progress['date'])); ?></td>
                            <td><?php echo $progress['weight'] ? $progress['weight'].' kg' : '-'; ?></td>
                            <td><?php echo $progress['body_fat'] ? $progress['body_fat'].'%' : '-'; ?></td>
                            <td><?php echo $progress['muscle_mass'] ? $progress['muscle_mass'].' kg' : '-'; ?></td>
                            <td>
                              <?php if ($measurements): ?>
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#measurementsModal<?php echo $progress['track_id']; ?>">
                                  View
                                </button>
                                
                                <!-- Measurements Modal -->
                                <div class="modal fade" id="measurementsModal<?php echo $progress['track_id']; ?>" tabindex="-1">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title">Measurements (cm)</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                      </div>
                                      <div class="modal-body">
                                        <ul class="list-group list-group-flush">
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Chest
                                            <span><?php echo $measurements['chest'] ?? '-'; ?></span>
                                          </li>
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Waist
                                            <span><?php echo $measurements['waist'] ?? '-'; ?></span>
                                          </li>
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Hips
                                            <span><?php echo $measurements['hips'] ?? '-'; ?></span>
                                          </li>
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Arms
                                            <span><?php echo $measurements['arms'] ?? '-'; ?></span>
                                          </li>
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Thighs
                                            <span><?php echo $measurements['thighs'] ?? '-'; ?></span>
                                          </li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <?php else: ?>
                                -
                              <?php endif; ?>
                            </td>
                            <td><?php echo $progress['notes'] ? substr($progress['notes'], 0, 20).'...' : '-'; ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                
                <div class="tab-pane fade" id="charts" role="tabpanel">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="chart-container mb-4">
                        <canvas id="weightChart"></canvas>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="chart-container mb-4">
                        <canvas id="bodyFatChart"></canvas>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="chart-container mb-4">
                        <canvas id="muscleMassChart"></canvas>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="chart-container mb-4">
                        <canvas id="measurementsChart"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php elseif (isset($_GET['client_id'])): ?>
              <div class="alert alert-info">No progress records found for this client.</div>
            <?php else: ?>
              <div class="alert alert-info">Please select a client to view their progress.</div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
  <script>
    <?php if (!empty($progress_data)): ?>
      // Prepare chart data
      const labels = <?php echo json_encode(array_map(function($item) { 
          return date('M j', strtotime($item['date'])); 
      }, $progress_data)); ?>;
      
      const weightData = <?php echo json_encode(array_map(function($item) { 
          return $item['weight']; 
      }, $progress_data)); ?>;
      
      const bodyFatData = <?php echo json_encode(array_map(function($item) { 
          return $item['body_fat']; 
      }, $progress_data)); ?>;
      
      const muscleMassData = <?php echo json_encode(array_map(function($item) { 
          return $item['muscle_mass']; 
      }, $progress_data)); ?>;
      
      // Measurements data
      const measurementsData = <?php 
          $measurements = [];
          foreach ($progress_data as $progress) {
              $m = json_decode($progress['measurements'], true);
              if ($m) {
                  $measurements[] = $m;
              }
          }
          echo json_encode($measurements);
      ?>;
      
      // Create charts when tab is shown
      document.getElementById('charts-tab').addEventListener('shown.bs.tab', function() {
          // Weight Chart
          new Chart(
              document.getElementById('weightChart'),
              {
                  type: 'line',
                  data: {
                      labels: labels,
                      datasets: [{
                          label: 'Weight (kg)',
                          data: weightData,
                          borderColor: '#6C63FF',
                          backgroundColor: 'rgba(108, 99, 255, 0.1)',
                          tension: 0.3,
                          fill: true
                      }]
                  },
                  options: {
                      responsive: true,
                      plugins: {
                          legend: {
                              position: 'top',
                          },
                          title: {
                              display: true,
                              text: 'Weight Progress'
                          }
                      }
                  }
          );
          
          // Body Fat Chart
          new Chart(
              document.getElementById('bodyFatChart'),
              {
                  type: 'line',
                  data: {
                      labels: labels,
                      datasets: [{
                          label: 'Body Fat (%)',
                          data: bodyFatData,
                          borderColor: '#FF6384',
                          backgroundColor: 'rgba(255, 99, 132, 0.1)',
                          tension: 0.3,
                          fill: true
                      }]
                  },
                  options: {
                      responsive: true,
                      plugins: {
                          legend: {
                              position: 'top',
                          },
                          title: {
                              display: true,
                              text: 'Body Fat Percentage'
                          }
                      }
                  }
          );
          
          // Muscle Mass Chart
          new Chart(
              document.getElementById('muscleMassChart'),
              {
                  type: 'line',
                  data: {
                      labels: labels,
                      datasets: [{
                          label: 'Muscle Mass (kg)',
                          data: muscleMassData,
                          borderColor: '#36A2EB',
                          backgroundColor: 'rgba(54, 162, 235, 0.1)',
                          tension: 0.3,
                          fill: true
                      }]
                  },
                  options: {
                      responsive: true,
                      plugins: {
                          legend: {
                              position: 'top',
                          },
                          title: {
                              display: true,
                              text: 'Muscle Mass'
                          }
                      }
                  }
          );
          
          // Measurements Chart (if data exists)
          if (measurementsData.length > 0) {
              const measurementLabels = ['Chest', 'Waist', 'Hips', 'Arms', 'Thighs'];
              const firstMeasurements = measurementsData[0];
              const lastMeasurements = measurementsData[measurementsData.length - 1];
              
              new Chart(
                  document.getElementById('measurementsChart'),
                  {
                      type: 'bar',
                      data: {
                          labels: measurementLabels,
                          datasets: [
                              {
                                  label: 'First Record',
                                  data: [
                                      firstMeasurements.chest,
                                      firstMeasurements.waist,
                                      firstMeasurements.hips,
                                      firstMeasurements.arms,
                                      firstMeasurements.thighs
                                  ],
                                  backgroundColor: 'rgba(75, 192, 192, 0.5)'
                              },
                              {
                                  label: 'Latest Record',
                                  data: [
                                      lastMeasurements.chest,
                                      lastMeasurements.waist,
                                      lastMeasurements.hips,
                                      lastMeasurements.arms,
                                      lastMeasurements.thighs
                                  ],
                                  backgroundColor: 'rgba(153, 102, 255, 0.5)'
                              }
                          ]
                      },
                      options: {
                          responsive: true,
                          plugins: {
                              legend: {
                                  position: 'top',
                              },
                              title: {
                                  display: true,
                                  text: 'Measurements Comparison'
                              }
                          },
                          scales: {
                              y: {
                                  beginAtZero: true,
                                  title: {
                                      display: true,
                                      text: 'Centimeters (cm)'
                                  }
                              }
                          }
                      }
                  }
              );
          }
      });
    <?php endif; ?>
  </script>
</body>
</html>