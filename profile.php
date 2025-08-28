<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

require_once "db.php";
$db = new Database();
$conn = $db->getConnection();

$error = '';
$success = '';
$trainer_data = [];

// Fetch trainer data
try {
    $query = "SELECT * FROM trainers WHERE trainer_id = :trainer_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
    $stmt->execute();
    $trainer_data = $stmt->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $error = "Error fetching profile data: " . $e->getMessage();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $specialization = trim($_POST["specialization"]);
    $experience = trim($_POST["experience"]);
    $bio = trim($_POST["bio"]);
    
    // Validate inputs
    if (empty($full_name) || empty($email)) {
        $error = "Full name and email are required";
    } else {
        try {
            // Check if email is already taken by another trainer
            $query = "SELECT trainer_id FROM trainers WHERE email = :email AND trainer_id != :trainer_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $error = "Email is already taken by another trainer";
            } else {
                // Handle file upload
                $profile_photo = $trainer_data['profile_photo'] ?? null;
                
                if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = 'uploads/profile_photos/';
                    
                    // Create directory if it doesn't exist
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
                    
                    // Generate unique filename
                    $fileExt = pathinfo($_FILES['profile_photo']['name'], PATHINFO_EXTENSION);
                    $filename = 'trainer_' . $_SESSION["trainer_id"] . '_' . time() . '.' . $fileExt;
                    $targetPath = $uploadDir . $filename;
                    
                    // Validate file type and size
                    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                    $maxSize = 2 * 1024 * 1024; // 2MB
                    
                    if (in_array($_FILES['profile_photo']['type'], $allowedTypes) && 
                        $_FILES['profile_photo']['size'] <= $maxSize) {
                        
                        // Delete old photo if exists
                        if ($profile_photo && file_exists($uploadDir . $profile_photo)) {
                            unlink($uploadDir . $profile_photo);
                        }
                        
                        // Move uploaded file
                        if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $targetPath)) {
                            $profile_photo = $filename;
                        } else {
                            $error = "Failed to upload profile photo";
                        }
                    } else {
                        $error = "Invalid file type or size (max 2MB allowed)";
                    }
                }
                
                if (empty($error)) {
                    // Update trainer data
                    $query = "UPDATE trainers SET 
                              full_name = :full_name, 
                              email = :email, 
                              phone = :phone, 
                              specialization = :specialization, 
                              experience = :experience, 
                              bio = :bio, 
                              profile_photo = :profile_photo 
                              WHERE trainer_id = :trainer_id";
                    
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(":full_name", $full_name);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":phone", $phone);
                    $stmt->bindParam(":specialization", $specialization);
                    $stmt->bindParam(":experience", $experience, PDO::PARAM_INT);
                    $stmt->bindParam(":bio", $bio);
                    $stmt->bindParam(":profile_photo", $profile_photo);
                    $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
                    
                    if ($stmt->execute()) {
                        $success = "Profile updated successfully!";
                        // Update session variables
                        $_SESSION["full_name"] = $full_name;
                        $_SESSION["email"] = $email;
                        // Refresh trainer data
                        $trainer_data = array_merge($trainer_data, [
                            'full_name' => $full_name,
                            'email' => $email,
                            'phone' => $phone,
                            'specialization' => $specialization,
                            'experience' => $experience,
                            'bio' => $bio,
                            'profile_photo' => $profile_photo
                        ]);
                    } else {
                        $error = "Error updating profile. Please try again.";
                    }
                }
            }
        } catch(PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}

// Handle password change
if (isset($_POST["change_password"])) {
    $current_password = trim($_POST["current_password"]);
    $new_password = trim($_POST["new_password"]);
    $confirm_password = trim($_POST["confirm_password"]);
    
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $error = "All password fields are required";
    } elseif ($new_password !== $confirm_password) {
        $error = "New passwords do not match";
    } elseif (strlen($new_password) < 6) {
        $error = "Password must be at least 6 characters";
    } else {
        try {
            // Verify current password
            $query = "SELECT password FROM trainers WHERE trainer_id = :trainer_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result && password_verify($current_password, $result['password'])) {
                // Update password
                $new_password_hash = password_hash($new_password, PASSWORD_BCRYPT);
                $query = "UPDATE trainers SET password = :password WHERE trainer_id = :trainer_id";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(":password", $new_password_hash);
                $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
                
                if ($stmt->execute()) {
                    $success = "Password changed successfully!";
                } else {
                    $error = "Error changing password. Please try again.";
                }
            } else {
                $error = "Current password is incorrect";
            }
        } catch(PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FITFUSION - Trainer Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #6C63FF;
      --primary-dark: #564fd3;
      --primary-light: #e0deff;
      --secondary: #F8F9FA;
      --success: #28a745;
      --info: #17a2b8;
      --warning: #ffc107;
      --danger: #dc3545;
      --light: #f8f9fa;
      --dark: #343a40;
      --gray: #6c757d;
      --gray-light: #e9ecef;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f7fa;
      color: #333;
      line-height: 1.6;
    }

    .navbar {
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 0.8rem 0;
    }
    
    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      color: var(--primary) !important;
    }
    
    .profile-card {
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      border: none;
    }
    
    .profile-header {
      background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
      color: white;
      border-radius: 10px 10px 0 0;
      padding: 2rem;
      text-align: center;
    }
    
    .profile-avatar-container {
      position: relative;
      width: 120px;
      height: 120px;
      margin: 0 auto 1rem;
    }
    
    .profile-avatar {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid white;
    }
    
    .avatar-upload {
      position: absolute;
      bottom: 0;
      right: 0;
      background: var(--primary);
      color: white;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
    }
    
    .avatar-upload input {
      display: none;
    }
    
    .profile-body {
      padding: 2rem;
    }
    
    .profile-section {
      margin-bottom: 2rem;
    }
    
    .profile-section-title {
      font-weight: 600;
      color: var(--primary);
      margin-bottom: 1.5rem;
      padding-bottom: 0.5rem;
      border-bottom: 2px solid var(--primary-light);
    }
    
    .form-control, .form-select {
      padding: 0.75rem 1rem;
      border-radius: 8px;
      border: 1px solid #e0e0e0;
    }
    
    .form-control:focus, .form-select:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
    }
    
    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
      padding: 0.5rem 1.5rem;
      font-weight: 500;
    }
    
    .btn-primary:hover {
      background-color: var(--primary-dark);
      border-color: var(--primary-dark);
    }
    
    .stat-card {
      background-color: white;
      border-radius: 10px;
      padding: 1.5rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      margin-bottom: 1.5rem;
    }
    
    .stat-value {
      font-size: 2rem;
      font-weight: 700;
      color: var(--primary);
    }
    
    .stat-label {
      color: var(--gray);
      font-size: 0.9rem;
    }
    
    .avatar-preview {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background-color: #f0f0f0;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
      overflow: hidden;
    }
    
    .initials-avatar {
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      color: white;
      background-color: var(--primary);
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="home.php">
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

  <div class="container my-5">
    <div class="row">
      <div class="col-lg-4">
        <!-- Profile Summary Card -->
        <div class="card profile-card mb-4">
          <div class="profile-header">
            <div class="profile-avatar-container">
              <?php if (!empty($trainer_data['profile_photo'])): ?>
                <img src="uploads/profile_photos/<?php echo htmlspecialchars($trainer_data['profile_photo']); ?>" 
                     class="profile-avatar" 
                     alt="Profile Picture">
              <?php else: ?>
                <div class="profile-avatar initials-avatar">
                  <?php echo strtoupper(substr($trainer_data['full_name'] ?? '', 0, 1)); ?>
                </div>
              <?php endif; ?>
              <label class="avatar-upload" for="profile_photo_upload">
                <i class="fas fa-camera"></i>
                <input type="file" id="profile_photo_upload" name="profile_photo" accept="image/*">
              </label>
            </div>
            <h3><?php echo htmlspecialchars($trainer_data['full_name'] ?? ''); ?></h3>
            <p class="mb-0"><?php echo htmlspecialchars($trainer_data['specialization'] ?? ''); ?></p>
          </div>
          <div class="profile-body">
            <div class="text-center mb-4">
              <p class="text-muted"><?php echo htmlspecialchars($trainer_data['bio'] ?? 'No bio added'); ?></p>
            </div>
            
            <div class="stat-card">
              <div class="stat-value"><?php echo htmlspecialchars($trainer_data['experience'] ?? '0'); ?>+</div>
              <div class="stat-label">Years Experience</div>
            </div>
            
            <div class="stat-card">
              <div class="stat-value"><?php 
                $query = "SELECT COUNT(*) FROM clients WHERE trainer_id = :trainer_id";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
                $stmt->execute();
                echo htmlspecialchars($stmt->fetchColumn());
              ?></div>
              <div class="stat-label">Active Clients</div>
            </div>
            
            <div class="stat-card">
              <div class="stat-value"><?php 
                $query = "SELECT COUNT(*) FROM sessions WHERE trainer_id = :trainer_id AND session_date >= CURDATE()";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(":trainer_id", $_SESSION["trainer_id"]);
                $stmt->execute();
                echo htmlspecialchars($stmt->fetchColumn());
              ?></div>
              <div class="stat-label">Upcoming Sessions</div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-8">
        <div class="card profile-card">
          <div class="profile-body">
            <?php if ($error): ?>
              <div class="alert alert-danger alert-dismissible fade show">
                <?php echo $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
              <div class="alert alert-success alert-dismissible fade show">
                <?php echo $success; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            <?php endif; ?>
            
            <div class="profile-section">
              <h3 class="profile-section-title">Profile Information</h3>
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <!-- Profile photo upload in form -->
                <div class="mb-4 text-center">
                  <div class="avatar-preview">
                    <?php if (!empty($trainer_data['profile_photo'])): ?>
                      <img src="uploads/profile_photos/<?php echo htmlspecialchars($trainer_data['profile_photo']); ?>" 
                           style="width:100%; height:100%; object-fit:cover;" 
                           id="profile_photo_preview">
                    <?php else: ?>
                      <div class="initials-avatar" id="initials_preview">
                        <?php echo strtoupper(substr($trainer_data['full_name'] ?? '', 0, 1)); ?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <label for="profile_photo" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-camera me-2"></i>Change Photo
                  </label>
                  <input type="file" id="profile_photo" name="profile_photo" accept="image/*" class="d-none">
                  <small class="d-block text-muted mt-1">JPEG, PNG or GIF (Max 2MB)</small>
                </div>
                
                <div class="row mb-3">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="full_name" 
                           value="<?php echo htmlspecialchars($trainer_data['full_name'] ?? ''); ?>" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" 
                           value="<?php echo htmlspecialchars($trainer_data['email'] ?? ''); ?>" required>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="form-label">Phone</label>
                    <input type="tel" class="form-control" name="phone" 
                           value="<?php echo htmlspecialchars($trainer_data['phone'] ?? ''); ?>">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Specialization</label>
                    <input type="text" class="form-control" name="specialization" 
                           value="<?php echo htmlspecialchars($trainer_data['specialization'] ?? ''); ?>">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="form-label">Years of Experience</label>
                    <input type="number" class="form-control" name="experience" 
                           value="<?php echo htmlspecialchars($trainer_data['experience'] ?? ''); ?>">
                  </div>
                </div>
                
                <div class="mb-3">
                  <label class="form-label">Bio</label>
                  <textarea class="form-control" name="bio" rows="4"><?php echo htmlspecialchars($trainer_data['bio'] ?? ''); ?></textarea>
                </div>
                
                <div class="text-end">
                  <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
              </form>
            </div>
            
            <div class="profile-section">
              <h3 class="profile-section-title">Change Password</h3>
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="mb-3">
                  <label class="form-label">Current Password</label>
                  <input type="password" class="form-control" name="current_password">
                </div>
                
                <div class="row mb-3">
                  <div class="col-md-6 mb-3 mb-md-0">
                    <label class="form-label">New Password</label>
                    <input type="password" class="form-control" name="new_password">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" name="confirm_password">
                  </div>
                </div>
                
                <div class="text-end">
                  <button type="submit" name="change_password" value="1" class="btn btn-primary">Change Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Preview profile photo before upload
      const profilePhotoInput = document.getElementById('profile_photo');
      const profilePhotoPreview = document.getElementById('profile_photo_preview');
      const initialsPreview = document.getElementById('initials_preview');
      
      if (profilePhotoInput) {
        profilePhotoInput.addEventListener('change', function(e) {
          const file = e.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
              const previewContainer = document.querySelector('.avatar-preview');
              
              // Remove initials preview if it exists
              if (initialsPreview) {
                initialsPreview.remove();
              }
              
              // Create or update image preview
              if (!profilePhotoPreview) {
                const img = document.createElement('img');
                img.id = 'profile_photo_preview';
                img.style.width = '100%';
                img.style.height = '100%';
                img.style.objectFit = 'cover';
                img.src = event.target.result;
                previewContainer.appendChild(img);
              } else {
                profilePhotoPreview.src = event.target.result;
              }
              
              // Also update the avatar in the header
              const headerAvatar = document.querySelector('.profile-avatar-container .profile-avatar');
              if (headerAvatar) {
                if (headerAvatar.tagName === 'IMG') {
                  headerAvatar.src = event.target.result;
                } else {
                  // Replace initials with image
                  const img = document.createElement('img');
                  img.className = 'profile-avatar';
                  img.src = event.target.result;
                  headerAvatar.replaceWith(img);
                }
              }
            };
            reader.readAsDataURL(file);
          }
        });
      }
      
      // Also handle the avatar upload in the header
      const headerUpload = document.getElementById('profile_photo_upload');
      if (headerUpload) {
        headerUpload.addEventListener('change', function(e) {
          document.getElementById('profile_photo').files = e.target.files;
          const event = new Event('change');
          document.getElementById('profile_photo').dispatchEvent(event);
        });
      }
      
      // Form loading states
      const forms = document.querySelectorAll('form');
      forms.forEach(form => {
        form.addEventListener('submit', function() {
          const submitBtn = this.querySelector('button[type="submit"]');
          if (submitBtn) {
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> ' + submitBtn.textContent.trim();
            submitBtn.disabled = true;
          }
        });
      });
    });
  </script>
</body>
</html>