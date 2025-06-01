<!DOCTYPE html>
<html>
<head>
    <title>Quiz Settings</title>
    <style>
        .settings-container { max-width: 600px; margin: 40px auto; padding: 20px; }
        .form-group { margin-bottom: 20px; }
        .submit-btn {
            background: #e636a4;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        /* Navbar styles */
        .navbar {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 15px 30px;
          background-color: white;
          box-shadow: 0 2px 4px rgba(0,0,0,0.1);
          position: sticky;
          top: 0;
          z-index: 10;
        }
        .navbar-logo {
          flex: 1;
          display: flex;
          align-items: center;
        }
        .navbar-logo .logo {
          width: 40px;
        }
        .navbar-center {
          flex: 2;
          display: flex;
          justify-content: center;
          align-items: center;
          gap: 30px;
        }
        .navbar-center a {
          text-decoration: none;
          color: black;
          font-weight: bold;
          margin: 0 10px;
        }
        .navbar-center .dropdown {
          position: relative;
        }
        .dropdown-content {
          display: none;
          position: absolute;
          background-color: white;
          min-width: 160px;
          box-shadow: 0 8px 16px rgba(0,0,0,0.1);
          z-index: 1;
        }
        .dropdown-content select {
          width: 100%;
          padding: 10px;
          border: none;
          background: transparent;
          font-size: 1rem;
          font-family: 'Inter', sans-serif;
        }
        .dropdown:hover .dropdown-content {
          display: block;
        }
        .arrow {
          font-size: 1.2rem;
          margin-left: 4px;
          vertical-align: middle;
        }
        .navbar-right {
          flex: 1;
          display: flex;
          align-items: center;
          justify-content: flex-end;
          gap: 15px;
        }
        .navbar-right input[type="text"] {
          padding: 6px 12px;
          border: 1px solid #ccc;
          border-radius: 6px;
          margin: 0;
          width: 140px;
        }
        .navbar-right img.profile {
          width: 35px;
          height: 35px;
          border-radius: 50%;
          object-fit: cover;
          cursor: pointer;
        }
        .navbar-right img.icon {
          width: 25px;
          height: 25px;
          cursor: pointer;
          vertical-align: middle;
        }
        .logout-btn {
          background: #e636a4;
          color: white;
          border: none;
          border-radius: 6px;
          padding: 8px 16px;
          font-size: 1rem;
          cursor: pointer;
        }
        .logout-btn:hover {
          background: #d62894;
        }
        li {
          font-weight: bold;
          list-style-type: none;
          padding: 0;
          margin: 0;
        }
    </style>
</head>
<body>
  <!-- Navbar -->
      <div class="navbar">
        <div class="navbar-logo">
        <img src="imgs/Logo.png" alt="logo" class="logo"/>
        </div>
        <div class="navbar-center">
        <a href="<?= base_url('homepage') ?>">HOME</a>
        <a href="<?= base_url('dashboard') ?>">DASHBOARD</a>
        <a href="<?= base_url('aboutus') ?>">ABOUT</a>
        <li class="dropdown">
        <span>COURSES <span class="arrow">&#9660;</span></span>
        <div class="dropdown-content">
            <select id="course-select">
            <option value="web">ALL COURSES </option>
            <option value="data">MY COURSES </option>
            
            </select>
        </div>
        </li>
        </div>

        <div class="navbar-right">
        <input type="text" placeholder="Search.." />
        <img src="imgs/notifications.png" alt="Notifications" class="icon" />
        <img src="imgs/profile.png" alt="profile" class="profile" />
        <button id="signOutButton" class="logout-btn">Sign Out</button>
        </div>
    </div>
    <div class="navbar-right">
      <input type="text" placeholder="Search.." />
      <img src="<?= base_url('imgs/notifications.png') ?>" alt="Notifications" class="icon" />
      <img src="<?= base_url('imgs/profile.png') ?>" alt="profile" class="profile" />
      <button id="signOutButton" class="logout-btn">Sign Out</button>
    </div>
  </div>
    <div class="settings-container">
        <h2>Quiz Settings</h2>
        
        <form action="<?= base_url('quiz/save_settings/' . $quiz['id']) ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label>Start Date and Time:</label>
                <input type="datetime-local" name="start_date" 
                       value="<?= old('start_date', isset($quiz['start_date']) ? date('Y-m-d\TH:i', strtotime($quiz['start_date'])) : '') ?>" 
                       required>
            </div>

            <div class="form-group">
                <label>End Date and Time:</label>
                <input type="datetime-local" name="end_date" 
                       value="<?= old('end_date', isset($quiz['end_date']) ? date('Y-m-d\TH:i', strtotime($quiz['end_date'])) : '') ?>" 
                       required>
            </div>

            <div class="form-group">
                <label>Time Limit (minutes):</label>
                <input type="number" name="time_limit" min="1" value="30">
            </div>

            <div class="form-group">
                <label>Passing Score (%):</label>
                <input type="number" name="passing_score" min="1" max="100" value="60">
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="show_answers">
                    Show Correct Answers After Submission
                </label>
            </div>

            <button type="submit" class="submit-btn">Save & Finish</button>
        </form>
    </div>
</body>
</html>
