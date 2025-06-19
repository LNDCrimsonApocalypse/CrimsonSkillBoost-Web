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
    <h2 id="displayFullName"></h2>
    <p>@<span id="displayUsername"></span></p>
  </div>
<div id="profile" style="margin-top: 1rem; font-size: 14px; color: #555;"></div>
<div id="status" style="margin-top: 0.5rem; font-weight: bold;"></div>
    <div class="right-section">
      <h1>Set up your profile</h1>
      <span>Upload a clear image to help your student recognize you.</span>

      <form id="profileForm">
       
        <textarea id="bio" placeholder="Your bio"></textarea>
        <button type="submit" class="save-btn">Save</button>
      </form>
    </div>
  </div>
<!-- Add Firebase SDKs before your script -->
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
<script src="<?= base_url('public/js/firebase-config.js') ?>"></script>

<script>
  // Preview uploaded profile picture
  // Wait for Firebase to initialize
 async function waitForFirebaseAuthInit() {
  return new Promise(resolve => {
    if (firebase?.apps?.length) {
      resolve();
    } else {
      const interval = setInterval(() => {
        if (firebase?.apps?.length) {
          clearInterval(interval);
          resolve();
        }
      }, 50);
    }
  });
}

document.addEventListener("DOMContentLoaded", async function () {
  await waitForFirebaseAuthInit();

 firebase.auth().onAuthStateChanged(async function(user) {
  if (user) {
    const uid = user.uid;

    let data;

    try {
      const doc = await firebase.firestore().collection("users").doc(uid).get();
      if (doc.exists) {
        data = doc.data();
      } else {
        alert("User data not found in Firestore.");
        return;
      }
    } catch (e) {
      alert("Error fetching user data: " + e.message);
      return;
    }

    // ✅ Update UI
    const fullName = [data.fname, data.mname, data.lname, data.extname].filter(Boolean).join(" ");
    document.getElementById("displayFullName").textContent = fullName || "Your name";
    document.getElementById("displayUsername").textContent = data.username || "username";
    document.getElementById("bio").value = data.bio || "";
    if (data.photoURL) {
      document.getElementById("profile-pic").src = data.photoURL;
    }

    // ✅ Save UID for later use
    window.profileUID = uid;

  } else {
    alert("You are not logged in. Please sign in again.");
    window.location.href = "<?= base_url('login') ?>";
  }
});
document.getElementById("profileForm").addEventListener("submit", async function(e) {
  e.preventDefault();

  const uid = window.profileUID;
if (!uid) {
  alert("User not found. Please log in again.");
  return;
}

  const bio = document.getElementById("bio").value;
  const username = document.getElementById("displayUsername").textContent;
  const file = document.getElementById("profile-pic-input").files[0];

  try {
     let photoURL = null;

      if (file) {
        const storageRef = firebase.storage().ref();
        const profilePicRef = storageRef.child(`profile_pictures/${uid}`);
        await profilePicRef.put(file);
        photoURL = await profilePicRef.getDownloadURL();
      }

      const updateData = {
        bio: bio,
        username: username
      };

      if (photoURL) {
        updateData.photoURL = photoURL;
      }

      await firebase.firestore().collection("users").doc(uid).update(updateData);

      alert("Profile saved!");
      window.location.href = "<?= base_url('home') ?>";

    } catch (err) {
      alert("Error saving profile: " + err.message);
    }
  });
</script>
</body>
</html>