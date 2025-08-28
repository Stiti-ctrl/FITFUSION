<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FITFUSION - Trainer Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">

  <style>
    /* Hero Section Image */
    .hero-section img {
      width: 100%;
      height: auto;
      object-fit: cover;
      border-radius: 10px;
    }

    /* Hover Effect for Cards */
    .card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
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

    /* Why Become a Trainer Section */
    .why-trainer-section {
      background-color: #f8f9fa;
      padding: 80px 0;
    }

    .why-trainer-section .feature-box {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .why-trainer-section .feature-box img {
      width: 50px;
      margin-bottom: 20px;
    }

    .why-trainer-section h2 {
      font-weight: 700;
      margin-bottom: 30px;
    }
    /* Hover Effect for Cards */
.card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
  transform: translateY(-10px);
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
}

/* Add shadow to service cards as well */
.card-body {
  padding: 20px;
}

  </style>
</head>
<body>
  <!-- Navigation -->
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
          <li class="nav-item mx-1"><a class="nav-link" href="frontpage.php">Home</a></li>
          <li class="nav-item mx-1"><a class="nav-link" href="trainer-dashboard.php">Trainer Dashboard</a></li>
          <li class="nav-item mx-1"><a class="nav-link" href="how-it-works.php">How It Works</a></li>
        </ul>
        <div class="d-flex ms-lg-3 mt-3 mt-lg-0">
          <a href="trainersignin.php" class="btn btn-outline-primary me-2">Sign In</a>
          <a href="trainersignup.php" class="btn btn-primary">Sign Up</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="fw-bold mb-3">Transform Your Trainer Journey</h1>
          <p class="lead mb-4"><b>AI-powered physiotherapy, yoga, and workout for holistic training</b></p>
          <div class="d-flex gap-3">
            <a href="explore-services.php" class="btn btn-primary btn-lg px-4">Explore Services</a>
            <a href="learn-more.php" class="btn btn-outline-primary btn-lg px-4">Learn More</a>
          </div>
        </div>
        <div class="col-md-6 text-center">
          <img src="https://i0.wp.com/www.strengthlog.com/wp-content/uploads/2023/08/what-to-wear-to-a-personal-training-interview-clothes.jpg?resize=700%2C453&ssl=1" 
               alt="Trainer Yoga Pose" 
               class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>

 
  <!-- Services Section -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Services</h2>
        <p class="lead">Comprehensive wellness solutions for your mind, body, and soul</p>
      </div>
      <div class="row g-4">
        <!-- Yoga Service -->
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0 shadow-sm">
            <img src="https://th.bing.com/th/id/OIP.bXNuxQ_ckFWOYKSe2vanxAHaD5?w=4200&h=2208&rs=1&pid=ImgDetMain" class="card-img-top" alt="Yoga">
            <div class="card-body text-center p-4">
              <h4>Yoga</h4>
              <p>Help clients improve flexibility, strength, and mental clarity with personalized yoga sessions</p>
              <a href="yoga.php" class="btn btn-outline-primary mt-3">Explore Yoga</a>
            </div>
          </div>
        </div>
        <!-- Meditation Service -->
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0 shadow-sm">
            <img src="https://static.vecteezy.com/system/resources/previews/029/337/640/non_2x/ai-generative-of-a-man-practicing-mindfulness-and-meditation-in-a-peaceful-natural-environment-sony-a7s-realistic-image-ultra-hd-high-design-very-detailed-free-photo.jpg" class="card-img-top" alt="Meditation">
            <div class="card-body text-center p-4">
              <h4>Meditation</h4>
              <p>Assist clients in reducing stress and enhancing mindfulness with guided meditation techniques</p>
              <a href="meditation.php" class="btn btn-outline-primary mt-3">Explore Meditation</a>
            </div>
          </div>
        </div>
        <!-- Workout Service -->
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0 shadow-sm">
            <img src="https://th.bing.com/th/id/OIP.AaXmUoKeElcv-JfvrISTxAHaFs?w=520&h=400&rs=1&pid=ImgDetMain" class="card-img-top" alt="Workout">
            <div class="card-body text-center p-4">
              <h4>Workout</h4>
              <p>Provide customized workout plans to build strength and endurance at clients' own pace</p>
              <a href="workout.php" class="btn btn-outline-primary mt-3">Explore Workouts</a>
            </div>
          </div>
        </div>
        <!-- Diet Plan Service -->
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 border-0 shadow-sm">
            <img src="https://th.bing.com/th/id/OIP.2Gi8F0SNMTBxnndISdHK3QHaEv?rs=1&pid=ImgDetMain" class="card-img-top" alt="Diet Plan">
            <div class="card-body text-center p-4">
              <h4>Diet Plan</h4>
              <p>Assist clients in creating personalized nutrition plans to complement their fitness goals</p>
              <a href="diet-plan.php" class="btn btn-outline-primary mt-3">Explore Diet Plans</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 <!-- Why Become a Trainer with FITFUSION? Section -->
 <section class="why-trainer-section text-center">
  <div class="container">
    <h2 class="fw-bold">Why Become a Trainer with FITFUSION?</h2>
    <div class="row">
      <!-- Certified Trainers Card -->
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <h4>Certified Trainers</h4>
            <p>Join our community of certified trainers with ongoing support and training</p>
          </div>
        </div>
      </div>
      <!-- Engaged Clients Card -->
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <h4>Engaged Clients</h4>
            <p>Work with clients who are committed to their wellness journey</p>
          </div>
        </div>
      </div>
      <!-- Flexible Scheduling Card -->
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body">
            <h4>Flexible Scheduling</h4>
            <p>Choose your own hours and manage your calendar with ease</p>
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
            <li class="mb-2"><a href="frontpage.php" class="text-white">Home</a></li>
            <li class="mb-2"><a href="trainer-dashboard.php" class="text-white">Trainer Dashboard</a></li>
            <li class="mb-2"><a href="how-it-works.php" class="text-white">How It Works</a></li>
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
