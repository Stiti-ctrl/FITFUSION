<?php
include 'dbconnect.php'; // your database connection
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name            = trim($_POST["name"]);
    $email           = trim($_POST["email"]);
    $phone           = trim($_POST["phone"]);
    $password        = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $height          = $_POST["height"];
    $weight          = $_POST["weight"];
    $gender          = $_POST["gender"] ?? '';
    $age             = $_POST["age"];
    $physioAssistance = $_POST["physiotherapy_assistance"] ?? '';

    // Handle profile photo
    $profilePhotoPath = '';
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === 0) {
        $targetDir = "uploads/profile_photos/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileName = uniqid() . "_" . basename($_FILES["profile_photo"]["name"]);
        $targetFile = $targetDir . $fileName;

        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $targetFile)) {
                $profilePhotoPath = $targetFile;
            } else {
                $errors[] = "Failed to upload profile photo.";
            }
        } else {
            $errors[] = "Only JPG, JPEG, PNG & GIF files are allowed.";
        }
    } else {
        $errors[] = "Profile photo is required.";
    }

    // Validation
    if (empty($name))                                $errors[] = "Full Name is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))  $errors[] = "Invalid email address.";
    if (empty($phone))                               $errors[] = "Phone number is required.";
    if (strlen($password) < 8)                       $errors[] = "Password must be at least 8 characters.";
    if ($password !== $confirmPassword)              $errors[] = "Passwords do not match.";
    if (empty($height) || $height <= 0)              $errors[] = "Enter a valid height.";
    if (empty($weight) || $weight <= 0)              $errors[] = "Enter a valid weight.";
    if (empty($gender))                              $errors[] = "Gender is required.";
    if (empty($age) || $age <= 0)                    $errors[] = "Enter a valid age.";
    if (!in_array($physioAssistance, ['Yes', 'No'])) $errors[] = "Please specify if you need physiotherapy assistance.";

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = $pdo->prepare("SELECT * FROM customer WHERE LOWER(email) = LOWER(:email)");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $errors[] = "Email is already registered.";
            } else {
                $stmt = $pdo->prepare(
                    "INSERT INTO customer (name, email, phone, password, height, weight, gender, age, profile_photo, physiotherapy_assistance) 
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
                );
                $stmt->execute([$name, $email, $phone, $hashed_password, $height, $weight, $gender, $age, $profilePhotoPath, $physioAssistance]);

                header("Location: signin.php");
                exit();
            }
        } catch (PDOException $e) {
            $errors[] = "Something went wrong: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up | FITFUSION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link rel="stylesheet" href="styles.css">
  <style>
    .auth-container {
      max-width: 500px;
      margin: 2rem auto;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      background: white;
    }
    .auth-hero {
      background: linear-gradient(135deg, #6C63FF 0%, #4FD1C5 100%);
      color: white;
      border-radius: 15px;
    }
    .btn-pill {
      border-radius: 50px !important;
      padding-left: 1.5rem;
      padding-right: 1.5rem;
    }
  </style>
</head>
<body>

<!-- Navbar -->
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
        <li class="nav-item mx-1"><a class="nav-link" href="frontpage.php">Home</a></li>
        <li class="nav-item mx-1"><a class="nav-link" href="how-it-workss.php">How It Works</a></li>
        <li class="nav-item mx-1"><a class="nav-link" href="stories1.php">Healing Stories</a></li>
      </ul>
      <div class="d-flex ms-lg-3 mt-3 mt-lg-0">
        <a href="signin.php" class="btn btn-outline-primary btn-pill me-2">Sign In</a>
        <a href="signup.php" class="btn btn-primary btn-pill">Sign Up</a>
      </div>
    </div>
  </div>
</nav>

<!-- Display errors -->
<?php if (!empty($errors)): ?>
  <div class="alert alert-danger text-center">
    <?php echo implode("<br>", $errors); ?>
  </div>
<?php endif; ?>

<section class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left Hero -->
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="auth-hero p-5 text-center">
          <h2 class="fw-bold mb-4">Join FITFUSION</h2>
          <p>Start your journey towards a healthier you</p>
          <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=400&q=80" class="img-fluid rounded" alt="Wellness"/>
        </div>
      </div>
      <!-- Right Form -->
      <div class="col-lg-6">
        <div class="auth-container">
          <h2 class="fw-bold mb-4 text-center">Sign Up</h2>
          <form action="signup.php" method="POST" enctype="multipart/form-data">
            <input type="text"     class="form-control mb-3" name="name"              placeholder="Full Name"       value="<?=htmlspecialchars($_POST['name'] ?? '')?>" required>
            <input type="email"    class="form-control mb-3" name="email"             placeholder="Email"           value="<?=htmlspecialchars($_POST['email'] ?? '')?>" required>
            <input type="tel"      class="form-control mb-3" name="phone"             placeholder="Phone Number"    value="<?=htmlspecialchars($_POST['phone'] ?? '')?>" required>
            <input type="password" class="form-control mb-3" name="password"          placeholder="Password"        required>
            <input type="password" class="form-control mb-3" name="confirm_password"  placeholder="Confirm Password" required>
            <input type="number"   class="form-control mb-3" name="height"            placeholder="Height (cm)"     value="<?=htmlspecialchars($_POST['height'] ?? '')?>" required>
            <input type="number"   class="form-control mb-3" name="weight"            placeholder="Weight (kg)"     value="<?=htmlspecialchars($_POST['weight'] ?? '')?>" required>
            <input type="number"   class="form-control mb-3" name="age"               placeholder="Age"             value="<?=htmlspecialchars($_POST['age'] ?? '')?>" required>

            <select class="form-select mb-3" name="gender" required>
              <option value="">Select Gender</option>
              <option value="Male"   <?= (($_POST['gender'] ?? '')=='Male')?'selected':''?>>Male</option>
              <option value="Female" <?= (($_POST['gender'] ?? '')=='Female')?'selected':''?>>Female</option>
              <option value="Other"  <?= (($_POST['gender'] ?? '')=='Other')?'selected':''?>>Other</option>
            </select>

            <select class="form-select mb-3" name="physiotherapy_assistance" required>
              <option value="">Need Physiotherapy Assistance?</option>
              <option value="Yes" <?= (($_POST['physiotherapy_assistance'] ?? '') == 'Yes') ? 'selected' : '' ?>>Yes</option>
              <option value="No"  <?= (($_POST['physiotherapy_assistance'] ?? '') == 'No')  ? 'selected' : '' ?>>No</option>
            </select>

            <input type="file" class="form-control mb-3" name="profile_photo" accept="image/*" required>
            <button type="submit" class="btn btn-primary w-100 py-2 rounded-pill">Register</button>
            <div class="text-center mt-3">
              <p>Already have an account? <a href="signin.php" class="fw-bold text-decoration-none">Sign In</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
