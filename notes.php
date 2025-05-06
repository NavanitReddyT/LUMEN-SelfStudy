<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notes | StudySpace</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: linear-gradient(to right, rgba(0,0,0,0.6), rgba(93,12,255,0.3));
      z-index: 1;
    }

    .container {
      position: relative;
      z-index: 2;
      max-width: 960px;
      margin: auto;
      padding-top: 8rem;
    }

    .notes-header {
      font-size: 2.5rem;
      font-weight: 600;
      margin-bottom: 2rem;
      text-align: center;
    }

    .search-bar, .tag-filter {
      background: rgba(255, 255, 255, 0.1);
      border: none;
      padding: 0.8rem 1rem;
      border-radius: 12px;
      color: #fff;
      width: 100%;
    }

    .upload-zone {
      border: 2px dashed #c084fc;
      border-radius: 12px;
      padding: 3rem;
      text-align: center;
      margin: 2rem 0;
      background: rgba(255, 255, 255, 0.05);
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .upload-zone:hover {
      background: rgba(255, 255, 255, 0.08);
    }

    .note-card {
      background: rgba(255,255,255,0.07);
      border-radius: 12px;
      padding: 1rem 1.5rem;
      margin-bottom: 1rem;
      animation: fadeIn 0.4s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .note-title {
      font-size: 1rem;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .note-title i {
      color: #c084fc;
    }

    .delete-btn {
      color: #ff6b6b;
      cursor: pointer;
      font-size: 1.2rem;
    }

    .add-tag-btn {
      margin-top: 10px;
    }

    .tag-input {
      background: rgba(255, 255, 255, 0.1);
      border: none;
      border-radius: 20px;
      padding: 0.3rem 0.8rem;
      color: #fff;
      margin-top: 10px;
      display: none;
    }

    .tag-container .badge {
      background-color: #c084fc;
      color: white;
      font-size: 0.8rem;
      margin: 4px 6px 0 0;
      cursor: pointer;
    }

    .toast-container {
      position: fixed;
      top: 1rem;
      right: 1rem;
      z-index: 9999;
    }
    .tag-filter {
  background: rgba(255, 255, 255, 0.1);
  border: none;
  padding: 0.8rem 1rem;
  border-radius: 12px;
  color: #fff;
  width: 100%;
  appearance: none;
  -webkit-appearance: none;
  font-size: 1rem;
  backdrop-filter: blur(12px);
}

.tag-filter option {
  background: #1a1f2e;
  color: #fff;
  font-size: 1rem;
}
.footer {
      background-color: rgba(0, 0, 0, 0.304);
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
/* Page fade-in on load */
body {
  animation: fadeInPage 1.2s ease both;
}



/* Upload zone glow pulse */
.upload-zone {
  animation: glow 4s ease-in-out infinite alternate;
}



/* Floating animation on icon */
.upload-zone i {
  animation: floatY 3s ease-in-out infinite;
}

@keyframes floatY {
  0% { transform: translateY(0); }
  50% { transform: translateY(-6px); }
  100% { transform: translateY(0); }
}

/* Animate each note-card as it enters */
.note-card {
  animation: fadeCard 0.6s ease;
}

@keyframes fadeCard {
  from {
    opacity: 0;
    transform: translateY(12px) scale(0.98);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

/* Button hover effects */
.btn,
.upload-zone button {
  transition: all 0.3s ease;
}
.fade-item {
  opacity: 0;
  transform: translateY(30px);
  animation: fadeUp 0.8s ease forwards;
}

.fade-item:nth-child(1) { animation-delay: 0.2s; }
.fade-item:nth-child(2) { animation-delay: 0.4s; }
.fade-item:nth-child(3) { animation-delay: 0.6s; }

@keyframes fadeUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.btn:hover,
.upload-zone button:hover {
  transform: scale(1.05);
  box-shadow: 0 0 12px rgba(255, 255, 255, 0.15);
}

/* Add tag input smooth reveal */
.tag-input {
  transition: all 0.4s ease;
}

/* Navbar transition on scroll (optional sticky feel) */
nav.navbar {
  transition: background 0.4s ease;
}

nav.scrolled {
  background-color: rgba(0, 0, 0, 0.8) !important;
  box-shadow: 0 4px 12px rgba(0,0,0,0.4);
}
.badge {
  transition: transform 0.3s;
}
.badge:hover {
  transform: scale(1.05);
  background-color: #aa65fc;
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



  </style>
</head>

<body>
  <div class="overlay"></div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-transparent px-4 w-100 fixed-top">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <img src="./logo-white.png" alt="StudySpace Logo" style="height: 50px; margin-right: 10px;">
      <!-- <strong class="text-white">Lumen</strong> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
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
    
    <h2 class="notes-header fade-item" style="animation-delay: 0.1s;">Notes</h2>

    <div class="fade-item" style="animation-delay: 0.3s;">
    <div class="upload-zone" id="dropZone">
      <div><i class="bi bi-upload" style="font-size: 2rem;"></i></div>
      <p>Drag and drop your PDF notes here</p>
      <button class="btn btn-light mt-2" onclick="document.getElementById('fileInput').click()">Browse Files</button>
      <input type="file" id="fileInput" hidden>
    </div>
    </div>
    <div class="row mb-4 fade-item" style="animation-delay: 0.5s;">
      <div class="col-md-8 mb-2">
        <input type="text" id="searchInput" class="search-bar" placeholder="Search notes...">
      </div>
      <div class="col-md-4 mb-2">
        <select id="tagFilter" class="tag-filter">
          <option value="">All</option>
          <option value="Math">Math</option>
          <option value="CS">Computer Science</option>
          <option value="Coding">Coding</option>
        </select>
      </div>
    </div>

    <div id="notesList" class="fade-item" style="animation-delay: 0.8s;"></div>
  </div>

  <div class="toast-container" id="toastContainer"></div>

  <script>
    const fileInput = document.getElementById('fileInput');
    const dropZone = document.getElementById('dropZone');
    const notesList = document.getElementById('notesList');
    const searchInput = document.getElementById('searchInput');
    const tagFilter = document.getElementById('tagFilter');
    const toastContainer = document.getElementById('toastContainer');

    let notes = JSON.parse(localStorage.getItem('fakeNotes')) || [];

    function showToast(message) {
      const toast = document.createElement('div');
      toast.className = 'toast align-items-center text-bg-success show';
      toast.role = 'alert';
      toast.innerHTML = `<div class="d-flex"><div class="toast-body">${message}</div><button type="button" class="btn-close btn-close-white ms-2 me-2 m-auto" data-bs-dismiss="toast"></button></div>`;
      toastContainer.appendChild(toast);
      setTimeout(() => toast.remove(), 3000);
    }

    function renderNote(note, index) {
      const div = document.createElement('div');
      div.className = 'note-card';
      div.setAttribute('data-tag', note.tag || '');
      div.innerHTML = `
        <div class="note-title">
          <i class="bi bi-file-earmark-text"></i>
          <span>${note.name}</span>
          <i class="bi bi-x delete-btn" onclick="deleteNote(${index}, this)"></i>
        </div>
        <button class="add-tag-btn btn btn-outline-light btn-sm">Add Tag</button>
        <input type="text" class="tag-input" placeholder="Type and press Enter">
        <div class="tag-container d-flex flex-wrap mt-2"></div>
        <div class="note-meta">Uploaded ${note.date}</div>
      `;
      setupTagInput(div, note.id);
      notesList.appendChild(div);
    }

    function setupTagInput(card, noteId) {
      const input = card.querySelector('.tag-input');
      const button = card.querySelector('.add-tag-btn');
      const container = card.querySelector('.tag-container');
      let tags = JSON.parse(localStorage.getItem(`tags_${noteId}`)) || [];

      const saveTags = () => localStorage.setItem(`tags_${noteId}`, JSON.stringify(tags));

      const renderChips = () => {
        container.innerHTML = '';
        tags.forEach(tag => {
          const chip = document.createElement('span');
          chip.className = 'badge';
          chip.innerHTML = `${tag} <i class="bi bi-x-circle ms-1"></i>`;
          chip.onclick = () => {
            tags = tags.filter(t => t !== tag);
            saveTags();
            renderChips();
          };
          container.appendChild(chip);
        });
      };

      button.onclick = () => {
        input.style.display = input.style.display === 'none' ? 'inline-block' : 'none';
        input.focus();
      };

      input.onkeydown = e => {
        if (e.key === 'Enter' && input.value.trim()) {
          tags.push(input.value.trim());
          saveTags();
          input.value = '';
          renderChips();
        }
      };

      renderChips();
    }

    function deleteNote(index, btn) {
      btn.closest('.note-card').style.transition = 'opacity 0.3s ease';
      btn.closest('.note-card').style.opacity = 0;
      setTimeout(() => {
        notes.splice(index, 1);
        localStorage.setItem('fakeNotes', JSON.stringify(notes));
        fetchNotes();
      }, 300);
    }

    function fetchNotes() {
      notesList.innerHTML = '';
      notes.forEach((n, i) => renderNote(n, i));
    }

    fileInput.addEventListener('change', () => {
      const file = fileInput.files[0];
      if (!file) return;
      const note = {
        id: Date.now(),
        name: file.name,
        tag: '',
        date: new Date().toLocaleDateString()
      };
      notes.push(note);
      localStorage.setItem('fakeNotes', JSON.stringify(notes));
      showToast('Note added successfully!');
      fetchNotes();
    });

    dropZone.addEventListener('dragover', e => {
      e.preventDefault();
      dropZone.classList.add('border-warning');
    });
    dropZone.addEventListener('dragleave', () => dropZone.classList.remove('border-warning'));
    dropZone.addEventListener('drop', e => {
      e.preventDefault();
      dropZone.classList.remove('border-warning');
      fileInput.files = e.dataTransfer.files;
      fileInput.dispatchEvent(new Event('change'));
    });

    searchInput.addEventListener('input', () => {
      const val = searchInput.value.toLowerCase();
      document.querySelectorAll('.note-card').forEach(card => {
        card.style.display = card.textContent.toLowerCase().includes(val) ? 'block' : 'none';
      });
    });

    tagFilter.addEventListener('change', () => {
      const val = tagFilter.value;
      document.querySelectorAll('.note-card').forEach(card => {
        card.style.display = val === '' || card.getAttribute('data-tag') === val ? 'block' : 'none';
      });
    });

    window.onload = fetchNotes;
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
            <li><a href="index.html">Home</a></li>
            <li><a href="notes.html">Notes</a></li>
            <li><a href="planner.html">Planner</a></li>
            <li><a href="pomodoro.html">Pomodoro</a></li>
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
  <script>
    window.addEventListener('scroll', () => {
      const navbar = document.querySelector('nav.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
    </script>
    
  
</body>
</html>
