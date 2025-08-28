<?php
// session_start();
// if (!isset($_SESSION['admin'])) {
//   header("Location: signinadmin.php");
//   exit();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard | FITFUSION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="styles.css" />
  <style>
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

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container">
      <a class="navbar-brand fw-bold"  style="color: #6C63FF;">
        <i class="fas fa-spa me-2"></i>FITFUSION
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
        <li class="nav-item mx-1">
          <a class="nav-link" href="adminstories.php">Manage Stories</a>
        </li>
      </ul>
      <div class="d-flex ms-lg-3 mt-3 mt-lg-0">
        <a href="signinadmin.php" class="btn btn-outline-primary">Sign In</a>
      </div>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-section py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="fw-bold mb-3">Welcome Back, Admin!</h1>
        <p class="lead mb-4">Oversee user progress, content, and reports with ease.</p>
        <div class="d-flex gap-3">
          <a href="adminstories.php" class="btn btn-primary btn-lg px-4">Manage Content</a>
          <a href="#" class="btn btn-outline-primary btn-lg px-4">View Reports</a>
        </div>
      </div>
      <div class="col-md-6 text-center">
        <img src="https://images.unsplash.com/photo-1545205597-3d9d02c29597?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
             alt="Admin Dashboard"
             class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</section>

<!-- Admin Sections -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Admin Tools</h2>
      <p class="lead">Quick access to core functionalities</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center p-4">
            <i class="fas fa-users-cog fs-1 mb-3 text-primary"></i>
            <h4>User Management</h4>
            <p>View and control registered users and their activity</p>
            <a href="#" class="btn btn-outline-primary">Manage Users</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center p-4">
            <i class="fas fa-book-medical fs-1 mb-3 text-primary"></i>
            <h4>Healing Stories</h4>
            <p>Approve, edit or delete community stories</p>
            <a href="adminstories.php" class="btn btn-outline-primary">Go to Stories</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm">
          <div class="card-body text-center p-4">
            <i class="fas fa-chart-line fs-1 mb-3 text-primary"></i>
            <h4>Reports</h4>
            <p>Track engagement, sign-ups, and feedback</p>
            <a href="#" class="btn btn-outline-primary">View Reports</a>
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
      <div class="col-md-4 mb-4">
        <h5>FITFUSION Admin</h5>
        <p>Monitor and manage the platform with ease.</p>
      </div>
      <div class="col-md-2 mb-4">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white">Dashboard</a></li>
          <li><a href="adminstories.php" class="text-white">Healing Stories</a></li>
        </ul>
      </div>
      <div class="col-md-3 mb-4">
        <h5>Contact Support</h5>
        <ul class="list-unstyled">
          <li><i class="fas fa-phone-alt me-2"></i> +91 9876543210</li>
          <li><i class="fas fa-envelope me-2"></i> admin@fitfusion.com</li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Admin Tools</h5>
        <p>More modules coming soon...</p>
      </div>
    </div>
    <hr class="my-4 bg-light">
    <div class="text-center">
      <p class="mb-0">© 2023 FITFUSION Admin. All rights reserved.</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
