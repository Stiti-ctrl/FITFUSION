<?php
session_start();
$loggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FITFUSION - Mind • Body • Soul</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<style>
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
<body>
  <!-- Navigation -->
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
            <a class="nav-link" href="adminhomepage.php">Home</a>
          </li>
          <li class="nav-item dropdown mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Services
            </a>
            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
              <li><a class="dropdown-item" href="create_customer.php">Add customer</a></li>
              <li><a class="dropdown-item" href="read_customers.php">View Customer</a></li>
              <li><a class="dropdown-item" href="update_customer.php">Modify Customer</a></li>
              <li><a class="dropdown-item" href="delete_customer.php">Remove customer</a></li>
              <li><a class="dropdown-item" href="create_trainer.php">Add Trainer</a></li>
              <li><a class="dropdown-item" href="read_trainers.php">View Trainer</a></li>
              <li><a class="dropdown-item" href="update_trainer.php">Modify Trainer</a></li>
              <li><a class="dropdown-item" href="delete_trainer.php">Remove Trainer</a></li>
              <li><a class="dropdown-item" href="adminlogout.php">Logout</a></li>
            </ul>
          </li>
          <li class="nav-item mx-1">
            <!-- <a class="nav-link" href="how-it-works.php">How It Works</a> -->
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link" href="a_adminstories.php">Healing Stories</a>
          </li>
        </ul>
        <div class="d-flex ms-lg-3 mt-3 mt-lg-0">
        <!-- <a href="createprofile.php" class="btn btn-primary me-2">Profile</a> -->
        <a href="adminlogout.php" class="btn btn-outline-secondary">Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="fw-bold mb-3">Welcome!<br>You can now start your work.</h1>
          <!-- <p class="lead mb-4">AI-powered physiotherapy and yoga for holistic healing</p> -->
          <div class="d-flex gap-3">
            <a href="read_customers.php" class="btn btn-primary btn-lg px-4">Know your FitFam</a>
            <!-- <a href="learn-more.php" class="btn btn-outline-primary btn-lg px-4">Learn More</a> -->
          </div>
        </div>
        <div class="col-md-6 text-center">
          <img src="https://images.unsplash.com/photo-1545205597-3d9d02c29597?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
               alt="Yoga Pose" 
               class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>
 <!-- Services Section -->
 <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Services</h2>
        <p class="lead">Comprehensive wellness solutions for your mind, body and soul</p>
      </div>
      <div class="row g-4">
        <!-- Yoga Service -->
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0 shadow-sm">
            <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Yoga">
            <div class="card-body text-center p-4">
              <h4>Yoga</h4>
              <p>Improve flexibility, strength and mental clarity with our personalized yoga sessions</p>
              <!-- <a href="yoga.php" class="btn btn-outline-primary mt-3">Explore Yoga</a> -->
            </div>
          </div>
        </div>
        <!-- Meditation Service -->
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0 shadow-sm">
            <img src="https://images.unsplash.com/photo-1530026186672-2cd00ffc50fe?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Meditation">
            <div class="card-body text-center p-4">
              <h4>Meditation</h4>
              <p>Reduce stress and enhance mindfulness with guided meditation techniques</p>
              <!-- <a href="meditation.php" class="btn btn-outline-primary mt-3">Explore Meditation</a> -->
            </div>
          </div>
        </div>
        <!-- Workout Service -->
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0 shadow-sm">
            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Workout">
            <div class="card-body text-center p-4">
              <h4>Workout</h4>
              <p>Customized workout plans to build strength and endurance at your own pace</p>
              <!-- <a href="workout.php" class="btn btn-outline-primary mt-3">Explore Workouts</a> -->
            </div>
          </div>
        </div>
        <!-- Diet Plan Service -->
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0 shadow-sm">
            <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Diet Plan">
            <div class="card-body text-center p-4">
              <h4>Diet Plan</h4>
              <p>Personalized nutrition plans to complement your fitness journey</p>
              <!-- <a href="diet-plan.php" class="btn btn-outline-primary mt-3">Explore Diet Plans</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Why Choose FITFUSION?</h2>
      </div>
      <div class="row g-4">
        <!-- Feature 1 -->
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
              <i class="fas fa-user-md text-primary fs-1 mb-3"></i>
              <h4>Certified Experts</h4>
              <p>Our therapists are certified and have minimum 5 years experience</p>
            </div>
          </div>
        </div>
        <!-- Feature 2 -->
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
              <i class="fas fa-laptop-medical text-primary fs-1 mb-3"></i>
              <h4>Advanced Technology</h4>
              <p>Advanced posture analysis and movement tracking</p>
            </div>
          </div>
        </div>
        <!-- Feature 3 -->
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
              <i class="fas fa-calendar-alt text-primary fs-1 mb-3"></i>
              <h4>Flexible Scheduling</h4>
              <p>Book sessions at your convenience, 24/7 availability</p>
            </div>
          </div>
        </div>
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
            <li class="mb-2"><a href="adminhomepage.php" class="text-white">Home</a></li>
            <li class="mb-2"><a href="read_customers.php" class="text-white">services</a></li>
            <!-- <li class="mb-2"><a href="how-it-works.php" class="text-white">How It Works</a></li> -->
            <li><a href="a_adminstories.php" class="text-white">Healing Stories</a></li>
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
            <button class="btn btn-primary" type="button" style="padding: 8px 20px;">Subscribe</button>
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