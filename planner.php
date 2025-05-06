<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Planner | StudySpace</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to right, rgba(0,0,0,0.6), rgba(93,12,255,0.3));
      z-index: 1;
    }

    .container {
      position: relative;
      z-index: 2;
      padding-top: 9rem;
      max-width: 1000px;
    }

    .day-selector {
      display: flex;
      gap: 1rem;
      justify-content: center;
      margin-bottom: 2rem;
      flex-wrap: wrap;
    }

    .day-selector button {
      padding: 0.6rem 1.2rem;
      border-radius: 20px;
      background: rgba(255,255,255,0.1);
      border: none;
      color: #fff;
      font-weight: 600;
      transition: 0.3s ease;
    }

    .day-selector button.active {
      background: #fff;
      color: #000;
    }

    .event-form {
      display: flex;
      gap: 1rem;
      margin-bottom: 2rem;
      flex-wrap: wrap;
    }

    .event-form input {
      background: rgba(255, 255, 255, 0.1);
      border: none;
      color: #fff;
      padding: 0.5rem 1rem;
      border-radius: 12px;
      flex: 1;
    }

    .event-form input::placeholder {
      color: rgba(255,255,255,0.7);
    }

    .event-form button {
      padding: 0.5rem 1.5rem;
      border: none;
      border-radius: 20px;
      background: #c084fc;
      color: #fff;
      font-weight: 600;
    }

    .event-card {
      background: rgba(255,255,255,0.07);
      padding: 1rem 1.5rem;
      border-radius: 12px;
      margin-bottom: 1rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      animation: fadeIn 0.4s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .event-details {
      display: flex;
      flex-direction: column;
    }

    .event-details span {
      font-size: 1.1rem;
      font-weight: 500;
    }

    .delete-btn {
      color: #ff6b6b;
      cursor: pointer;
      font-size: 1.3rem;
    }

    .reminder-toggle {
      font-size: 0.9rem;
      margin-top: 5px;
    }

    .footer {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 2rem 0;
      color: #fff;
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

    .footer a {
      color: #c084fc;
    }
  </style>
</head>
<body>
  <div class="overlay"></div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top px-4 w-100">
    <a class="navbar-brand d-flex align-items-center" href="index.html">
      <img src="./logo-white.png" alt="StudySpace Logo" style="height: 50px; margin-right: 10px;">
      <!-- <strong class="text-white">Lumen</strong> -->
    </a>
    <div class="collapse navbar-collapse justify-content-end">
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

  <div class="container text-white">
    <div class="day-selector">
      <button class="day-btn active" data-day="Monday">Monday</button>
      <button class="day-btn" data-day="Tuesday">Tuesday</button>
      <button class="day-btn" data-day="Wednesday">Wednesday</button>
      <button class="day-btn" data-day="Thursday">Thursday</button>
      <button class="day-btn" data-day="Friday">Friday</button>
      <button class="day-btn" data-day="Saturday">Saturday</button>
      <button class="day-btn" data-day="Sunday">Sunday</button>
    </div>

    <div class="event-form">
      <input type="text" id="subjectInput" placeholder="Subject" />
      <input type="time" id="timeInput" />
      <button onclick="addEvent()">Add Event</button>
    </div>

    <div id="eventList"></div>
  </div>

  <script>
    let selectedDay = "Monday";
    const dayButtons = document.querySelectorAll(".day-btn");

    dayButtons.forEach(btn => {
      btn.addEventListener("click", () => {
        dayButtons.forEach(b => b.classList.remove("active"));
        btn.classList.add("active");
        selectedDay = btn.getAttribute("data-day");
        fetchEvents();
      });
    });

    async function fetchEvents() {
      try {
        const response = await fetch(`get_events.php?day=${selectedDay}`);
        const events = await response.json();
        renderEvents(events);
      } catch (error) {
        console.error('Error fetching events:', error);
      }
    }

    async function addEvent() {
      const subject = document.getElementById("subjectInput").value;
      const time = document.getElementById("timeInput").value;
      if (!subject || !time) return alert("Please enter subject and time");

      try {
        const response = await fetch('add_event.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            day: selectedDay,
            subject: subject,
            time: time,
            remind: false
          })
        });

        if (response.ok) {
          document.getElementById("subjectInput").value = "";
          document.getElementById("timeInput").value = "";
          fetchEvents();
        }
      } catch (error) {
        console.error('Error adding event:', error);
      }
    }

    function renderEvents(events) {
      const eventList = document.getElementById("eventList");
      eventList.innerHTML = "";
      
      events.forEach(event => {
        const div = document.createElement("div");
        div.className = "event-card";
        div.innerHTML = `
          <div class="event-details">
            <span>${event.subject}</span>
            <small>${event.time}</small>
            <label class="reminder-toggle">
              <input type="checkbox" ${event.remind ? 'checked' : ''} onchange="toggleReminder(${event.id}, this.checked)">
              Reminder
            </label>
          </div>
          <i class="bi bi-trash delete-btn" onclick="deleteEvent(${event.id})"></i>
        `;
        eventList.appendChild(div);
      });
    }

    async function deleteEvent(eventId) {
      try {
        const response = await fetch(`delete_event.php?id=${eventId}`, {
          method: 'DELETE'
        });
        if (response.ok) {
          fetchEvents();
        }
      } catch (error) {
        console.error('Error deleting event:', error);
      }
    }

    async function toggleReminder(eventId, remind) {
      try {
        const response = await fetch('update_reminder.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            id: eventId,
            remind: remind
          })
        });
        if (!response.ok) {
          throw new Error('Failed to update reminder');
        }
      } catch (error) {
        console.error('Error updating reminder:', error);
      }
    }

    // Initial load
    fetchEvents();
  </script>

</body>
</html>
