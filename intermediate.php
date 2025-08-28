<?php
// include_once "navbar.php";

// // Set Hatha Yoga specific parameters
// $className = "Hatha Yoga";
// $classDescription = "7-day beginner program focusing on basic postures and breathing techniques";
// $instructor = "Priya Sharma";
// $duration = "25-30 mins per day";
// $thumbnail = "https://images.unsplash.com/photo-1545389336-cf090694435e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80";
// $level = "Beginner";
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $className; ?> | FITFUSION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="cssfile/workout.css">
  <style>
    
    .intermidiate-header {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9f5f9 100%);
    }
    .intermediate-tab .nav-link.active {
      border-bottom-color: #4a8bad;
      color: #4a8bad;
    }
    .intermediate-card {
      border-left: 4px solid #4a8bad;
    }
    .intermediate-highlight {
      color: #4a8bad;
      font-weight: 600;
    }
    .intermediate-btn {
      background-color: #4a8bad;
      border-color: #4a8bad;
    }
    .intermediate-btn:hover {
      background-color: #3a7a9d;
      border-color: #3a7a9d;
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
  <section class="class-header py-5 beginner-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h1 class="display-4 fw-bold">
            <?php //echo $className; ?>
          </h1>
          <p class="lead"><?php //echo $classDescription; ?></p>
          <div class="d-flex align-items-center mt-3">
            <div class="me-4">
              <i class="fas fa-user text-primary me-2"></i>
              <span><?php //echo $instructor; ?></span>
            </div>
            <div class="me-4">
              <i class="fas fa-clock text-primary me-2"></i>
              <span><?php //echo $duration; ?></span>
            </div>
            <div>
              <i class="fas fa-chart-line text-primary me-2"></i>
              <span><?php //echo $level; ?></span>
            </div>
          </div>
        </div>
        <div class="col-md-4 text-md-end">
         <!-- <img src="<?php //echo $thumbnail; ?>alt="<?php //echo $className; ?>" class="img-fluid rounded shadow" style="max-height: 200px;"> -->
        </div>
      </div>
    </div>
  </section>

  <!-- Class Content -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="card mb-4 beginner-card">
            <div class="card-body">
              <h3 class="card-title mb-4">7 Days-intermediateJourney</h3>
              
              <!-- Day Navigation -->
              <ul class="nav nav-tabs mb-4 hatha-tab" id="dayTabs" role="tablist">
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
                  <h4>Foundations of intermediate yoga</h4>
                  <p>Begin your journey with learning the foundations of beginner workout.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe width="914" height="514" src="https://www.youtube.com/embed/6FyHoo4Vfxg" title="15 Min Stretches for Neck, Shoulder + Back Pain Relief | Deep Tension Relief Yoga Style | QUICK HELP" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                  </div>
                  <div class="class-details">
                    <h5>Today's Practice</h5>
                    <ul>
                      <li><span class="intermediate-highlight">jumping jacks:</span> maintain breathing and pace</li>
                      <li><span class="intermediate-highlight">squats:</span> Stretch your hamstrings</li>
                      <li><span class="intermediate-highlight">pushup</span> upper body strength</li>
                      <li><span class="intermediate-highlight">standing jacks:</span> slow and fun</li>
                    </ul>
                    <button class="btn intermediate-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Tuesday -->
                <div class="tab-pane fade" id="tuesday" role="tabpanel">
                  <h4>lets do more</h4>
                  <p>Explore fundamental and flexible workouts.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe width="914" height="514" src="https://www.youtube.com/embed/WnSr8w4QEWo" title="30 Min FLEXIBILITY + STRETCHING ROUTINE | Full Body Relaxation | Beginner Friendly, YOGA inspired" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                  </div>
                  <div class="class-details">
                    <h5>Today's Practice</h5>
                    <ul>
                      <li><span class="intermediate-highlight">pushups</span> maintain breathing</li>
                      <li><span class="intermediate-highlight">leg raise:</span> flexible your legs</li>
                      <li><span class="intermediate-highlight">glute bridge:</span> Opens the hips</li>
                      <li><span class="intermediate-highlight">Simple movements:</span> to rest it out</li>
                    </ul>
                    <button class="btn intermediate-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Wednesday -->
                <div class="tab-pane fade" id="wednesday" role="tabpanel">
                  <h4>high level practice</h4>
                  <p>Mid-week fun and workout.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe width="914" height="514" src="https://www.youtube.com/embed/6FyHoo4Vfxg" title="15 Min Stretches for Neck, Shoulder + Back Pain Relief | Deep Tension Relief Yoga Style | QUICK HELP" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                  </div>
                  <div class="class-details">
                    <h5>Today's Practice</h5>
                    <ul>
                      <li><span class="intermediate-highlight">pushups</span> maintain breathing</li>
                      <li><span class="intermediate-highlight">leg raise:</span> flexible your legs</li>
                      <li><span class="intermediate-highlight">glute bridge:</span> Opens the hips</li>
                      <li><span class="intermediate-highlight">Simple movements:</span> to rest it out</li>
                    </ul>
                    <button class="btn intermediate-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Thursday -->
                <div class="tab-pane fade" id="thursday" role="tabpanel">
                  <h4>stength training</h4>
                  <p>Improve your balance and overall strength.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe width="914" height="514" src="https://www.youtube.com/embed/cbKkB3POqaY" title="25 MIN FULL BODY HIIT for Beginners - No Equipment - No Repeat Home Workout" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                  </div>
                  <div class="class-details">
                    <h5>Today's Practice</h5>
                    <ul>
                        <li><span class="intermediate-highlight">jumping jacks:</span> maintain breathing and pace</li>
                      <li><span class="intermediate-highlight">squats:</span> Stretch your hamstrings</li>
                      <li><span class="intermediate-highlight">pushup</span> upper body strength</li>
                      <li><span class="intermediate-highlight">standing jacks:</span> slow and fun</li>
                    </ul>
                    <button class="btn intermediate-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Friday -->
                <div class="tab-pane fade" id="friday" role="tabpanel">
                  <h4>core stability</h4>
                  <p>stengthen your core muscles.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe width="914" height="514" src="https://www.youtube.com/embed/cbKkB3POqaY" title="25 MIN FULL BODY HIIT for Beginners - No Equipment - No Repeat Home Workout" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                  </div>
                  <div class="class-details">
                    <h5>Today's Practice</h5>
                    <ul>
                      <li><span class="intermediate-highlight">abs crunch:</span> Spinal flexibility</li>
                      <li><span class="intermediate-highlight">mountain climber:</span> Deep hamstring stretch</li>
                      <li><span class="intermediate-highlight">leg raise:</span> Spinal release</li>
                      <li><span class="intermediate-highlight">standing crunch:</span> Hip and lower back release</li>
                    </ul>
                    <button class="btn intermediate-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Saturday -->
                <div class="tab-pane fade" id="saturday" role="tabpanel">
                  <h4>Weekend Energizer</h4>
                  <p>Vigorous practice to energize your weekend.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe width="914" height="514" src="https://www.youtube.com/embed/WnSr8w4QEWo" title="30 Min FLEXIBILITY + STRETCHING ROUTINE | Full Body Relaxation | Beginner Friendly, YOGA inspired" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                  </div>
                  <div class="class-details">
                    <h5>Today's Practice</h5>
                    <ul>
                      <li><span class="intermediate-highlight">toe touch:</span> 5 rounds to build heat</li>
                      <li><span class="intermediate-highlight">Warrior Sequence:</span> Strength building</li>
                      <li><span class="intermediate-highlight">cat camel:</span> Energizing full body</li>
                      <li><span class="intermediate-highlight">Cool Down :</span> Gentle stretches</li>
                    </ul>
                    <button class="btn intermediate-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
                
                <!-- Sunday -->
                <div class="tab-pane fade" id="sunday" role="tabpanel">
                  <h4>Mindful movements</h4>
                  <p>Gentle practice to prepare for the week ahead.</p>
                  <div class="ratio ratio-16x9 mb-4">
                    <iframe width="914" height="514" src="https://www.youtube.com/embed/6FyHoo4Vfxg" title="15 Min Stretches for Neck, Shoulder + Back Pain Relief | Deep Tension Relief Yoga Style | QUICK HELP" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                  </div>
                  <div class="class-details">
                    <h5>Today's Practice</h5>
                    <ul>
                      <li><span class="intermediate-highlight">waist circles:</span> 5-minute fun</li>
                      <li><span class="intermediate-highlight">neck stretch:</span> Release tension</li>
                      <li><span class="intermediate-highlight">side raise:</span> improves side body functionality</li>
                      <li><span class="intermediate-highlight">Closing workout:</span> Setting intentions</li>
                    </ul>
                    <button class="btn intermediate-btn mt-3">Mark as Completed</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Class Progress -->
          <div class="card mb-4 intermediate-card">
            <div class="card-body">
              <h5 class="card-title">Your workout Progress</h5>
              <div class="progress mb-3" style="height: 20px;">
                <div class="progress-bar" role="progressbar" style="width: 0%; background-color: #4a8bad;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
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
          <div class="card mb-4 intermediate-card">
            <div class="card-body">
              <h5 class="card-title">workout Materials</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-file-pdf me-2 text-danger"></i> workout Guide</span>
                  <button class="btn btn-sm beginner-btn">Download</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-music me-2 text-primary"></i> workout Music</span>
                  <button class="btn btn-sm beginner-btn">Download</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-list-check me-2 text-success"></i> 7-Day Checklist</span>
                  <button class="btn btn-sm beginner-btn">Download</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span><i class="fas fa-book me-2 text-info"></i> stretching Guide</span>
                  <button class="btn btn-sm beginner-btn">Download</button>
                </li>
              </ul>
            </div>
          </div>
          
          <!-- Benefits of workout -->
          <div class="card mb-4 beginner-card">
            <div class="card-body">
              <h5 class="card-title">Benefits of workouts</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Improves flexibility</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Strengthens core muscles</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Enhances breathing</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> makes you punctual</li>
                <li class="list-group-item"><i class="fas fa-check-circle me-2 text-success"></i> Improves stamina</li>
              </ul>
            </div>
          </div>
          
          <!-- Upcoming Classes -->
          <div class="card beginner-card">
            <div class="card-body">
              <h5 class="card-title">Upcoming  Classes</h5>
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">Morning  classess</h6>
                    <small>Tomorrow 7:00 AM</small>
                  </div>
                  <!-- <p class="mb-1">With <?php echo $instructor; ?></p> -->
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1"> intemediate Workshop</h6>
                    <small>Sat 10:00 AM</small>
                  </div>
                  <p class="mb-1">With Rashi patel</p>
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
            <li class="mb-2"><a href="explore-services.php" class="text-white">Explore Yoga</a></li>
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
            <button class="btn hatha-btn" type="button" style="padding: 8px 20px;">Subscribe</button>
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
          this.classList.remove('hatha-btn');
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