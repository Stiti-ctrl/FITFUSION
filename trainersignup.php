<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up | FITFUSION - Dietician/Trainer</title>

  <!-- CSS & fonts -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">

  <style>
    .auth-container {
      max-width: 500px;
      margin: 0 auto;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      background: #fff;
    }
    .auth-hero {
      background: linear-gradient(135deg, #6C63FF 0%, #4FD1C5 100%);
      color: #fff;
      border-radius: 15px;
    }
    .btn-pill { border-radius: 50px !important; padding: 0.5rem 1.5rem; }
    .btn-social { width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; }
  </style>
</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container">
      <a class="navbar-brand fw-bold" href="frontpage.php" style="color:#6C63FF;">
        <i class="fas fa-spa me-2"></i>FITFUSION
      </a>
      <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mx-1"><a class="nav-link" href="frontpage.php">Home</a></li>
          <li class="nav-item dropdown mx-1">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">Services</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="yoga.php">Yoga</a></li>
              <li><a class="dropdown-item" href="meditation.php">Meditation</a></li>
              <li><a class="dropdown-item" href="workout.php">Workout</a></li>
              <li><a class="dropdown-item" href="diet-plan.php">Diet Plan</a></li>
              <li><a class="dropdown-item" href="physiotherapy.php">Physiotherapy</a></li>
              <li><a class="dropdown-item" href="seniorwellness.php">Senior Wellness</a></li>
            </ul>
          </li>
          <li class="nav-item mx-1"><a class="nav-link" href="how-it-workss.php">How It Works</a></li>
          <li class="nav-item mx-1"><a class="nav-link" href="stories1.php">Healing Stories</a></li>
        </ul>
        <div class="d-flex ms-lg-3 mt-3 mt-lg-0">
          <a href="trainersignin.php" class="btn btn-outline-primary btn-pill me-2">Sign In</a>
          <a href="trainersignup.php" class="btn btn-primary btn-pill">Sign Up</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <section class="py-5">
    <div class="container">
      <div class="row align-items-center">
        <!-- Left hero -->
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="auth-hero p-5 text-center">
            <h2 class="fw-bold mb-4">Join Us, Dietician/Trainer!</h2>
            <p class="mb-4">Be part of our wellness community and help others achieve their fitness goals</p>
            <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=400&q=80"
                 alt="Trainer helping client"
                 class="img-fluid rounded">
          </div>
        </div>

        <!-- Sign‑up form -->
        <div class="col-lg-6">
          <div class="auth-container">
            <h2 class="fw-bold mb-4 text-center">Sign Up</h2>

            <form>
              <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your full name" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
              </div>

              <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password"
                       placeholder="Confirm your password" required>
              </div>

              <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" required>
              </div>

              <!-- ✅ Date of Birth with validation -->
              <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date"
                       class="form-control"
                       id="dob"
                       name="dob"
                       required
                       max="">
              </div>

              <button type="submit" class="btn btn-primary w-100 py-2 mb-3 rounded-pill">Sign Up</button>

              <div class="text-center mb-3"><p class="mb-0">Or sign up with</p></div>

              <div class="d-flex justify-content-center gap-3 mb-4">
                <button type="button" class="btn btn-outline-primary rounded-circle btn-social"><i class="fab fa-google"></i></button>
                <button type="button" class="btn btn-outline-primary rounded-circle btn-social"><i class="fab fa-facebook-f"></i></button>
                <button type="button" class="btn btn-outline-primary rounded-circle btn-social"><i class="fab fa-apple"></i></button>
              </div>

              <div class="text-center">
                <p>Already have an account? <a href="signin.php" class="fw-bold text-decoration-none">Sign In</a></p>
              </div>
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
        <div class="col-md-4 mb-4"><h5>FITFUSION</h5><p>Your holistic wellness partner for mind, body and soul.</p></div>
        <div class="col-md-2 mb-4">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="frontpage.php" class="text-white">Home</a></li>
            <li><a href="yoga.php" class="text-white">Online Yoga</a></li>
            <li><a href="how-it-workss.php" class="text-white">How It Works</a></li>
            <li><a href="stories1.php" class="text-white">Healing Stories</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-4">
          <h5>Contact Us</h5>
          <ul class="list-unstyled">
            <li><i class="fas fa-phone-alt me-2"></i> +91 9876543210</li>
            <li><i class="fas fa-envelope me-2"></i> hello@fitfusion.com</li>
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
      <div class="text-center"><p class="mb-0">© 2023 FITFUSION. All rights reserved.</p></div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- DOB validation script -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const dob  = document.getElementById("dob");
      const form = document.querySelector("form");

      // prevent picking a future date
      dob.max = new Date().toISOString().split("T")[0];

      // optional: ensure user is 18+
      form.addEventListener("submit", e => {
        const birth = new Date(dob.value);
        const age = new Date().getFullYear() - birth.getFullYear();
        if (age < 18) {
          e.preventDefault();
          alert("You must be at least 18 years old to sign up.");
          dob.focus();
        }
      });
    });
  </script>
</body>
</html>
