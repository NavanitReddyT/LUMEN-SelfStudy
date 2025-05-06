<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact | StudySpace</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
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

    .container {
      position: relative;
      z-index: 2;
      padding-top: 7rem;
    }

    h1 {
      text-align: center;
      margin-bottom: 2rem;
      animation: fadeInDown 1s ease;
    }

    .contact-card {
      background: rgba(255, 255, 255, 0.06);
      backdrop-filter: blur(10px);
      border-radius: 16px;
      padding: 2rem;
      color: #fff;
      box-shadow: 0 0 30px rgba(0,0,0,0.2);
      animation: fadeInUp 1.2s ease;
    }

    .form-control, .form-select {
      background: rgba(255,255,255,0.1);
      border: none;
      color: #fff;
      border-radius: 10px;
      padding: 0.8rem;
    }

    .form-control::placeholder {
      color: rgba(255,255,255,0.7);
    }

    .btn-send {
      border-radius: 30px;
      padding: 0.6rem 2rem;
      font-weight: 600;
    }

    .info-box {
      margin-top: 2rem;
      background: rgba(0,0,0,0.2);
      border-radius: 12px;
      padding: 1.5rem;
      animation: fadeInUp 1.4s ease;
    }

    .info-box i {
      font-size: 1.2rem;
      margin-right: 8px;
      color: #c084fc;
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


    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    footer {
      margin-top: 4rem;
    }
  </style>
</head>
<body>
  <div class="overlay"></div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent px-4 w-100 fixed-top">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <img src="logo-white.png" alt="StudySpace Logo" style="height: 50px; margin-right: 10px;">
      <strong class="text-white">lumen's self study</strong>
    </a>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="dashboard.php">Profile</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="notes.php">Notes</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="planner.php">Planner</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="pomodoro.php">Pomodoro</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="btn btn-light ms-2" href="login.php">Login</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h1>Contact Us</h1>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="contact-card">
            <form action="contact_submit.php" method="POST">
            <div class="mb-3">
              <input name="name" type="text" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="mb-3">
              <input name="email" type="email" class="form-control" placeholder="Your Email" required>
            </div>
            <div class="mb-3">
              <input name="subject" type="text" class="form-control" placeholder="Subject">
            </div>
            <div class="mb-3">
              <textarea name="message" class="form-control" rows="4" placeholder="Your Message"></textarea>
            </div>
            <button type="submit" class="btn btn-light btn-send mt-2">Send Message</button>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <div class="info-box">
          <h5 class="mb-3">Need help? Reach out!</h5>
          <p><i class="bi bi-telephone-fill"></i> +91 7993610959</p>
          <p><i class="bi bi-envelope-fill"></i> support@lumen.edu.in</p>
          <p><i class="bi bi-geo-alt-fill"></i> Lumen University, India</p>
          <p><i class="bi bi-clock-fill"></i> Mon - Fri: 9am – 6pm IST</p>
        </div>
      </div>
    </div>
  </div>

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
      <p class="text-center text-muted">&copy; 2025 lumen's self study. Built by students for students.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
