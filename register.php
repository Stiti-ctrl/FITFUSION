<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

require_once "db.php";
$db = new Database();
$conn = $db->getConnection();

// Initialize variables
$username = $full_name = $email = $phone = $password = $confirm_password = $specialization = $experience = $bio = "";
$username_err = $full_name_err = $email_err = $phone_err = $password_err = $confirm_password_err = $specialization_err = $experience_err = $bio_err = "";
$registration_success = false;
$registration_failed = false;

// Specialization options
$specialization_options = [
    "" => "Select Specialization",
    "Weight Loss" => "Weight Loss",
    "Bodybuilding" => "Bodybuilding",
    "Yoga" => "Yoga",
    "Pilates" => "Pilates",
    "CrossFit" => "CrossFit",
    "Functional Training" => "Functional Training",
    "Sports Specific" => "Sports Specific",
    "Senior Fitness" => "Senior Fitness",
    "Rehabilitation" => "Rehabilitation",
    "Nutrition" => "Nutrition"
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        $sql = "SELECT trainer_id FROM trainers WHERE username = :username";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);
            
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            unset($stmt);
        }
    }

    // Validate full name
    if (empty(trim($_POST["full_name"]))) {
        $full_name_err = "Please enter your full name.";
    } else {
        $full_name = trim($_POST["full_name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email address.";
    } else {
        $sql = "SELECT trainer_id FROM trainers WHERE email = :email";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $param_email = trim($_POST["email"]);
            
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    $email_err = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            unset($stmt);
        }
    }

    // Validate phone (optional)
    if (!empty(trim($_POST["phone"]))) {
        if (!preg_match('/^[0-9]{10,15}$/', trim($_POST["phone"]))) {
            $phone_err = "Please enter a valid phone number.";
        } else {
            $phone = trim($_POST["phone"]);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";     
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";     
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Validate specialization
    if (!empty($_POST["specialization"])) {
        $specialization = trim($_POST["specialization"]);
        if (!array_key_exists($specialization, $specialization_options)) {
            $specialization_err = "Please select a valid specialization.";
        }
    }

    // Validate experience
    if (!empty($_POST["experience"])) {
        $experience = trim($_POST["experience"]);
        if (!is_numeric($experience) || $experience < 0 || $experience > 50) {
            $experience_err = "Please enter a valid experience between 0 and 50 years.";
        }
    }

    // Validate bio
    if (!empty($_POST["bio"])) {
        $bio = trim($_POST["bio"]);
        if (strlen($bio) > 500) {
            $bio_err = "Bio cannot exceed 500 characters.";
        }
    }

    // Check if terms checkbox is checked
    if (!isset($_POST["terms"])) {
        $terms_err = "You must agree to the terms and conditions.";
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($full_name_err) && empty($email_err) && 
        empty($password_err) && empty($confirm_password_err) && empty($specialization_err) &&
        empty($experience_err) && empty($bio_err) && empty($terms_err)) {
        
        $sql = "INSERT INTO trainers (username, password, full_name, email, phone, specialization, experience, bio, 
                email_notifications, sms_notifications, app_notifications, reminder_time) 
                VALUES (:username, :password, :full_name, :email, :phone, :specialization, :experience, :bio, 
                1, 0, 1, 30)";
         
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $stmt->bindParam(":full_name", $param_full_name, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":phone", $param_phone, PDO::PARAM_STR);
            $stmt->bindParam(":specialization", $param_specialization, PDO::PARAM_STR);
            $stmt->bindParam(":experience", $param_experience, PDO::PARAM_INT);
            $stmt->bindParam(":bio", $param_bio, PDO::PARAM_STR);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_full_name = $full_name;
            $param_email = $email;
            $param_phone = $phone;
            $param_specialization = $specialization;
            $param_experience = $experience ? (int)$experience : NULL;
            $param_bio = $bio;
            
            if ($stmt->execute()) {
                $registration_success = true;
                // Clear form fields
                $username = $full_name = $email = $phone = $password = $confirm_password = $specialization = $experience = $bio = "";
            } else {
                $registration_failed = true;
            }
            unset($stmt);
        }
    } else {
        $registration_failed = true;
    }
    unset($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FITFUSION | Trainer Registration</title>
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
      min-height: 100vh;
      display: flex;
      align-items: center;
      background-image: url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      position: relative;
    }

    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 0;
    }

    .register-container {
      max-width: 650px;
      width: 95%;
      margin: 2rem auto;
      padding: 2rem;
      background: rgba(255, 255, 255, 0.97);
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      position: relative;
      z-index: 1;
    }

    .register-header {
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .register-header h2 {
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 0.5rem;
      font-size: 1.8rem;
    }

    .register-header p {
      color: var(--gray);
      font-size: 0.95rem;
    }

    /* Input Group Styling */
    .input-group {
      align-items: stretch;
    }

    .input-group-text {
      background-color: var(--primary-light);
      color: var(--primary);
      border: 1px solid #e0e0e0;
      border-right: none;
      border-radius: 8px 0 0 8px !important;
      width: 45px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0;
    }

    .form-control {
      height: 45px;
      padding: 0.6rem 0.8rem;
      border-radius: 0 8px 8px 0 !important;
      border: 1px solid #e0e0e0;
      border-left: none;
      font-size: 0.9rem;
    }

    .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 0.2rem rgba(108, 99, 255, 0.25);
    }

    /* Special case for inputs without icons */
    .no-icon-input {
      border-radius: 8px !important;
      border: 1px solid #e0e0e0;
    }

    /* Textarea specific styling */
    textarea.form-control {
      height: auto;
      min-height: 100px;
      border-radius: 8px !important;
      border: 1px solid #e0e0e0;
    }

    /* Button styling */
    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
      padding: 0.65rem;
      font-weight: 500;
      letter-spacing: 0.5px;
      width: 100%;
      font-size: 0.95rem;
      height: 45px;
    }

    .btn-primary:hover {
      background-color: var(--primary-dark);
      border-color: var(--primary-dark);
    }

    /* Form label styling */
    .form-label {
      font-weight: 500;
      color: var(--dark);
      margin-bottom: 0.4rem;
      font-size: 0.9rem;
    }

    /* Footer styling */
    .register-footer {
      text-align: center;
      margin-top: 1.2rem;
      color: var(--gray);
      font-size: 0.9rem;
    }

    .register-footer a {
      color: var(--primary);
      text-decoration: none;
      font-weight: 500;
    }

    .register-footer a:hover {
      text-decoration: underline;
    }

    /* Error message styling */
    .invalid-feedback {
      font-size: 0.8rem;
      margin-top: -0.5rem;
      margin-bottom: 0.5rem;
    }

    /* Brand logo styling */
    .brand-logo {
      font-weight: 700;
      font-size: 1.6rem;
      color: var(--primary);
      margin-bottom: 0.8rem;
      display: inline-block;
    }

    .brand-logo i {
      color: var(--primary-dark);
      margin-right: 0.5rem;
    }

    /* Password strength meter */
    .password-strength {
      height: 4px;
      background-color: #e9ecef;
      border-radius: 3px;
      margin: 0.3rem 0 0.8rem;
      overflow: hidden;
    }

    .password-strength-bar {
      height: 100%;
      width: 0%;
      transition: width 0.3s ease;
    }

    .strength-weak {
      background-color: #dc3545;
    }

    .strength-medium {
      background-color: #ffc107;
    }

    .strength-strong {
      background-color: #28a745;
    }

    /* Helper text */
    .text-muted {
      font-size: 0.8rem;
    }

    /* Terms checkbox */
    .form-check-label {
      font-size: 0.85rem;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .register-container {
        margin: 1rem auto;
        padding: 1.5rem;
      }
      
      .register-header h2 {
        font-size: 1.5rem;
      }
      
      .form-control, .btn-primary {
        height: 42px;
      }
    }
  
    .alert-success {
      background-color: var(--primary-light);
      border-color: var(--primary);
      color: var(--primary-dark);
    }
    
    /* Error message styling */
    .alert-danger {
      background-color: #f8d7da;
      border-color: #f5c6cb;
      color: #721c24;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="register-container fade-in">
      <div class="register-header">
        <div class="brand-logo">
          <i class="fas fa-dumbbell"></i>FITFUSION
        </div>
        <h2>Trainer Registration</h2>
        <p>Create your trainer account</p>
      </div>

      <!-- Success Message -->
      <?php if ($registration_success): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Registration successful!</strong> You can now login with your credentials.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <!-- Error Message -->
      <?php if ($registration_failed && ($_SERVER["REQUEST_METHOD"] == "POST")): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Registration failed!</strong> Please correct the errors in the form and try again.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="row">
          <!-- Username Field -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Username *</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
              <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($username); ?>">
            </div>
            <?php if (!empty($username_err)): ?>
              <span class="invalid-feedback d-block"><?php echo $username_err; ?></span>
            <?php endif; ?>
            <small class="text-muted">This will be your login name</small>
          </div>
          
          <!-- Full Name Field -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Full Name *</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-id-card"></i></span>
              <input type="text" name="full_name" class="form-control <?php echo (!empty($full_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($full_name); ?>">
            </div>
            <?php if (!empty($full_name_err)): ?>
              <span class="invalid-feedback d-block"><?php echo $full_name_err; ?></span>
            <?php endif; ?>
          </div>
          
          <!-- Email Field -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Email Address *</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($email); ?>">
            </div>
            <?php if (!empty($email_err)): ?>
              <span class="invalid-feedback d-block"><?php echo $email_err; ?></span>
            <?php endif; ?>
          </div>
          
          <!-- Phone Field -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Phone Number</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-phone"></i></span>
              <input type="tel" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($phone); ?>">
            </div>
            <?php if (!empty($phone_err)): ?>
              <span class="invalid-feedback d-block"><?php echo $phone_err; ?></span>
            <?php endif; ?>
            <small class="text-muted">Optional</small>
          </div>
          
          <!-- Password Field -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Password *</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
              <input type="password" name="password" id="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($password); ?>">
            </div>
            <div class="password-strength">
              <div class="password-strength-bar" id="password-strength-bar"></div>
            </div>
            <?php if (!empty($password_err)): ?>
              <span class="invalid-feedback d-block"><?php echo $password_err; ?></span>
            <?php endif; ?>
            <small class="text-muted">At least 6 characters</small>
          </div>
          
          <!-- Confirm Password Field -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Confirm Password *</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
              <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($confirm_password); ?>">
            </div>
            <?php if (!empty($confirm_password_err)): ?>
              <span class="invalid-feedback d-block"><?php echo $confirm_password_err; ?></span>
            <?php endif; ?>
          </div>
          
          <!-- Specialization Field -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Specialization</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-dumbbell"></i></span>
              <select name="specialization" class="form-control <?php echo (!empty($specialization_err)) ? 'is-invalid' : ''; ?>">
                <?php foreach ($specialization_options as $value => $label): ?>
                  <option value="<?php echo htmlspecialchars($value); ?>" <?php echo ($specialization == $value) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($label); ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <?php if (!empty($specialization_err)): ?>
              <span class="invalid-feedback d-block"><?php echo $specialization_err; ?></span>
            <?php endif; ?>
          </div>
          
          <!-- Experience Field -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Years of Experience</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
              <input type="number" name="experience" class="form-control <?php echo (!empty($experience_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($experience); ?>" min="0" max="50">
            </div>
            <?php if (!empty($experience_err)): ?>
              <span class="invalid-feedback d-block"><?php echo $experience_err; ?></span>
            <?php endif; ?>
            <small class="text-muted">Optional</small>
          </div>
          
          <!-- Bio Field -->
          <div class="col-12 mb-3">
            <label class="form-label">Bio/About You</label>
            <textarea name="bio" class="form-control no-icon-input <?php echo (!empty($bio_err)) ? 'is-invalid' : ''; ?>" rows="3"><?php echo htmlspecialchars($bio); ?></textarea>
            <?php if (!empty($bio_err)): ?>
              <span class="invalid-feedback d-block"><?php echo $bio_err; ?></span>
            <?php endif; ?>
            <small class="text-muted">Tell us about yourself (max 500 characters)</small>
          </div>
        </div>
        
        <!-- Terms Checkbox -->
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input <?php echo (!empty($terms_err)) ? 'is-invalid' : ''; ?>" id="termsCheck" name="terms" <?php echo (isset($_POST['terms'])) ? 'checked' : ''; ?> required>
          <label class="form-check-label" for="termsCheck">I agree to the <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a></label>
          <?php if (!empty($terms_err)): ?>
            <span class="invalid-feedback d-block"><?php echo $terms_err; ?></span>
          <?php endif; ?>
        </div>
        
        <!-- Submit Button -->
        <div class="mb-3">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-user-plus me-2"></i> Register
          </button>
        </div>
      </form>
      
      <!-- Login Link -->
      <div class="register-footer">
        <p>Already have an account? <a href="login.php">Login here</a></p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const passwordInput = document.getElementById('password');
      const strengthBar = document.getElementById('password-strength-bar');
      
      passwordInput.addEventListener('input', function() {
        const password = this.value;
        let strength = 0;
        
        // Check password length
        if (password.length >= 6) strength += 1;
        if (password.length >= 8) strength += 1;
        
        // Check for mixed case
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1;
        
        // Check for numbers
        if (password.match(/([0-9])/)) strength += 1;
        
        // Check for special chars
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;
        
        // Update the strength bar
        switch(strength) {
          case 0:
            strengthBar.style.width = '0%';
            strengthBar.className = 'password-strength-bar';
            break;
          case 1:
            strengthBar.style.width = '20%';
            strengthBar.className = 'password-strength-bar strength-weak';
            break;
          case 2:
            strengthBar.style.width = '40%';
            strengthBar.className = 'password-strength-bar strength-weak';
            break;
          case 3:
            strengthBar.style.width = '60%';
            strengthBar.className = 'password-strength-bar strength-medium';
            break;
          case 4:
            strengthBar.style.width = '80%';
            strengthBar.className = 'password-strength-bar strength-medium';
            break;
          case 5:
            strengthBar.style.width = '100%';
            strengthBar.className = 'password-strength-bar strength-strong';
            break;
        }
      });
    });
  </script>
</body>
</html>