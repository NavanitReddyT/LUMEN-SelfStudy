<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>StudySpace | Student Productivity Hub</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: url('bg.jpg') no-repeat center center/cover;
      color: #fff;
      min-height: 100vh;
      overflow-x: hidden;
    }

    .overlay {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: linear-gradient(to right, rgba(0,0,0,0.6), rgba(93,12,255,0.3));
      z-index: 1;
    }

    nav {
      z-index: 10;
    }

    .container {
      position: relative;
      z-index: 2;
    }

    .hero-section {
      padding-top: 10rem;
      text-align: center;
      animation: fadeInUp 1s ease;
    }

    .hero-section h1 {
      font-size: 3.5rem;
      font-weight: 700;
      color: #fff;
    }

    .hero-section p {
      font-size: 1.2rem;
      max-width: 600px;
      margin: 1rem auto;
      color: rgba(255, 255, 255, 0.85);
    }

    .cta-buttons a {
      margin: 0 0.5rem;
      padding: 0.8rem 1.8rem;
      font-size: 1rem;
      border-radius: 30px;
    }

    .feature-section {
      padding: 5rem 0;
    }

    .feature-card {
      background: rgba(255,255,255,0.07);
      border-radius: 16px;
      padding: 2rem;
      transition: transform 0.3s;
      box-shadow: 0 0 40px rgba(0,0,0,0.2);
    }

    .feature-card:hover {
      transform: translateY(-8px);
      background: rgba(255,255,255,0.1);
    }

    .feature-card i {
      font-size: 2rem;
      color: #c084fc;
      margin-bottom: 1rem;
    }

    .about-section {
      padding: 6rem 0;
      background: linear-gradient(to right, rgba(0,0,0,0.6), rgba(93,12,255,0.3));
    }

    .about-section h2 {
      font-size: 2.5rem;
      font-weight: 700;
    }

    .about-section p {
      font-size: 1.1rem;
      max-width: 800px;
      margin: auto;
      color: rgba(255, 255, 255, 0.85);
    }

    .footer {
      background-color: rgba(0, 0, 0, 0.7);
      padding: 2rem 0;
      color: #fff;
    }

    .footer h6 {
      font-weight: 600;
      margin-bottom: 1rem;
    }

    .footer ul {
      padding-left: 0;
      list-style: none;
    }

    .footer ul li a {
      color: rgba(255,255,255,0.9);
      text-decoration: none;
    }

    .footer ul li a:hover {
      color: #c084fc;
    }

    .footer .social-icons a {
      color: white;
      font-size: 1.2rem;
      margin-right: 15px;
      text-decoration: none;
    }

    .footer .social-icons a:hover {
      color: #c084fc;
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="overlay"></div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent px-4 w-100 position-fixed">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <img src="./logo-white.png" alt="StudySpace Logo" style="height: 50px; margin-right: 10px;">
    </a>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="dashboard.php">Profile</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="notes.php">Notes</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="planner.php">Timetable</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="pomodoro.php">Pomodoro</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="contact.php">Contact</a></li>
        <?php if (isset($_SESSION['username'])): ?>
          <li class="nav-item"><a class="btn btn-light ms-2" href="logout.php">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="btn btn-light ms-2" href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

<div class="container text-center hero-section" style="min-height: 70vh; display: flex; flex-direction: column; justify-content: center; animation: fadeIn 2s ease-in-out;">
    <h1 class="mb-3" style="animation: fadeInUp 1s ease-in-out;">Welcome to lumen's self study</h1>
    <p style="animation: fadeInUp 1.2s ease-in-out;">Your ultimate student productivity hub — organize notes, plan your week, and stay focused like a pro.</p>
    <div class="cta-buttons mt-4" style="animation: fadeInUp 1.5s ease-in-out;">
      <?php if (isset($_SESSION['username'])): ?>
        <a href="dashboard.php" class="btn btn-light">Get Started</a>
      <?php else: ?>
        <a href="login.php" class="btn btn-light">Get Started</a>
      <?php endif; ?>
      <?php if (!isset($_SESSION['username'])): ?>
        <a href="login.php" class="btn btn-outline-light">Login</a>
      <?php endif; ?>
    </div>
  </div>
  <section class="feature-section container text-center">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="feature-card" style="animation: zoomIn 1s ease-in-out;">
          <i class="bi bi-journal-code"></i>
          <h5>Smart Notes</h5>
          <p>Upload, tag, and search through your academic notes with ease and style.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-card" style="animation: zoomIn 1.2s ease-in-out;">
          <i class="bi bi-calendar-week"></i>
          <h5>Timetable</h5>
          <p>Plan your week with a drag-and-drop interactive schedule.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-card" style="animation: zoomIn 1.4s ease-in-out;">
          <i class="bi bi-clock-history"></i>
          <h5>Focus Mode</h5>
          <p>Use our Pomodoro timer and motivational quotes to stay in the zone.</p>
        </div>
      </div>
    </div>
  </section>
  

  <section class="about-section text-center">
    <div class="container">
      <h2>About self study</h2>
      <p class="mt-3">
        StudySpace is built for students who want to get things done without compromising on vibe. Whether you're prepping for exams, managing your weekly schedule, or keeping your notes on fleek — StudySpace helps you work smarter and slay deadlines.
      </p>
    </div>
  </section>
  <section class="py-5 text-center bg-dark bg-opacity-50">
    <div class="container">
      <h2 class="mb-5" style="animation: fadeInUp 1s ease;">What Our Users Say</h2>
      <div class="row g-4 justify-content-center">
        <div class="col-md-4">
          <div class="feature-card bg-black bg-opacity-50" style="animation: fadeInUp 1.2s ease;">
            <img src="profile-pic.png" alt="Anika R." class="rounded-circle mb-3" width="60">
            <p class="fst-italic">"StudySpace turned my chaotic life into calm productivity. The planner is just *chef's kiss*."</p>
            <h6 class="mt-3">— Anika R., Grad Student</h6>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card bg-black bg-opacity-50" style="animation: fadeInUp 1.4s ease;">
            <img src="profile-pic.png" alt="Rishi V." class="rounded-circle mb-3" width="60">
            <p class="fst-italic">"Notes, Pomodoro, and a beautiful UI? This app slaps harder than finals week."</p>
            <h6 class="mt-3">— Rishi V., Engineering Major</h6>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card bg-black bg-opacity-50" style="animation: fadeInUp 1.6s ease;">
            <img src="profile-pic.png" alt="Selena T." class="rounded-circle mb-3" width="60">
            <p class="fst-italic">"As someone with ADHD, the structure + aesthetics help me stay focused. Massive W."</p>
            <h6 class="mt-3">— Selena T., Design Student</h6>
          </div>
        </div>
      </div>
    </div>
  </section>
  <style>
    @keyframes zoomIn {
      from { transform: scale(0.8); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }
    
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    </style>
    

    <script>
    window.addEventListener('DOMContentLoaded', () => {
      const fadeEls = document.querySelectorAll('[style*="animation:"]');
      fadeEls.forEach(el => {
        el.style.opacity = 0;
        el.style.animationFillMode = 'forwards';
        el.style.willChange = 'transform, opacity';
        el.getBoundingClientRect(); // force reflow
        el.style.opacity = 1;
      });
    });
    </script>
  

  <script>
    window.addEventListener('DOMContentLoaded', () => {
      const elements = document.querySelectorAll('.hero-section h1, .hero-section p, .cta-buttons');
      elements.forEach((el, i) => {
        el.style.animation = `fadeInUp 1s ease ${(i + 1) * 0.3}s both`;
      });
    });
  </script>

  <footer class="footer">
    <div class="container">
      <div class="row text-center text-md-start">
        <div class="col-md-4 mb-3">
          <h6>Contact Us</h6>
          <p class="mb-1"> 7993610959</p>
          <p> support@lumen.edu.in</p>
        </div>
        <div class="col-md-4 mb-3">
          <h6>Navigation</h6>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="notes.php">Notes</a></li>
            <li><a href="planner.php">Planner</a></li>
            <li><a href="pomodoro.php">Pomodoro</a></li>
            <li><a href="dashboard.php">Profile</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-3">
          <h6>Feedback</h6>
          <p><a href="mailto:support@studyspace.com?subject=Bug Report">Report a Problem</a></p>
          <div class="social-icons mt-3">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-twitter-x"></i></a>
            <a href="#"><i class="bi bi-github"></i></a>
          </div>
        </div>
      </div>
      <hr style="background: rgba(255,255,255,0.2);">
      <p class="text-center text-muted">&copy; 2025 StudySpace. Built by students for students.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
