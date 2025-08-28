<?php
//include_once "navbar.php";

// Set Power Yoga specific parameters
$className = "Power Yoga";
$classDescription = "7-day intense program combining strength, flexibility and endurance";
$instructor = "Alex Martinez";
$duration = "45-60 mins per day";
$thumbnail = "https://images.unsplash.com/photo-1575058752200-a9d6c0f41945?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80";
$level = "Advanced";
$calories = "400-600 calories/session";
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
    /* Power Yoga Specific Styles */
    .power-header {
      background: linear-gradient(135deg, #f8f9fa 0%, #f9e9e9 100%);
    }
    .power-tab .nav-link.active {
      border-bottom-color: #e74c3c;
      color: #e74c3c;
    }
    .power-card {
      border-left: 4px solid #e74c3c;
    }
    .power-highlight {
      color: #e74c3c;
      font-weight: 600;
    }
    .power-btn {
      background-color: #e74c3c;
      border-color: #e74c3c;
    }
    .power-btn:hover {
      background-color: #d62c1a;
      border-color: #d62c1a;
    }
    .intensity-badge {
      background-color: #e74c3c;
    }
    .flame-icon {
      color: #e74c3c;
    }
    .class-details {
      background-color: #fff5f5;
      border-radius: 8px;
    }
    .power-progress .progress-bar {
      background-color: #e74c3c;
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
  <section class="class-header py-5 power-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h1 class="display-4 fw-bold"><?php echo $className; ?></h1>
          <p class="lead"><?php echo $classDescription; ?></p>
          <div class="d-flex align-items-center flex-wrap mt-3">
            <div class="me-4 mb-2">
              <i class="fas fa-user text-primary me-2"></i>
              <span><?php echo $instructor; ?></span>
            </div>
            <div class="me-4 mb-2">
              <i class="fas fa-clock text-primary me-2"></i>
              <span><?php echo $duration; ?></span>
            </div>
            <div class="me-4 mb-2">
              <i class="fas fa-bolt text-warning me-2"></i>
              <span><?php echo $level; ?></span>
            </div>
            <div class="mb-2">
              <i class="fas fa-fire flame-icon me-2"></i>
              <span><?php echo $calories; ?></span>
            </div>
          </div>
          <div class="mt-2">
            <span class="badge intensity-badge me-2"><i class="fas fa-heartbeat me-1"></i> High Intensity</span>
            <span class="badge intensity-badge me-2"><i class="fas fa-dumbbell me-1"></i> Strength Building</span>
            <span class="badge intensity-badge"><i class="fas fa-tachometer-alt me-1"></i> Fast-Paced</span>
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
          <div class="card mb-4 power-card">
            <div class="card-body">
              <h3 class="card-title mb-4">7-Day Power Yoga Challenge</h3>
              <div class="alert alert-warning">
                <i class="fas fa-exclamation-triangle me-2"></i> This is an intense program. Stay hydrated and modify as needed.
              </div>
              
              <!-- Day Navigation -->
              <ul class="nav nav-tabs mb-4 power-tab" id="dayTabs" role="tablist">
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
                  <h4>Core Power</h4>
                  <p>Kickstart your week with this intense core-focused sequence.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/X3-gKPNyrTA" allowfullscreen></iframe>
                    </div>
                  <div class="class-details p-4">
                    <h5>Today's Power Sequence</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="power-highlight"><i class="fas fa-fire flame-icon me-2"></i>Strength Focus</h6>
                        <ul>
                          <li>Boat Pose Variations</li>
                          <li>Plank to Chaturanga Flow</li>
                          <li>Side Plank Crunches</li>
                          <li>Hovering Lunge Series</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <h6 class="power-highlight"><i class="fas fa-tachometer-alt me-2"></i>Cardio Bursts</h6>
                        <ul>
                          <li>Jumping Lunges</li>
                          <li>Burpee to Plank</li>
                          <li>Power Sun Salutations</li>
                        </ul>
                      </div>
                    </div>
                    <button class="btn power-btn mt-3">Complete Workout</button>
                  </div>
                </div>
                
                <!-- Tuesday -->
                <div class="tab-pane fade" id="tuesday" role="tabpanel">
                  <h4>Upper Body Blast</h4>
                  <p>Arm balances and strength builders for powerful upper body.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe src="https://www.youtube.com/embed/X3-gKPNyrTA" allowfullscreen></iframe>
                  </div>
                  <div class="class-details p-4">
                    <h5>Today's Power Sequence</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="power-highlight"><i class="fas fa-fire flame-icon me-2"></i>Strength Focus</h6>
                        <ul>
                          <li>Crow Pose to Headstand</li>
                          <li>Chaturanga Push-Up Series</li>
                          <li>Dolphin Plank Holds</li>
                          <li>Side Crow Variations</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <h6 class="power-highlight"><i class="fas fa-tachometer-alt me-2"></i>Cardio Bursts</h6>
                        <ul>
                          <li>Plank Jacks</li>
                          <li>Power Vinyasa Flows</li>
                          <li>Jump Backs to Plank</li>
                        </ul>
                      </div>
                    </div>
                    <button class="btn power-btn mt-3">Complete Workout</button>
                  </div>
                </div>
                
                <!-- Wednesday -->
                <div class="tab-pane fade" id="wednesday" role="tabpanel">
                  <h4>Warrior Strength</h4>
                  <p>Lower body endurance with warrior flows and balance challenges.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe src="https://www.youtube.com/embed/4pKly2JojMw" allowfullscreen></iframe>
                  </div>
                  <div class="class-details p-4">
                    <h5>Today's Power Sequence</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="power-highlight"><i class="fas fa-fire flame-icon me-2"></i>Strength Focus</h6>
                        <ul>
                          <li>Warrior III to Half Moon Flow</li>
                          <li>Humble Warrior Squats</li>
                          <li>Flying Warrior Sequence</li>
                          <li>Chair Pose Pulse Series</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <h6 class="power-highlight"><i class="fas fa-tachometer-alt me-2"></i>Cardio Bursts</h6>
                        <ul>
                          <li>Jumping Warrior Transitions</li>
                          <li>Plyometric Lunges</li>
                          <li>Power Flow Sequences</li>
                        </ul>
                      </div>
                    </div>
                    <button class="btn power-btn mt-3">Complete Workout</button>
                  </div>
                </div>
                
                <!-- Thursday -->
                <div class="tab-pane fade" id="thursday" role="tabpanel">
                  <h4>Backbend Power</h4>
                  <p>Heart-opening sequences to build back strength and flexibility.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/X3-gKPNyrTA" allowfullscreen></iframe>
                    </div>
                  <div class="class-details p-4">
                    <h5>Today's Power Sequence</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="power-highlight"><i class="fas fa-fire flame-icon me-2"></i>Strength Focus</h6>
                        <ul>
                          <li>Wheel Pose Variations</li>
                          <li>Locust Pose Series</li>
                          <li>Bow Pose Pulses</li>
                          <li>Camel Pose with Resistance</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <h6 class="power-highlight"><i class="fas fa-tachometer-alt me-2"></i>Cardio Bursts</h6>
                        <ul>
                          <li>Chaturanga to Up Dog Flow</li>
                          <li>Power Backbend Transitions</li>
                          <li>Jump Throughs</li>
                        </ul>
                      </div>
                    </div>
                    <button class="btn power-btn mt-3">Complete Workout</button>
                  </div>
                </div>
                
                <!-- Friday -->
                <div class="tab-pane fade" id="friday" role="tabpanel">
                  <h4>Full Body Burn</h4>
                  <p>High-intensity sequence targeting all muscle groups.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe src="https://www.youtube.com/embed/Eml2xnoLpYE" allowfullscreen></iframe>
                  </div>
                  <div class="class-details p-4">
                    <h5>Today's Power Sequence</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="power-highlight"><i class="fas fa-fire flame-icon me-2"></i>Strength Focus</h6>
                        <ul>
                          <li>Plank to Side Plank Series</li>
                          <li>Warrior Flow Complex</li>
                          <li>Bridge Pose with Leg Lifts</li>
                          <li>Arm Balance Play</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <h6 class="power-highlight"><i class="fas fa-tachometer-alt me-2"></i>Cardio Bursts</h6>
                        <ul>
                          <li>Burpee to Jump Squat</li>
                          <li>Power Flow Sequences</li>
                          <li>Plyometric Transitions</li>
                        </ul>
                      </div>
                    </div>
                    <button class="btn power-btn mt-3">Complete Workout</button>
                  </div>
                </div>
                
                <!-- Saturday -->
                <div class="tab-pane fade" id="saturday" role="tabpanel">
                  <h4>Inversion Challenge</h4>
                  <p>Build confidence with advanced inversions and arm balances.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/X3-gKPNyrTA" allowfullscreen></iframe>
                    </div>
                  <div class="class-details p-4">
                    <h5>Today's Power Sequence</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="power-highlight"><i class="fas fa-fire flame-icon me-2"></i>Strength Focus</h6>
                        <ul>
                          <li>Headstand Variations</li>
                          <li>Forearm Stand Prep</li>
                          <li>Handstand Drills</li>
                          <li>Arm Balance Transitions</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <h6 class="power-highlight"><i class="fas fa-tachometer-alt me-2"></i>Cardio Bursts</h6>
                        <ul>
                          <li>Inversion Flow Sequences</li>
                          <li>Power Jump Backs</li>
                          <li>Dynamic Core Activation</li>
                        </ul>
                      </div>
                    </div>
                    <button class="btn power-btn mt-3">Complete Workout</button>
                  </div>
                </div>
                
                <!-- Sunday -->
                <div class="tab-pane fade" id="sunday" role="tabpanel">
                  <h4>Active Recovery</h4>
                  <p>Dynamic stretching and mobility work to restore and prepare.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/X3-gKPNyrTA" allowfullscreen></iframe>
                    </div>
                  <div class="class-details p-4">
                    <h5>Today's Power Sequence</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="power-highlight"><i class="fas fa-fire flame-icon me-2"></i>Strength Focus</h6>
                        <ul>
                          <li>Dynamic Hip Openers</li>
                          <li>Active Shoulder Stretches</li>
                          <li>Core Stability Drills</li>
                          <li>Mobility Flows</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <h6 class="power-highlight"><i class="fas fa-tachometer-alt me-2"></i>Movement Focus</h6>
                        <ul>
                          <li>Fluid Vinyasa Sequences</li>
                          <li>Balance Challenges</li>
                          <li>Controlled Transitions</li>
                        </ul>
                      </div>
                    </div>
                    <button class="btn power-btn mt-3">Complete Workout</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Class Progress -->
          <div class="card mb-4 power-card power-progress">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Your Power Challenge Progress</h5>
                <span class="badge bg-dark"><i class="fas fa-fire me-1"></i> <?php echo $calories; ?></span>
              </div>
              <div class="progress mb-3" style="height: 20px;">
                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
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
          <div class="card mb-4 power-card">
            <div class="card-body">
              <h5 class="card-title">Power Yoga Toolkit</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-file-pdf me-2 text-danger"></i> Strength Sequences PDF</span>
                  <button class="btn btn-sm power-btn">Download</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-music me-2 text-primary"></i> High-Energy Playlist</span>
                  <button class="btn btn-sm power-btn">Download</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-list-check me-2 text-success"></i> 7-Day Challenge Tracker</span>
                  <button class="btn btn-sm power-btn">Download</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-dumbbell me-2 text-info"></i> Arm Balance Guide</span>
                  <button class="btn btn-sm power-btn">Download</button>
                </li>
              </ul>
            </div>
          </div>
          
          <!-- Benefits of Power Yoga -->
          <div class="card mb-4 power-card">
            <div class="card-body">
              <h5 class="card-title">Power Benefits</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Builds lean muscle mass</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Improves cardiovascular endurance</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Enhances core strength</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Increases metabolic rate</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Boosts mental toughness</li>
              </ul>
            </div>
          </div>
          
          <!-- Upcoming Power Classes -->
          <div class="card mb-4 power-card">
            <div class="card-body">
              <h5 class="card-title">Upcoming Power Sessions</h5>
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">Morning Power Flow</h6>
                    <small>Tomorrow 6:00 AM</small>
                  </div>
                  <p class="mb-1">With <?php echo $instructor; ?></p>
                  <small><i class="fas fa-bolt text-warning me-1"></i> High Intensity</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">Advanced Power Hour</h6>
                    <small>Wed 7:00 PM</small>
                  </div>
                  <p class="mb-1">With Jordan Lee</p>
                  <small><i class="fas fa-fire flame-icon me-1"></i> 600+ Calories</small>
                </a>
              </div>
            </div>
          </div>
          
          <!-- Modifications -->
          <div class="card power-card">
            <div class="card-body">
              <h5 class="card-title">Modifications</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fas fa-running me-2"></i> <strong>Beginner:</strong> Skip jumps, hold poses longer</li>
                <li class="list-group-item"><i class="fas fa-user-injured me-2"></i> <strong>Injuries:</strong> Avoid painful movements</li>
                <li class="list-group-item"><i class="fas fa-glass-whiskey me-2"></i> <strong>Hydration:</strong> Keep water nearby</li>
                <li class="list-group-item"><i class="fas fa-stopwatch me-2"></i> <strong>Pacing:</strong> Take breaks as needed</li>
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
            <li class="mb-2"><a href="explore-services.php" class="text-white">Explore Yoga</a></li>
            <li class="mb-2"><a href="how-it-works.php" class="text-white">How It Works</a></li>
            <li><a href="stories.php" class="text-white">Success Stories</a></li>
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
          <h5 class="mb-3">Energy Updates</h5>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Your email">
            <button class="btn power-btn" type="button" style="padding: 8px 20px;">Subscribe</button>
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
          this.classList.remove('power-btn');
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