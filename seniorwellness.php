<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Senior Wellness | FITFUSION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    .senior-hero {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      padding: 4rem 0;
    }
    
    .senior-hero h1 {
      color: #343a40;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
    }
    
    .senior-hero .lead {
      color: #6C63FF;
      font-weight: 500;
    }
    
    .senior-hero img {
      transition: transform 0.3s ease;
      border: 3px solid white;
    }
    
    .senior-hero img:hover {
      transform: scale(1.03);
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
  <!-- Hero Section 
  <section-- class="senior-hero py-5">
    <div class="container">
      <div class="row flex-column align-items-center text-center">
        <div class="col-lg-8 mb-5">
          <h1 class="fw-bold display-4 mb-3">Senior Wellness Programs</h1>
          <p class="lead fs-4">Specialized fitness solutions for vibrant aging</p>
          <div class="d-flex gap-3 justify-content-center mt-4">
            <a href="#programs" class="btn btn-primary btn-lg px-4">View Programs</a>
            <a href="#benefits" class="btn btn-outline-primary btn-lg px-4">Learn Benefits</a>
          </div>
        </div>
        
        <div class="col-lg-10">
          <div class="row g-4">
             Image 1
            <div class="col-md-4">
              <img src="https://images.unsplash.com/photo-1549060279-7e168fcee0c2?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                   alt="Senior doing chair yoga"
                   class="img-fluid rounded shadow-lg h-100" 
                   style="object-fit: cover; min-height: 250px;">
            </div>
            Image 2
            <div class="col-md-4">
              <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                   alt="Senior couple exercising"
                   class="img-fluid rounded shadow-lg h-100"
                   style="object-fit: cover; min-height: 250px;">
            </div>
             Image 3 
            <div class="col-md-4">
              <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                   alt="Senior man with trainer"
                   class="img-fluid rounded shadow-lg h-100"
                   style="object-fit: cover; min-height: 250px;">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section-->
    <!-- Hero Section -->
    <section class="hero-section py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1506126613408-eca07ce68773?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center; background-size: cover; min-height: 60vh; display: flex; align-items: center;">
        <div class="container text-center text-white">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <h1 class="fw-bold mb-3">Senior Wellness Programs</h1>
              <p class="lead mb-4">Specialized care to enhance mobility, strength, and quality of life for seniors</p>
              <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="#booking" class="btn btn-primary btn-lg px-4">explore classes</a>
                <a href="#services" class="btn btn-outline-light btn-lg px-4">learn benifits</a>
              </div>
            </div>
          </div>
        </div>
      </section>

  <!-- Benefits Section -->
  <section class="py-5 bg-light" id="benefits">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Benefits of Senior Wellness</h2>
        <p class="lead">Improving quality of life through specialized care</p>
      </div>
      
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4 text-center">
              <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-3 mx-auto" style="width: 70px; height: 70px;">
                <i class="fas fa-walking fs-3"></i>
              </div>
              <h4>Improved Mobility</h4>
              <p>Gentle exercises to enhance flexibility, balance, and coordination, reducing fall risk</p>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4 text-center">
              <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-3 mx-auto" style="width: 70px; height: 70px;">
                <i class="fas fa-heartbeat fs-3"></i>
              </div>
              <h4>Enhanced Strength</h4>
              <p>Safe strength training to maintain muscle mass and bone density</p>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4 text-center">
              <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-3 mx-auto" style="width: 70px; height: 70px;">
                <i class="fas fa-brain fs-3"></i>
              </div>
              <h4>Cognitive Health</h4>
              <p>Activities designed to stimulate memory and mental acuity</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Programs Section -->
  <section class="py-5" id="programs">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Senior Wellness Programs</h2>
        <p class="lead">Tailored to meet the unique needs of older adults</p>
      </div>
      
      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 border-0 shadow-sm">
            <img src="https://images.unsplash.com/photo-1545205597-3d9d02c29597?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                 class="card-img-top" 
                 alt="Gentle Movement">
            <div class="card-body">
              <h4 class="card-title">Gentle Movement</h4>
              <h6 class="text-primary mb-3">For limited mobility</h6>
              <p class="card-text">Chair-based exercises focusing on range of motion, light strength, and circulation.</p>
              <ul>
                <li class="text-primary mb-3">Sit straight in a chair</li>
                <li class="text-primary mb-3">stretch your hand and roll it do it 15 times for 3 rounds</li>
                <li class="text-primary mb-3">stretch your leg and move it forward and backward do it 15 times for 3 rounds</li>
                <li class="text-primary mb-3">roll your head side to side slowly do it 15 times for 3 rounds</li>
                <li class="text-primary mb-3">roll your head up and down slowly do it 15 times for 3 rounds</li>
                <li class="text-primary mb-3">move your shoulder slowly do it 15 times for 3 rounds</li>
                <li class="text-primary mb-3">Take deep breaths do it 15 times for 3 rounds</li>
                



                <li>3 sessions per week</li>
                <li>Small group setting</li>
                <li>Adapted for all ability levels</li>
              </ul>
            </div>
            <div class="card-footer bg-white border-0">
              
            </div>
          </div>
        </div>
        
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 border-0 shadow-sm">
            <img src="https://images.unsplash.com/photo-1545205597-3d9d02c29597?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                 class="card-img-top" 
                 alt="Balance & Fall Prevention">
            <div class="card-body">
              <h4 class="card-title">Balance & Fall Prevention</h4>
              <h6 class="text-primary mb-3">For improved stability</h6>
              <p class="card-text">Evidence-based exercises to enhance proprioception and reaction time.</p>
              <ul>
                <li class="text-primary mb-3">stand straight</li>
                <li class="text-primary mb-3">walk forward 7 steps and stop</li>
                <li class="text-primary mb-3">walk backward 7 steps</li>
                <li class="text-primary mb-3">walk to the right and turn</li>
                <li class="text-primary mb-3">walk to the left and turn </li>
                <li class="text-primary mb-3">go back to intial position</li>
                <li class="text-primary mb-3">Take a deep breath and do a long full body stretch</li>
                <li>2-3 sessions per week</li>
                <li>Individual assessment first</li>
                <li>Progress tracking</li>
              </ul>
            </div>
            <div class="card-footer bg-white border-0">
              
            </div>
          </div>
        </div>
        
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 border-0 shadow-sm">
            <img src="https://images.unsplash.com/photo-1545205597-3d9d02c29597?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                 class="card-img-top" 
                 alt="Memory & Movement">
            <div class="card-body">
              <h4 class="card-title">Memory & Movement</h4>
              <h6 class="text-primary mb-3">For cognitive health</h6>
              <p class="card-text">Combines physical activity with cognitive challenges to stimulate brain function.</p>
              <ul>
                <li class="text-primary mb-3">stand straight or sit in a chair</li>
                <li class="text-primary mb-3">listen to a spirtitual sound like om for 7 minutes</li>
                <li class="text-primary mb-3">now repeat that sound in your mind and take 10 deep breath</li>
                <li class="text-primary mb-3">listen to a fun music and staright your hand and laugh out loud</li>
                <li class="text-primary mb-3">now concentate on a certain point for 5 min </li>
                <li class="text-primary mb-3">close your eyes and recall your good memories</li>
                <li class="text-primary mb-3">close your eyes and take 3 deep breaths </li>
                <li>Dual-task training</li>
                <li> interaction and focus</li>
                <li>Fun, engaging activities</li>
              </ul>
            </div>
            <div class="card-footer bg-white border-0">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Success Stories</h2>
        <p class="lead">Hear from our senior participants</p>
      </div>
      
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" 
                     class="rounded-circle me-3" 
                     width="60" 
                     height="60" 
                     alt="Margaret">
                <div>
                  <h5 class="mb-0">Margaret, 72</h5>
                  <small class="text-muted">Balance Program</small>
                </div>
              </div>
              <p class="card-text">"After my hip replacement, I was afraid to walk alone. Now I'm back to gardening thanks to my balance classes!"</p>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" 
                     class="rounded-circle me-3" 
                     width="60" 
                     height="60" 
                     alt="Robert">
                <div>
                  <h5 class="mb-0">Robert, 68</h5>
                  <small class="text-muted">Gentle Movement</small>
                </div>
              </div>
              <p class="card-text">"The chair exercises have helped my arthritis pain so much. I sleep better and can play with my grandkids again."</p>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" 
                     class="rounded-circle me-3" 
                     width="60" 
                     height="60" 
                     alt="Ethel">
                <div>
                  <h5 class="mb-0">Ethel, 79</h5>
                  <small class="text-muted">Memory & Movement</small>
                </div>
              </div>
              <p class="card-text">"I've made wonderful friends in my class, and my doctor says my memory tests have improved significantly!"</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-5">
    <div class="container">
      <div class="text-center bg-primary text-white p-5 rounded-3">
        <h3 class="mb-4">Ready to Improve Your Quality of Life?</h3>
        <p class="mb-4">Take the first step toward better health and mobility today</p>
        <a href="signup.php" class="btn btn-light btn-lg px-5 me-3">Get Started</a>
        <!-- <a href="contact.php" class="btn btn-outline-light btn-lg px-5">Ask Questions</a> -->
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
            <li class="mb-2"><a href="seniorwellness.php" class="text-white">Services</a></li>
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