<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diet Plans | FITFUSION</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-color: #6C63FF;
      --secondary-color: #4D44DB;
      --light-color: #F8F9FA;
      --dark-color: #212529;
      --success-color: #28a745;
      --info-color: #17a2b8;
      --warning-color: #ffc107;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      color: var(--dark-color);
    }
    
    /* Hero Section */
    .diet-hero {
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                  url('https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
      background-size: cover;
      background-position: center;
      color: white;
      padding: 120px 0;
      text-align: center;
    }
    
    /* Diet Plan Cards */
    .diet-card {
      border-radius: 12px;
      overflow: hidden;
      transition: all 0.3s ease;
      border: none;
      margin-bottom: 30px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }
    
    .diet-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    
    .diet-card .card-img-top {
      height: 200px;
      object-fit: cover;
    }
    
    .diet-card .card-body {
      padding: 25px;
    }
    
    /* Diet Plan Badges */
    .weight-loss-badge {
      background-color: var(--success-color);
    }
    
    .muscle-gain-badge {
      background-color: var(--warning-color);
      color: var(--dark-color);
    }
    
    .balanced-badge {
      background-color: var(--info-color);
    }
    
    /* Nutrition Info Cards */
    .nutrition-card {
      border-radius: 12px;
      padding: 20px;
      text-align: center;
      height: 100%;
      transition: all 0.3s ease;
    }
    
    .nutrition-card:hover {
      transform: scale(1.03);
    }
    
    .nutrition-icon {
      font-size: 2.5rem;
      margin-bottom: 15px;
    }
    
    /* Meal Plan Tabs */
    .nav-pills .nav-link.active {
      background-color: var(--primary-color);
    }
    
    .nav-pills .nav-link {
      color: var(--dark-color);
      border-radius: 50px;
      padding: 8px 20px;
      margin: 0 5px;
    }
    .meal-card {
      border-radius: 10px;
      overflow: hidden;
      margin-bottom: 20px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    }
    
    .meal-card img {
      height: 150px;
      object-fit: cover;
    }
    .diet-cta {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
      padding: 80px 0;
      position: relative;
      overflow: hidden;
    }
    @media (max-width: 768px) {
      .diet-hero {
        padding: 80px 0;
      }
  .diet-hero h1 {
        font-size: 2.2rem;
      }
    }
    
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
  <!-- Nav -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php" style="color: var(--primary-color);">
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
            <a class="nav-link" href="stories.php">Success Stories</a>
          </li>
        </ul>
        <div class="d-flex ms-lg-3 mt-3 mt-lg-0">
          <a href="createprofile.php" class="btn btn-primary me-2">Profile</a>
          <a href="logout.php" class="btn btn-outline-secondary">Logout</a>
          </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="diet-hero">
    <div class="container">
      <h1 class="display-4 fw-bold mb-3">Nourish Your Body</h1>
      <p class="lead mb-4">Personalized diet plans designed by certified nutritionists</p>
      <div class="d-flex justify-content-center gap-3">
        <a href="#plans" class="btn btn-primary btn-lg px-4">View Plans</a>
        <a href="#calculator" class="btn btn-outline-light btn-lg px-4">Calorie Calculator</a>
      </div>
    </div>
  </section>

  <!-- Diet Plans Section -->
  <section id="plans" class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Our Diet Plans</h2>
        <p class="lead text-muted">Tailored to your health goals and dietary preferences</p>
      </div>
      <div class="row">
        <!-- Weight Loss Plan -->
        <div class="col-lg-4 col-md-6">
          <div class="diet-card card">
            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Weight Loss Diet">
            <div class="card-body">
              <span class="badge weight-loss-badge mb-2">Weight Loss</span>
              <h4 class="card-title">Lean & Clean</h4>
              <p class="text-muted">4-week calorie deficit plan</p>
              <p class="card-text">Gradual fat loss while maintaining muscle mass with nutrient-dense foods.</p>
              <ul class="mb-4">
                <li>500 calorie deficit</li>
                <li>High protein intake</li>
                <li>Meal timing strategies</li>
                <li>Cheat meal guidance</li>
              </ul>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">₹150/- month</span>
                <a href="#" class="btn btn-primary">Choose Plan</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Muscle Gain Plan -->
        <div class="col-lg-4 col-md-6">
          <div class="diet-card card">
            <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Muscle Gain Diet">
            <div class="card-body">
              <span class="badge muscle-gain-badge mb-2">Muscle Gain</span>
              <h4 class="card-title">Mass Builder</h4>
              <p class="text-muted">8-week calorie surplus plan</p>
              <p class="card-text">Clean bulking approach to maximize muscle growth while minimizing fat gain.</p>
              <ul class="mb-4">
                <li>300 calorie surplus</li>
                <li>Macro cycling</li>
                <li>Post-workout nutrition</li>
                <li>Supplement guidance</li>
              </ul>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">₹150/- month</span>
                <a href="#" class="btn btn-primary">Choose Plan</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Balanced Plan -->
        <div class="col-lg-4 col-md-6">
          <div class="diet-card card">
            <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Balanced Diet">
            <div class="card-body">
              <span class="badge balanced-badge mb-2">Balanced</span>
              <h4 class="card-title">Maintenance Mode</h4>
              <p class="text-muted">Sustainable eating for life</p>
              <p class="card-text">Maintain your ideal weight while optimizing health and energy levels.</p>
              <ul class="mb-4">
                <li>Macro-balanced meals</li>
                <li>Gut health focus</li>
                <li>Seasonal recipes</li>
                <li>Flexible dieting</li>
              </ul>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">₹150/- month</span>
                <a href="#" class="btn btn-primary">Choose Plan</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Nutrition Info Section -->
  <section class="py-5">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="fw-bold">Nutrition Fundamentals</h2>
        <p class="lead text-muted">Understanding the building blocks of your diet</p>
      </div>
      <div class="row g-4">
        <div class="col-md-3">
          <div class="nutrition-card card shadow-sm">
            <div class="nutrition-icon text-primary">
              <i class="fas fa-drumstick-bite"></i>
            </div>
            <h4>Protein</h4>
            <p>Essential for muscle repair and growth. Aim for 1.6-2.2g per kg of body weight.</p>
            <p class="fw-bold text-primary">Sources: Chicken, fish, tofu, lentils</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="nutrition-card card shadow-sm">
            <div class="nutrition-icon text-success">
              <i class="fas fa-bread-slice"></i>
            </div>
            <h4>Carbs</h4>
            <p>Primary energy source. Choose complex carbs for sustained energy.</p>
            <p class="fw-bold text-success">Sources: Oats, quinoa, sweet potatoes</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="nutrition-card card shadow-sm">
            <div class="nutrition-icon text-warning">
              <i class="fas fa-oil-can"></i>
            </div>
            <h4>Fats</h4>
            <p>Vital for hormone production. Focus on healthy unsaturated fats.</p>
            <p class="fw-bold text-warning">Sources: Avocados, nuts, olive oil</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="nutrition-card card shadow-sm">
            <div class="nutrition-icon text-info">
              <i class="fas fa-apple-alt"></i>
            </div>
            <h4>Micronutrients</h4>
            <p>Vitamins and minerals essential for bodily functions and immunity.</p>
            <p class="fw-bold text-info">Sources: Fruits, vegetables, nuts</p>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- Sample Meal Plan -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Global Diet Plans</h2>
      <p class="lead text-muted">3 Indian specialties + international healthy options</p>
    </div>
    
    <ul class="nav nav-pills justify-content-center mb-4" id="meal-tabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="breakfast-tab" data-bs-toggle="pill" data-bs-target="#breakfast" type="button" role="tab">Breakfast</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="lunch-tab" data-bs-toggle="pill" data-bs-target="#lunch" type="button" role="tab">Lunch</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="dinner-tab" data-bs-toggle="pill" data-bs-target="#dinner" type="button" role="tab">Dinner</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="snacks-tab" data-bs-toggle="pill" data-bs-target="#snacks" type="button" role="tab">Snacks</button>
      </li>
    </ul>
    
    <div class="tab-content" id="meal-tabs-content">
      <div class="tab-pane fade show active" id="breakfast" role="tabpanel">
        <div class="row g-4">
          <!-- Indian Breakfast 1 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="poha.jpg" class="card-img-top" alt="Poha" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Vegetable Poha</h5>
                <p class="text-muted">Indian flattened rice with turmeric, peanuts and vegetables</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">350 kcal</span>
                  <span class="badge bg-success">8g protein</span>
                  <span class="badge bg-warning">5g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Indian Breakfast 2 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="multi.jpg" class="card-img-top" alt="Dosa" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Multigrain Dosa</h5>
                <p class="text-muted">Fermented crepe made with rice and lentils, served with sambar</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">400 kcal</span>
                  <span class="badge bg-success">12g protein</span>
                  <span class="badge bg-warning">7g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Indian Breakfast 3 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="upma.jpg" class="card-img-top" alt="Upma" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Vegetable Upma</h5>
                <p class="text-muted">Semolina cooked with vegetables and tempered spices</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">320 kcal</span>
                  <span class="badge bg-success">7g protein</span>
                  <span class="badge bg-warning">4g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- International Breakfast 1 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="mediterian.jpg" class="card-img-top" alt="Mediterranean" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Mediterranean Toast</h5>
                <p class="text-muted">Whole grain toast with avocado, feta and tomatoes</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">420 kcal</span>
                  <span class="badge bg-success">15g protein</span>
                  <span class="badge bg-warning">10g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- International Breakfast 2 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="japan.jpg" class="card-img-top" alt="Japanese" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Japanese Breakfast</h5>
                <p class="text-muted">Grilled fish, miso soup, rice and pickled vegetables</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">450 kcal</span>
                  <span class="badge bg-success">30g protein</span>
                  <span class="badge bg-warning">6g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- International Breakfast 3 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="pancake.jpg" class="card-img-top" alt="Pancakes" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Protein Pancakes</h5>
                <p class="text-muted">Oat flour pancakes with Greek yogurt and berries</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">400 kcal</span>
                  <span class="badge bg-success">25g protein</span>
                  <span class="badge bg-warning">7g fiber</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="tab-pane fade" id="lunch" role="tabpanel">
        <div class="row g-4">
          <!-- Indian Lunch 1 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="balance.jpg" class="card-img-top" alt="Thali" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Balanced Thali</h5>
                <p class="text-muted">2 rotis, dal, sabzi, curd, salad and small rice portion</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">500 kcal</span>
                  <span class="badge bg-success">22g protein</span>
                  <span class="badge bg-warning">12g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Indian Lunch 2 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="moong.jpg" class="card-img-top" alt="Khichdi" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Moong Dal Khichdi</h5>
                <p class="text-muted">Rice and lentils cooked with ghee and vegetables</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">450 kcal</span>
                  <span class="badge bg-success">18g protein</span>
                  <span class="badge bg-warning">10g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Indian Lunch 3 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="vegeta.jpg" class="card-img-top" alt="Biryani" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Vegetable Biryani</h5>
                <p class="text-muted">Fragrant rice with mixed vegetables and raita</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">550 kcal</span>
                  <span class="badge bg-success">16g protein</span>
                  <span class="badge bg-warning">8g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- International Lunch 1 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Greek" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Greek Salad Bowl</h5>
                <p class="text-muted">Grilled chicken, quinoa, olives and tzatziki</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">480 kcal</span>
                  <span class="badge bg-success">35g protein</span>
                  <span class="badge bg-warning">9g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- International Lunch 2 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="chicken pho.jpg" class="card-img-top" alt="Vietnamese" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Vietnamese Pho</h5>
                <p class="text-muted">Chicken broth with rice noodles and fresh herbs</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">450 kcal</span>
                  <span class="badge bg-success">30g protein</span>
                  <span class="badge bg-warning">5g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- International Lunch 3 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="burrito.jpg" class="card-img-top" alt="Burrito" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Burrito Bowl</h5>
                <p class="text-muted">Brown rice, black beans, grilled chicken and guacamole</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">550 kcal</span>
                  <span class="badge bg-success">40g protein</span>
                  <span class="badge bg-warning">15g fiber</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="tab-pane fade" id="dinner" role="tabpanel">
        <div class="row g-4">
          <!-- Indian Dinner 1 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="dal tadka.jpg" class="card-img-top" alt="Dal" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Dal Tadka</h5>
                <p class="text-muted">Lentil curry with tempered spices and jowar roti</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">450 kcal</span>
                  <span class="badge bg-success">20g protein</span>
                  <span class="badge bg-warning">14g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Indian Dinner 2 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="mix.jpg" class="card-img-top" alt="Vegetable" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Mix Vegetable Sabzi</h5>
                <p class="text-muted">Seasonal vegetables with bajra roti</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">400 kcal</span>
                  <span class="badge bg-success">15g protein</span>
                  <span class="badge bg-warning">12g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Indian Dinner 3 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="kadhi.jpg" class="card-img-top" alt="Kadhi" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Kadhi Chawal</h5>
                <p class="text-muted">Yogurt-based curry with besan dumplings and rice</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">480 kcal</span>
                  <span class="badge bg-success">18g protein</span>
                  <span class="badge bg-warning">6g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- International Dinner 1 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="teriyaki.jpg" class="card-img-top" alt="Japanese" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Teriyaki Salmon</h5>
                <p class="text-muted">Grilled salmon with teriyaki glaze and steamed rice</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">500 kcal</span>
                  <span class="badge bg-success">35g protein</span>
                  <span class="badge bg-warning">6g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- International Dinner 2 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="chicken piccatta.jpg" class="card-img-top" alt="Italian" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Chicken Piccata</h5>
                <p class="text-muted">Lemon-caper chicken with roasted vegetables</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">480 kcal</span>
                  <span class="badge bg-success">42g protein</span>
                  <span class="badge bg-warning">8g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- International Dinner 3 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="grilled.jpg" class="card-img-top" alt="Steak" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Grilled Steak</h5>
                <p class="text-muted">Lean cut steak with sweet potatoes and asparagus</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">550 kcal</span>
                  <span class="badge bg-success">45g protein</span>
                  <span class="badge bg-warning">8g fiber</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="tab-pane fade" id="snacks" role="tabpanel">
        <div class="row g-4">
          <!-- Indian Snack 1 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="roasted m.webp" class="card-img-top" alt="Makhana" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Roasted Makhana</h5>
                <p class="text-muted">Fox nuts roasted with ghee and mild spices</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">150 kcal</span>
                  <span class="badge bg-success">5g protein</span>
                  <span class="badge bg-warning">3g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Indian Snack 2 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="masala sprot.jpg" class="card-img-top" alt="Chana" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Masala Sprouts</h5>
                <p class="text-muted">Sprouted lentils with onions and chaat masala</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">200 kcal</span>
                  <span class="badge bg-success">12g protein</span>
                  <span class="badge bg-warning">8g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Indian Snack 3 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="sattushake.jpg" class="card-img-top" alt="Smoothie" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Sattu Shake</h5>
                <p class="text-muted">Roasted gram flour drink with spices</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">220 kcal</span>
                  <span class="badge bg-success">10g protein</span>
                  <span class="badge bg-warning">5g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- International Snack 1 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="greek yogurt.jpg" class="card-img-top" alt="Greek" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Greek Yogurt</h5>
                <p class="text-muted">With honey, walnuts and mixed berries</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">220 kcal</span>
                  <span class="badge bg-success">15g protein</span>
                  <span class="badge bg-warning">4g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- International Snack 2 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="guacamole.jpg" class="card-img-top" alt="Guacamole" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Guacamole</h5>
                <p class="text-muted">With carrot and cucumber sticks</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">200 kcal</span>
                  <span class="badge bg-success">4g protein</span>
                  <span class="badge bg-warning">8g fiber</span>
                </div>
              </div>
            </div>
          </div>
          
          <!-- International Snack 3 -->
          <div class="col-lg-4 col-md-6">
            <div class="meal-card card h-100">
              <img src="protien1.webp" class="card-img-top" alt="Smoothie" style="height: 200px; object-fit: cover;">
              <div class="card-body">
                <h5>Protein Smoothie</h5>
                <p class="text-muted">Banana, peanut butter and almond milk</p>
                <div class="d-flex justify-content-between">
                  <span class="badge bg-primary">300 kcal</span>
                  <span class="badge bg-success">25g protein</span>
                  <span class="badge bg-warning">6g fiber</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Calorie Calculator -->
  <section id="calculator" class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card shadow">
            <div class="card-body p-5">
              <h2 class="fw-bold text-center mb-4">Calorie Calculator</h2>
              <form id="calorie-form">
                <div class="row mb-3">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="form-label">Gender</label>
                    <select id="gender" class="form-select">
                      <option selected>Male</option>
                      <option>Female</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Age</label>
                    <input id="age" type="number" class="form-control" placeholder="Years">
                  </div>
                </div>
              
                <div class="row mb-3">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="form-label">Height</label>
                    <div class="input-group">
                      <input id="height" type="number" class="form-control" placeholder="cm">
                      <span class="input-group-text">cm</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Weight</label>
                    <div class="input-group">
                      <input id="weight" type="number" class="form-control" placeholder="kg">
                      <span class="input-group-text">kg</span>
                    </div>
                  </div>
                </div>
              
                <div class="mb-3">
                  <label class="form-label">Activity Level</label>
                  <select id="activity" class="form-select">
                    <option selected>Sedentary (little or no exercise)</option>
                    <option>Lightly active (light exercise 1-3 days/week)</option>
                    <option>Moderately active (moderate exercise 3-5 days/week)</option>
                    <option>Very active (hard exercise 6-7 days/week)</option>
                    <option>Extra active (very hard exercise & physical job)</option>
                  </select>
                </div>
              
                <div class="mb-4">
                  <label class="form-label">Goal</label>
                  <select id="goal" class="form-select">
                    <option selected>Weight loss (0.5kg/week)</option>
                    <option>Mild weight loss (0.25kg/week)</option>
                    <option>Maintain weight</option>
                    <option>Mild weight gain (0.25kg/week)</option>
                    <option>Weight gain (0.5kg/week)</option>
                  </select>
                </div>
              
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-lg px-5">Calculate</button>
                </div>
              </form>
              
              
              <div id="results" class="mt-5 text-center" style="display: none;">
                <h4 class="mb-4">Your Daily Calorie Needs</h4>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <div class="card bg-light">
                      <div class="card-body">
                        <h5>Maintenance</h5>
                        <p class="display-6 fw-bold">2,250</p>
                        <p class="text-muted">kcal/day</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="card bg-light">
                      <div class="card-body">
                        <h5>Weight Loss</h5>
                        <p class="display-6 fw-bold">1,800</p>
                        <p class="text-muted">kcal/day</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <div class="card bg-light">
                      <div class="card-body">
                        <h5>Macros</h5>
                        <p class="mb-1">Protein: 135g</p>
                        <p class="mb-1">Carbs: 180g</p>
                        <p>Fat: 60g</p>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="#plans" class="btn btn-outline-primary mt-3">View Matching Plans</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="diet-cta">
    <div class="container text-center">
      <h2 class="display-5 fw-bold mb-4">Get Your Personalized Diet Plan</h2>
      <p class="lead mb-5">Our nutritionists will create a custom plan based on your goals, preferences, and lifestyle</p>
      <!-- <a href="signup.php" class="btn btn-light btn-lg px-5 py-3">Start ₹150/- month</a> -->
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
            <li class="mb-2"><a href="diet-plan.php" class="text-white">Explore diet</a></li>
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

  <script>
    document.getElementById("calorie-form").addEventListener("submit", function(e) {
      e.preventDefault();

      const gender = document.getElementById("gender").value;
      const age = parseInt(document.getElementById("age").value);
      const height = parseInt(document.getElementById("height").value);
      const weight = parseInt(document.getElementById("weight").value);
      const activity = document.getElementById("activity").value;
      const goal = document.getElementById("goal").value;

      if (!age || !height || !weight) {
        alert("Please enter valid age, height, and weight.");
        return;
      }

      let bmr;
      if (gender === "Male") {
        bmr = 10 * weight + 6.25 * height - 5 * age + 5;
      } else {
        bmr = 10 * weight + 6.25 * height - 5 * age - 161;
      }

      const activityFactor = {
        "Sedentary (little or no exercise)": 1.2,
        "Lightly active (light exercise 1-3 days/week)": 1.375,
        "Moderately active (moderate exercise 3-5 days/week)": 1.55,
        "Very active (hard exercise 6-7 days/week)": 1.725,
        "Extra active (very hard exercise & physical job)": 1.9,
      }[activity];

      const maintenance = Math.round(bmr * activityFactor);
      let calorieGoal = maintenance;

      switch (goal) {
        case "Weight loss (0.5kg/week)": calorieGoal -= 500; break;
        case "Mild weight loss (0.25kg/week)": calorieGoal -= 250; break;
        case "Mild weight gain (0.25kg/week)": calorieGoal += 250; break;
        case "Weight gain (0.5kg/week)": calorieGoal += 500; break;
      }

      const protein = Math.round((calorieGoal * 0.3) / 4);
      const carbs = Math.round((calorieGoal * 0.4) / 4);
      const fat = Math.round((calorieGoal * 0.3) / 9);

      document.querySelector("#results").style.display = "block";
      document.querySelector("#results .col-md-4:nth-child(1) .display-6").textContent = maintenance;
      document.querySelector("#results .col-md-4:nth-child(2) .display-6").textContent = calorieGoal;
      document.querySelector("#results .col-md-4:nth-child(3)").innerHTML = `
        <div class="card-body">
          <h5>Macros</h5>
          <p class="mb-1">Protein: ${protein}g</p>
          <p class="mb-1">Carbs: ${carbs}g</p>
          <p>Fat: ${fat}g</p>
        </div>
      `;
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>