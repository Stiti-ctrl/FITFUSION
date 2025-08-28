
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
   <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#" style="color: #6C63FF">
        <i class="fas fa-spa me-2"></i>FITFUSION Trainer
      </a>
      <div class="d-flex">
        <div class="dropdown">
          <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
            <i class="fas fa-user-circle me-1"></i> <?php echo htmlspecialchars($_SESSION["full_name"]); ?>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user me-2"></i> Profile</a></li>
            <li><a class="dropdown-item" href="setting.php"><i class="fas fa-cog me-2"></i> Settings</a></li>
            <li><a class="dropdown-item" href="suggestdietplan.php"><i class="fas fa-utensils me-2"></i> Diet Plans</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php" id="logout-btn"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</body>
</html>
 
  