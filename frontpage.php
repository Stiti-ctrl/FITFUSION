<?php
require_once "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FITFUSION - Mind • Body • Soul</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    :root {
      --primary: #6C63FF;
      --primary-dark: #4D44DB;
      --white: #ffffff;
      --dark: #343a40;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      color: #333;
    }
    
    /* Button Styles */
    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
      padding: 10px 25px;
      border-radius: 50px;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
      background-color: var(--primary-dark);
      border-color: var(--primary-dark);
      transform: translateY(-2px);
    }
    
    .btn-outline-primary {
      color: var(--primary);
      border-color: var(--primary);
      padding: 10px 25px;
      border-radius: 50px;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .btn-outline-primary:hover {
      background-color: var(--primary);
      color: var(--white);
      transform: translateY(-2px);
    }
    
    /* Card Styles */
    .card {
      border: none;
      border-radius: 10px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    /* Hero Section */
    .hero-section {
      padding: 100px 0;
      background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
    }
    
    /* Floating Admin Button */
    .admin-float-btn {
      position: fixed;
      bottom: 30px;
      right: 30px;
      width: 60px;
      height: 60px;
      background-color: var(--primary);
      color: var(--white);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      box-shadow: 0 4px 12px rgba(108, 99, 255, 0.3);
      z-index: 1000;
      transition: all 0.3s ease;
      text-decoration: none;
    }
    
    .admin-float-btn:hover {
      background-color: var(--primary-dark);
      color: var(--white);
      transform: translateY(-5px) scale(1.1);
      box-shadow: 0 6px 16px rgba(108, 99, 255, 0.4);
    }
    
    .admin-float-btn .tooltip {
      visibility: hidden;
      width: 120px;
      background-color: var(--dark);
      color: var(--white);
      text-align: center;
      border-radius: 6px;
      padding: 5px;
      position: absolute;
      z-index: 1;
      bottom: 125%;
      left: 50%;
      margin-left: -60px;
      opacity: 0;
      transition: opacity 0.3s;
      font-size: 14px;
    }
    
    .admin-float-btn:hover .tooltip {
      visibility: visible;
      opacity: 1;
    }
  </style>
</head>
<body>

  <!-- Floating Admin Login Button -->
  <a href="signinadmin.php" class="admin-float-btn">
    <i class="fas fa-user-shield"></i>
    <span class="tooltip">Admin Login</span>
  </a>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="fw-bold mb-3 display-4">Transform Your Wellness Journey</h1>
          <p class="lead mb-4">AI-powered physiotherapy and yoga for holistic healing</p>
          <div class="d-flex gap-3">
            <a href="learn-more.php" class="btn btn-outline-primary btn-lg px-4">Learn More</a>
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
            <li class="mb-2"><a href="frontpage.php" class="text-white">Home</a></li>
            <li class="mb-2"><a href="how-it-works.php" class="text-white">How It Works</a></li>
            <li><a href="stories1.php" class="text-white">Healing Stories</a></li>
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