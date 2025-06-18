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
    <h2 id="displayFullName">Your name</h2>
    <p>@<span id="displayUsername">username</span></p>
  </div>

    <div class="right-section">
      <h1>Set up your profile</h1>
      <span>Upload a clear image to help your student recognize you.</span>

      <form id="profileForm">
        <input type="email" id="email" placeholder="Email" required readonly>
        <input type="text" id="fullname" placeholder="Full name" required readonly>
        <input type="text" id="username" placeholder="Username" required>
        <div class="form-row">
          <input type="date" id="birthday" placeholder="Birthday" required>
          <select id="gender" required>
            <option value="">Gender</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
        </div>
        <textarea id="bio" placeholder="Your bio"></textarea>
        <button type="submit" class="save-btn">Save</button>
      </form>
    </div>
  </div>
<!-- Add Firebase SDKs before your script -->
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
<script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
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

  // Load user info from Firestore using UID from sessionStorage
  document.addEventListener("DOMContentLoaded", async function() {
    // Wait for Firebase to be initialized
    function waitForFirebaseAuthInit() {
      return new Promise(resolve => {
        if (typeof firebase !== "undefined" && firebase.apps && firebase.apps.length) {
          resolve();
        } else {
          const check = setInterval(() => {
            if (typeof firebase !== "undefined" && firebase.apps && firebase.apps.length) {
              clearInterval(check);
              resolve();
            }
          }, 50);
        }
      });
    }

    await waitForFirebaseAuthInit();

    const uid = sessionStorage.getItem("firebase_uid");
    if (!uid) return;

    try {
      if (!firebase.firestore) {
        alert("Firestore not loaded.");
        return;
      }
      const doc = await firebase.firestore().collection("users").doc(uid).get();
      if (doc.exists) {
        const data = doc.data();
        document.getElementById("email").value = data.email || "";
        document.getElementById("fullname").value = data.fullName || "";
        document.getElementById("birthday").value = data.birthday || "";
        document.getElementById("gender").value = data.gender || "";
        document.getElementById("bio").value = data.bio || "";
        document.getElementById("username").value = data.username || "";
        // Display full name and username in left section
        document.getElementById("displayFullName").textContent = data.fullName || "Your name";
        document.getElementById("displayUsername").textContent = data.username || "username";
      }
    } catch (e) {
      alert("Failed to load profile: " + e.message);
    }

    // Update @username display live as user types
    document.getElementById("username").addEventListener("input", function() {
      document.getElementById("displayUsername").textContent = this.value || "username";
    });
  });

  // Update Firestore on profile save (now includes username)
  document.getElementById("profileForm").addEventListener("submit", async function(e) {
    e.preventDefault();
    const uid = sessionStorage.getItem("firebase_uid");
    if (!uid) return;
    try {
      await firebase.firestore().collection("users").doc(uid).update({
        username: document.getElementById("username").value,
        bio: document.getElementById("bio").value,
        birthday: document.getElementById("birthday").value,
        gender: document.getElementById("gender").value
      });
      alert("Profile updated!");
      // Update left section display after save
      document.getElementById("displayUsername").textContent = document.getElementById("username").value || "username";
    } catch (e) {
      alert("Failed to update profile.");
    }
  });
</script>
</body>
</html>