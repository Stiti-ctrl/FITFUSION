<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

require_once "db.php";
$db = new Database();
$conn = $db->getConnection();

// Get all clients for this trainer
$query = "SELECT * FROM clients WHERE trainer_id = :trainer_id ORDER BY full_name";
$stmt = $conn->prepare($query);
$stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
$stmt->execute();
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get counts for each client
foreach ($clients as &$client) {
    // Get session count
    $query = "SELECT COUNT(*) as session_count FROM sessions WHERE client_id = :client_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":client_id", $client['client_id']);
    $stmt->execute();
    $client['session_count'] = $stmt->fetch(PDO::FETCH_ASSOC)['session_count'];
    
    // Get progress entry count
    $query = "SELECT COUNT(*) as progress_count FROM progress_tracking WHERE client_id = :client_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":client_id", $client['client_id']);
    $stmt->execute();
    $client['progress_count'] = $stmt->fetch(PDO::FETCH_ASSOC)['progress_count'];
}
unset($client); // Break the reference
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Clients | FITFUSION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #6C63FF;
      --primary-dark: #564fd3;
      --primary-light: #e0deff;
      --secondary: #F8F9FA;
      --success: #28a745;
      --info: #17a2b8;
      --warning: #ffc107;
      --danger: #dc3545;
      --light: #f8f9fa;
      --dark: #343a40;
      --gray: #6c757d;
      --gray-light: #e9ecef;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f7fa;
      color: #333;
      line-height: 1.6;
    }

    .navbar {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 0.8rem 0;
    }
    
    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      color: var(--primary) !important;
    }
    
    .page-header {
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 30px;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }
    
    .page-title {
      color: var(--dark);
      margin-bottom: 0;
    }
    
    .client-card {
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .client-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(108, 99, 255, 0.1);
    }
    
    .client-avatar {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background-color: var(--primary-light);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      color: var(--primary);
      margin-right: 15px;
    }
    
    .client-name {
      color: var(--dark);
      margin-bottom: 5px;
    }
    
    .client-meta {
      color: var(--gray);
      font-size: 0.9rem;
    }
    
    .client-stats {
      display: flex;
      gap: 15px;
    }
    
    .stat-item {
      text-align: center;
    }
    
    .stat-value {
      font-weight: 600;
      color: var(--primary);
    }
    
    .stat-label {
      font-size: 0.8rem;
      color: var(--gray);
    }
    
    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
    }
    
    .btn-primary:hover {
      background-color: var(--primary-dark);
      border-color: var(--primary-dark);
    }
    
    .btn-outline-primary {
      color: var(--primary);
      border-color: var(--primary);
    }
    
    .btn-outline-primary:hover {
      background-color: var(--primary);
      color: white;
    }
    
    .search-box {
      position: relative;
      margin-bottom: 20px;
    }
    
    .search-box .form-control {
      padding-left: 40px;
      border-radius: 50px;
    }
    
    .search-box i {
      position: absolute;
      left: 15px;
      top: 12px;
      color: var(--gray);
    }
  </style>
</head>
<body>
  <?php include_once "navbar2.php"; ?>

  <div class="container py-5">
    <!-- Page Header -->
    <div class="page-header">
      <div class="d-flex justify-content-between align-items-center">
        <h1 class="page-title">My Clients</h1>
        <a href="home.php" class="btn btn-outline-primary">
          <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
        </a>
      </div>
    </div>

    <!-- Search and Filter -->
    <div class="row mb-4">
      <div class="col-md-6">
        <div class="search-box">
          <i class="fas fa-search"></i>
          <input type="text" class="form-control" id="clientSearch" placeholder="Search clients...">
        </div>
      </div>
      <div class="col-md-6 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newClientModal">
          <i class="fas fa-user-plus me-2"></i> Add New Client
        </button>
      </div>
    </div>

    <!-- Clients List -->
    <div class="row" id="clientsContainer">
      <?php if (count($clients) > 0): ?>
        <?php foreach ($clients as $client): ?>
          <div class="col-md-6 col-lg-4 mb-4 client-item">
            <div class="client-card">
              <div class="d-flex align-items-center mb-3">
                <div class="client-avatar">
                  <?php echo strtoupper(substr($client['full_name'], 0, 1)); ?>
                </div>
                <div>
                  <h5 class="client-name"><?php echo htmlspecialchars($client['full_name']); ?></h5>
                  <div class="client-meta">
                    <span><i class="fas fa-envelope me-1"></i> <?php echo htmlspecialchars($client['email']); ?></span>
                    <?php if ($client['phone']): ?>
                      <span class="d-block"><i class="fas fa-phone me-1"></i> <?php echo htmlspecialchars($client['phone']); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              
              <div class="client-stats mb-3">
                <div class="stat-item">
                  <div class="stat-value"><?php echo htmlspecialchars($client['session_count']); ?></div>
                  <div class="stat-label">Sessions</div>
                </div>
                <div class="stat-item">
                  <div class="stat-value"><?php echo htmlspecialchars($client['progress_count']); ?></div>
                  <div class="stat-label">Progress</div>
                </div>
              </div>
              
              <div class="d-flex justify-content-between">
                <a href="view_client.php?id=<?php echo $client['client_id']; ?>" class="btn btn-sm btn-outline-primary">
                  <i class="fas fa-eye me-1"></i> View
                </a>
                <a href="schedule.php?client_id=<?php echo $client['client_id']; ?>" class="btn btn-sm btn-outline-secondary">
                  <i class="fas fa-calendar-plus me-1"></i> Schedule
                </a>
                <a href="progress.php?client_id=<?php echo $client['client_id']; ?>" class="btn btn-sm btn-outline-info">
                  <i class="fas fa-chart-line me-1"></i> Progress
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12">
          <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i> You don't have any clients yet. Add your first client to get started.
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- New Client Modal (same as in your home.php) -->
  <div class="modal fade" id="newClientModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Client</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="clientForm" action="add_client.php" method="POST">
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" class="form-control" name="full_name" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Age</label>
                <input type="number" class="form-control" name="age">
              </div>
              <div class="col-md-6">
                <label class="form-label">Gender</label>
                <select class="form-select" name="gender">
                  <option>Male</option>
                  <option>Female</option>
                  <option>Other</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Weight (kg)</label>
                <input type="number" step="0.01" class="form-control" name="weight">
              </div>
              <div class="col-md-6">
                <label class="form-label">Height (cm)</label>
                <input type="number" step="0.01" class="form-control" name="height">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Fitness Level</label>
              <select class="form-select" name="fitness_level">
                <option>Beginner</option>
                <option>Intermediate</option>
                <option>Advanced</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Medical Conditions</label>
              <textarea class="form-control" name="medical_conditions" rows="2" placeholder="Any health concerns or conditions"></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Goals</label>
              <textarea class="form-control" name="goals" rows="2" placeholder="Client's fitness goals"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Client</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Client search functionality
        const clientSearch = document.getElementById('clientSearch');
        const clientsContainer = document.getElementById('clientsContainer');
        const clientItems = document.querySelectorAll('.client-item');
        
        if (clientSearch) {
            clientSearch.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                
                clientItems.forEach(item => {
                    const clientName = item.querySelector('.client-name').textContent.toLowerCase();
                    if (clientName.includes(searchTerm)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        }

        // Handle new client form submission
        const clientForm = document.getElementById('clientForm');
        if (clientForm) {
            clientForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show loading state
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Adding...';
                submitBtn.disabled = true;
                
                const formData = new FormData(this);
                
                fetch('add_client.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Show success message
                        const successAlert = document.createElement('div');
                        successAlert.className = 'alert alert-success alert-dismissible fade show';
                        successAlert.innerHTML = `
                            ${data.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        `;
                        document.querySelector('.container.py-5').prepend(successAlert);
                        
                        // Close modal and reset form
                        bootstrap.Modal.getInstance(document.getElementById('newClientModal')).hide();
                        clientForm.reset();
                        
                        // Refresh page after 1.5 seconds
                        setTimeout(() => location.reload(), 1500);
                    } else {
                        throw new Error(data.error || 'Failed to add client');
                    }
                })
                .catch(error => {
                    // Show error message
                    const errorAlert = document.createElement('div');
                    errorAlert.className = 'alert alert-danger alert-dismissible fade show';
                    errorAlert.innerHTML = `
                        Error: ${error.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    `;
                    document.querySelector('.container.py-5').prepend(errorAlert);
                })
                .finally(() => {
                    // Reset button state
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
            });
        }
    });
  </script>
</body>
</html>