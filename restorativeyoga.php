<?php
//include_once "navbar.php";

// Set Restorative Yoga specific parameters
$className = "Restorative Yoga";
$classDescription = "7-day deep relaxation program using props to support complete surrender";
$instructor = "Sophie Chen";
$duration = "45-60 mins per day";
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
    /* Restorative Yoga Specific Styles */
    .restorative-header {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9f9f5 100%);
    }
    .restorative-tab .nav-link.active {
      border-bottom-color: #5aa897;
      color: #5aa897;
    }
    .restorative-card {
      border-left: 4px solid #5aa897;
      background-color: #f7fdfb;
    }
    .restorative-highlight {
      color: #5aa897;
      font-weight: 600;
    }
    .restorative-btn {
      background-color: #5aa897;
      border-color: #5aa897;
    }
    .restorative-btn:hover {
      background-color: #4a9887;
      border-color: #4a9887;
    }
    .prop-icon {
      color: #5aa897;
      margin-right: 8px;
    }
    .class-details {
      background-color: #f0faf7;
      border-radius: 8px;
    }
    .duration-badge {
      background-color: #5aa897;
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
  <!-- Class Header -->
  <section class="class-header py-5 restorative-header">
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
          <div class="mt-3">
            <span class="badge duration-badge me-2"><i class="fas fa-couch me-1"></i> Props Recommended</span>
            <span class="badge duration-badge"><i class="fas fa-heart me-1"></i> Therapeutic</span>
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
          <div class="card mb-4 restorative-card">
            <div class="card-body">
              <h3 class="card-title mb-4">7-Day Restorative Journey</h3>
              <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i> For best results, gather these props before starting: Yoga mat, 2-3 blankets, 2 blocks, 1 bolster, and 1 strap.
              </div>
              
              <!-- Day Navigation -->
              <ul class="nav nav-tabs mb-4 restorative-tab" id="dayTabs" role="tablist">
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
                  <h4>Nervous System Reset</h4>
                  <p>Begin your week with poses designed to calm the nervous system and release tension.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/Eml2xnoLpYE" allowfullscreen></iframe>
                    </div>
                  <div class="class-details p-4">
                    <h5>Today's Practice <small class="text-muted">(Hold each pose 5-7 minutes)</small></h5>
                    <ul class="list-unstyled">
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Supported Child's Pose:</strong> With bolster under torso and forehead supported</li>
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Legs-Up-the-Wall:</strong> With hips elevated on folded blanket</li>
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Supported Reclining Bound Angle:</strong> Bolster under spine, blocks under knees</li>
                      <li><i class="fas fa-moon prop-icon"></i> <strong class="restorative-highlight">Guided Relaxation:</strong> Body scan technique (10 minutes)</li>
                    </ul>
                    <button class="btn restorative-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Tuesday -->
                <div class="tab-pane fade" id="tuesday" role="tabpanel">
                  <h4>Hip Release</h4>
                  <p>Gentle supported poses to release deep tension in the hips and lower back.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/Eml2xnoLpYE" allowfullscreen></iframe>
                    </div>
                  <div class="class-details p-4">
                    <h5>Today's Practice <small class="text-muted">(Hold each pose 5-7 minutes)</small></h5>
                    <ul class="list-unstyled">
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Supported Pigeon Pose:</strong> With bolster under torso</li>
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Supine Figure-Four Stretch:</strong> With strap around foot</li>
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Supported Bridge Pose:</strong> Block under sacrum</li>
                      <li><i class="fas fa-moon prop-icon"></i> <strong class="restorative-highlight">Breath Awareness:</strong> Counting breaths (10 minutes)</li>
                    </ul>
                    <button class="btn restorative-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Wednesday -->
                <div class="tab-pane fade" id="wednesday" role="tabpanel">
                  <h4>Heart Openers</h4>
                  <p>Gentle backbends to open the chest and counteract slouching.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe src="https://www.youtube.com/embed/4pKly2JojMw" allowfullscreen></iframe>
                  </div>
                  <div class="class-details p-4">
                    <h5>Today's Practice <small class="text-muted">(Hold each pose 5-7 minutes)</small></h5>
                    <ul class="list-unstyled">
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Supported Fish Pose:</strong> Bolster lengthwise under spine</li>
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Puppy Pose:</strong> With forehead resting on block</li>
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Reclining Hero Pose:</strong> With back supported by bolster</li>
                      <li><i class="fas fa-moon prop-icon"></i> <strong class="restorative-highlight">Loving-Kindness Meditation:</strong> (10 minutes)</li>
                    </ul>
                    <button class="btn restorative-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Thursday -->
                <div class="tab-pane fade" id="thursday" role="tabpanel">
                  <h4>Forward Folds</h4>
                  <p>Calming poses to quiet the mind and release back tension.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/Eml2xnoLpYE" allowfullscreen></iframe>
                    </div>
                  <div class="class-details p-4">
                    <h5>Today's Practice <small class="text-muted">(Hold each pose 5-7 minutes)</small></h5>
                    <ul class="list-unstyled">
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Supported Seated Forward Fold:</strong> Bolster on legs</li>
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Supported Child's Pose Variation:</strong> With torso rotated</li>
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Legs-Up-the-Wall Twist:</strong> With blanket between knees</li>
                      <li><i class="fas fa-moon prop-icon"></i> <strong class="restorative-highlight">Body Scan Meditation:</strong> (10 minutes)</li>
                    </ul>
                    <button class="btn restorative-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Friday -->
                <div class="tab-pane fade" id="friday" role="tabpanel">
                  <h4>Full Body Relaxation</h4>
                  <p>Complete surrender with full-body supported poses.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe src="https://www.youtube.com/embed/Eml2xnoLpYE" allowfullscreen></iframe>
                  </div>
                  <div class="class-details p-4">
                    <h5>Today's Practice <small class="text-muted">(Hold each pose 7-10 minutes)</small></h5>
                    <ul class="list-unstyled">
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Supported Savasana:</strong> Bolster under knees, blanket under head</li>
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Side-Lying Rest Pose:</strong> With pillow between knees</li>
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Supported Reclining Twist:</strong> With bolster between knees</li>
                      <li><i class="fas fa-moon prop-icon"></i> <strong class="restorative-highlight">Yoga Nidra:</strong> Guided deep relaxation (15 minutes)</li>
                    </ul>
                    <button class="btn restorative-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Saturday -->
                <div class="tab-pane fade" id="saturday" role="tabpanel">
                  <h4>Weekend Restoration</h4>
                  <p>Extended holds for deep physical and mental relaxation.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/Eml2xnoLpYE" allowfullscreen></iframe>
                    </div>
                  <div class="class-details p-4">
                    <h5>Today's Practice <small class="text-muted">(Hold each pose 10-15 minutes)</small></h5>
                    <ul class="list-unstyled">
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Supported Supta Baddha Konasana:</strong> Bolster under spine, straps around thighs</li>
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Elevated Legs-Up-the-Wall:</strong> With hips on bolster</li>
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Supported Side-Lying Pose:</strong> With blanket support</li>
                      <li><i class="fas fa-moon prop-icon"></i> <strong class="restorative-highlight">Extended Yoga Nidra:</strong> (20 minutes)</li>
                    </ul>
                    <button class="btn restorative-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Sunday -->
                <div class="tab-pane fade" id="sunday" role="tabpanel">
                  <h4>Mindful Integration</h4>
                  <p>Gentle movement and meditation to integrate your week of practice.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/Eml2xnoLpYE" allowfullscreen></iframe>
                    </div>
                  <div class="class-details p-4">
                    <h5>Today's Practice</h5>
                    <ul class="list-unstyled">
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Supported Seated Meditation:</strong> On bolster or blanket (10 min)</li>
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Gentle Neck Rolls:</strong> Seated with support (5 min)</li>
                      <li class="mb-3"><i class="fas fa-couch prop-icon"></i> <strong class="restorative-highlight">Supported Forward Fold:</strong> With bolster (7 min)</li>
                      <li><i class="fas fa-moon prop-icon"></i> <strong class="restorative-highlight">Closing Meditation:</strong> Gratitude practice (15 min)</li>
                    </ul>
                    <button class="btn restorative-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Class Progress -->
          <div class="card mb-4 restorative-card">
            <div class="card-body">
              <h5 class="card-title">Your Restorative Journey</h5>
              <div class="progress mb-3" style="height: 20px;">
                <div class="progress-bar" role="progressbar" style="width: 0%; background-color: #5aa897;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
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
          <div class="card mb-4 restorative-card">
            <div class="card-body">
              <h5 class="card-title">Restorative Resources</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-file-pdf me-2 text-danger"></i> Prop Setup Guide</span>
                  <button class="btn btn-sm restorative-btn">Download</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-music me-2 text-primary"></i> Relaxation Soundscapes</span>
                  <button class="btn btn-sm restorative-btn">Download</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-list-check me-2 text-success"></i> 7-Day Relaxation Plan</span>
                  <button class="btn btn-sm restorative-btn">Download</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-book me-2 text-info"></i> Meditation Scripts</span>
                  <button class="btn btn-sm restorative-btn">Download</button>
                </li>
              </ul>
            </div>
          </div>
          
          <!-- Benefits of Restorative Yoga -->
          <div class="card mb-4 restorative-card">
            <div class="card-body">
              <h5 class="card-title">Healing Benefits</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Activates parasympathetic nervous system</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Reduces cortisol levels</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Improves sleep quality</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Lowers blood pressure</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Enhances immune function</li>
              </ul>
            </div>
          </div>
          
          <!-- Upcoming Restorative Classes -->
          <div class="card restorative-card">
            <div class="card-body">
              <h5 class="card-title">Upcoming Restorative Sessions</h5>
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">Evening Restorative</h6>
                    <small>Tomorrow 7:30 PM</small>
                  </div>
                  <p class="mb-1">With <?php echo $instructor; ?></p>
                  <small><i class="fas fa-couch me-1"></i> All props provided</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">Restorative & Reiki</h6>
                    <small>Sun 4:00 PM</small>
                  </div>
                  <p class="mb-1">With Priya Sharma</p>
                  <small><i class="fas fa-spa me-1"></i> Energy healing included</small>
                </a>
              </div>
            </div>
          </div>
          
          <!-- Prop Alternatives -->
          <div class="card mt-4 restorative-card">
            <div class="card-body">
              <h5 class="card-title">Prop Alternatives</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fas fa-couch prop-icon"></i> <strong>Bolster:</strong> Stack of firm pillows</li>
                <li class="list-group-item"><i class="fas fa-couch prop-icon"></i> <strong>Blocks:</strong> Thick books</li>
                <li class="list-group-item"><i class="fas fa-couch prop-icon"></i> <strong>Straps:</strong> Belt or scarf</li>
                <li class="list-group-item"><i class="fas fa-couch prop-icon"></i> <strong>Blankets:</strong> Towels or throws</li>
              </ul>
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
          <h5 class="mb-3">Peaceful Updates</h5>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Your email">
            <button class="btn restorative-btn" type="button" style="padding: 8px 20px;">Subscribe</button>
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
          this.classList.remove('restorative-btn');
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