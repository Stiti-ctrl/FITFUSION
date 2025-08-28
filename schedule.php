<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

include_once "navbar2.php";
require_once "db.php";
$db = new Database();
$conn = $db->getConnection();

$error = '';
$success = '';

// Fetch trainer's clients
$clients = [];
try {
    $query = "SELECT client_id, full_name FROM clients WHERE trainer_id = :trainer_id ORDER BY full_name";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
    $stmt->execute();
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $error = "Error fetching clients: " . $e->getMessage();
}

// Fetch trainer's working hours
$working_hours = [];
try {
    $query = "SELECT working_hours FROM trainers WHERE trainer_id = :trainer_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result && !empty($result['working_hours'])) {
        $working_hours = json_decode($result['working_hours'], true);
    } else {
        // Default working hours if not set
        $working_hours = [
            'monday' => ['start' => '09:00', 'end' => '17:00', 'available' => true],
            'tuesday' => ['start' => '09:00', 'end' => '17:00', 'available' => true],
            'wednesday' => ['start' => '09:00', 'end' => '17:00', 'available' => true],
            'thursday' => ['start' => '09:00', 'end' => '17:00', 'available' => true],
            'friday' => ['start' => '09:00', 'end' => '17:00', 'available' => true],
            'saturday' => ['start' => '09:00', 'end' => '13:00', 'available' => false],
            'sunday' => ['start' => '00:00', 'end' => '00:00', 'available' => false]
        ];
    }
} catch(PDOException $e) {
    $error = "Error fetching working hours: " . $e->getMessage();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_id = trim($_POST["client_id"] ?? '');
    $session_date = trim($_POST["session_date"] ?? '');
    $session_time = trim($_POST["session_time"] ?? '');
    $duration = trim($_POST["duration"] ?? '');
    $type = trim($_POST["type"] ?? '');
    $notes = trim($_POST["notes"] ?? '');
    
    // Validate inputs
    $missing_fields = [];
    if (empty($client_id)) $missing_fields[] = "Client";
    if (empty($session_date)) $missing_fields[] = "Session Date";
    if (empty($session_time)) $missing_fields[] = "Start Time";
    if (empty($duration)) $missing_fields[] = "Duration";
    if (empty($type)) $missing_fields[] = "Session Type";
    
    if (!empty($missing_fields)) {
        $error = "Please fill all required fields: " . implode(", ", $missing_fields);
    } else {
        try {
            // Check if client belongs to this trainer
            $query = "SELECT client_id FROM clients WHERE client_id = :client_id AND trainer_id = :trainer_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":client_id", $client_id);
            $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
            $stmt->execute();
            
            if ($stmt->rowCount() === 0) {
                $error = "Invalid client selection";
            } else {
                // Check for time conflicts
                $start_datetime = "$session_date $session_time";
                $end_datetime = date('Y-m-d H:i:s', strtotime("$start_datetime + $duration minutes"));
                
                $query = "SELECT session_id FROM sessions 
                          WHERE trainer_id = :trainer_id 
                          AND (
                              (session_date = :session_date AND session_time = :session_time)
                              OR
                              (
                                  session_date = :session_date 
                                  AND session_time < ADDTIME(:end_time, SEC_TO_TIME(duration * 60)) 
                                  AND ADDTIME(session_time, SEC_TO_TIME(duration * 60)) > :session_time
                              )
                          )";
                
                $stmt = $conn->prepare($query);
                $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
                $stmt->bindParam(":session_date", $session_date);
                $stmt->bindParam(":session_time", $session_time);
                $stmt->bindParam(":end_time", $session_time);
                $stmt->execute();
                
                if ($stmt->rowCount() > 0) {
                    $error = "This time slot is already booked";
                } else {
                    // Check if within working hours
                    $day_of_week = strtolower(date('l', strtotime($session_date)));
                    $session_end_time = date('H:i', strtotime("$session_time + $duration minutes"));
                    
                    if (!empty($working_hours[$day_of_week]['available'])) {
                        $work_start = $working_hours[$day_of_week]['start'];
                        $work_end = $working_hours[$day_of_week]['end'];
                        
                        if ($session_time < $work_start || $session_end_time > $work_end) {
                            $error = "Session time is outside your working hours for this day ($work_start - $work_end)";
                        }
                    } else {
                        $error = "You are not available on " . ucfirst($day_of_week) . "s";
                    }
                    
                    if (empty($error)) {
                        // Insert new session
                        $query = "INSERT INTO sessions 
                                  (client_id, trainer_id, session_date, session_time, duration, type, notes) 
                                  VALUES 
                                  (:client_id, :trainer_id, :session_date, :session_time, :duration, :type, :notes)";
                        
                        $stmt = $conn->prepare($query);
                        $stmt->bindParam(":client_id", $client_id);
                        $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
                        $stmt->bindParam(":session_date", $session_date);
                        $stmt->bindParam(":session_time", $session_time);
                        $stmt->bindParam(":duration", $duration, PDO::PARAM_INT);
                        $stmt->bindParam(":type", $type);
                        $stmt->bindParam(":notes", $notes);
                        
                        if ($stmt->execute()) {
                            $success = "Session scheduled successfully!";
                            // Clear form but keep client selected
                            $_POST = ['client_id' => $client_id];
                            
                            // Get client name for success message
                            $client_name = '';
                            foreach ($clients as $client) {
                                if ($client['client_id'] == $client_id) {
                                    $client_name = $client['full_name'];
                                    break;
                                }
                            }
                            
                            // Format the session details for display
                            $formatted_date = date('F j, Y', strtotime($session_date));
                            $formatted_time = date('g:i A', strtotime($session_time));
                            $formatted_end_time = date('g:i A', strtotime("$session_time + $duration minutes"));
                            
                            $success_details = "<div class='mt-3 p-3 bg-light rounded'>
                                <h5 class='text-success'><i class='fas fa-check-circle me-2'></i>Session Details</h5>
                                <ul class='mb-0'>
                                    <li><strong>Client:</strong> $client_name</li>
                                    <li><strong>Date:</strong> $formatted_date</li>
                                    <li><strong>Time:</strong> $formatted_time - $formatted_end_time</li>
                                    <li><strong>Duration:</strong> $duration minutes</li>
                                    <li><strong>Type:</strong> $type</li>
                                </ul>
                            </div>";
                            
                            $success .= $success_details;
                        } else {
                            $error = "Error scheduling session. Please try again.";
                        }
                    }
                }
            }
        } catch(PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}

// Get today's date for the date picker default
$today = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FITFUSION - Schedule Session</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <style>
    :root {
      --primary: #6C63FF;
      --primary-dark: #564fd3;
      --primary-light: #e0deff;
      --danger: #dc3545;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f7fa;
    }

    .session-card {
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      border: none;
    }
    
    .session-header {
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      color: white;
      border-radius: 10px 10px 0 0;
      padding: 1.5rem;
    }
    
    .session-body {
      padding: 2rem;
    }
    
    .form-control, .form-select, .select2-container .select2-selection--single {
      padding: 0.75rem 1rem;
      border-radius: 8px;
      border: 1px solid #e0e0e0;
      height: auto;
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
    
    .error-field {
      border-color: var(--danger) !important;
    }
    
    .availability-calendar {
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .calendar-header {
      background-color: var(--primary);
      color: white;
      padding: 0.75rem;
      text-align: center;
    }
    
    .calendar-body {
      background-color: white;
      padding: 1rem;
    }
    
    .calendar-day {
      padding: 0.5rem;
      text-align: center;
      border-bottom: 1px solid #e9ecef;
    }
    
    .calendar-day.unavailable {
      background-color: #e9ecef;
      color: #6c757d;
    }
    
    .success-details {
      background-color: #f8f9fa;
      border-left: 4px solid #28a745;
      /* Select2 dropdown styling */
.select2-container--open .select2-dropdown {
  z-index: 1060; /* Higher than Bootstrap modal z-index */
  border-radius: 8px;
  border-color: var(--primary);
  box-shadow: 0 0 10px rgba(108, 99, 255, 0.2);
}

.select2-results__option {
  padding: 8px 12px;
}

.select2-results__option--highlighted {
  background-color: var(--primary) !important;
  color: white !important;
}

.select2-container .select2-selection--single {
  height: auto !important;
  min-height: 45px;
  display: flex;
  align-items: center;
}
    }
  </style>
</head>
<body>
  <div class="container my-5">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="card session-card">
          <div class="session-header">
            <h2 class="mb-0"><i class="fas fa-calendar-plus me-2"></i> Schedule New Session</h2>
          </div>
          <div class="session-body">
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
            
            <form id="sessionForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
              <div class="row mb-4">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Client</label>
                    <select class="form-select select2-client <?php echo (isset($missing_fields) && in_array('Client', $missing_fields)) ? 'error-field' : ''; ?>" 
                            name="client_id" id="client_id" required>
                      <option value="">Select a client</option>
                      <?php foreach ($clients as $client): ?>
                        <option value="<?php echo $client['client_id']; ?>" 
                          <?php echo (isset($_POST['client_id']) && $_POST['client_id'] == $client['client_id']) ? 'selected' : ''; ?>>
                          <?php echo htmlspecialchars($client['full_name']); ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Session Type</label>
                    <select class="form-select <?php echo (isset($missing_fields) && in_array('Session Type', $missing_fields)) ? 'error-field' : ''; ?>" 
                            name="type" required>
                      <option value="">Select session type</option>
                      <option value="Yoga" <?php echo (isset($_POST['type']) && $_POST['type'] == 'Yoga') ? 'selected' : ''; ?>>Yoga</option>
                      <option value="Workout" <?php echo (isset($_POST['type']) && $_POST['type'] == 'Workout') ? 'selected' : ''; ?>>Workout</option>
                      <option value="Physiotherapy" <?php echo (isset($_POST['type']) && $_POST['type'] == 'Physiotherapy') ? 'selected' : ''; ?>>Physiotherapy</option>
                      <option value="Consultation" <?php echo (isset($_POST['type']) && $_POST['type'] == 'Consultation') ? 'selected' : ''; ?>>Consultation</option>
                    </select>
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Duration (minutes)</label>
                    <select class="form-select <?php echo (isset($missing_fields) && in_array('Duration', $missing_fields)) ? 'error-field' : ''; ?>" 
                            name="duration" required>
                      <option value="30" <?php echo (isset($_POST['duration']) && $_POST['duration'] == '30') ? 'selected' : ''; ?>>30 minutes</option>
                      <option value="45" <?php echo (isset($_POST['duration']) && $_POST['duration'] == '45') ? 'selected' : ''; ?>>45 minutes</option>
                      <option value="60" <?php echo (isset($_POST['duration']) && $_POST['duration'] == '60') ? 'selected' : ''; ?>>60 minutes</option>
                      <option value="90" <?php echo (isset($_POST['duration']) && $_POST['duration'] == '90') ? 'selected' : ''; ?>>90 minutes</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Session Date</label>
                    <input type="date" class="form-control <?php echo (isset($missing_fields) && in_array('Session Date', $missing_fields)) ? 'error-field' : ''; ?>" 
                           name="session_date" 
                           min="<?php echo $today; ?>" 
                           value="<?php echo isset($_POST['session_date']) ? htmlspecialchars($_POST['session_date']) : $today; ?>" 
                           required>
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Start Time</label>
                    <input type="time" class="form-control <?php echo (isset($missing_fields) && in_array('Start Time', $missing_fields)) ? 'error-field' : ''; ?>" 
                           name="session_time" 
                           value="<?php echo isset($_POST['session_time']) ? htmlspecialchars($_POST['session_time']) : '09:00'; ?>" 
                           required>
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Notes (Optional)</label>
                    <textarea class="form-control" name="notes" rows="3"><?php echo isset($_POST['notes']) ? htmlspecialchars($_POST['notes']) : ''; ?></textarea>
                  </div>
                </div>
              </div>
              
              <div class="text-end">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-calendar-check me-2"></i> Schedule Session
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    
    <!-- Availability Calendar -->
    <div class="row mt-4">
      <div class="col-lg-8 mx-auto">
        <div class="availability-calendar">
          <div class="calendar-header">
            <h4 class="mb-0">Your Weekly Availability</h4>
          </div>
          <div class="calendar-body">
            <div class="row">
              <?php 
              $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
              foreach ($days as $day): 
                $day_lower = strtolower($day);
                $available = $working_hours[$day_lower]['available'] ?? false;
              ?>
                <div class="col calendar-day <?php echo !$available ? 'unavailable' : ''; ?>">
                  <strong><?php echo substr($day, 0, 3); ?></strong><br>
                  <?php if ($available): ?>
                    <?php echo $working_hours[$day_lower]['start']; ?> - <?php echo $working_hours[$day_lower]['end']; ?>
                  <?php else: ?>
                    Not Available
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
$(document).ready(function() {
  // Initialize Select2 for client selection
  $('.select2-client').select2({
    placeholder: "Select a client",
    allowClear: true,
    dropdownParent: $('#sessionForm'),
    width: '100%'
  });
  
  // Form submission handling
  $('#sessionForm').on('submit', function() {
    // Highlight empty fields
    $('[required]').each(function() {
      if (!$(this).val()) {
        $(this).addClass('error-field');
      }
    });
    
    const submitBtn = $(this).find('button[type="submit"]');
    submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i> Scheduling...');
    submitBtn.prop('disabled', true);
  });
  
  // Clear error highlighting when user starts typing
  $('input, select').on('input change', function() {
    if ($(this).val()) {
      $(this).removeClass('error-field');
    }
  });
  
  // If there's a success message, scroll to it
  <?php if ($success): ?>
    $('html, body').animate({
      scrollTop: $(".alert-success").offset().top - 100
    }, 500);
  <?php endif; ?>
});
</script>
</body>
</html>