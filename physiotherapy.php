<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Physiotherapy | FITFUSION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>/* Button Styles */
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
    }</style>
</head>
<body>
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
          <a href="createprofile.php" class="btn btn-primary me-2">Profile</a>
          <a href="logout.php" class="btn btn-primary me-2">Logout</a>
          </div>
      </div>
    </div>
  </nav>
  
  <section class="hero-section py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center; background-size: cover; min-height: 60vh; display: flex; align-items: center;">
    <div class="container text-center text-white">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <h1 class="fw-bold mb-3">Professional Physiotherapy Services</h1>
          <p class="lead mb-4">Expert care to restore movement, reduce pain, and improve quality of life</p>
          <div class="d-flex flex-wrap gap-3 justify-content-center">
            <a href="#booking" class="btn btn-primary btn-lg px-4">Book Assessment</a>
            <a href="#services" class="btn btn-outline-light btn-lg px-4">Our Services</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="py-5" id="services">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Physiotherapy Solutions</h2>
        <p class="lead">Comprehensive treatment plans tailored to your needs</p>
      </div>
      
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4 text-center">
              <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-3 mx-auto" style="width: 70px; height: 70px;">
                <i class="fas fa-bone fs-3"></i>
              </div>
              <h4>Musculoskeletal</h4>
              <p>Treatment for back pain, arthritis, sports injuries, and post-surgical rehabilitation</p>
              <ul class="text-start ps-4">
                <li>Joint mobilization</li>
                <li>Targeted strengthening</li>
                <li>Pain management</li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4 text-center">
              <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-3 mx-auto" style="width: 70px; height: 70px;">
                <i class="fas fa-brain fs-3"></i>
              </div>
              <h4>Neurological</h4>
              <p>For stroke recovery, Parkinson's, MS, and other neurological conditions</p>
              <ul class="text-start ps-4">
                <li>Balance training</li>
                <li>Gait re-education</li>
                <li>Functional movement</li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4 text-center">
              <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-3 mx-auto" style="width: 70px; height: 70px;">
                <i class="fas fa-lungs fs-3"></i>
              </div>
              <h4>Cardiorespiratory</h4>
              <p>For COPD, asthma, post-Covid recovery, and other breathing difficulties</p>
              <ul class="text-start ps-4">
                <li>Breathing exercises</li>
                <li>Airway clearance</li>
                <li>Endurance training</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Technology Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h2 class="fw-bold mb-4">AI-Powered Physiotherapy</h2>
          <div class="d-flex mb-4">
            <div class="me-4">
              <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-2" style="width: 60px; height: 60px;">
                <i class="fas fa-robot"></i>
              </div>
            </div>
            <div>
              <h5>Movement Analysis</h5>
              <p>Real-time feedback on your form and posture during sessions</p>
            </div>
          </div>
          <div class="d-flex mb-4">
            <div class="me-4">
              <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-2" style="width: 60px; height: 60px;">
                <i class="fas fa-chart-line"></i>
              </div>
            </div>
            <div>
              <h5>Progress Tracking</h5>
              <p>Detailed analytics of your improvements over time</p>
            </div>
          </div>
          <div class="d-flex">
            <div class="me-4">
              <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-2" style="width: 60px; height: 60px;">
                <i class="fas fa-video"></i>
              </div>
            </div>
            <div>
              <h5>Virtual Sessions</h5>
              <p>Live video consultations with our physiotherapists</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 text-center">
          <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
               alt="Technology" 
               class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>

  <!-- Booking Section -->
  <section class="py-5" id="booking">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card border-0 shadow">
            <div class="card-body p-5">
              <h2 class="text-center fw-bold mb-4">Book Your Assessment</h2>
              <form>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" required>
                  </div>
                  <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required>
                  </div>
                  <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone">
                  </div>
                  <div class="col-md-6">
                    <label for="service" class="form-label">Service Needed</label>
                    <select class="form-select" id="service">
                      <option selected>Select service</option>
                      <option>Musculoskeletal Therapy</option>
                      <option>Neurological Rehabilitation</option>
                      <option>Cardiorespiratory Therapy</option>
                      <option>Post-Surgical Rehab</option>
                      <option>Not sure - Need Assessment</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label for="message" class="form-label">Brief Description of Your Condition</label>
                    <textarea class="form-control" id="message" rows="3"></textarea>
                  </div>
                  <div class="col-12 text-center mt-4">
                    <a href="appointment.php" class="btn btn-primary px-5">Request Appointment</a>
                  
                  </div>
                </div>
              </form>
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
            <li class="mb-2"><a href="index.php" class="text-white">Home</a></li>
            <li class="mb-2"><a href="physiotherapy.php" class="text-white">Services</a></li>
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