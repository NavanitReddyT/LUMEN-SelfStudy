<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Pomodoro Timer | StudySpace</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

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
      padding-top: 9rem;
      max-width: 700px;
      text-align: center;
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      font-size: 3rem;
      font-weight: 700;
    }

    .btn-group {
      gap: 1rem;
      flex-wrap: wrap;
    }

    .timer-controls .btn {
  font-size: 1rem;
  padding: 0.7rem 2.2rem;
  border-radius: 40px;
  font-weight: 600;
  border: none;
  color: #fff;
  backdrop-filter: blur(10px);
  transition: transform 0.3s ease, background 0.3s ease;
}

.timer-controls .btn:active {
  transform: scale(0.96);
}

.btn-start {
  background: linear-gradient(135deg, #16a34a, #22c55e);
}

.btn-pause {
  background: linear-gradient(135deg, #facc15, #fbbf24);
  color: #222;
}

.btn-reset {
  background: linear-gradient(135deg, #ef4444, #f87171);
}


    .mode-btn {
      padding: 0.6rem 1.2rem;
      border-radius: 20px;
      font-weight: 500;
    }

    .timer-wrapper {
      margin: 2rem 0;
      position: relative;
      width: 220px;
      height: 220px;
      margin-inline: auto;
    }

    .timer-circle {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      border: 8px solid rgba(255,255,255,0.2);
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 3rem;
      font-weight: 600;
      color: #fff;
      transition: 0.3s ease;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(6px);
    }

    .timer-controls .btn {
      font-size: 1rem;
      padding: 0.6rem 1.5rem;
      border-radius: 30px;
    }

    .quote-box {
      font-size: 1rem;
      font-style: italic;
      color: rgba(255, 255, 255, 0.8);
      margin-top: 2rem;
      min-height: 40px;
    }

    .session-info {
      font-size: 0.95rem;
      margin-top: 1rem;
      color: #ccc;
    }
  </style>
</head>
<body>
<div class="overlay"></div>

<nav class="navbar navbar-expand-lg navbar-dark bg-transparent px-4 w-100 fixed-top">
  <a class="navbar-brand d-flex align-items-center" href="index.html">
    <img src="./logo-white.png" alt="StudySpace Logo" style="height: 50px; margin-right: 10px;">
    <!-- <strong class="text-white">Lumen</strong> -->
  </a>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="dashboard.php">Profile</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="notes.php">Notes</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="planner.php">Planner</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="pomodoro.php">Pomodoro</a></li>
      <li class="nav-item"><a class="nav-link text-white" href="contact.php">Contact</a></li>
      <li class="nav-item"><a class="btn btn-light ms-2" href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container">
  <h2>Pomodoro Timer</h2>

  <div class="btn-group d-flex justify-content-center mb-4" role="group">
    <button class="btn btn-outline-light mode-btn" onclick="setMode('pomodoro')">Pomodoro</button>
    <button class="btn btn-outline-light mode-btn" onclick="setMode('short')">Short Break</button>
    <button class="btn btn-outline-light mode-btn" onclick="setMode('long')">Long Break</button>
  </div>

  <div class="timer-wrapper">
    <div class="timer-circle" id="timer">25:00</div>
  </div>

  <div class="timer-controls d-flex justify-content-center gap-4 mt-4">
  <button class="btn btn-start" onclick="startTimer()">Start</button>
  <button class="btn btn-pause" onclick="pauseTimer()">Pause</button>
  <button class="btn btn-reset" onclick="resetTimer()">Reset</button>
</div>

  

  <div class="quote-box" id="quoteBox">"Stay focused and never give up."</div>
  <div class="session-info">Pomodoros Completed Today: <span id="sessionCount">0</span></div>
</div>

<!-- Optional sound -->
<audio id="alarmSound" src="https://www.soundjay.com/button/beep-07.wav" preload="auto"></audio>
<audio id="tickSound" src="https://www.soundjay.com/clock/clock-ticking-3.mp3" preload="auto" loop></audio>

<script>
  let mode = 'pomodoro';
  let durations = { pomodoro: 25, short: 5, long: 15 };
  let minutes = durations[mode];
  let seconds = 0;
  let timerDisplay = document.getElementById("timer");
  let countdown;
  let ticking = document.getElementById("tickSound");
  let alarm = document.getElementById("alarmSound");
  let sessionCount = localStorage.getItem("pomodoroCount") || 0;
  document.getElementById("sessionCount").textContent = sessionCount;

  const quotes = [
    "Stay focused and never give up.",
    "Discipline is the bridge between goals and accomplishment.",
    "You don’t have to be extreme, just consistent.",
    "Small progress is still progress.",
    "Push yourself, no one else is going to do it for you."
  ];

  function rotateQuote() {
    const quoteBox = document.getElementById("quoteBox");
    const random = Math.floor(Math.random() * quotes.length);
    quoteBox.textContent = `"${quotes[random]}"`;
  }
  setInterval(rotateQuote, 10000);

  function updateDisplay() {
    timerDisplay.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
  }

  function setMode(newMode) {
    mode = newMode;
    clearInterval(countdown);
    ticking.pause();
    minutes = durations[mode];
    seconds = 0;
    updateDisplay();
  }

  function startTimer() {
    clearInterval(countdown);
    ticking.play();
    countdown = setInterval(() => {
      if (minutes === 0 && seconds === 0) {
        clearInterval(countdown);
        ticking.pause();
        alarm.play();
        alert("Time's up!");
        if (mode === 'pomodoro') {
          sessionCount++;
          localStorage.setItem("pomodoroCount", sessionCount);
          document.getElementById("sessionCount").textContent = sessionCount;
        }
        return;
      }
      if (seconds === 0) {
        minutes--;
        seconds = 59;
      } else {
        seconds--;
      }
      updateDisplay();
    }, 1000);
  }

  function pauseTimer() {
    clearInterval(countdown);
    ticking.pause();
  }

  function resetTimer() {
    clearInterval(countdown);
    ticking.pause();
    minutes = durations[mode];
    seconds = 0;
    updateDisplay();
  }

  updateDisplay();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
