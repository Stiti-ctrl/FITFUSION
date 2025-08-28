
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: signin.php");
    exit();
}
$user = $_SESSION['user'];

// Calculate BMI
$height = (float)$user['height'];
$weight = (float)$user['weight'];
$bmi = ($height && $weight) ? $weight / (($height / 100) ** 2) : 0;

// Determine category & tips
$meditation = [
    ['img' => "https://images.unsplash.com/photo-1545205597-3d9d02c29597?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80", 'title' => "Mindful Meditation", 'link' => "meditation.php"],
    ['img' => "https://images.unsplash.com/photo-1510894347713-fc3ed6fdf539?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80", 'title' => "Stress Relief", 'link' => "meditation.php"]
];

$age = (int)$user['age'];
$category = "";
$tips = "";
$workouts = [];
$diets = [];

// Age-based override
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = $_POST['age'];
    $need_physiotherapy = $_POST['physiotherapy']; // yes or no

    if ($age > 40) {
        // Always redirect to physiotherapy.php if age > 40
        header("Location: physiotherapy.php");
        exit();
    } else {
        // For age ≤ 40, check if physiotherapy is needed
        if ($need_physiotherapy === "yes") {
            header("Location: physiotherapy.php");
            exit();
        } else {
            header("Location: other-treatment.php");
            exit();
        }
    }
}

if ($age >= 50) {
    $category = "Senior Wellness";
    $tips = "Focus on flexibility, joint mobility, and gentle workouts. Nutrition and balance are key.";
    $workouts = [['img' => "https://images.unsplash.com/photo-1545205597-3d9d02c29597?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80", 'title' => "Senior Fitness", 'link' => "seniorwellness.php"]];
    $diets = [['img' => "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80", 'title' => "Elderly Balanced Diet", 'link' => "seniorwellness.php"]];
} elseif ($bmi < 18.5) {
    $category = "Underweight";
    $tips = "Focus on gaining healthy weight: strength training and calorie surplus with protein-rich meals.";
    $workouts = [['img' => "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b", 'title' => "Beginner Strength", 'link' => "workout.php"]];
    $diets = [['img' => "https://images.unsplash.com/photo-1490645935967-10de6ba17061", 'title' => "High-Calorie Meals", 'link' => "diet-plan.php"]];
} elseif ($bmi < 25) {
    $category = "Normal weight";
    $tips = "Maintain your weight with balanced diet + mix of cardio & strength training.";
    $workouts = [
        ['img' => "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b", 'title' => "Full-Body Routine", 'link' => "workout.php"],
        ['img' => "https://images.unsplash.com/photo-1544367567-0f2fcb009e0b", 'title' => "Flexibility Yoga", 'link' => "yoga.php"]
    ];
    $diets = [['img' => "https://images.unsplash.com/photo-1490645935967-10de6ba17061", 'title' => "Balanced Diet", 'link' => "diet-plan.php"]];
} elseif ($bmi < 30) {
    $category = "Overweight";
    $tips = "Aim for fat loss: cardio (30+ mins/day) and calorie control.";
    $workouts = [['img' => "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b", 'title' => "HIIT Fat-Burn", 'link' => "workout.php"]];
    $diets = [['img' => "https://images.unsplash.com/photo-1490645935967-10de6ba17061", 'title' => "Low-Cal Veggies", 'link' => "diet-plan.php"]];
} else {
    $category = "Obese";
    $tips = "Start with low-impact cardio (walking, yoga) and whole foods.";
    $workouts = [['img' => "https://images.unsplash.com/photo-1544367567-0f2fcb009e0b", 'title' => "Gentle Yoga", 'link' => "yoga.php"]];
    $diets = [['img' => "https://images.unsplash.com/photo-1490645935967-10de6ba17061", 'title' => "Whole-Food Diet", 'link' => "diet-plan.php"]];
}

// Physiotherapy recommendation if opted or age > 40
$showPhysio = (
    (isset($user['physiotherapy_assistance']) && strtolower($user['physiotherapy_assistance']) === 'yes') 
    || ($age > 40)
);

$physioRecs = [
    ['img' => "https://images.unsplash.com/photo-1519823551278-64ac92734fb1?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGh5c2lvdGhlcmFweXxlbnwwfHwwfHx8MA%3D%3D", 'title' => "Pain Relief", 'link' => "physiotherapy.php"],
    ['img' => "https://images.unsplash.com/photo-1645005512942-a17817fb7c11?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHBoeXNpb3RoZXJhcHl8ZW58MHx8MHx8fDA%3D", 'title' => "Mobility Boosters", 'link' => "physiotherapy.php"]
];

// Handle profile image
// Handle profile image
$imgFile = isset($user['profile_image']) ? trim($user['profile_image']) : '';
$gender = isset($user['gender']) ? strtolower(trim($user['gender'])) : '';

// Set default avatars
$defaultMale = 'https://up.yimg.com/ib/th?id=OIP.XwQl1fgL8Sj_byE6Ca2xNQHaJQ&pid=Api&rs=1&c=1&qlt=95&w=91&h=113';
$defaultFemale = 'https://up.yimg.com/ib/th?id=OIP.BJT35EbvO8mTu7xTZHJ12gHaE7&pid=Api&rs=1&c=1&qlt=95&w=183&h=121';
$defaultNeutral = $defaultMale;

// Determine final image path
if (!empty($imgFile)) {
    $uploadPath = "uploads/" . basename($imgFile); // secure with basename
    if (file_exists($uploadPath)) {
        $imgPath = $uploadPath;
    } else {
        // File doesn't exist, use gender-based fallback
        $imgPath = ($gender === 'female') ? $defaultFemale : (($gender === 'male') ? $defaultMale : $defaultNeutral);
    }
} else {
    // No custom image provided, use gender-based fallback
    $imgPath = ($gender === 'female') ? $defaultFemale : (($gender === 'male') ? $defaultMale : $defaultNeutral);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Your Profile — FITFUSION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    body, html { height: 100%; margin: 0; font-family: 'Poppins', sans-serif; }
    .full-screen { display: flex; flex-direction: column; height: 100%; }
    .main-content { flex: 1; display: flex; overflow: hidden; }
    .sidebar, .recommendations { overflow-y: auto; padding: 2rem; }
    .sidebar { width: 35%; background: #fff; border-right: 1px solid #e0e0e0; border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
    .recommendations { flex: 1; background: #f8f9fa; border-radius: 15px; padding: 1.5rem; }
    .section-title { color: #6C63FF; margin-bottom: 1.5rem; font-size: 1.5rem; }
    .card-service { border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1); cursor: pointer; transition: transform .2s; }
    .card-service:hover { transform: scale(1.03); }
    .card-service img { height: 120px; object-fit: cover; width: 100%; }
    .card-service .card-body { text-align: center; padding: .75rem; }
    .card-body h6 { font-size: 1.1rem; color: #333; }
    .personal-details p { font-size: 1.1rem; margin-bottom: 1rem; }
    .personal-details strong { color: #6C63FF; }
    footer { background: #2c3e50; color: #fff; padding: 1rem 2rem; }
    footer a { color: #fff; text-decoration: none; }
    .navbar { box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
    .details-icon { font-size: 1.2rem; color: #6C63FF; margin-right: 8px; }
    .profile-img-container { 
        display: flex; 
        justify-content: center; 
        margin-bottom: 20px;
    }
    .profile-section {
        text-align: center;
        padding: 20px;
    }
    .profile-img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #6C63FF;
    }
    .physio-section {
        background-color: #f0f8ff;
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
    }
    .physio-title {
        color: #6C63FF;
        margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <div class="full-screen">
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
            <li class="nav-item mx-1"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item dropdown mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown">Services</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="yoga.php">Yoga</a></li>
                <li><a class="dropdown-item" href="meditation.php">Meditation</a></li>
                <li><a class="dropdown-item" href="workout.php">Workout</a></li>
                <li><a class="dropdown-item" href="diet-plan.php">Diet Plan</a></li>
                <li><a class="dropdown-item" href="physiotherapy.php">Physiotherapy</a></li>
                <li><a class="dropdown-item" href="seniorwellness.php">Senior Wellness</a></li>
              </ul>
            </li>
            <li class="nav-item mx-1"><a class="nav-link" href="how-it-works.php">How It Works</a></li>
            <li class="nav-item mx-1"><a class="nav-link" href="stories.php">Healing Stories</a></li>
          </ul>
          <div class="d-flex ms-lg-3 mt-3 mt-lg-0">
            <a href="createprofile.php" class="btn btn-primary me-2">Profile</a>
            <a href="logout.php" class="btn btn-outline-secondary">Logout</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="main-content">
      <div class="sidebar">
        <h4 class="section-title">Personal Details</h4>
        <div class="personal-details">
          <div class="profile-img-container">
            <img src="<?= $imgPath ?>" alt="Profile Picture" class="profile-img">
          </div>
          <p><i class="fas fa-user details-icon"></i><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
          <p><i class="fas fa-envelope details-icon"></i><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
          <p><i class="fas fa-phone details-icon"></i><strong>Phone:</strong> <?= htmlspecialchars($user['phone']) ?></p>
          <p><i class="fas fa-ruler-vertical details-icon"></i><strong>Height:</strong> <?= htmlspecialchars($user['height']) ?> cm</p>
          <p><i class="fas fa-weight-hanging details-icon"></i><strong>Weight:</strong> <?= htmlspecialchars($user['weight']) ?> kg</p>
          <p><i class="fas fa-venus-mars details-icon"></i><strong>Gender:</strong> <?= htmlspecialchars($user['gender']) ?></p>
          <p><i class="fas fa-birthday-cake details-icon"></i><strong>Age:</strong> <?= htmlspecialchars($user['age']) ?> yrs</p>
          
          <?php 
        if ($age > 40 || (isset($user['physiotherapy_assistance']) && strtolower($user['physiotherapy_assistance']) === 'yes')): ?>

            <div class="physio-section">
              <h5 class="physio-title">Physiotherapy Recommended</h5>
              <p>Based on your profile, we recommend physiotherapy sessions to maintain your mobility and comfort.</p>
              <a href="physiotherapy.php" class="btn btn-primary">View Recommendations</a>
            </div>
          <?php endif; ?>
        </div>
        <div class="mt-4">
          <a href="logout.php" class="btn btn-danger w-100">Logout</a>
        </div>
      </div>

      <div class="recommendations">
        <h4 class="section-title">BMI & Recommendations</h4>
        <p><strong>BMI:</strong> <?= round($bmi, 2) ?> &nbsp;|&nbsp; <strong>Category:</strong> <?= $category ?></p>
        <p><?= $tips ?></p>

        <h5 class="section-title mt-4">Progress Tracker</h5>
        <div class="progress">
          <div class="progress-bar" role="progressbar" style="width: <?= min(100, round($bmi, 2)) ?>%" aria-valuenow="<?= round($bmi, 2) ?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <p class="mt-2">Current BMI: <?= round($bmi, 2) ?></p>
        <p>Track your progress by updating your weight regularly.</p>

        <h5 class="section-title mt-4">Motivation</h5>
        <p class="mt-2">
          <?php
          if ($category == "Underweight") echo "Keep working hard, every small step counts!";
          elseif ($category == "Normal weight") echo "You're doing great! Keep it up!";
          elseif ($category == "Overweight") echo "Stay consistent, you'll reach your goal!";
          elseif ($category == "Senior Wellness") echo "Your health is your wealth. Prioritize wellness every day!";
          else echo "Small steps lead to big changes! Keep pushing forward!";
          ?>
        </p>

        <h5 class="mt-4">Workout Recommendations</h5>
        <div class="row g-3">
          <?php foreach ($workouts as $w): ?>
            <div class="col-6 col-lg-4">
              <div class="card-service" onclick="location.href='<?= $w['link'] ?>'">
                <img src="<?= $w['img'] ?>?auto=format&fit=crop&w=600&q=80" alt="<?= $w['title'] ?>">
                <div class="card-body"><h6><?= $w['title'] ?></h6></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <h5 class="mt-4">Diet Recommendations</h5>
        <div class="row g-3">
          <?php foreach ($diets as $d): ?>
            <div class="col-6 col-lg-4">
              <div class="card-service" onclick="location.href='<?= $d['link'] ?>'">
                <img src="<?= $d['img'] ?>?auto=format&fit=crop&w=600&q=80" alt="<?= $d['title'] ?>">
                <div class="card-body"><h6><?= $d['title'] ?></h6></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <h5 class="mt-4">Meditation Recommendations</h5>
        <div class="row g-3">
          <?php foreach ($meditation as $m): ?>
            <div class="col-6 col-lg-4">
              <div class="card-service" onclick="location.href='<?= $m['link'] ?>'">
                <img src="<?= $m['img'] ?>?auto=format&fit=crop&w=600&q=80" alt="<?= $m['title'] ?>">
                <div class="card-body"><h6><?= $m['title'] ?></h6></div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <?php if ($showPhysio): ?>
        <div class="physio-section">
          <h5 class="physio-title">Physiotherapy Recommendations</h5>
          <p>Based on your profile, we recommend these physiotherapy options:</p>
          <div class="row g-3">
            <?php foreach ($physioRecs as $p): ?>
              <div class="col-6 col-lg-4">
                <div class="card-service" onclick="location.href='<?= $p['link'] ?>'">
                  <img src="<?= $p['img'] ?>?auto=format&fit=crop&w=600&q=80" alt="<?= $p['title'] ?>">
                  <div class="card-body"><h6><?= $p['title'] ?></h6></div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>