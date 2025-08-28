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
$trainer_data = [];

// Fetch trainer data
try {
    $query = "SELECT * FROM trainers WHERE trainer_id = :trainer_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
    $stmt->execute();
    $trainer_data = $stmt->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $error = "Error fetching profile data: " . $e->getMessage();
}

// Handle notification preferences update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_notifications'])) {
    $email_notifications = isset($_POST['email_notifications']) ? 1 : 0;
    $sms_notifications = isset($_POST['sms_notifications']) ? 1 : 0;
    $app_notifications = isset($_POST['app_notifications']) ? 1 : 0;
    $reminder_time = intval($_POST['reminder_time']);

    try {
        $query = "UPDATE trainers SET 
                  email_notifications = :email_notifications,
                  sms_notifications = :sms_notifications,
                  app_notifications = :app_notifications,
                  reminder_time = :reminder_time
                  WHERE trainer_id = :trainer_id";
        
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":email_notifications", $email_notifications, PDO::PARAM_INT);
        $stmt->bindParam(":sms_notifications", $sms_notifications, PDO::PARAM_INT);
        $stmt->bindParam(":app_notifications", $app_notifications, PDO::PARAM_INT);
        $stmt->bindParam(":reminder_time", $reminder_time, PDO::PARAM_INT);
        $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
        
        if ($stmt->execute()) {
            $success = "Notification preferences updated successfully!";
            // Update local data
            $trainer_data['email_notifications'] = $email_notifications;
            $trainer_data['sms_notifications'] = $sms_notifications;
            $trainer_data['app_notifications'] = $app_notifications;
            $trainer_data['reminder_time'] = $reminder_time;
        } else {
            $error = "Error updating notification preferences. Please try again.";
        }
    } catch(PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}

// Handle working hours update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_hours'])) {
    $working_hours = json_encode([
        'monday' => [
            'start' => $_POST['monday_start'],
            'end' => $_POST['monday_end'],
            'available' => isset($_POST['monday_available'])
        ],
        'tuesday' => [
            'start' => $_POST['tuesday_start'],
            'end' => $_POST['tuesday_end'],
            'available' => isset($_POST['tuesday_available'])
        ],
        'wednesday' => [
            'start' => $_POST['wednesday_start'],
            'end' => $_POST['wednesday_end'],
            'available' => isset($_POST['wednesday_available'])
        ],
        'thursday' => [
            'start' => $_POST['thursday_start'],
            'end' => $_POST['thursday_end'],
            'available' => isset($_POST['thursday_available'])
        ],
        'friday' => [
            'start' => $_POST['friday_start'],
            'end' => $_POST['friday_end'],
            'available' => isset($_POST['friday_available'])
        ],
        'saturday' => [
            'start' => $_POST['saturday_start'],
            'end' => $_POST['saturday_end'],
            'available' => isset($_POST['saturday_available'])
        ],
        'sunday' => [
            'start' => $_POST['sunday_start'],
            'end' => $_POST['sunday_end'],
            'available' => isset($_POST['sunday_available'])
        ]
    ]);

    try {
        $query = "UPDATE trainers SET working_hours = :working_hours WHERE trainer_id = :trainer_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":working_hours", $working_hours);
        $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
        
        if ($stmt->execute()) {
            $success = "Working hours updated successfully!";
            $trainer_data['working_hours'] = $working_hours;
        } else {
            $error = "Error updating working hours. Please try again.";
        }
    } catch(PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}

// Handle theme preference update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_theme'])) {
    $theme = $_POST['theme'];
    
    try {
        $query = "UPDATE trainers SET theme_preference = :theme WHERE trainer_id = :trainer_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":theme", $theme);
        $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
        
        if ($stmt->execute()) {
            $success = "Theme preference updated successfully!";
            $trainer_data['theme_preference'] = $theme;
            $_SESSION['theme'] = $theme;
        } else {
            $error = "Error updating theme preference. Please try again.";
        }
    } catch(PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}

// Parse working hours if they exist
$working_hours = [];
if (!empty($trainer_data['working_hours'])) {
    $working_hours = json_decode($trainer_data['working_hours'], true);
}

// Set default working hours if not set
$days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
foreach ($days as $day) {
    if (!isset($working_hours[$day])) {
        $working_hours[$day] = [
            'start' => '09:00',
            'end' => '17:00',
            'available' => $day !== 'saturday' && $day !== 'sunday'
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="<?php echo $trainer_data['theme_preference'] ?? 'light'; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FITFUSION - Trainer Settings</title>
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

    [data-theme="dark"] {
      --primary: #7d75ff;
      --primary-dark: #6a62e0;
      --primary-light: #2a2666;
      --secondary: #2d3035;
      --light: #2d3035;
      --dark: #f8f9fa;
      --gray: #adb5bd;
      --gray-light: #495057;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--secondary);
      color: var(--dark);
      line-height: 1.6;
      transition: background-color 0.3s, color 0.3s;
    }

    .navbar {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 0.8rem 0;
      background-color: var(--light) !important;
    }
    
    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      color: var(--primary) !important;
    }
    
    .settings-card {
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      border: none;
      background-color: var(--light);
      margin-bottom: 2rem;
    }
    
    .settings-header {
      padding: 1.5rem;
      border-bottom: 1px solid var(--gray-light);
    }
    
    .settings-body {
      padding: 1.5rem;
    }
    
    .settings-section-title {
      font-weight: 600;
      color: var(--primary);
      margin-bottom: 1.5rem;
      padding-bottom: 0.5rem;
      border-bottom: 2px solid var(--primary-light);
    }
    
    .form-control, .form-select {
      padding: 0.75rem 1rem;
      border-radius: 8px;
      border: 1px solid var(--gray-light);
      background-color: var(--light);
      color: var(--dark);
    }
    
    .form-control:focus, .form-select:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
    }
    
    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
      padding: 0.5rem 1.5rem;
      font-weight: 500;
    }
    
    .btn-primary:hover {
      background-color: var(--primary-dark);
      border-color: var(--primary-dark);
    }
    
    .form-check-input:checked {
      background-color: var(--primary);
      border-color: var(--primary);
    }
    
    .day-toggle .form-check-input {
      width: 2.5em;
      height: 1.5em;
    }
    
    .time-input {
      max-width: 120px;
    }
    
    .theme-selector {
      display: flex;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }
    
    .theme-option {
      width: 100px;
      height: 60px;
      border-radius: 8px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px solid transparent;
      transition: border-color 0.2s;
    }
    
    .theme-option:hover {
      border-color: var(--primary);
    }
    
    .theme-option.active {
      border-color: var(--primary);
      box-shadow: 0 0 0 2px var(--primary);
    }
    
    .theme-light {
      background: #f8f9fa;
      color: #212529;
    }
    
    .theme-dark {
      background: #2d3035;
      color: #f8f9fa;
    }
    
    .theme-primary {
      background: #6C63FF;
      color: white;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">
        <i class="fas fa-spa me-2"></i>FITFUSION Trainer
      </a>
      <div class="d-flex">
        <div class="dropdown">
          <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
            <i class="fas fa-user-circle me-1"></i> <?php echo htmlspecialchars($_SESSION["full_name"]); ?>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user me-2"></i> Profile</a></li>
            <li><a class="dropdown-item" href="setting.php"><i class="fas fa-cog me-2"></i> Settings</a></li>
            <li><a class="dropdown-item" href="suggestdietplan.php"><i class="fas fa-utensils me-2"></i> Diet Plans</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php" id="logout-btn"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <h1 class="fw-bold mb-4">Settings</h1>
    
    <?php if ($error): ?>
      <div class="alert alert-danger alert-dismissible fade show">
        <?php echo $error; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>
    
    <?php if ($success): ?>
      <div class="alert alert-success alert-dismissible fade show">
        <?php echo $success; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>
    
    <!-- Notification Settings -->
    <div class="card settings-card">
      <div class="settings-header">
        <h3 class="settings-section-title mb-0">
          <i class="fas fa-bell me-2"></i>Notification Preferences
        </h3>
      </div>
      <div class="settings-body">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="mb-3">
            <div class="form-check form-switch mb-3">
              <input class="form-check-input" type="checkbox" id="email_notifications" name="email_notifications" 
                     <?php echo ($trainer_data['email_notifications'] ?? 1) ? 'checked' : ''; ?>>
              <label class="form-check-label" for="email_notifications">Email Notifications</label>
            </div>
            
            <div class="form-check form-switch mb-3">
              <input class="form-check-input" type="checkbox" id="sms_notifications" name="sms_notifications" 
                     <?php echo ($trainer_data['sms_notifications'] ?? 0) ? 'checked' : ''; ?>>
              <label class="form-check-label" for="sms_notifications">SMS Notifications</label>
            </div>
            
            <div class="form-check form-switch mb-4">
              <input class="form-check-input" type="checkbox" id="app_notifications" name="app_notifications" 
                     <?php echo ($trainer_data['app_notifications'] ?? 1) ? 'checked' : ''; ?>>
              <label class="form-check-label" for="app_notifications">In-App Notifications</label>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Session Reminder Time</label>
              <select class="form-select" name="reminder_time" style="max-width: 200px;">
                <option value="15" <?php echo ($trainer_data['reminder_time'] ?? 30) == 15 ? 'selected' : ''; ?>>15 minutes before</option>
                <option value="30" <?php echo ($trainer_data['reminder_time'] ?? 30) == 30 ? 'selected' : ''; ?>>30 minutes before</option>
                <option value="60" <?php echo ($trainer_data['reminder_time'] ?? 30) == 60 ? 'selected' : ''; ?>>1 hour before</option>
                <option value="120" <?php echo ($trainer_data['reminder_time'] ?? 30) == 120 ? 'selected' : ''; ?>>2 hours before</option>
                <option value="1440" <?php echo ($trainer_data['reminder_time'] ?? 30) == 1440 ? 'selected' : ''; ?>>1 day before</option>
              </select>
            </div>
          </div>
          <div class="text-end">
            <button type="submit" name="update_notifications" class="btn btn-primary">Save Notification Settings</button>
          </div>
        </form>
      </div>
    </div>
    
    <!-- Working Hours -->
    <div class="card settings-card">
      <div class="settings-header">
        <h3 class="settings-section-title mb-0">
          <i class="fas fa-clock me-2"></i>Working Hours
        </h3>
      </div>
      <div class="settings-body">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Day</th>
                  <th>Available</th>
                  <th>Start Time</th>
                  <th>End Time</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day): ?>
                  <tr>
                    <td><?php echo ucfirst($day); ?></td>
                    <td class="day-toggle">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="<?php echo $day; ?>_available" 
                               name="<?php echo $day; ?>_available" 
                               <?php echo ($working_hours[$day]['available'] ?? false) ? 'checked' : ''; ?>>
                      </div>
                    </td>
                    <td>
                      <input type="time" class="form-control time-input" 
                             name="<?php echo $day; ?>_start" 
                             value="<?php echo htmlspecialchars($working_hours[$day]['start'] ?? '09:00'); ?>">
                    </td>
                    <td>
                      <input type="time" class="form-control time-input" 
                             name="<?php echo $day; ?>_end" 
                             value="<?php echo htmlspecialchars($working_hours[$day]['end'] ?? '17:00'); ?>">
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="text-end mt-3">
            <button type="submit" name="update_hours" class="btn btn-primary">Save Working Hours</button>
          </div>
        </form>
      </div>
    </div>
    
    <!-- Theme Preferences -->
    <div class="card settings-card">
      <div class="settings-header">
        <h3 class="settings-section-title mb-0">
          <i class="fas fa-palette me-2"></i>Theme Preferences
        </h3>
      </div>
      <div class="settings-body">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="theme-selector">
            <div class="theme-option theme-light <?php echo ($trainer_data['theme_preference'] ?? 'light') === 'light' ? 'active' : ''; ?>" 
                 data-theme="light" onclick="selectTheme('light')">
              <i class="fas fa-sun me-2"></i> Light
            </div>
            <div class="theme-option theme-dark <?php echo ($trainer_data['theme_preference'] ?? 'light') === 'dark' ? 'active' : ''; ?>" 
                 data-theme="dark" onclick="selectTheme('dark')">
              <i class="fas fa-moon me-2"></i> Dark
            </div>
            <div class="theme-option theme-primary <?php echo ($trainer_data['theme_preference'] ?? 'light') === 'primary' ? 'active' : ''; ?>" 
                 data-theme="primary" onclick="selectTheme('primary')">
              <i class="fas fa-spa me-2"></i> FITFUSION
            </div>
          </div>
          <input type="hidden" name="theme" id="theme_input" value="<?php echo $trainer_data['theme_preference'] ?? 'light'; ?>">
          <div class="text-end">
            <button type="submit" name="update_theme" class="btn btn-primary">Save Theme</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function selectTheme(theme) {
      document.getElementById('theme_input').value = theme;
      document.documentElement.setAttribute('data-theme', theme);
      
      // Update active state
      document.querySelectorAll('.theme-option').forEach(option => {
        option.classList.remove('active');
        if (option.getAttribute('data-theme') === theme) {
          option.classList.add('active');
        }
      });
    }
    
    // Form loading states
    document.addEventListener('DOMContentLoaded', function() {
      const forms = document.querySelectorAll('form');
      forms.forEach(form => {
        form.addEventListener('submit', function() {
          const submitBtn = this.querySelector('button[type="submit"]');
          if (submitBtn) {
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> ' + submitBtn.textContent.trim();
            submitBtn.disabled = true;
          }
        });
      });
    });
  </script>
</body>
</html>