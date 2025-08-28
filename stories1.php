<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Healing Stories | FITFUSION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  <!-- Same head content as other pages -->
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
  }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container">
      <a class="navbar-brand fw-bold" href="frontpage.php" style="color: #6C63FF;">
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
          <!-- <li class="nav-item dropdown mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Services
            </a>
            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
              <li><a class="dropdown-item" href="yoga.php">Yoga</a></li>
              <li><a class="dropdown-item" href="meditation.php">Meditation</a></li>
              <li><a class="dropdown-item" href="workout.php">Workout</a></li>
              <li><a class="dropdown-item" href="diet-plan.php">Diet Plan</a></li>
            </ul>
          </li> -->
          <li class="nav-item mx-1">
            <a class="nav-link" href="how-it-workss.php">How It Works</a>
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
  
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h1 class="fw-bold">Healing Journeys</h1>
        <p class="lead">Real transformations from our community</p>
      </div>

      <!-- New Story Categories Filter -->
      <div class="d-flex justify-content-center my-3">
        <div class="btn-group" role="group">
          <a href="stories.php" class="btn btn-outline-primary active">All Stories</a>
          <!-- <a href="yoga.php" class="btn btn-outline-primary">Yoga</a>
          <a href="physiotherapy.php" class="btn btn-outline-primary">Physiotherapy</a>
          <a href="meditation.php" class="btn btn-outline-primary">Meditation</a>
          <a href="seniorwellness.php" class="btn btn-outline-primary">Senior Wellness</a> -->
        </div>
      </div>

      <!-- Enhanced Stories Grid -->
      <div class="row g-4">
        <!-- Story 1 (With Progress Timeline) -->
        <div class="col-lg-6">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="d-flex mb-3">
                <img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded-circle me-3" width="60" height="60" alt="Ananya">
                <div>
                  <h5 class="mb-1">Ananya's Back Pain Recovery</h5>
                  <div class="text-warning mb-2">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                  </div>
                  <small class="text-muted">12 Week Program | Chronic Pain</small>
                </div>
              </div>
              <p>"After years of desk job pain, I regained full mobility through FITFUSION's personalized yoga therapy."</p>
              
              <!-- New Progress Timeline -->
              <div class="mt-4">
                <h6 class="mb-3">Recovery Journey</h6>
                <div class="progress mb-2" style="height: 8px;">
                  <div class="progress-bar bg-primary" style="width: 25%">Week 1-3</div>
                  <div class="progress-bar bg-info" style="width: 25%">Week 4-6</div>
                  <div class="progress-bar bg-success" style="width: 50%">Week 7-12</div>
                </div>
                <div class="d-flex justify-content-between small text-muted">
                  <span>Pain Level: 9/10</span>
                  <span>Pain Level: 2/10</span>
                </div>
              </div>
              
              <!-- <button class="btn btn-sm btn-outline-primary mt-3">Read Full Story</button> -->
            </div>
          </div>
        </div>

        <!-- Story 2  -->
        <div class="col-lg-6">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="d-flex mb-3">
                <img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded-circle me-3" width="60" height="60" alt="Rahul">
                <div>
                  <h5 class="mb-1">Rahul's Post-Surgery Rehab</h5>
                  <div class="text-warning mb-2">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                  </div>
                  <small class="text-muted">8 Week Program | Knee Surgery</small>
                </div>
              </div>
               <p>"The physiotherapy program helped me walk without pain just 6 weeks after ACL surgery."</p>
               <p>"The most important thing is you can avail their services at very low cost at your home only."</p>
               <p>"I would love to recommend FIT-FUSION to everyone try it once and it will change your life for better and for forever." </p>
               <!-- <button class="btn btn-sm btn-outline-primary mt-3">Read Full Story</button> -->
            </div>
          </div>
        </div>
         <!-- Story 3 (With Milestones) -->
        <div class="col-lg-6">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="d-flex mb-3">
                <img src="https://randomuser.me/api/portraits/women/68.jpg" class="rounded-circle me-3" width="60" height="60" alt="Priya">
                <div>
                  <h5 class="mb-1">Priya's Stress Management</h5>
                  <div class="text-warning mb-2">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                  </div>
                  <small class="text-muted">12 Week Program | Anxiety Relief</small>
                </div>
              </div>
              
              <!-- Milestone Achievements -->
              <div class="mb-3">
                <h6>Key Achievements:</h6>
                <ul class="list-unstyled">
                  <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> 80% reduction in anxiety attacks</li>
                  <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Learned 15+ breathing techniques</li>
                  <li><i class="fas fa-check-circle text-success me-2"></i> Now teaching mindfulness to others</li>
                </ul>
              </div>
              
              <!-- <button class="btn btn-sm btn-outline-primary">Read Transformation</button> -->
            </div>
          </div>
        </div>

        <!-- Story 4 (With Stats) -->
        <div class="col-lg-6">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <div class="d-flex mb-3">
                <img src="https://randomuser.me/api/portraits/men/22.jpg" class="rounded-circle me-3" width="60" height="60" alt="Arjun">
                <div>
                  <h5 class="mb-1">Arjun's Arthritis Management</h5>
                  <div class="text-warning mb-2">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                  </div>
                  <small class="text-muted">Ongoing Program | Age 68</small>
                </div>
              </div>
              
              <!-- Statistical Improvement -->
              <div class="row text-center mb-3">
                <div class="col-4">
                  <div class="h4 text-primary">75%</div>
                  <small>Pain Reduction</small>
                </div>
                <div class="col-4">
                  <div class="h4 text-primary">2x</div>
                  <small>Mobility Increase</small>
                </div>
                <div class="col-4">
                  <div class="h4 text-primary">40+</div>
                  <small>Sessions Completed</small>
                </div>
              </div>
              
              <p>"I can now play with my grandchildren without worrying about joint pain."</p>
              <!-- <button class="btn btn-sm btn-outline-primary">See Progress Photos</button> -->
            </div>
          </div>
        </div>
      </div>

      <!-- New Community Section -->
      <div class="text-center mt-5 pt-5">
        <h3 class="mb-4">Join Our Healing Community</h3>
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card border-0 shadow-sm">
              <div class="card-body p-4">
                <p class="lead mb-4">Share your story and inspire others on their wellness journey</p>
                <!-- <button class="btn btn-primary me-2">Submit Your Story</button> -->
                <!-- <button class="btn btn-outline-primary">View Community Forum</button> -->
              </div>
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
            <li class="mb-2"><a href="frontpage.php" class="text-white">Home</a></li>
            <!-- <li class="mb-2"><a href="yoga.php" class="text-white">Services</a></li> -->
            <li class="mb-2"><a href="how-it-workss.php" class="text-white">How It Works</a></li>
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