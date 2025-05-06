<?php
session_start();
$toast = '';
$toastType = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $conn = new mysqli("localhost", "root", "", "studyspace");

  // Check for connection errors
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Create users table if it doesn't exist
  $createTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  )";

  if (!$conn->query($createTable)) {
    $toast = "Error creating table: " . $conn->error;
    $toastType = 'danger';
  } else {
    // Check if users already exist
    $checkUsers = $conn->query("SELECT * FROM users");

    if ($checkUsers && $checkUsers->num_rows == 0) {
      // Insert two allowed users
      $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
      if ($stmt) {
        // Insert Alex Johnson
        $name = "Alex Johnson";
        $email = "alex.johnson@lumen.edu.in";
        $hashedPassword = password_hash("password123", PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $name, $email, $hashedPassword);
        $stmt->execute();

        // Insert Hari
        $name = "Hari";
        $email = "hari@lumen.edu.in";
        $hashedPassword = password_hash("password456", PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $name, $email, $hashedPassword);
        $stmt->execute();

        $stmt->close();
      }
    }

    // Login logic
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    if ($stmt) {
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
          $_SESSION['username'] = $user['name'];
          $_SESSION['user_id'] = $user['id'];  // Add this line
          header("Location: dashboard.php");
          exit();
        } else {
          $toast = "Incorrect password.";
          $toastType = 'danger';
        }
      } else {
        $toast = "No user found with that email.";
        $toastType = 'danger';
      }
      $stmt->close();
    } else {
      $toast = "Database error occurred during login.";
      $toastType = 'danger';
    }
  }
  $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | lumen's self study</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="overlay"></div>

<nav class="navbar navbar-expand-lg navbar-dark bg-transparent px-4 w-100">
  <a class="navbar-brand d-flex align-items-center" href="index.php">
    <img src="./logo-white.png" alt="StudySpace Logo" style="height: 50px; margin-right: 10px;">
  </a>

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="notes.php">Notes</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="planner.php">Planner</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="pomodoro.php">Pomodoro</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="dashboard.php">Profile</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="contact.php">Contact</a></li>
    </ul>
  </div>
</nav>

<div class="split-container">
  <!-- LEFT SIDE: Welcome Text -->
  <div class="left-pane">
    <div class="welcome-text">
      <h1>Welcome to lumen's self study</h1>
      <p>Login with your university credentials to access your dashboard, notes, schedule, and focus tools.</p>
    </div>
  </div>

  <!-- RIGHT SIDE: Login Form -->
  <div class="right-pane">
    <form method="POST">
      <h2 class="fade-item fade-delay-1">Student Login</h2>
      <input type="email" name="email" placeholder="University Email" class="glass-input fade-item fade-delay-2" required>
      <input type="password" name="password" placeholder="Password" class="glass-input fade-item fade-delay-3" required>
      <button type="submit" class="fade-item fade-delay-4">Login</button>
    </form>
  </div>
</div>

<?php if (!empty($toast)): ?>
  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div class="toast show align-items-center text-bg-<?= $toastType ?> border-0" role="alert">
      <div class="d-flex">
        <div class="toast-body"><?= htmlspecialchars($toast) ?></div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
    </div>
  </div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>