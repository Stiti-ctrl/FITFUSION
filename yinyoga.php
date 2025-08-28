<?php
//include_once "navbar.php";

// Set Yin Yoga specific parameters
$className = "Yin Yoga";
$classDescription = "7-day deep stretch program focusing on connective tissues and mindfulness";
$instructor = "Maya Patel";
$duration = "40-60 mins per day";
$thumbnail = "https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80";
$level = "All Levels";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $className; ?> | FITFUSION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="cssfile/yoga.css">
  <style>
    /* Yin Yoga Specific Styles */
    .yin-header {
      background: linear-gradient(135deg, #f8f9fa 0%, #f0e9f9 100%);
    }
    .yin-tab .nav-link.active {
      border-bottom-color: #8a6dae;
      color: #8a6dae;
    }
    .yin-card {
      border-left: 4px solid #8a6dae;
    }
    .yin-highlight {
      color: #8a6dae;
      font-weight: 600;
    }
    .yin-btn {
      background-color: #8a6dae;
      border-color: #8a6dae;
    }
    .yin-btn:hover {
      background-color: #7a5d9e;
      border-color: #7a5d9e;
    }
    .yin-badge {
      background-color: #8a6dae;
    }
    .class-details {
      background-color: #f9f7fc;
      border-radius: 8px;
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
  </nav>

  <!-- Class Header -->
  <section class="class-header py-5 yin-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h1 class="display-4 fw-bold"><?php echo $className; ?></h1>
          <p class="lead"><?php echo $classDescription; ?></p>
          <div class="d-flex align-items-center mt-3">
            <div class="me-4">
              <i class="fas fa-user text-primary me-2"></i>
              <span><?php echo $instructor; ?></span>
            </div>
            <div class="me-4">
              <i class="fas fa-clock text-primary me-2"></i>
              <span><?php echo $duration; ?></span>
            </div>
            <div>
              <i class="fas fa-chart-line text-primary me-2"></i>
              <span><?php echo $level; ?></span>
            </div>
          </div>
        </div>
        <div class="col-md-4 text-md-end">
          <img src="<?php echo $thumbnail; ?>" alt="<?php echo $className; ?>" class="img-fluid rounded shadow" style="max-height: 200px;">
        </div>
      </div>
    </div>
  </section>

  <!-- Class Content -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="card mb-4 yin-card">
            <div class="card-body">
              <h3 class="card-title mb-4">7-Day Yin Yoga Journey</h3>
              
              <!-- Day Navigation -->
              <ul class="nav nav-tabs mb-4 yin-tab" id="dayTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="monday-tab" data-bs-toggle="tab" data-bs-target="#monday" type="button" role="tab">Monday</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="tuesday-tab" data-bs-toggle="tab" data-bs-target="#tuesday" type="button" role="tab">Tuesday</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="wednesday-tab" data-bs-toggle="tab" data-bs-target="#wednesday" type="button" role="tab">Wednesday</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="thursday-tab" data-bs-toggle="tab" data-bs-target="#thursday" type="button" role="tab">Thursday</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="friday-tab" data-bs-toggle="tab" data-bs-target="#friday" type="button" role="tab">Friday</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="saturday-tab" data-bs-toggle="tab" data-bs-target="#saturday" type="button" role="tab">Saturday</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="sunday-tab" data-bs-toggle="tab" data-bs-target="#sunday" type="button" role="tab">Sunday</button>
                </li>
              </ul>
              
              <!-- Day Content -->
              <div class="tab-content" id="dayTabsContent">
                <!-- Monday -->
                <div class="tab-pane fade show active" id="monday" role="tabpanel">
                  <h4>Hips & Lower Body</h4>
                  <p>Begin your Yin journey with deep hip openers and lower body stretches to release tension.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/X3-gKPNyrTA" allowfullscreen></iframe>

                  </div>
                  <div class="class-details p-4">
                    <h5>Today's Practice</h5>
                    <ul>
                      <li><span class="yin-highlight">Butterfly Pose (3-5 min):</span> Inner thigh release</li>
                      <li><span class="yin-highlight">Dragon Pose (3-5 min/side):</span> Hip flexor stretch</li>
                      <li><span class="yin-highlight">Saddle Pose (3-5 min):</span> Quadriceps and ankles</li>
                      <li><span class="yin-highlight">Guided Meditation:</span> Body awareness</li>
                    </ul>
                    <button class="btn yin-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Tuesday -->
                <div class="tab-pane fade" id="tuesday" role="tabpanel">
                  <h4>Spine & Back</h4>
                  <p>Gentle spinal movements to improve mobility and release tension.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe src="https://www.youtube.com/embed/X3-gKPNyrTA" allowfullscreen></iframe>
                  </div>
                  <div class="class-details p-4">
                    <h5>Today's Practice</h5>
                    <ul>
                      <li><span class="yin-highlight">Child's Pose (3-5 min):</span> Spinal decompression</li>
                      <li><span class="yin-highlight">Seal Pose (3-5 min):</span> Gentle backbend</li>
                      <li><span class="yin-highlight">Twisted Roots (3-5 min/side):</span> Spinal twist</li>
                      <li><span class="yin-highlight">Breathwork:</span> Diaphragmatic breathing</li>
                    </ul>
                    <button class="btn yin-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Wednesday -->
                <div class="tab-pane fade" id="wednesday" role="tabpanel">
                  <h4>Full Body Release</h4>
                  <p>Complete body sequence to release deep tension and promote relaxation.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe src="https://www.youtube.com/embed/4pKly2JojMw" allowfullscreen></iframe>
                  </div>
                  <div class="class-details p-4">
                    <h5>Today's Practice</h5>
                    <ul>
                      <li><span class="yin-highlight">Banana Pose (3-5 min/side):</span> Side body stretch</li>
                      <li><span class="yin-highlight">Dangling Pose (3-5 min):</span> Hamstring release</li>
                      <li><span class="yin-highlight">Dragonfly Pose (3-5 min):</span> Inner groin stretch</li>
                      <li><span class="yin-highlight">Savasana (10 min):</span> Deep relaxation</li>
                    </ul>
                    <button class="btn yin-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Thursday -->
                <div class="tab-pane fade" id="thursday" role="tabpanel">
                  <h4>Meridian Focus: Kidney & Bladder</h4>
                  <p>Poses targeting the kidney and bladder meridians for energy flow.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/X3-gKPNyrTA" allowfullscreen></iframe>
                    </div>
                  <div class="class-details p-4">
                    <h5>Today's Practice</h5>
                    <ul>
                      <li><span class="yin-highlight">Caterpillar Pose (3-5 min):</span> Back body stretch</li>
                      <li><span class="yin-highlight">Shoelace Pose (3-5 min/side):</span> Outer hips</li>
                      <li><span class="yin-highlight">Square Pose (3-5 min/side):</span> Deep gluteal stretch</li>
                      <li><span class="yin-highlight">Meditation:</span> Water element visualization</li>
                    </ul>
                    <button class="btn yin-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Friday -->
                <div class="tab-pane fade" id="friday" role="tabpanel">
                  <h4>Shoulders & Upper Body</h4>
                  <p>Release tension in shoulders, neck, and upper back.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe src="https://www.youtube.com/embed/Eml2xnoLpYE" allowfullscreen></iframe>
                  </div>
                  <div class="class-details p-4">
                    <h5>Today's Practice</h5>
                    <ul>
                      <li><span class="yin-highlight">Melting Heart (3-5 min):</span> Shoulder opener</li>
                      <li><span class="yin-highlight">Swan Pose (3-5 min/side):</span> Chest and shoulders</li>
                      <li><span class="yin-highlight">Thread the Needle (3-5 min/side):</span> Upper back</li>
                      <li><span class="yin-highlight">Breathwork:</span> Shoulder release breathing</li>
                    </ul>
                    <button class="btn yin-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Saturday -->
                <div class="tab-pane fade" id="saturday" role="tabpanel">
                  <h4>Restorative Yin</h4>
                  <p>Fully supported practice using props for deep relaxation.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/X3-gKPNyrTA" allowfullscreen></iframe>

                  </div>
                  <div class="class-details p-4">
                    <h5>Today's Practice</h5>
                    <ul>
                      <li><span class="yin-highlight">Supported Fish (5-7 min):</span> Heart opener</li>
                      <li><span class="yin-highlight">Legs Up the Wall (7-10 min):</span> Lymphatic drainage</li>
                      <li><span class="yin-highlight">Supported Twist (3-5 min/side):</span> Spinal release</li>
                      <li><span class="yin-highlight">Yoga Nidra:</span> Guided relaxation</li>
                    </ul>
                    <button class="btn yin-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Sunday -->
                <div class="tab-pane fade" id="sunday" role="tabpanel">
                  <h4>Mindfulness & Meditation</h4>
                  <p>Gentle movement and extended meditation to complete your week.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/X3-gKPNyrTA" allowfullscreen></iframe>
                    </div>
                  <div class="class-details p-4">
                    <h5>Today's Practice</h5>
                    <ul>
                      <li><span class="yin-highlight">Seated Meditation (10 min):</span> Mindfulness</li>
                      <li><span class="yin-highlight">Supported Forward Fold (5 min):</span> Calming</li>
                      <li><span class="yin-highlight">Reclining Bound Angle (5 min):</span> Heart opener</li>
                      <li><span class="yin-highlight">Closing Meditation (10 min):</span> Gratitude practice</li>
                    </ul>
                    <button class="btn yin-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Class Progress -->
          <div class="card mb-4 yin-card">
            <div class="card-body">
              <h5 class="card-title">Your Yin Yoga Progress</h5>
              <div class="progress mb-3" style="height: 20px;">
                <div class="progress-bar" role="progressbar" style="width: 0%; background-color: #8a6dae;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>
              <div class="row text-center">
                <div class="col">
                  <div class="day-progress">Mon</div>
                </div>
                <div class="col">
                  <div class="day-progress">Tue</div>
                </div>
                <div class="col">
                  <div class="day-progress">Wed</div>
                </div>
                <div class="col">
                  <div class="day-progress">Thu</div>
                </div>
                <div class="col">
                  <div class="day-progress">Fri</div>
                </div>
                <div class="col">
                  <div class="day-progress">Sat</div>
                </div>
                <div class="col">
                  <div class="day-progress">Sun</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Sidebar -->
        <div class="col-lg-4">
          <!-- Class Materials -->
          <div class="card mb-4 yin-card">
            <div class="card-body">
              <h5 class="card-title">Yin Yoga Materials</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-file-pdf me-2 text-danger"></i> Yin Pose Guide</span>
                  <button class="btn btn-sm yin-btn">Download</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-music me-2 text-primary"></i> Meditation Music</span>
                  <button class="btn btn-sm yin-btn">Download</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-list-check me-2 text-success"></i> 7-Day Checklist</span>
                  <button class="btn btn-sm yin-btn">Download</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-book me-2 text-info"></i> Meridian Guide</span>
                  <button class="btn btn-sm yin-btn">Download</button>
                </li>
              </ul>
            </div>
          </div>
          
          <!-- Benefits of Yin Yoga -->
          <div class="card mb-4 yin-card">
            <div class="card-body">
              <h5 class="card-title">Benefits of Yin Yoga</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Increases flexibility in connective tissues</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Reduces stress and anxiety</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Improves joint mobility</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Balances energy flow</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Enhances mindfulness</li>
              </ul>
            </div>
          </div>
          
          <!-- Upcoming Yin Classes -->
          <div class="card yin-card">
            <div class="card-body">
              <h5 class="card-title">Upcoming Yin Classes</h5>
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">Evening Yin</h6>
                    <small>Tomorrow 7:00 PM</small>
                  </div>
                  <p class="mb-1">With <?php echo $instructor; ?></p>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">Yin & Yang</h6>
                    <small>Wed 6:00 PM</small>
                  </div>
                  <p class="mb-1">With Ananya Desai</p>
                </a>
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
            <li class="mb-2"><a href="index.php" class="text-white">Home</a></li>
            <li class="mb-2"><a href="explore-services.php" class="text-white">Explore services</a></li>
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
            <button class="btn yin-btn" type="button" style="padding: 8px 20px;">Subscribe</button>
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
      // Mark day as completed
      const dayProgress = document.querySelectorAll('.day-progress');
      dayProgress.forEach(day => {
        day.addEventListener('click', function() {
          this.classList.toggle('completed');
          updateProgress();
        });
      });
      
      // Mark as completed buttons
      const completeButtons = document.querySelectorAll('.class-details button');
      completeButtons.forEach(button => {
        button.addEventListener('click', function() {
          const tabPane = this.closest('.tab-pane');
          const dayIndex = Array.from(tabPane.parentElement.children).indexOf(tabPane);
          const dayElements = document.querySelectorAll('.day-progress');
          
          // Mark corresponding day as completed
          dayElements[dayIndex].classList.add('completed');
          
          updateProgress();
          this.textContent = 'Completed!';
          this.classList.add('btn-success');
          this.classList.remove('yin-btn');
        });
      });
      
      // Update progress bar
      function updateProgress() {
        const completed = document.querySelectorAll('.day-progress.completed').length;
        const total = dayProgress.length;
        const percentage = Math.round((completed / total) * 100);
        
        const progressBar = document.querySelector('.progress-bar');
        progressBar.style.width = `${percentage}%`;
        progressBar.setAttribute('aria-valuenow', percentage);
        progressBar.textContent = `${percentage}%`;
      }
    });
  </script>
</body>
</html>