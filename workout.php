<?php
//include_once "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Explore workout | FITFUSION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="cssfile/workout.css">
  <style>
    .workout-hero {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                  url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 100px 0;
      text-align: center;
    }
    
    /* Card Styling */
    .workout-card {
      transition: transform 0.3s, box-shadow 0.3s;
      border: none;
      border-radius: 12px;
      overflow: hidden;
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    .workout-card .card-img-top {
      height: 200px;
      object-fit: cover;
      width: 100%;
    }
    .workout-card .card-body {
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    .workout-card .card-text {
      flex-grow: 1;
    }
    .workout-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    
    .workout-badge {
      position: absolute;
      top: 10px;
      right: 10px;
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 0.8rem;
    }
    .workout-duration {
      position: absolute;
      bottom: 10px;
      right: 10px;
      background-color: rgba(0,0,0,0.7);
      color: white;
      padding: 3px 8px;
      border-radius: 4px;
      font-size: 0.8rem;
    }
    
    /* Button Styling */
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
    .btn-filter {
      color: #6C63FF;
      border-color: #6C63FF;
      padding: 8px 20px;
      border-radius: 50px;
      font-weight: 600;
      transition: all 0.3s ease;
      margin: 3px;
    }
    .btn-filter:hover {
      background-color: #6C63FF;
      color: white;
    }
    .btn-filter.active {
      background-color: #6C63FF;
      color: white;
    }
    
    /* Video Modal Styles */
    .video-modal iframe {
      width: 100%;
      height: 400px;
      border: none;
      border-radius: 10px;
    }
    .modal-header {
      border-bottom: none;
    }
    .modal-content {
      border-radius: 15px;
      overflow: hidden;
    }
    .close-btn {
      background: none;
      border: none;
      font-size: 1.5rem;
    }
    
    /* Ensure equal height for all cards in a row */
    .workout-row {
      display: flex;
      flex-wrap: wrap;
    }
    .workout-row .col-md-6,
    .workout-row .col-lg-4 {
      display: flex;
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
          <a href="createprofile.php" class="btn btn-primary me-2">Profile</a>
          <a href="logout.php" class="btn btn-primary me-2">Logout</a>
          </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="workout-hero">
    <div class="container">
      <h1 class="display-4 fw-bold mb-3">Discover Your workout Journey</h1>
      <p class="lead mb-4">Get Fit and healthy with our guided workout classes</p>
      <a href="#yogaContainer" class="btn btn-primary btn-lg px-4 me-2">Explore Classes</a>
      <a href="#benefitsAccordion" class="btn btn-outline-light btn-lg px-4">Learn Benefits</a>
    </div>
  </section>

  <!-- Main Content -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h1 class="fw-bold mb-3">Explore workout Styles</h1>
        <p class="lead">Find the perfect practice for your needs and experience level</p>
      </div>

      <!--  Styles Filter -->
      <div class="text-center mb-5">
        <div class="btn-group flex-wrap" role="group" id="filterButtons">
          
          <button type="button" class="btn btn-filter" data-filter="beginner">Beginner</button>
          <button type="button" class="btn btn-filter" data-filter="intermediate">Intermediate</button>
          <button type="button" class="btn btn-filter" data-filter="intermediate">Advanced</button>
          
          
        </div>
      </div>

      <!--  Styles Grid -->
      <div class="row g-4 yoga-row" id="yogaContainer">
        <!-- Begineer workout -->
        <div class="col-md-6 col-lg-4 yoga-item" data-category="beginner">
        <div class="card workout-card h-100">
        <div class="position-relative">
        <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Beginner Program" 
           class="card-img-top" 
           alt="beginner workout">
      <span class="workout-badge bg-warning">Beginner</span>
      <span class="workout-duration">25-30 mins</span>
    </div>
    <div class="card-body">
      <h5 class="card-title">beginner workout</h5>
      <p class="card-text">Perfect for beginners focusing on workout techniques.</p>
      <div class="d-flex justify-content-between align-items-center mt-auto">
        <div>
          <i class="fas fa-user text-muted me-1"></i>
          <small class="text-muted">Priya Sharma</small>
        </div>
        <a href="beginnerworkout.php" class="btn btn-sm btn-primary">View Class</a>
      </div>
    </div>
  </div>
</div>

        <!-- intermidiate workout -->
        <div class="col-md-6 col-lg-4 yoga-item" data-category="intermediate">
          <div class="card workout-card h-100">
            <div class="position-relative">
              <img src="https://images.unsplash.com/photo-1538805060514-97d9cc17730c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                   class="card-img-top" 
                   alt="intermidiate">
              <span class="workout-badge bg-success ">Intermediate</span>
              <span class="workout-duration">25-30 mins</span>
            </div>
            <div class="card-body">
              <h5 class="card-title">intermediate workout</h5>
              <p class="card-text">Best option for muscles gain and weight maintenence.</p>
              <div class="d-flex justify-content-between align-items-center mt-auto">
                <div>
                  <i class="fas fa-user text-muted me-1"></i>
                  <small class="text-muted">Rashi Patel</small>
                </div>
                <a href="intermediate.php" class="btn btn-sm btn-primary">View Class</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Advanced Yoga -->
        <div class="col-md-6 col-lg-4 yoga-item" data-category="Advanced workout">
          <div class="card workout-card h-100">
            <div class="position-relative">
              <img src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                   class="card-img-top" 
                   alt=" advanced workout">
              <span class="workout-badge bg-info">All Levels</span>
              <span class="workout-duration">30 mins</span>
            </div>
            <div class="card-body">
              <h5 class="card-title">Advanced workout</h5>
              <p class="card-text">fast-paced longer period workouts for weight loss.</p>
              <div class="d-flex justify-content-between align-items-center mt-auto">
                <div>
                  <i class="fas fa-user text-muted me-1"></i>
                  <small class="text-muted">Ananya Desai</small>
                </div>
                <a href="advancedworkout.php" class="btn btn-sm btn-primary">View Class</a>
              </div>
            </div>
          </div>
        </div>
<!-- Benefits Section -->
      <div class="row mt-5 pt-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h2 class="fw-bold mb-4">The Benefits of workout</h2>
          <div class="accordion" id="benefitsAccordion">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#benefit1">
                  Physical Health Improvements
                </button>
              </h2>
              <div id="benefit1" class="accordion-collapse collapse show" data-bs-parent="#benefitsAccordion">
                <div class="accordion-body">
                  <ul>
                    <li>Increases flexibility and range of motion</li>
                    <li>Builds muscle strength and endurance</li>
                    <li>Improves your health</li>
                    <li>makes you punctual</li>
                    <li>Boosts cardiovascular health</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#benefit2">
                  physical benifits
                </button>
              </h2>
              <div id="benefit2" class="accordion-collapse collapse" data-bs-parent="#benefitsAccordion">
                <div class="accordion-body">
                  <ul>
                    <li>Help in weight gain or loss</li>
                    <li>helps in weight maintenance</li>
                    <li>Promotes better work ability</li>
                    <li>promotes the quality of punctuality</li>
                    <li>Increases  self-awareness and overall health</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
              <h3 class="mb-4">Find Your Perfect workout Class</h3>
              <form>
                <div class="mb-3">
                  <label class="form-label">Experience Level</label>
                  <select class="form-select">
                    <option selected>Choose your level</option>
                    <option>Beginner</option>
                    <option>Intermediate</option>
                    <option>Advanced</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Goals</label>
                  <select class="form-select">
                    <option selected>What are your goals?</option>
                    <option>weight gain</option>
                    <option>weight loss</option>
                    <option>weight maintenance</option>
                    <option>General Fitness</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Available Time</label>
                  <select class="form-select">
                    <option selected>When can you practice?</option>
                    <option>Morning (6am-9am)</option>
                    <option>Midday (11am-2pm)</option>
                    <option>Evening (5pm-8pm)</option>
                    <option>Weekends</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Get Personalized Recommendations</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
            <li class="mb-2"><a href="explore-services.php" class="text-white">Explore services</a></li>
            <li class="mb-2"><a href="how-it-workss.php" class="text-white">How It Works</a></li>
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
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Filter functionality
      const filterButtons = document.querySelectorAll('.btn-filter');
      const workoutItems = document.querySelectorAll('.workout-item');
      
      filterButtons.forEach(button => {
        button.addEventListener('click', function() {
          // Remove active class from all buttons
          filterButtons.forEach(btn => {
            btn.classList.remove('active');
            btn.classList.remove('btn-primary');
            btn.classList.add('btn-outline-primary');
          });
          
          // Add active class to clicked button
          this.classList.add('active');
          this.classList.remove('btn-outline-primary');
          this.classList.add('btn-primary');
          
          const filterValue = this.getAttribute('data-filter');
          
          // Filter items
          workoutItems.forEach(item => {
            if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
              item.style.display = 'block';
            } else {
              item.style.display = 'none';
            }
          });
        });
      });

      // Equalize card heights
      function equalizeCardHeights() {
        const cards = document.querySelectorAll('.workout-card');
        let maxHeight = 0;
        
        // Reset all card heights
        cards.forEach(card => {
          card.style.height = 'auto';
        });
        
        // Find the tallest card
        cards.forEach(card => {
          if (card.offsetHeight > maxHeight) {
            maxHeight = card.offsetHeight;
          }
        });
        
        // Set all cards to the tallest height
        cards.forEach(card => {
          card.style.height = maxHeight + 'px';
        });
      }
      
      // Run on load and resize
      window.addEventListener('load', equalizeCardHeights);
      window.addEventListener('resize', equalizeCardHeights);
    });
  </script>
</body>