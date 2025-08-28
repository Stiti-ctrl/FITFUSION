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

// Get upcoming sessions
$query = "SELECT s.session_id, s.session_date, s.session_time, s.type as program, s.status, 
                 c.client_id, c.full_name as client_name, c.email
          FROM sessions s
          JOIN clients c ON s.client_id = c.client_id
          WHERE s.trainer_id = :trainer_id AND s.session_date >= CURDATE()
          ORDER BY s.session_date, s.session_time
          LIMIT 5";
$stmt = $conn->prepare($query);
$stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
$stmt->execute();
$sessions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get client count
$query = "SELECT COUNT(*) as client_count FROM clients WHERE trainer_id = :trainer_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
$stmt->execute();
$client_count = $stmt->fetch(PDO::FETCH_ASSOC)['client_count'];

// Get today's session count
$query = "SELECT COUNT(*) as today_sessions FROM sessions 
          WHERE trainer_id = :trainer_id AND session_date = CURDATE()";
$stmt = $conn->prepare($query);
$stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
$stmt->execute();
$today_sessions = $stmt->fetch(PDO::FETCH_ASSOC)['today_sessions'];

// Get clients for dropdown
$query = "SELECT client_id, full_name FROM clients WHERE trainer_id = :trainer_id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
$stmt->execute();
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Sample weekly plans data
$weekly_plans = [
    [
        'id' => 1,
        'name' => 'Beginner Full Body',
        'description' => 'Basic full-body workout for beginners',
        'days' => [
            'Monday' => 'Squats, Push-ups, Plank',
            'Wednesday' => 'Lunges, Dumbbell Rows, Crunches',
            'Friday' => 'Bodyweight Squats, Shoulder Press, Leg Raises'
        ]
    ],
    [
        'id' => 2,
        'name' => 'Intermediate Strength',
        'description' => 'Strength-focused intermediate plan',
        'days' => [
            'Monday' => 'Deadlifts, Bench Press, Pull-ups',
            'Tuesday' => 'Cardio - 30 mins',
            'Thursday' => 'Squats, Overhead Press, Bent-over Rows',
            'Saturday' => 'Accessory Work - Biceps/Triceps'
        ]
    ],
    [
        'id' => 3,
        'name' => 'Advanced Split',
        'description' => 'Advanced 5-day split routine',
        'days' => [
            'Monday' => 'Chest & Triceps',
            'Tuesday' => 'Back & Biceps',
            'Wednesday' => 'Legs',
            'Thursday' => 'Shoulders',
            'Friday' => 'Core & Cardio'
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FITFUSION Trainer Portal</title>
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

    /* Navbar */
    .navbar {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 0.8rem 0;
    }
    
    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      color: var(--primary) !important;
    }
    
    .navbar-brand i {
      color: var(--primary-dark);
    }

    .dropdown-toggle {
      display: flex;
      align-items: center;
    }

    /* Main Container */
    .container.my-5 {
      margin-top: 2rem;
      margin-bottom: 3rem;
    }

    /* Welcome Section */
    .welcome-section h1 {
      font-weight: 700;
      color: var(--dark);
      margin-bottom: 1rem;
    }
    
    .welcome-section p.lead {
      color: var(--gray);
      font-size: 1.1rem;
    }

    /* Feature Cards */
    .feature-card {
      border: none;
      border-radius: 10px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
    }
    
    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(108, 99, 255, 0.1);
    }
    
    .feature-icon {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
      background-color: var(--primary-light);
      color: var(--primary);
      font-size: 1.5rem;
    }
    
    .feature-card h4 {
      color: var(--dark);
      margin-bottom: 0.5rem;
    }
    
    .feature-card p {
      color: var(--gray);
      font-size: 0.9rem;
    }

    /* Buttons */
    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
      padding: 0.5rem 1.5rem;
      font-weight: 500;
      letter-spacing: 0.5px;
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

    /* Session Table */
    .session-table {
      border-radius: 10px;
      overflow: hidden;
    }
    
    .session-table .table {
      margin-bottom: 0;
    }
    
    .session-table th {
      background-color: var(--primary);
      color: white;
      font-weight: 500;
      padding: 1rem;
    }
    
    .session-table td {
      padding: 1rem;
      vertical-align: middle;
    }
    
    .session-table tr:hover {
      background-color: rgba(108, 99, 255, 0.05);
    }
    
    .badge {
      padding: 0.5em 0.75em;
      font-weight: 500;
      letter-spacing: 0.5px;
    }

    /* Plan Cards */
    .plan-card {
      border: none;
      border-radius: 10px;
      transition: all 0.3s ease;
      cursor: pointer;
    }
    
    .plan-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(108, 99, 255, 0.1);
    }
    
    .plan-card.active {
      border: 2px solid var(--primary);
      background-color: var(--primary-light);
    }
    
    .day-plan {
      border-left: 3px solid var(--primary);
      padding-left: 10px;
      margin-bottom: 10px;
    }
    
    .day-plan h6 {
      color: var(--primary-dark);
    }

    /* Alerts */
    .alert {
      border-radius: 8px;
      padding: 1rem;
    }
    
    .alert-dismissible .btn-close {
      padding: 1rem;
    }

    /* Utility Classes */
    .shadow-sm {
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
    }
    
    .rounded {
      border-radius: 8px !important;
    }
    
    .fw-bold {
      font-weight: 700 !important;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .welcome-section .col-md-6:last-child {
        margin-top: 2rem;
      }
      
      .feature-card {
        margin-bottom: 1.5rem;
      }
    }

    /* Animation */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .fade-in {
      animation: fadeIn 0.5s ease-out;
    }
  </style>
</head>
<body>
  
  <div class="container my-5">
    <!-- Welcome Section -->
    <div class="row mb-5">
      <div class="col-md-6">
        <h1 class="fw-bold mb-3">Welcome Back, <?php echo htmlspecialchars(explode(' ', $_SESSION["full_name"])[0]); ?></h1>
        <p class="lead">Manage your clients and track their wellness journey</p>
        <div class="d-flex gap-3 mt-4">
          <a href="viewclients.php" class="btn btn-primary btn-lg px-4">
            <i class="fas fa-users me-2"></i> View Clients
          </a>
          <a href="session.php" class="btn btn-outline-primary btn-lg px-4">
            <i class="fas fa-calendar-plus me-2"></i> Add Session
          </a>
        </div>
      </div>
      <div class="col-md-6">
        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
             class="img-fluid rounded shadow" 
             alt="Trainer with client">
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="row g-4 mb-5">
      <div class="col-md-3">
        <div class="card feature-card border-0 shadow-sm h-100">
          <div class="card-body text-center p-4">
            <div class="feature-icon rounded-circle d-flex align-items-center justify-content-center mb-3 mx-auto">
              <i class="fas fa-user-plus"></i>
            </div>
            <h4>Add New Client</h4>
            <p>Register clients and create personalized profiles</p>
            <a href="add_client.php" class="btn btn-outline-primary mt-2">
              Get Started
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card feature-card border-0 shadow-sm h-100">
          <div class="card-body text-center p-4">
            <div class="feature-icon rounded-circle d-flex align-items-center justify-content-center mb-3 mx-auto">
              <i class="fas fa-dumbbell"></i>
            </div>
            <h4>Create Plans</h4>
            <p>Design customized exercise routines</p>
            <button class="btn btn-outline-primary mt-2" data-bs-toggle="modal" data-bs-target="#weeklyPlanModal">
              Select Plan
            </button>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card feature-card border-0 shadow-sm h-100">
          <div class="card-body text-center p-4">
            <div class="feature-icon rounded-circle d-flex align-items-center justify-content-center mb-3 mx-auto">
              <i class="fas fa-utensils"></i>
            </div>
            <h4>Diet Plans</h4>
            <p>Create and manage nutritional plans</p>
            <button class="btn btn-outline-primary mt-2" data-bs-toggle="modal" data-bs-target="#dietPlanModal">
              Weekly Diet
            </button>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card feature-card border-0 shadow-sm h-100">
          <div class="card-body text-center p-4">
            <div class="feature-icon rounded-circle d-flex align-items-center justify-content-center mb-3 mx-auto">
              <i class="fas fa-chart-line"></i>
            </div>
            <h4>Track Progress</h4>
            <p>Monitor client improvements with analytics</p>
            <a href="progress.php" class="btn btn-outline-primary mt-2">
              View Reports
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="bg-primary bg-opacity-10 p-3 rounded me-3">
                <i class="fas fa-users text-primary fs-4"></i>
              </div>
              <div>
                <h6 class="mb-0">Total Clients</h6>
                <h3 class="mb-0"><?php echo $client_count; ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="bg-success bg-opacity-10 p-3 rounded me-3">
                <i class="fas fa-calendar-check text-success fs-4"></i>
              </div>
              <div>
                <h6 class="mb-0">Today's Sessions</h6>
                <h3 class="mb-0"><?php echo $today_sessions; ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="bg-info bg-opacity-10 p-3 rounded me-3">
                <i class="fas fa-trophy text-info fs-4"></i>
              </div>
              <div>
                <h6 class="mb-0">Active Plans</h6>
                <h3 class="mb-0">12</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Upcoming Sessions -->
    <h3 class="fw-bold mb-4">Your Upcoming Sessions</h3>
    <div class="card border-0 shadow-sm session-table">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Client</th>
                <th>Type</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (count($sessions) > 0): ?>
                <?php foreach ($sessions as $session): ?>
                  <tr>
                    <td><?php echo date('M j, Y', strtotime($session['session_date'])); ?></td>
                    <td><?php echo date('g:i A', strtotime($session['session_time'])); ?></td>
                    <td><?php echo htmlspecialchars($session['client_name']); ?></td>
                    <td><?php echo htmlspecialchars($session['program']); ?></td>
                    <td>
                      <?php if ($session['status'] == 'Scheduled'): ?>
                        <span class="badge bg-success">Confirmed</span>
                      <?php else: ?>
                        <span class="badge bg-warning text-dark"><?php echo htmlspecialchars($session['status']); ?></span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <button class="btn btn-sm btn-outline-primary">Start</button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="6" class="text-center py-4">No upcoming sessions found</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Weekly Workout Plan Modal -->
  <div class="modal fade" id="weeklyPlanModal" tabindex="-1" aria-labelledby="weeklyPlanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="weeklyPlanModalLabel">Select Weekly Workout Plan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-4">
            <label for="clientSelect" class="form-label">Select Client</label>
            <select class="form-select" id="clientSelect">
              <option value="">Select a client</option>
              <?php foreach ($clients as $client): ?>
                <option value="<?php echo $client['client_id']; ?>"><?php echo htmlspecialchars($client['full_name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          
          <h5 class="mb-3">Available Plans</h5>
          <div class="row g-3">
            <?php foreach ($weekly_plans as $plan): ?>
              <div class="col-md-6">
                <div class="card plan-card shadow-sm p-3" onclick="selectPlan(this, <?php echo $plan['id']; ?>)">
                  <h5><?php echo htmlspecialchars($plan['name']); ?></h5>
                  <p class="text-muted"><?php echo htmlspecialchars($plan['description']); ?></p>
                  <div class="plan-details" style="display: none;">
                    <?php foreach ($plan['days'] as $day => $exercises): ?>
                      <div class="day-plan mb-2">
                        <h6 class="mb-1"><?php echo $day; ?></h6>
                        <p class="mb-0"><?php echo htmlspecialchars($exercises); ?></p>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          
          <div id="selectedPlanDetails" class="mt-4 d-none">
            <h5 class="mb-3">Selected Plan Details</h5>
            <div id="planContent"></div>
            <div class="d-grid gap-2 mt-3">
              <button class="btn btn-primary" onclick="assignPlan()">Assign to Client</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Weekly Diet Plan Modal -->
  <div class="modal fade" id="dietPlanModal" tabindex="-1" aria-labelledby="dietPlanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dietPlanModalLabel">Select Weekly Diet Plan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-4">
            <label for="dietClientSelect" class="form-label">Select Client</label>
            <select class="form-select" id="dietClientSelect">
              <option value="">Select a client</option>
              <?php foreach ($clients as $client): ?>
                <option value="<?php echo $client['client_id']; ?>"><?php echo htmlspecialchars($client['full_name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          
          <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i>
            Select a client to view recommended diet plans based on their profile.
          </div>
          
          <div id="dietPlansContainer" class="mt-3">
            <div class="card mb-3">
              <div class="card-body">
                <h5>Standard Weight Loss Plan</h5>
                <p class="text-muted">Balanced diet with calorie deficit for gradual weight loss</p>
                <button class="btn btn-sm btn-outline-primary" onclick="previewDietPlan('weightLoss')">Preview</button>
              </div>
            </div>
            
            <div class="card mb-3">
              <div class="card-body">
                <h5>Muscle Building Plan</h5>
                <p class="text-muted">High protein diet to support muscle growth</p>
                <button class="btn btn-sm btn-outline-primary" onclick="previewDietPlan('muscleBuilding')">Preview</button>
              </div>
            </div>
            
            <div class="card">
              <div class="card-body">
                <h5>Maintenance Plan</h5>
                <p class="text-muted">Balanced diet to maintain current weight</p>
                <button class="btn btn-sm btn-outline-primary" onclick="previewDietPlan('maintenance')">Preview</button>
              </div>
            </div>
          </div>
          
          <div id="dietPlanPreview" class="mt-4 d-none">
            <h5>Diet Plan Preview</h5>
            <div id="dietPlanContent"></div>
            <div class="d-grid gap-2 mt-3">
              <button class="btn btn-primary" onclick="assignDietPlan()">Assign to Client</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Weekly Workout Plan Functions
    let selectedPlanId = null;
    let selectedPlanContent = null;
    
    function selectPlan(element, planId) {
      // Remove active class from all cards
      document.querySelectorAll('.plan-card').forEach(card => {
        card.classList.remove('active');
      });
      
      // Add active class to selected card
      element.classList.add('active');
      
      // Store selected plan ID
      selectedPlanId = planId;
      
      // Get plan content
      const planDetails = element.querySelector('.plan-details').innerHTML;
      selectedPlanContent = planDetails;
      
      // Show plan details section
      document.getElementById('selectedPlanDetails').classList.remove('d-none');
      document.getElementById('planContent').innerHTML = planDetails;
    }
    
    function assignPlan() {
      const clientId = document.getElementById('clientSelect').value;
      
      if (!clientId) {
        alert('Please select a client first');
        return;
      }
      
      if (!selectedPlanId) {
        alert('Please select a plan first');
        return;
      }
      
      // Show loading state
      const assignBtn = document.querySelector('#selectedPlanDetails .btn');
      assignBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Assigning...';
      assignBtn.disabled = true;
      
      // Simulate API call (replace with actual API call)
      setTimeout(() => {
        // Show success message
        alert(`Plan successfully assigned to client!`);
        
        // Close modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('weeklyPlanModal'));
        modal.hide();
        
        // Reset form
        resetPlanModal();
      }, 1500);
    }
    
    function resetPlanModal() {
      document.getElementById('clientSelect').value = '';
      document.querySelectorAll('.plan-card').forEach(card => {
        card.classList.remove('active');
      });
      document.getElementById('selectedPlanDetails').classList.add('d-none');
      selectedPlanId = null;
      selectedPlanContent = null;
    }
    
    // Weekly Diet Plan Functions
    function previewDietPlan(planType) {
      const clientId = document.getElementById('dietClientSelect').value;
      
      if (!clientId) {
        alert('Please select a client first');
        return;
      }
      
      // Generate sample content based on plan type
      let content = '';
      
      switch(planType) {
        case 'weightLoss':
          content = `
            <h6>Weight Loss Plan - 1800 kcal/day</h6>
            <div class="day-plan mb-2">
              <h6 class="mb-1">Monday</h6>
              <p class="mb-0"><strong>Breakfast:</strong> Oatmeal with berries</p>
              <p class="mb-0"><strong>Lunch:</strong> Grilled chicken with quinoa</p>
              <p class="mb-0"><strong>Dinner:</strong> Baked salmon with vegetables</p>
            </div>
            <div class="day-plan mb-2">
              <h6 class="mb-1">Tuesday</h6>
              <p class="mb-0"><strong>Breakfast:</strong> Greek yogurt with nuts</p>
              <p class="mb-0"><strong>Lunch:</strong> Turkey wrap with whole wheat</p>
              <p class="mb-0"><strong>Dinner:</strong> Stir-fried tofu with brown rice</p>
            </div>
            <!-- More days would be added here -->
          `;
          break;
          
        case 'muscleBuilding':
          content = `
            <h6>Muscle Building Plan - 2500 kcal/day</h6>
            <div class="day-plan mb-2">
              <h6 class="mb-1">Monday</h6>
              <p class="mb-0"><strong>Breakfast:</strong> Scrambled eggs with toast</p>
              <p class="mb-0"><strong>Lunch:</strong> Grilled steak with sweet potato</p>
              <p class="mb-0"><strong>Dinner:</strong> Chicken breast with rice</p>
            </div>
            <div class="day-plan mb-2">
              <h6 class="mb-1">Tuesday</h6>
              <p class="mb-0"><strong>Breakfast:</strong> Protein shake with banana</p>
              <p class="mb-0"><strong>Lunch:</strong> Salmon with quinoa</p>
              <p class="mb-0"><strong>Dinner:</strong> Lean beef with vegetables</p>
            </div>
          `;
          break;
          
        case 'maintenance':
          content = `
            <h6>Maintenance Plan - 2200 kcal/day</h6>
            <div class="day-plan mb-2">
              <h6 class="mb-1">Monday</h6>
              <p class="mb-0"><strong>Breakfast:</strong> Whole grain cereal with milk</p>
              <p class="mb-0"><strong>Lunch:</strong> Chicken salad with olive oil</p>
              <p class="mb-0"><strong>Dinner:</strong> Grilled fish with vegetables</p>
            </div>
            <div class="day-plan mb-2">
              <h6 class="mb-1">Tuesday</h6>
              <p class="mb-0"><strong>Breakfast:</strong> Smoothie with protein powder</p>
              <p class="mb-0"><strong>Lunch:</strong> Turkey sandwich on whole wheat</p>
              <p class="mb-0"><strong>Dinner:</strong> Stir-fry with lean meat</p>
            </div>
          `;
          break;
      }
      
      // Show preview section
      document.getElementById('dietPlanPreview').classList.remove('d-none');
      document.getElementById('dietPlanContent').innerHTML = content;
    }
    
    function assignDietPlan() {
      const clientId = document.getElementById('dietClientSelect').value;
      
      if (!clientId) {
        alert('Please select a client first');
        return;
      }
      
      // Show loading state
      const assignBtn = document.querySelector('#dietPlanPreview .btn');
      assignBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Assigning...';
      assignBtn.disabled = true;
      
      // Simulate API call (replace with actual API call)
      setTimeout(() => {
        // Show success message
        alert(`Diet plan successfully assigned to client!`);
        
        // Close modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('dietPlanModal'));
        modal.hide();
        
        // Reset form
        resetDietModal();
      }, 1500);
    }
    
    function resetDietModal() {
      document.getElementById('dietClientSelect').value = '';
      document.getElementById('dietPlanPreview').classList.add('d-none');
    }
    
    // Initialize modals
    document.addEventListener('DOMContentLoaded', function() {
      const weeklyPlanModal = document.getElementById('weeklyPlanModal');
      const dietPlanModal = document.getElementById('dietPlanModal');
      
      if (weeklyPlanModal) {
        weeklyPlanModal.addEventListener('hidden.bs.modal', resetPlanModal);
      }
      
      if (dietPlanModal) {
        dietPlanModal.addEventListener('hidden.bs.modal', resetDietModal);
      }
    });
  </script>
</body>
</html>