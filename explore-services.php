<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Explore Services | FITFUSION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-color: #6C63FF;
      --secondary-color: #4D44DB;
      --light-color: #F8F9FA;
      --dark-color: #212529;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
    }
    
    .service-hero {
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                  url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 120px 0;
      text-align: center;
    }
    
    .service-card {
      border-radius: 12px;
      overflow: hidden;
      transition: all 0.3s ease;
      border: none;
      margin-bottom: 30px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    
    .service-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    
    .service-card .card-img-top {
      height: 200px;
      object-fit: cover;
    }
    
    .service-card .card-body {
      padding: 25px;
    }
    
    .service-icon {
      font-size: 2.5rem;
      margin-bottom: 15px;
      color: var(--primary-color);
    }
    
    .benefit-item {
      margin-bottom: 15px;
    }
    
    .benefit-item i {
      color: var(--primary-color);
      margin-right: 10px;
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
  <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="frontpage.php" style="color: var(--primary-color);">
        <i class="fas fa-spa me-2"></i>FITFUSION
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mx-1">
            <a class="nav-link" href="frontpage.php">Home</a>
          </li>
          <li class="nav-item dropdown mx-1">
            <a class="nav-link dropdown-toggle active" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <a class="nav-link" href="how-it-workss.php">How It Works</a>
          </li>
          <li class="nav-item mx-1">
            <a class="nav-link" href="stories1.php">Success Stories</a>
          </li>
        </ul>
        <div class="d-flex ms-lg-3 mt-3 mt-lg-0">
          <a href="signin.php" class="btn btn-outline-primary me-2">Sign In</a>
          <a href="signup.php" class="btn btn-primary">Sign Up</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="service-hero">
    <div class="container">
      <h1 class="display-4 fw-bold mb-3">Explore Our Services</h1>
      <p class="lead mb-4">Holistic wellness solutions for mind, body and soul</p>
      <a href="#services" class="btn btn-primary btn-lg px-4">View All Services</a>
    </div>
  </section>

  <!-- All Services Section -->
  <section id="services" class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Wellness Services</h2>
        <p class="lead text-muted">Comprehensive programs tailored to your needs</p>
      </div>
      
      <div class="row">
        <!-- Yoga Service -->
        <div class="col-lg-6 mb-4">
          <div class="service-card card h-100">
            <div class="row g-0">
              <div class="col-md-5">
                <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="img-fluid h-100 w-100" alt="Yoga">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <h3 class="card-title">Yoga</h3>
                      <p class="text-muted">Improve flexibility, strength and mental clarity</p>
                    </div>
                    <span class="badge bg-primary">New</span>
                  </div>
                  
                  <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Improve flexibility and balance</span>
                  </div>
                  <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Reduce stress and anxiety</span>
                  </div>
                  <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Enhance mind-body connection</span>
                  </div>
                  
                  <div class="mt-4 pt-2 border-top">
                    <a href="yoga.php" class="btn btn-outline-primary">Explore Yoga</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Meditation Service -->
        <div class="col-lg-6 mb-4">
          <div class="service-card card h-100">
            <div class="row g-0">
              <div class="col-md-5">
                <img src="https://images.unsplash.com/photo-1530026186672-2cd00ffc50fe?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="img-fluid h-100 w-100" alt="Meditation">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h3 class="card-title">Meditation</h3>
                  <p class="text-muted">Cultivate mindfulness and inner peace</p>
                  
                  <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Reduce stress and anxiety</span>
                  </div>
                  <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Improve focus and concentration</span>
                  </div>
                  <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Enhance emotional wellbeing</span>
                  </div>
                  
                  <div class="mt-4 pt-2 border-top">
                    <a href="meditation.php" class="btn btn-outline-primary">Explore Meditation</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Workout Service -->
        <div class="col-lg-6 mb-4">
          <div class="service-card card h-100">
            <div class="row g-0">
              <div class="col-md-5">
                <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="img-fluid h-100 w-100" alt="Workout">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <h3 class="card-title">Workout</h3>
                      <p class="text-muted">Build strength and endurance</p>
                    </div>
                    <span class="badge bg-success">Popular</span>
                  </div>
                  
                  <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Increase muscle strength</span>
                  </div>
                  <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Improve cardiovascular health</span>
                  </div>
                  <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Boost metabolism</span>
                  </div>
                  
                  <div class="mt-4 pt-2 border-top">
                    <a href="workout.php" class="btn btn-outline-primary">Explore Workouts</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Diet Plan Service -->
        <div class="col-lg-6 mb-4">
          <div class="service-card card h-100">
            <div class="row g-0">
              <div class="col-md-5">
                <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="img-fluid h-100 w-100" alt="Diet Plan">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h3 class="card-title">Diet Plan</h3>
                  <p class="text-muted">Personalized nutrition for your goals</p>
                  
                  <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Weight management</span>
                  </div>
                  <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Improved energy levels</span>
                  </div>
                  <div class="benefit-item">
                    <i class="fas fa-check-circle"></i>
                    <span>Better digestion and gut health</span>
                  </div>
                  
                  <div class="mt-4 pt-2 border-top">
                    <a href="diet-plan.php" class="btn btn-outline-primary">Explore Diet Plans</a>
                  </div>
                </div>
              </div>
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
        <p class="lead text-muted">Our unique approach to wellness</p>
      </div>
      <div class="row g-4">
        <div class="col-md-3">
          <div class="text-center p-4">
            <div class="service-icon">
              <i class="fas fa-user-md"></i>
            </div>
            <h4>Expert Guidance</h4>
            <p>Certified professionals with minimum 5 years experience</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center p-4">
            <div class="service-icon">
              <i class="fas fa-laptop-medical"></i>
            </div>
            <h4>AI Technology</h4>
            <p>Smart tracking and personalized recommendations</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center p-4">
            <div class="service-icon">
              <i class="fas fa-calendar-alt"></i>
            </div>
            <h4>Flexible Scheduling</h4>
            <p>Access programs anytime, anywhere</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center p-4">
            <div class="service-icon">
              <i class="fas fa-chart-line"></i>
            </div>
            <h4>Progress Tracking</h4>
            <p>Monitor your improvements with detailed analytics</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-5 bg-primary text-white">
    <div class="container text-center">
      <h2 class="fw-bold mb-3">Ready to Start Your Wellness Journey?</h2>
      <p class="lead mb-4">Join thousands of members transforming their lives with FITFUSION</p>
      <a href="signup.php" class="btn btn-light btn-lg px-4">Get Started Today</a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4 mb-lg-0">
          <h5 class="mb-3">FITFUSION</h5>
          <p>Your holistic wellness partner for mind, body and soul.</p>
          <div class="d-flex mt-4">
            <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
          <h5 class="mb-3">Services</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="yoga.php" class="text-white">Yoga</a></li>
            <li class="mb-2"><a href="meditation.php" class="text-white">Meditation</a></li>
            <li class="mb-2"><a href="workout.php" class="text-white">Workout</a></li>
            <li><a href="diet-plan.php" class="text-white">Diet Plan</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
          <h5 class="mb-3">Company</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="about.php" class="text-white">About Us</a></li>
            <li class="mb-2"><a href="careers.php" class="text-white">Careers</a></li>
            <li class="mb-2"><a href="blog.php" class="text-white">Blog</a></li>
            <li><a href="press.php" class="text-white">Press</a></li>
          </ul>
        </div>
        <div class="col-lg-4">
          <h5 class="mb-3">Contact Us</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="fas fa-phone-alt me-2"></i> +91 9876543210</li>
            <li class="mb-2"><i class="fas fa-envelope me-2"></i> hello@fitfusion.com</li>
            <li class="mb-3"><i class="fas fa-map-marker-alt me-2"></i> 123 Fitness St, Mumbai, India</li>
          </ul>
          <h5 class="mb-3">Newsletter</h5>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Your email">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div>
        </div>
      </div>
      <hr class="my-4 bg-light">
      <div class="row">
        <div class="col-md-6 mb-3 mb-md-0">
          <p class="mb-0">© 2023 FITFUSION. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-md-end">
          <a href="privacy.php" class="text-white me-3">Privacy Policy</a>
          <a href="terms.php" class="text-white">Terms of Service</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
  </script>
</body>
</html>