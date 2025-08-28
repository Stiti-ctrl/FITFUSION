<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learn More | FITFUSION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    .feature-icon {
      width: 60px;
      height: 60px;
      background-color: rgba(108, 99, 255, 0.1);
      color: #6C63FF;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }
    .comparison-table th {
      background-color: #f8f9fa;
    }
    /* Button Styles */
.btn-primary {
  background-color: #6C63FF;
  border-color: #6C63FF;
  padding: 10px 25px;
  border-radius: 50px;
  font-weight: 600;
  transition: all 0.3s ease;
}

.btn-primary:hover {
  background-color: #4D44DB;
  border-color: #4D44DB;
  transform: translateY(-2px);
}

.btn-outline-primary {
  color: #6C63FF;
  border-color: #6C63FF;
  padding: 10px 25px;
  border-radius: 50px;
  font-weight: 600;
  transition: all 0.3s ease;
}

.btn-outline-primary:hover {
  background-color: #6C63FF;
  color: white;
  transform: translateY(-2px);
}
  </style>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php" style="color: #6C63FF;">
        <i class="fas fa-spa me-2"></i>FITFUSION
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mx-1">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Services
            </a>
            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
              <li><a class="dropdown-item" href="yoga.php">Yoga</a></li>
              <li><a class="dropdown-item" href="meditation.php">Meditation</a></li>
              <li><a class="dropdown-item" href="workout.php">Workout</a></li>
              <li><a class="dropdown-item" href="diet-plan.php">Diet Plan</a></li>
              <li><a class="dropdown-item" href="physiotherapy.php">Physiotherapy</a></li>
              <li><a class="dropdown-item" href="seniorwellness.php">Senior Wellness</a></li>
            </ul>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link" href="how-it-works.php">How It Works</a>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link" href="stories.php">Healing Stories</a>
          </li>
        </ul>
        <div class="d-flex ms-lg-3 mt-3 mt-lg-0">
          <a href="signin.php" class="btn btn-outline-primary me-2">Sign In</a>
          <a href="signup.php" class="btn btn-primary">Sign Up</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h1 class="fw-bold mb-3">Discover FITFUSION</h1>
        <p class="lead">Your complete guide to holistic wellness</p>
      </div>

      <!-- Benefits Section -->
      <div class="row g-4 mb-5">
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
              <div class="feature-icon mx-auto">
                <i class="fas fa-heartbeat"></i>
              </div>
              <h4>Physical Wellness</h4>
              <p>Improve flexibility, strength, and mobility with personalized exercise programs</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
              <div class="feature-icon mx-auto">
                <i class="fas fa-brain"></i>
              </div>
              <h4>Mental Health</h4>
              <p>Reduce stress and anxiety through mindfulness and meditation practices</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
              <div class="feature-icon mx-auto">
                <i class="fas fa-balance-scale"></i>
              </div>
              <h4>Lifestyle Balance</h4>
              <p>Create sustainable habits for long-term health and happiness</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Comparison Section -->
      <div class="card border-0 shadow-sm mb-5">
        <div class="card-body p-4">
          <h3 class="text-center mb-4">Why Choose FITFUSION?</h3>
          <div class="table-responsive">
            <table class="table comparison-table">
              <thead>
                <tr>
                  <th scope="col">Feature</th>
                  <th scope="col">FITFUSION</th>
                  <th scope="col">Traditional Therapy</th>
                  <th scope="col">Generic Apps</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Personalized Plans</th>
                  <td><i class="fas fa-check text-success"></i></td>
                  <td><i class="fas fa-check text-success"></i></td>
                  <td><i class="fas fa-times text-danger"></i></td>
                </tr>
                <tr>
                  <th scope="row">Live Expert Guidance</th>
                  <td><i class="fas fa-check text-success"></i></td>
                  <td><i class="fas fa-check text-success"></i></td>
                  <td><i class="fas fa-times text-danger"></i></td>
                </tr>
                <tr>
                  <th scope="row">AI Technology</th>
                  <td><i class="fas fa-check text-success"></i></td>
                  <td><i class="fas fa-times text-danger"></i></td>
                  <td><i class="fas fa-check text-success"></i></td>
                </tr>
                <tr>
                  <th scope="row">Progress Tracking</th>
                  <td><i class="fas fa-check text-success"></i></td>
                  <td><i class="fas fa-times text-danger"></i></td>
                  <td><i class="fas fa-check text-success"></i></td>
                </tr>
                <tr>
                  <th scope="row">Cost</th>
                  <td>$$</td>
                  <td>$$$</td>
                  <td>$</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- CTA Section -->
      <div class="text-center bg-light p-5 rounded-3">
        <h3 class="mb-4">Ready to Transform Your Health?</h3>
        <p class="mb-4">Join thousands of happy clients on their wellness journey</p>
        <a href="signup.php" class="btn btn-primary btn-lg px-5 me-3">Start Free Trial</a>
        <a href="how-it-works.php" class="btn btn-outline-primary btn-lg px-5">How It Works</a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4 mb-md-0">
          <h5 class="mb-3">FITFUSION</h5>
          <p>Your holistic wellness partner for mind, body and soul.</p>
        </div>
        <div class="col-md-2 mb-4 mb-md-0">
          <h5 class="mb-3">Quick Links</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="index.php" class="text-white">Home</a></li>
            
            <li class="mb-2"><a href="how-it-works.php" class="text-white">How It Works</a></li>
            <li><a href="stories.php" class="text-white">Healing Stories</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-4 mb-md-0">
          <h5 class="mb-3">Contact Us</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="fas fa-phone-alt me-2"></i> +91 9876543210</li>
            <li class="mb-2"><i class="fas fa-envelope me-2"></i> hello@fitfusion.com</li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5 class="mb-3">Newsletter</h5>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Your email">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div>
        </div>
      </div>
      <hr class="my-4 bg-light">
      <div class="text-center">
        <p class="mb-0">© 2023 FITFUSION. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>