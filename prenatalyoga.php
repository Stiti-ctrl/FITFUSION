<?php
//include_once "navbar.php";

// Set Prenatal Yoga specific parameters
$className = "Prenatal Yoga";
$classDescription = "Gentle 7-week program designed for all trimesters to support your pregnancy journey";
$instructor = "Dr. Priya Nair (Certified Prenatal Instructor)";
$duration = "30-45 mins per session";
$thumbnail = "https://images.unsplash.com/photo-1530026186672-2cd00ffc50fe?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80";
$level = "All Levels";
$trimester = "All Trimesters";
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
    /* Prenatal Yoga Specific Styles */
    .prenatal-header {
      background: linear-gradient(135deg, #f8f9fa 0%, #f9e9f5 100%);
    }
    .prenatal-tab .nav-link.active {
      border-bottom-color: #d67fb0;
      color: #d67fb0;
    }
    .prenatal-card {
      border-left: 4px solid #d67fb0;
      background-color: #fef9fc;
    }
    .prenatal-highlight {
      color: #d67fb0;
      font-weight: 600;
    }
    .prenatal-btn {
      background-color: #d67fb0;
      border-color: #d67fb0;
    }
    .prenatal-btn:hover {
      background-color: #c66fa0;
      border-color: #c66fa0;
    }
    .trimester-badge {
      background-color: #d67fb0;
    }
    .baby-icon {
      color: #d67fb0;
    }
    .safety-alert {
      border-left: 4px solid #d67fb0;
    }
    .benefit-item {
      border-left: 3px solid #d67fb0;
      padding-left: 10px;
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
  <section class="class-header py-5 prenatal-header">
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
              <i class="fas fa-baby baby-icon me-2"></i>
              <span><?php echo $trimester; ?></span>
            </div>
            <div class="mb-2">
              <i class="fas fa-heart text-danger me-2"></i>
              <span>OB-GYN Approved</span>
            </div>
          </div>
          <div class="mt-2">
            <span class="badge trimester-badge me-2"><i class="fas fa-check-circle me-1"></i> Safe for Pregnancy</span>
            <span class="badge trimester-badge me-2"><i class="fas fa-spa me-1"></i> Pelvic Floor Focus</span>
            <span class="badge trimester-badge"><i class="fas fa-hands-helping me-1"></i> Partner Poses Included</span>
          </div>
        </div>
        <div class="col-md-4 text-md-end">
          <img src="<?php echo $thumbnail; ?>" alt="<?php echo $className; ?>" class="img-fluid rounded shadow" style="max-height: 200px;">
        </div>
      </div>
    </div>
  </section>

  <!-- Safety Notice -->
  <div class="container mt-4">
    <div class="alert alert-light safety-alert">
      <div class="d-flex align-items-center">
        <i class="fas fa-exclamation-circle text-danger me-3 fs-4"></i>
        <div>
          <strong>Consult your healthcare provider</strong> before beginning any exercise program during pregnancy. 
          Discontinue any pose that causes discomfort and listen to your body.
        </div>
      </div>
    </div>
  </div>

  <!-- Class Content -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="card mb-4 prenatal-card">
            <div class="card-body">
              <h3 class="card-title mb-4">7-Week Prenatal Journey</h3>
              
              <!-- Week Navigation -->
              <ul class="nav nav-tabs mb-4 prenatal-tab" id="weekTabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="week1-tab" data-bs-toggle="tab" data-bs-target="#week1" type="button" role="tab">Week 1</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="week2-tab" data-bs-toggle="tab" data-bs-target="#week2" type="button" role="tab">Week 2</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="week3-tab" data-bs-toggle="tab" data-bs-target="#week3" type="button" role="tab">Week 3</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="week4-tab" data-bs-toggle="tab" data-bs-target="#week4" type="button" role="tab">Week 4</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="week5-tab" data-bs-toggle="tab" data-bs-target="#week5" type="button" role="tab">Week 5</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="week6-tab" data-bs-toggle="tab" data-bs-target="#week6" type="button" role="tab">Week 6</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="week7-tab" data-bs-toggle="tab" data-bs-target="#week7" type="button" role="tab">Week 7</button>
                </li>
              </ul>
              
              <!-- Week Content -->
              <div class="tab-content" id="weekTabsContent">
                <!-- Week 1 -->
                <div class="tab-pane fade show active" id="week1" role="tabpanel">
                  <h4>Foundations of Prenatal Yoga</h4>
                  <p>Begin with safe breathing techniques and gentle movements to connect with your changing body.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/4pKly2JojMw" allowfullscreen></iframe>
                    </div>
                  <div class="class-details p-4">
                    <h5>This Week's Focus</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="prenatal-highlight"><i class="fas fa-baby baby-icon me-2"></i>Prenatal Basics</h6>
                        <ul>
                          <li>Modified Cat-Cow for pregnancy</li>
                          <li>Pelvic Tilts and Circles</li>
                          <li>Supported Squats</li>
                          <li>Prenatal Breathing Techniques</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <h6 class="prenatal-highlight"><i class="fas fa-heartbeat me-2"></i>Wellness Tips</h6>
                        <ul>
                          <li>Hydration guidelines</li>
                          <li>Listening to your body</li>
                          <li>Safe movement principles</li>
                        </ul>
                      </div>
                    </div>
                    <button class="btn prenatal-btn mt-3">Complete Session</button>
                  </div>
                </div>
                
                <!-- Week 2 -->
                <div class="tab-pane fade" id="week2" role="tabpanel">
                  <h4>Pelvic Floor Awareness</h4>
                  <p>Learn exercises to strengthen and relax your pelvic floor in preparation for birth.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe src="https://www.youtube.com/embed/X3-gKPNyrTA" allowfullscreen></iframe>
                  </div>
                  <div class="class-details p-4">
                    <h5>This Week's Focus</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="prenatal-highlight"><i class="fas fa-baby baby-icon me-2"></i>Prenatal Poses</h6>
                        <ul>
                          <li>Kegel Awareness Exercises</li>
                          <li>Supported Bridge Pose</li>
                          <li>Tailor Sitting Variations</li>
                          <li>Side-Lying Stretches</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <h6 class="prenatal-highlight"><i class="fas fa-heartbeat me-2"></i>Wellness Tips</h6>
                        <ul>
                          <li>Pelvic floor health</li>
                          <li>Posture adjustments</li>
                          <li>Relieving round ligament pain</li>
                        </ul>
                      </div>
                    </div>
                    <button class="btn prenatal-btn mt-3">Complete Session</button>
                  </div>
                </div>
                
                <!-- Week 3 -->
                <div class="tab-pane fade" id="week3" role="tabpanel">
                  <h4>Hip Openers & Back Relief</h4>
                  <p>Gentle sequences to create space in the hips and relieve common back discomfort.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe src="https://www.youtube.com/embed/4pKly2JojMw" allowfullscreen></iframe>
                  </div>
                  <div class="class-details p-4">
                    <h5>This Week's Focus</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="prenatal-highlight"><i class="fas fa-baby baby-icon me-2"></i>Prenatal Poses</h6>
                        <ul>
                          <li>Supported Pigeon Pose</li>
                          <li>Seated Butterfly Stretch</li>
                          <li>Pelvic Clock Exercise</li>
                          <li>Side-Lying Release</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <h6 class="prenatal-highlight"><i class="fas fa-heartbeat me-2"></i>Wellness Tips</h6>
                        <ul>
                          <li>Managing sciatica</li>
                          <li>Sleep position guidance</li>
                          <li>Safe twisting alternatives</li>
                        </ul>
                      </div>
                    </div>
                    <button class="btn prenatal-btn mt-3">Complete Session</button>
                  </div>
                </div>
                
                <!-- Week 4 -->
                <div class="tab-pane fade" id="week4" role="tabpanel">
                  <h4>Partner-Assisted Yoga</h4>
                  <p>Gentle poses with partner support to deepen relaxation and connection.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/4pKly2JojMw" allowfullscreen></iframe>
                    </div>
                  <div class="class-details p-4">
                    <h5>This Week's Focus</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="prenatal-highlight"><i class="fas fa-baby baby-icon me-2"></i>Partner Poses</h6>
                        <ul>
                          <li>Supported Squat with Partner</li>
                          <li>Double Seated Forward Fold</li>
                          <li>Partner-Assisted Hip Stretch</li>
                          <li>Guided Relaxation Together</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <h6 class="prenatal-highlight"><i class="fas fa-heartbeat me-2"></i>Wellness Tips</h6>
                        <ul>
                          <li>Bonding during pregnancy</li>
                          <li>Massage techniques</li>
                          <li>Communication exercises</li>
                        </ul>
                      </div>
                    </div>
                    <button class="btn prenatal-btn mt-3">Complete Session</button>
                  </div>
                </div>
                
                <!-- Week 5 -->
                <div class="tab-pane fade" id="week5" role="tabpanel">
                  <h4>Preparation for Birth</h4>
                  <p>Movements and breathing techniques to prepare your body for labor.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe src="https://www.youtube.com/embed/Eml2xnoLpYE" allowfullscreen></iframe>
                  </div>
                  <div class="class-details p-4">
                    <h5>This Week's Focus</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="prenatal-highlight"><i class="fas fa-baby baby-icon me-2"></i>Birth Prep Poses</h6>
                        <ul>
                          <li>Birth Ball Exercises</li>
                          <li>Labor Breathing Techniques</li>
                          <li>Supported Deep Squats</li>
                          <li>Pelvic Floor Release</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <h6 class="prenatal-highlight"><i class="fas fa-heartbeat me-2"></i>Wellness Tips</h6>
                        <ul>
                          <li>Labor positions</li>
                          <li>Breathing for pain management</li>
                          <li>When to stop exercising</li>
                        </ul>
                      </div>
                    </div>
                    <button class="btn prenatal-btn mt-3">Complete Session</button>
                  </div>
                </div>
                
                <!-- Week 6 -->
                <div class="tab-pane fade" id="week6" role="tabpanel">
                  <h4>Third Trimester Focus</h4>
                  <p>Special modifications for your changing body in later pregnancy.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/4pKly2JojMw" allowfullscreen></iframe>
                    </div>
                  <div class="class-details p-4">
                    <h5>This Week's Focus</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="prenatal-highlight"><i class="fas fa-baby baby-icon me-2"></i>Third Trimester Poses</h6>
                        <ul>
                          <li>Supported Standing Poses</li>
                          <li>Side-Lying Stretches</li>
                          <li>Pelvic Floor Relaxation</li>
                          <li>Gentle Inversion Options</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <h6 class="prenatal-highlight"><i class="fas fa-heartbeat me-2"></i>Wellness Tips</h6>
                        <ul>
                          <li>Managing swelling</li>
                          <li>Sleep strategies</li>
                          <li>Signs of labor</li>
                        </ul>
                      </div>
                    </div>
                    <button class="btn prenatal-btn mt-3">Complete Session</button>
                  </div>
                </div>
                
                <!-- Week 7 -->
                <div class="tab-pane fade" id="week7" role="tabpanel">
                  <h4>Postpartum Preparation</h4>
                  <p>Gentle movements and education for the fourth trimester.</p>
                  <div class="ratio ratio-16x9 mb-4">
                  <iframe src="https://www.youtube.com/embed/4pKly2JojMw" allowfullscreen></iframe>
                    </div>
                  <div class="class-details p-4">
                    <h5>This Week's Focus</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="prenatal-highlight"><i class="fas fa-baby baby-icon me-2"></i>Recovery Poses</h6>
                        <ul>
                          <li>Gentle Core Engagement</li>
                          <li>Restorative Pelvic Floor Work</li>
                          <li>Upper Back Relief</li>
                          <li>Bonding Meditation</li>
                        </ul>
                      </div>
                      <div class="col-md-6">
                        <h6 class="prenatal-highlight"><i class="fas fa-heartbeat me-2"></i>Wellness Tips</h6>
                        <ul>
                          <li>Postpartum recovery timeline</li>
                          <li>Returning to exercise</li>
                          <li>Self-care strategies</li>
                        </ul>
                      </div>
                    </div>
                    <button class="btn prenatal-btn mt-3">Complete Session</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Class Progress -->
          <div class="card mb-4 prenatal-card">
            <div class="card-body">
              <h5 class="card-title">Your Pregnancy Journey</h5>
              <div class="progress mb-3" style="height: 20px;">
                <div class="progress-bar" role="progressbar" style="width: 0%; background-color: #d67fb0;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
              </div>
              <div class="row text-center">
                <div class="col">
                  <div class="week-progress">Week 1</div>
                </div>
                <div class="col">
                  <div class="week-progress">Week 2</div>
                </div>
                <div class="col">
                  <div class="week-progress">Week 3</div>
                </div>
                <div class="col">
                  <div class="week-progress">Week 4</div>
                </div>
                <div class="col">
                  <div class="week-progress">Week 5</div>
                </div>
                <div class="col">
                  <div class="week-progress">Week 6</div>
                </div>
                <div class="col">
                  <div class="week-progress">Week 7</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Sidebar -->
        <div class="col-lg-4">
          <!-- Pregnancy Resources -->
          <div class="card mb-4 prenatal-card">
            <div class="card-body">
              <h5 class="card-title">Pregnancy Resources</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-file-pdf me-2 text-danger"></i> Trimester Modifications Guide</span>
                  <button class="btn btn-sm prenatal-btn">Download</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-music me-2 text-primary"></i> Relaxation Soundscapes</span>
                  <button class="btn btn-sm prenatal-btn">Download</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-list-check me-2 text-success"></i> Pregnancy Wellness Tracker</span>
                  <button class="btn btn-sm prenatal-btn">Download</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-book me-2 text-info"></i> Birth Preparation Journal</span>
                  <button class="btn btn-sm prenatal-btn">Download</button>
                </li>
              </ul>
            </div>
          </div>
          
          <!-- Benefits of Prenatal Yoga -->
          <div class="card mb-4 prenatal-card">
            <div class="card-body">
              <h5 class="card-title">Benefits for Mom & Baby</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item benefit-item"><i class="fas fa-check-circle me-2 text-success"></i> Reduces pregnancy discomfort</li>
                <li class="list-group-item benefit-item"><i class="fas fa-check-circle me-2 text-success"></i> Improves sleep quality</li>
                <li class="list-group-item benefit-item"><i class="fas fa-check-circle me-2 text-success"></i> Prepares body for labor</li>
                <li class="list-group-item benefit-item"><i class="fas fa-check-circle me-2 text-success"></i> Reduces stress and anxiety</li>
                <li class="list-group-item benefit-item"><i class="fas fa-check-circle me-2 text-success"></i> Promotes optimal fetal positioning</li>
              </ul>
            </div>
          </div>
          
          <!-- Upcoming Prenatal Classes -->
          <div class="card mb-4 prenatal-card">
            <div class="card-body">
              <h5 class="card-title">Upcoming Prenatal Sessions</h5>
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">Gentle Prenatal Flow</h6>
                    <small>Tomorrow 10:00 AM</small>
                  </div>
                  <p class="mb-1">With <?php echo $instructor; ?></p>
                  <small><i class="fas fa-baby baby-icon me-1"></i> All trimesters</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">Partner Prenatal Yoga</h6>
                    <small>Sat 2:00 PM</small>
                  </div>
                  <p class="mb-1">With Ananya Desai</p>
                  <small><i class="fas fa-heart text-danger me-1"></i> Bring your partner</small>
                </a>
              </div>
            </div>
          </div>
          
          <!-- Safety Tips -->
          <div class="card prenatal-card">
            <div class="card-body">
              <h5 class="card-title">Safety Reminders</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fas fa-ban text-danger me-2"></i> Avoid deep twists</li>
                <li class="list-group-item"><i class="fas fa-ban text-danger me-2"></i> No lying flat on back after 1st trimester</li>
                <li class="list-group-item"><i class="fas fa-ban text-danger me-2"></i> Skip intense abdominal work</li>
                <li class="list-group-item"><i class="fas fa-exclamation-triangle text-warning me-2"></i> Modify balance poses</li>
                <li class="list-group-item"><i class="fas fa-glass-whiskey me-2"></i> Stay hydrated</li>
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
          <p>Supporting mothers through every stage of pregnancy.</p>
        </div>
        <div class="col-md-2 mb-4 mb-md-0">
          <h5 class="mb-3">Quick Links</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="index.php" class="text-white">Home</a></li>
            <li class="mb-2"><a href="explore-services.php" class="text-white">Prenatal Care</a></li>
            <li><a href="stories.php" class="text-white">Motherhood Stories</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-4 mb-md-0">
          <h5 class="mb-3">Contact Us</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="fas fa-phone-alt me-2"></i> +91 9876543210</li>
            <li class="mb-2"><i class="fas fa-envelope me-2"></i> mothers@fitfusion.com</li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5 class="mb-3">Motherhood Updates</h5>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Your email">
            <button class="btn prenatal-btn" type="button" style="padding: 8px 20px;">Subscribe</button>
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
      // Mark week as completed
      const weekProgress = document.querySelectorAll('.week-progress');
      weekProgress.forEach(week => {
        week.addEventListener('click', function() {
          this.classList.toggle('completed');
          updateProgress();
        });
      });
      
      // Mark as completed buttons
      const completeButtons = document.querySelectorAll('.class-details button');
      completeButtons.forEach(button => {
        button.addEventListener('click', function() {
          const tabPane = this.closest('.tab-pane');
          const weekIndex = Array.from(tabPane.parentElement.children).indexOf(tabPane);
          const weekElements = document.querySelectorAll('.week-progress');
          
          // Mark corresponding week as completed
          weekElements[weekIndex].classList.add('completed');
          
          updateProgress();
          this.textContent = 'Completed!';
          this.classList.add('btn-success');
          this.classList.remove('prenatal-btn');
        });
      });
      
      // Update progress bar
      function updateProgress() {
        const completed = document.querySelectorAll('.week-progress.completed').length;
        const total = weekProgress.length;
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