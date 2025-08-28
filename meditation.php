<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meditation | FITFUSION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    .meditation-hero {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                  url('https://images.unsplash.com/photo-1530026186672-2cd00ffc50fe?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 100px 0;
      text-align: center;
    }
    .benefit-card {
      transition: transform 0.3s;
    }
    .benefit-card:hover {
      transform: translateY(-5px);
    }
    .session-card {
      border-radius: 10px;
      overflow: hidden;
      transition: transform 0.3s;
      height: 100%;
    }
    .session-card:hover {
      transform: translateY(-5px);
    }
    .session-card .card-img-top {
      height: 180px;
      object-fit: cover;
      width: 100%;
    }
    .session-card .card-body {
      display: flex;
      flex-direction: column;
      height: calc(100% - 180px);
    }
    .session-card .card-text {
      flex-grow: 1;
    }
    .session-card .card-footer-content {
      margin-top: auto;
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
    /* Modal Styles */
    .modal-video {
      width: 100%;
      height: 0;
      padding-bottom: 56.25%; /* 16:9 aspect ratio */
      position: relative;
    }
    .modal-video iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
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
  <section class="meditation-hero">
    <div class="container">
      <h1 class="display-4 fw-bold mb-3">Find Your Inner Peace</h1>
      <p class="lead mb-4">Guided meditation sessions to reduce stress and enhance mindfulness</p>
      <a href="#sessions" class="btn btn-primary btn-lg px-4 me-2">Explore classes</a>
      <a href="#benefits" class="btn btn-outline-light btn-lg px-4">Learn Benefits</a>
    </div>
  </section>

  <!-- Benefits Section -->
  <section id="benefits" class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Benefits of Meditation</h2>
        <p class="lead">Transform your mental and physical wellbeing</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm benefit-card">
            <div class="card-body text-center p-4">
              <i class="fas fa-brain text-primary fs-1 mb-3"></i>
              <h4>Reduces Stress</h4>
              <p>Lower cortisol levels and decrease symptoms of stress-related conditions</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm benefit-card">
            <div class="card-body text-center p-4">
              <i class="fas fa-heart text-primary fs-1 mb-3"></i>
              <h4>Improves Focus</h4>
              <p>Enhance your ability to concentrate and maintain attention</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm benefit-card">
            <div class="card-body text-center p-4">
              <i class="fas fa-moon text-primary fs-1 mb-3"></i>
              <h4>Better Sleep</h4>
              <p>Fight insomnia and improve sleep quality with mindful practices</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Meditation Sessions -->
  <section id="sessions" class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Meditation Programs</h2>
        <p class="lead">Choose the practice that resonates with you</p>
      </div>
      <div class="row g-4">
        <!-- Session 1 -->
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0 shadow session-card">
            <img src="https://images.unsplash.com/photo-1545205597-3d9d02c29597?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Mindfulness Meditation">
            <div class="card-body">
              <h4>Mindfulness</h4>
              <p class="card-text">10-15 min sessions to cultivate present-moment awareness</p>
              <div class="card-footer-content">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge bg-primary">Beginner</span>
                  <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#mindfulnessModal">Start Session</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Session 2 -->
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0 shadow session-card">
            <img src="https://images.unsplash.com/photo-1510894347713-fc3ed6fdf539?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Body Scan">
            <div class="card-body">
              <h4>Body Scan</h4>
              <p class="card-text">20-25 min sessions to release physical tension</p>
              <div class="card-footer-content">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge bg-primary">Beginner</span>
                  <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#bodyScanModal">Start Session</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Session 3 -->
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0 shadow session-card">
            <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Loving Kindness">
            <div class="card-body">
              <h4>Loving Kindness</h4>
              <p class="card-text">15-20 min sessions to cultivate compassion</p>
              <div class="card-footer-content">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge bg-success">Intermediate</span>
                  <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#lovingKindnessModal">Start Session</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Session 4 -->
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0 shadow session-card">
            <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Transcendental">
            <div class="card-body">
              <h4>Transcendental</h4>
              <p class="card-text">20-30 min sessions for deep relaxation</p>
              <div class="card-footer-content">
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge bg-warning">Advanced</span>
                  <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#transcendentalModal">Start Session</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Video Modals -->
  <!-- Mindfulness Modal -->
  <div class="modal fade" id="mindfulnessModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Mindfulness Meditation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="modal-video">
            <iframe id="mindfulnessVideo" src="https://www.youtube.com/embed/inpok4MKVLM?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Body Scan Modal -->
  <div class="modal fade" id="bodyScanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Body Scan Meditation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="modal-video">
            <iframe id="bodyScanVideo" src="https://www.youtube.com/embed/86m4RC_ADEY?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Loving Kindness Modal -->
  <div class="modal fade" id="lovingKindnessModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Loving Kindness Meditation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="modal-video">
            <iframe id="lovingKindnessVideo" src="https://www.youtube.com/embed/sz7cpV7ERsM?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Transcendental Modal -->
  <div class="modal fade" id="transcendentalModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Transcendental Meditation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="modal-video">
            <iframe id="transcendentalVideo" src="https://www.youtube.com/embed/MIr3RsUWrdo?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Testimonials -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">What Our Members Say</h2>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="text-center mb-4">
                <i class="fas fa-quote-left text-primary fs-1"></i>
              </div>
              <p class="lead text-center mb-4">"The guided meditation sessions helped me manage my anxiety better than anything I've tried before. I now meditate daily and feel more centered throughout my day."</p>
              <div class="text-center">
                <img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded-circle mb-2" width="80" alt="User">
                <h5 class="mb-1">Sarah Johnson</h5>
                <p class="text-muted">Member since 2022</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-5 bg-primary text-white">
    <div class="container text-center">
      <h2 class="fw-bold mb-3">Ready to Begin Your Meditation Journey?</h2>
      <p class="lead mb-4">Join thousands of members experiencing the benefits of daily meditation</p>
      <!-- <a href="signup.php"  class="btn btn-light btn-lg px-4">Start Free Trial</a> -->
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
            <li class="mb-2"><a href="yoga.php" class="text-white">Services</a></li>
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
    // Function to play video when modal is shown
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize YouTube API
      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // Store YouTube players
      var players = {};

      // Function to create players
      window.onYouTubeIframeAPIReady = function() {
        players.mindfulnessPlayer = new YT.Player('mindfulnessVideo', {
          events: {
            'onReady': onPlayerReady
          }
        });
        players.bodyScanPlayer = new YT.Player('bodyScanVideo', {
          events: {
            'onReady': onPlayerReady
          }
        });
        players.lovingKindnessPlayer = new YT.Player('lovingKindnessVideo', {
          events: {
            'onReady': onPlayerReady
          }
        });
        players.transcendentalPlayer = new YT.Player('transcendentalVideo', {
          events: {
            'onReady': onPlayerReady
          }
        });
      };

      function onPlayerReady(event) {
        // Player is ready
      }

      // Play video when modal is shown
      var mindfulnessModal = document.getElementById('mindfulnessModal');
      mindfulnessModal.addEventListener('shown.bs.modal', function() {
        players.mindfulnessPlayer.playVideo();
      });
      mindfulnessModal.addEventListener('hide.bs.modal', function() {
        players.mindfulnessPlayer.pauseVideo();
      });

      var bodyScanModal = document.getElementById('bodyScanModal');
      bodyScanModal.addEventListener('shown.bs.modal', function() {
        players.bodyScanPlayer.playVideo();
      });
      bodyScanModal.addEventListener('hide.bs.modal', function() {
        players.bodyScanPlayer.pauseVideo();
      });

      var lovingKindnessModal = document.getElementById('lovingKindnessModal');
      lovingKindnessModal.addEventListener('shown.bs.modal', function() {
        players.lovingKindnessPlayer.playVideo();
      });
      lovingKindnessModal.addEventListener('hide.bs.modal', function() {
        players.lovingKindnessPlayer.pauseVideo();
      });

      var transcendentalModal = document.getElementById('transcendentalModal');
      transcendentalModal.addEventListener('shown.bs.modal', function() {
        players.transcendentalPlayer.playVideo();
      });
      transcendentalModal.addEventListener('hide.bs.modal', function() {
        players.transcendentalPlayer.pauseVideo();
      });
    });
  </script>
</body>
</html>