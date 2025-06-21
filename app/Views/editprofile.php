<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Firebase SDKs -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
</head>
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Inter', sans-serif;
  background: linear-gradient(to right, #fce4ec, #e1f5fe);
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.profile-container {
  width: 100%;
  max-width: 1000px;
  background: white;
  border-radius: 16px;
  padding: 30px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.profile-card {
  display: flex;
  flex-wrap: wrap;
  gap: 40px;
  align-items: flex-start;
}

.profile-left {
  text-align: center;
  flex: 1;
}

.profile-img {
  width: 160px;
  height: 160px;
  object-fit: cover;
  border-radius: 50%;
  border: 4px solid #eee;
}

.profile-name {
  font-size: 20px;
  font-weight: 600;
  margin-top: 10px;
}

.profile-username {
  font-size: 14px;
  color: #777;
}

.profile-right {
  flex: 2;
}

.profile-right h2 {
  font-size: 24px;
  font-weight: 600;
  margin-bottom: 5px;
}

.subtext {
  color: #555;
  margin-bottom: 20px;
}

.form-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 12px 16px;
}

.form-grid input,
.form-grid select,
.form-grid textarea {
  padding: 10px;
  border-radius: 8px;
  border: 1px solid #ccc;
  font-size: 14px;
  width: 100%;
}

.form-grid textarea {
  grid-column: span 2;
  resize: none;
  height: 100px;
}

.save-btn {
  margin-top: 20px;
  padding: 12px 24px;
  border: none;
  background-color: #e88ae9;
  color: white;
  font-weight: 600;
  border-radius: 24px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.save-btn:hover {
  background-color: #d56ed8;
}

.cancel-btn {
  margin-top: 20px;
  padding: 12px 24px;
  border: none;
  background-color: #e88ae9;
  color: white;
  font-weight: 600;
  border-radius: 24px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.cancel-btn:hover {
  background-color: #d56ed8;
}
.camera-icon {
      margin-top: -20px;
      margin-bottom: 15px;
      font-size: 20px;
      color: gray;
    }
</style>
<body>
  <div id="loading" style="position:fixed;top:0;left:0;width:100vw;height:100vh;display:flex;align-items:center;justify-content:center;background:rgba(255,255,255,0.7);z-index:9999;font-size:2rem;display:none;">
    Loading...
  </div>
  <div class="profile-container">
    <div class="profile-card">
      <div class="profile-left">
        <label for="profile-pic-input" style="cursor:pointer; display:inline-block; margin-top: 50px;">
          <img id="profile-pic" src="https://ui-avatars.com/api/?name=User&background=cccccc&color=fff&size=160" alt="Profile Picture">
          <div class="camera-icon">📷</div>
        </label>
        <input type="file" id="profile-pic-input" accept="image/*" style="display:none;">
        <div class="profile-name" id="profileName"></div>
        <div class="profile-username" id="profileUsername"></div>
      </div>
      <div class="profile-right">
        <h2>Edit your profile</h2>
        <p class="subtext">Upload a clear and professional image to help your professor recognize you.</p>
        <form id="editProfileForm">
          <div class="form-grid">
            <input type="text" id="fname" placeholder="First Name" required/>
            <input type="text" id="mname" placeholder="Middle Name" required/>
            <input type="text" id="lname" placeholder="Last Name" required/>
            <input type="text" id="extname" placeholder="Extension Name" />
            <input type="text" id="username" placeholder="Username" required />
            <input type="email" id="email" placeholder="Email Address" required disabled/>
            <input type="date" id="birthday" placeholder="Birthday" required />
            <select id="gender" required>
              <option value="" disabled selected>Gender</option>
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
            <textarea id="bio" placeholder="Education&#10;Bachelor of Science in Computer Science&#10;Doctorate in Science Engineering"></textarea>
          </div>
          <button type="submit" class="save-btn">Save</button>
          <button type="button" class="cancel-btn" onclick="window.location.href='<?= base_url('dashboard') ?>'">Cancel</button>
        </form>
      </div>
    </div>
  </div>
<script>
function showLoading(show) {
  document.getElementById('loading').style.display = show ? 'flex' : 'none';
}

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
  showLoading(true);
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
          alert("User data not found. Please register again.");
          window.location.href = "<?= base_url('register') ?>";
          showLoading(false);
          return;
        }
      } catch (e) {
        alert("Error fetching user data: " + e.message);
        showLoading(false);
        return;
      }

      // Prefill form fields
      document.getElementById("fname").value = data.fname || "";
      document.getElementById("mname").value = data.mname || "";
      document.getElementById("lname").value = data.lname || "";
      document.getElementById("extname").value = data.extname || "";
      document.getElementById("username").value = data.username || "";
      document.getElementById("email").value = data.email || "";
      document.getElementById("birthday").value = data.birthday || "";
      document.getElementById("gender").value = data.gender || "";
      document.getElementById("bio").value = data.bio || "";

      // Profile display
      const fullName = [data.fname, data.mname, data.lname, data.extname].filter(Boolean).join(" ");
      document.getElementById("profileName").textContent = fullName || "Your name";
      document.getElementById("profileUsername").textContent = data.username ? `@${data.username}` : "";
      if (data.photoURL) {
        document.getElementById("profile-pic").src = data.photoURL;
      }

      window.profileUID = uid;
      showLoading(false);
    } else {
      alert("You are not logged in. Please sign in again.");
      window.location.href = "<?= base_url('login') ?>";
      showLoading(false);
    }
  });

  // Profile picture preview
  document.getElementById("profile-pic-input").addEventListener("change", function(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(evt) {
        document.getElementById("profile-pic").src = evt.target.result;
      };
      reader.readAsDataURL(file);
    }
  });

  document.getElementById("editProfileForm").addEventListener("submit", async function(e) {
    e.preventDefault();
    showLoading(true);

    const uid = window.profileUID;
    if (!uid) {
      alert("User not found. Please log in again.");
      showLoading(false);
      return;
    }

    const fname = document.getElementById("fname").value.trim();
    const mname = document.getElementById("mname").value.trim();
    const lname = document.getElementById("lname").value.trim();
    const extname = document.getElementById("extname").value.trim();
    const username = document.getElementById("username").value.trim();
    const birthday = document.getElementById("birthday").value;
    const gender = document.getElementById("gender").value;
    const bio = document.getElementById("bio").value;
    const file = document.getElementById("profile-pic-input").files[0];
    let photoURL = null;

    if (file) {
      // Use FormData to send the file to your PHP endpoint
      const formData = new FormData();
      formData.append('profile_pic', file);
      formData.append('uid', uid);

      // Adjust the URL to your upload endpoint
      const response = await fetch('<?= base_url('upload_profile_pic') ?>', {
        method: 'POST',
        body: formData
      });
      const result = await response.json();
      if (result.success && result.url) {
        photoURL = result.url;
      } else {
        alert("Failed to upload profile picture.");
        showLoading(false);
        return;
      }
    }

    const updateData = {
      fname: fname,
      mname: mname,
      lname: lname,
      extname: extname,
      username: username,
      birthday: birthday,
      gender: gender,
      bio: bio
    };
    if (photoURL) {
      updateData.photoURL = photoURL;
    }

    await firebase.firestore().collection("users").doc(uid).update(updateData);

    alert("Profile updated!");
    window.location.href = "<?= base_url('homepage') ?>";
    showLoading(false);
  });
});
</script>
</body>
</html>
