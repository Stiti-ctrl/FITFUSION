<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: home.php");
    exit;
}

require_once "db.php";
$db = new Database();
$conn = $db->getConnection();

$username = $password = "";
$username_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username exists in POST data
    $username = trim($_POST["username"] ?? "");
    if (empty($username)) {
        $username_err = "Please enter your username.";
    }

    // Check if password exists in POST data
    $password = trim($_POST["password"] ?? "");
    if (empty($password)) {
        $password_err = "Please enter your password.";
    }

    if (empty($username_err) && empty($password_err)) {
        $sql = "SELECT trainer_id, username, password, full_name, email, profile_photo FROM trainers WHERE username = :username OR email = :username";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = $username;
            
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["trainer_id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        $full_name = $row["full_name"];
                        $email = $row["email"];
                        $profile_photo = $row["profile_photo"];
                        
                        if (password_verify($password, $hashed_password)) {
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["trainer_id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["full_name"] = $full_name;
                            $_SESSION["email"] = $email;
                            $_SESSION["profile_photo"] = $profile_photo;
                            
                            header("location: home.php");
                        } else {
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            unset($stmt);
        }
    }
    unset($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FITFUSION | Trainer Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* Same CSS as before, unchanged */
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
      height: 100vh;
      display: flex;
      align-items: center;
    }

    .login-container {
      max-width: 500px;
      width: 100%;
      margin: 0 auto;
      padding: 2rem;
      background: white;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .login-header {
      text-align: center;
      margin-bottom: 2rem;
    }

    .login-header h2 {
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 0.5rem;
    }

    .login-header p {
      color: var(--gray);
    }

    .form-control {
      padding: 0.75rem 1rem;
      border-radius: 8px;
      border: 1px solid #e0e0e0;
      margin-bottom: 1rem;
    }

    .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
    }

    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
      padding: 0.75rem;
      font-weight: 500;
      letter-spacing: 0.5px;
      width: 100%;
    }

    .btn-primary:hover {
      background-color: var(--primary-dark);
      border-color: var(--primary-dark);
    }

    .form-label {
      font-weight: 500;
      color: var(--dark);
      margin-bottom: 0.5rem;
    }

    .login-footer {
      text-align: center;
      margin-top: 1.5rem;
      color: var(--gray);
    }

    .login-footer a {
      color: var(--primary);
      text-decoration: none;
      font-weight: 500;
    }

    .login-footer a:hover {
      text-decoration: underline;
    }

    .input-group-text {
      background-color: var(--primary-light);
      color: var(--primary);
      border: none;
    }

    .alert {
      border-radius: 8px;
    }

    .brand-logo {
      font-weight: 700;
      font-size: 1.8rem;
      color: var(--primary);
      margin-bottom: 1rem;
      display: inline-block;
    }

    .brand-logo i {
      color: var(--primary-dark);
      margin-right: 0.5rem;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-container fade-in">
      <div class="login-header">
        <div class="brand-logo">
          <i class="fas fa-dumbbell"></i>FITFUSION
        </div>
        <h2>Trainer Login</h2>
        <p>Access your trainer dashboard</p>
      </div>

      <?php 
      if (!empty($login_err)) {
          echo '<div class="alert alert-danger">' . $login_err . '</div>';
      }        
      ?>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="mb-3">
          <label class="form-label">Username or Email</label>
          <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
          <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>
        
        <div class="mb-3">
          <label class="form-label">Password</label>
          <div class="input-group">
            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
          </div>
        </div>
        
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="rememberMe">
          <label class="form-check-label" for="rememberMe">Remember me</label>
          <a href="forgot-password.php" class="float-end">Forgot password?</a>
        </div>
        
        <div class="mb-3">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-sign-in-alt me-2"></i> Login
          </button>
        </div>
      </form>
      
      <div class="login-footer">
        <p>Don't have an account? <a href="register.php">Register as Trainer</a></p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>