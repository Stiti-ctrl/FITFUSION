<?php
session_start();
include 'dbconnectadmin.php'; // this must connect to fitness_db

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // 1. Hardcoded admin login
    if ($email === 'admin123@gmail.com' && $password === 'admin123') {
        $_SESSION['admin'] = $email;
        session_regenerate_id(true);
        header("Location: adminhomepage.php");
        exit();
    }

    // 2. Check against fitness_db.customer
    try {
        $stmt = $pdo->prepare("SELECT * FROM customer WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $email;
            session_regenerate_id(true);
            header("Location: createprofile.php");
            exit();
        } else {
            $error_message = "Incorrect email or password.";
        }
    } catch (PDOException $e) {
        $error_message = "Database error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign In | FITFUSION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link rel="stylesheet" href="styles.css"/>
  <style>
    .auth-container {
      max-width: 500px;
      margin: 0 auto;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      background: white;
    }
    .auth-hero {
      background: linear-gradient(135deg, #6C63FF 0%, #4FD1C5 100%);
      color: white;
      border-radius: 15px;
    }
    .btn-pill {
      border-radius: 50px !important;
      padding-left: 1.5rem;
      padding-right: 1.5rem;
    }
    .btn-social {
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container">
      <a class="navbar-brand fw-bold" href="adminhomepage.php" style="color: #6C63FF;">
        <i class="fas fa-spa me-2"></i>FITFUSION
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mx-1">
            <a class="nav-link" href="beforeadminhomepage.php">Home</a>
          </li>
          <li class="nav-item mx-1">
            <!-- <a class="nav-link" href="how-it-workss.php">Your Works</a> -->
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link" href="adminstories.php">Healing Stories</a>
          </li>
        </ul>
        <div class="d-flex ms-lg-3 mt-3 mt-lg-0">
          <a href="signinadmin.php" class="btn btn-outline-primary btn-pill me-2">Sign In</a>
          <!-- <a href="signup.php" class="btn btn-primary btn-pill">Sign Up</a> -->
        </div>
      </div>
    </div>
  </nav>

  <!-- Sign-in Section -->
  <section class="py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="auth-hero p-5 text-center">
            <h2 class="fw-bold mb-4">Welcome Back Admin!</h2>
            
            <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" alt="Yoga" class="img-fluid rounded"/>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="auth-container">
            <h2 class="fw-bold mb-4 text-center">Sign In</h2>

            <!-- Display error message if it exists -->
            <?php if (!empty($error_message)): ?>
              <div class="alert alert-danger text-center fw-bold">
                <?= htmlspecialchars($error_message); ?>
              </div>
            <?php endif; ?>

            <form action="signinadmin.php" method="POST">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required placeholder="Enter user email">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required placeholder="Enter user password">
    </div>

    <button type="submit" class="btn btn-primary w-100 py-2 mb-3 rounded-pill">Sign in</button>
</form>


          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4">
          <h5>FITFUSION</h5>
          <p>Your holistic wellness partner for mind, body and soul.</p>
        </div>
        <div class="col-md-2 mb-4">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="beforeadminhomepage.php" class="text-white">Home</a></li>
            <!-- <li><a href="how-it-workss.php" class="text-white">How It Works</a></li> -->
            <li><a href="adminstories.php" class="text-white">Healing Stories</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-4">
          <h5>Contact Us</h5>
          <ul class="list-unstyled">
            <li><i class="fas fa-phone-alt me-2"></i>+91 9876543210</li>
            <li><i class="fas fa-envelope me-2"></i>hello@fitfusion.com</li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Newsletter</h5>
          <div class="input-group">
            <input type="email" class="form-control" placeholder="Your email">
            <button class="btn btn-primary rounded-pill" type="button">Subscribe</button>
          </div>
        </div>
      </div>
      <hr class="my-4 bg-light">
      <div class="text-center">
        <p>© 2023 FITFUSION. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
