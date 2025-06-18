<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Set Up Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
    }

    body {
      min-height: 100vh;
      background: linear-gradient(to bottom right, #fce8fc, #e5f0ff);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .profile-container {
      max-width: 900px;
      width: 100%;
      display: flex;
      gap: 2rem;
      padding: 2rem;
      background: white;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);

    }

    .left-section {
      text-align: center;
      flex: 1;
    }

    .left-section img {
      width: 160px;
      height: 160px;
      border-radius: 50%;
      object-fit: cover;
      background-color: #ccc;
    }

    .camera-icon {
      margin-top: -20px;
      margin-bottom: 15px;
      font-size: 20px;
      color: gray;
    }

    .left-section h2 {
      font-size: 20px;
      margin-top: 10px;
    }

    .left-section p {
      font-size: 14px;
      color: #888;
    }

    .right-section {
      flex: 2;
    }

    .right-section h1 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .right-section span {
      color: #666;
      font-size: 14px;
      display: block;
      margin-bottom: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .form-row {
      display: flex;
      gap: 1rem;
    }

    input, select, textarea {
      padding: 0.75rem;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 14px;
      width: 100%;
    }

    textarea {
      resize: none;
      height: 120px;
    }

    .save-btn {
      background-color: #da6de9;
      border: none;
      color: white;
      padding: 0.75rem;
      border-radius: 999px;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      width: 150px;
      align-self: center;
      transition: background-color 0.3s ease;
    }

    .save-btn:hover {
      background-color: #c75cd5;
    }
  </style>
</head>
<body>

  <div class="profile-container">
  <div class="left-section">
    <form id="profile-pic-form" enctype="multipart/form-data">
      <label for="profile-pic-input" style="cursor:pointer; display:inline-block; margin-top: 50px;">
        <img id="profile-pic" src="https://ui-avatars.com/api/?name=User&background=cccccc&color=fff&size=160" alt="Profile Picture">
        <div class="camera-icon">📷</div>
      </label>
      <input type="file" id="profile-pic-input" accept="image/*" style="display:none;">
    </form>
    <h2>Your name</h2>
    <p>@username</p>
  </div>


    <div class="right-section">
      <h1>Set up your profile</h1>
      <span>Upload a clear image to help your student recognize you.</span>

      <form>
        <input type="email" placeholder="Email" required>
        <div class="form-row">
          <input type="date" placeholder="Birthday" required>
          <select required>
            <option value="">Gender</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
        </div>
        <textarea placeholder="Your bio"></textarea>
        <button type="submit" class="save-btn">Save</button>
      </form>
    </div>
  </div>
<script>
  // Preview uploaded profile picture
  const input = document.getElementById('profile-pic-input');
  const img = document.getElementById('profile-pic');
  input.addEventListener('change', function(e) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(ev) {
        img.src = ev.target.result;
      }
      reader.readAsDataURL(input.files[0]);
    }
  });
</script>
</body>
</html>
