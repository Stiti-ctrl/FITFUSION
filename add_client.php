<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

require_once "db.php";
$db = new Database();
$conn = $db->getConnection();

$success = '';
$error = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone'] ?? '');
    $age = isset($_POST['age']) ? (int)$_POST['age'] : null;
    $gender = trim($_POST['gender'] ?? '');
    $weight = isset($_POST['weight']) ? (float)$_POST['weight'] : null;
    $height = isset($_POST['height']) ? (float)$_POST['height'] : null;
    $fitness_level = trim($_POST['fitness_level'] ?? '');
    $medical_conditions = trim($_POST['medical_conditions'] ?? '');
    $goals = trim($_POST['goals'] ?? '');

    // Basic validation
    if (empty($full_name)) {
        $error = "Full name is required";
    } else {
        try {
            // Insert client into database
            $query = "INSERT INTO clients (trainer_id, full_name, email, phone, age, gender, weight, height, fitness_level, medical_conditions, goals) 
                      VALUES (:trainer_id, :full_name, :email, :phone, :age, :gender, :weight, :height, :fitness_level, :medical_conditions, :goals)";
            
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
            $stmt->bindParam(":full_name", $full_name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":age", $age);
            $stmt->bindParam(":gender", $gender);
            $stmt->bindParam(":weight", $weight);
            $stmt->bindParam(":height", $height);
            $stmt->bindParam(":fitness_level", $fitness_level);
            $stmt->bindParam(":medical_conditions", $medical_conditions);
            $stmt->bindParam(":goals", $goals);
            
            if ($stmt->execute()) {
                $success = "Client added successfully!";
                // Clear form if needed
                $_POST = array();
            } else {
                $error = "Error adding client. Please try again.";
            }
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Client | FITFUSION</title>
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
    
    .client-form {
      background-color: white;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }
    
    .required-field::after {
      content: " *";
      color: var(--danger);
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
  </style>
</head>
<body>
  <?php include_once "navbar2.php"; ?>

  <div class="container py-5">
    <!-- Page Header -->
    <div class="page-header">
      <div class="d-flex justify-content-between align-items-center">
        <h1 class="page-title">Add New Client</h1>
        <a href="home.php" class="btn btn-outline-primary">
          <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
        </a>
      </div>
    </div>

    <!-- Success/Error Messages -->
    <?php if ($success): ?>
      <div class="alert alert-success alert-dismissible fade show">
        <?php echo $success; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>
    
    <?php if ($error): ?>
      <div class="alert alert-danger alert-dismissible fade show">
        <?php echo $error; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <!-- Client Form -->
    <div class="client-form">
      <form method="POST" novalidate>
        <div class="mb-3">
          <label class="form-label required-field">Full Name</label>
          <input type="text" class="form-control" name="full_name" value="<?php echo htmlspecialchars($_POST['full_name'] ?? ''); ?>" required>
        </div>
        
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
        </div>
        
        <div class="mb-3">
          <label class="form-label">Phone</label>
          <input type="tel" class="form-control" name="phone" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
        </div>
        
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Age</label>
            <input type="number" class="form-control" name="age" min="18" max="120" value="<?php echo htmlspecialchars($_POST['age'] ?? ''); ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Gender</label>
            <select class="form-select" name="gender">
              <option value="">Select</option>
              <option value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
              <option value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
              <option value="Other" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>
          </div>
        </div>
        
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Weight (kg)</label>
            <input type="number" step="0.1" class="form-control" name="weight" min="30" max="300" value="<?php echo htmlspecialchars($_POST['weight'] ?? ''); ?>">
          </div>
          <div class="col-md-6">
            <label class="form-label">Height (cm)</label>
            <input type="number" step="0.1" class="form-control" name="height" min="100" max="250" value="<?php echo htmlspecialchars($_POST['height'] ?? ''); ?>">
          </div>
        </div>
        
        <div class="mb-3">
          <label class="form-label">Fitness Level</label>
          <select class="form-select" name="fitness_level">
            <option value="">Select</option>
            <option value="Beginner" <?php echo (isset($_POST['fitness_level']) && $_POST['fitness_level'] == 'Beginner') ? 'selected' : ''; ?>>Beginner</option>
            <option value="Intermediate" <?php echo (isset($_POST['fitness_level']) && $_POST['fitness_level'] == 'Intermediate') ? 'selected' : ''; ?>>Intermediate</option>
            <option value="Advanced" <?php echo (isset($_POST['fitness_level']) && $_POST['fitness_level'] == 'Advanced') ? 'selected' : ''; ?>>Advanced</option>
          </select>
        </div>
        
        <div class="mb-3">
          <label class="form-label">Medical Conditions</label>
          <textarea class="form-control" name="medical_conditions" rows="3"><?php echo htmlspecialchars($_POST['medical_conditions'] ?? ''); ?></textarea>
        </div>
        
        <div class="mb-3">
          <label class="form-label">Goals</label>
          <textarea class="form-control" name="goals" rows="3"><?php echo htmlspecialchars($_POST['goals'] ?? ''); ?></textarea>
        </div>
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button type="reset" class="btn btn-secondary me-md-2">Reset</button>
          <button type="submit" class="btn btn-primary">Save Client</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Client-side validation
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        
        form.addEventListener('submit', function(e) {
            // Validate required fields
            const fullName = form.querySelector('[name="full_name"]');
            if (fullName.value.trim() === '') {
                e.preventDefault();
                fullName.classList.add('is-invalid');
                
                // Create error message if it doesn't exist
                if (!fullName.nextElementSibling || !fullName.nextElementSibling.classList.contains('invalid-feedback')) {
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'invalid-feedback';
                    errorDiv.textContent = 'Please enter client\'s full name';
                    fullName.parentNode.insertBefore(errorDiv, fullName.nextSibling);
                }
                
                fullName.focus();
            }
        });
        
        // Remove validation when user starts typing
        const requiredFields = form.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            field.addEventListener('input', function() {
                if (this.value.trim() !== '') {
                    this.classList.remove('is-invalid');
                }
            });
        });
    });
  </script>
</body>
</html>