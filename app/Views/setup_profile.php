<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CrimsonSkillBoost: The Computer Science Learning Hub - Set Up Profile</title>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-storage.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(90deg, #e88ad6 0%, #d1a4e6 100%);
      font-family: 'Montserrat', Arial, sans-serif;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }

    .profile-container {
      max-width: 800px;
      width: 50%;
      margin: 60px auto 0 auto;
      background: linear-gradient(to bottom, #fae6f7 0%, #eaf1fb 100%);
      border-radius: 14px;
      box-shadow: 0 4px 24px rgba(0,0,0,0.10);
      padding: 48px 40px 40px 40px;
      display: flex;
      flex-direction: column;
      position: relative;
    }

    .logo {
      position: absolute;
      top: -30px;
      left: -400px;
    }

    .profile-title {
      font-size: 1.6rem;
      font-weight: 700;
      color: #222;
      margin-bottom: 6px;
    }

    .profile-subtitle {
      color: #8e8e8e;
      font-size: 1.02rem;
      margin-bottom: 30px;
    }

    .profile-content {
      display: flex;
      width: 100%;
      align-items: flex-start;
      justify-content: center;
    }

    .profile-avatar-section {
      flex: 0 0 220px;
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-right: 34px;
    }

    .profile-avatar {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      background: #e0e0e0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 60px;
      color: #bdbdbd;
      margin-bottom: 12px;
    }

    .profile-name {
      font-size: 1.13rem;
      font-weight: 700;
      color: #222;
      margin-bottom: 2px;
      text-align: center;
    }

    .profile-username {
      font-size: 0.98rem;
      color: #8e8e8e;
      text-align: center;
      margin-bottom: 10px;
    }

    .profile-form {
      flex: 1;
      display: flex;
      flex-direction: column;
      gap: 12px;
      min-width: 270px;
    }

    .profile-form input,
    .profile-form select,
    .profile-form textarea {
      width: 100%;
      padding: 10px 12px;
      border: 1.5px solid #e0e0e0;
      border-radius: 7px;
      font-size: 1rem;
      font-family: inherit;
      background: #fff;
      resize: none;
      margin-bottom: 0;
      box-sizing: border-box;
      transition: border 0.2s;
    }

    .profile-form input:focus,
    .profile-form select:focus,
    .profile-form textarea:focus {
      border: 1.5px solid #d1a4e6;
      outline: none;
    }

    .profile-form-row {
      display: flex;
      gap: 10px;
    }

    .profile-save-btn {
      margin: 22px auto 0 auto;
      padding: 12px 0;
      width: 180px;
      background: linear-gradient(90deg, #d1a4e6 0%, #e88ad6 100%);
      color: #fff;
      font-size: 1.09rem;
      font-weight: 700;
      border: none;
      border-radius: 22px;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(209,164,230,0.13);
      transition: background 0.2s;
    }

    .profile-save-btn:hover {
      background: linear-gradient(90deg, #e88ad6 0%, #d1a4e6 100%);
    }

    @media (max-width: 900px) {
      .profile-container {
        padding: 32px 10vw 24px 10vw;
      }
      .profile-content {
        flex-direction: column;
        align-items: center;
      }
      .profile-avatar-section {
        margin-right: 0;
        margin-bottom: 18px;
      }
    }

    @media (max-width: 600px) {
      .profile-container {
        padding: 18px 2vw 16px 2vw;
      }
    }
  </style>
</head>
<body>
  <div class="profile-container">
    <div class="logo">
      <img src="<?= base_url('/img/logo.jpg') ?>" alt="Logo" height="40">
    </div>

    <div class="profile-title">Set up your profile</div>
    <div class="profile-subtitle">Upload a clear image to help your student recognize you.</div>

    <div class="profile-content">
      <div class="profile-avatar-section">
        <label for="avatarUpload" style="cursor: pointer;">
          <div id="avatarPreview" class="profile-avatar">
            <svg width="64" height="64" fill="#bdbdbd" viewBox="0 0 24 24">
              <circle cx="12" cy="8" r="5"/>
              <ellipse cx="12" cy="17" rx="7" ry="5"/>
            </svg>
          </div>
        </label>
        <input type="file" id="avatarUpload" accept="image/*" style="display: none;">
        <div class="profile-name">Jao Nicholas Benedicto</div>
        <div class="profile-username">@JaoJaoBen110983</div>
      </div>


      <form id="profileForm" class="profile-form">
        <input type="text" id="username" placeholder="Username" required>
        <div class="profile-form-row">
          <input type="date" id="birthday" required>
          <select id="gender" required>
            <option value="">Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <textarea id="bio" rows="5" placeholder="Your bio" required></textarea>
        <button type="submit" class="profile-save-btn">Save</button>
      </form>
    </div>
  </div>

  <script>
    const db = firebase.firestore();
    const storage = firebase.storage();
    let selectedAvatarFile = null;
    let avatarURL = "";

    firebase.auth().onAuthStateChanged(function(user) {
      if (!user) {
        alert("You must be logged in to set up your profile.");
        return;
      }

      // Fetch user data from Firestore
      firebase.firestore().collection("users").doc(user.uid).get()
        .then(doc => {
          if (doc.exists) {
            const data = doc.data();
            
            // Set Full Name
            document.querySelector(".profile-name").textContent = data.fullName || "Your Name";

            // Set Username
            document.querySelector(".profile-username").textContent = "@" + (data.username || "yourusername");

            // Pre-fill form fields (optional)
            if (data.username) document.getElementById("username").value = data.username;
            if (data.birthday) document.getElementById("birthday").value = data.birthday;
            if (data.gender) document.getElementById("gender").value = data.gender;
            if (data.bio) document.getElementById("bio").value = data.bio;

            // Set avatar preview if avatar URL exists
            if (data.avatar) {
              document.getElementById("avatarPreview").style.backgroundImage = `url(${data.avatar})`;
              document.getElementById("avatarPreview").style.backgroundSize = "cover";
              document.getElementById("avatarPreview").innerHTML = "";
            }
          } else {
            console.warn("No user document found.");
          }
        })
        .catch(error => {
          console.error("Error fetching user data:", error);
        });
    });


    // Avatar file input change
    document.getElementById("avatarUpload").addEventListener("change", function(e) {
      selectedAvatarFile = e.target.files[0];
      if (selectedAvatarFile) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById("avatarPreview").style.backgroundImage = `url(${e.target.result})`;
          document.getElementById("avatarPreview").style.backgroundSize = "cover";
          document.getElementById("avatarPreview").innerHTML = "";
        };
        reader.readAsDataURL(selectedAvatarFile);
      }
    });

    // Save form
    document.getElementById("profileForm").addEventListener("submit", function(e) {
      e.preventDefault();

      const user = firebase.auth().currentUser;
      if (!user) {
        alert("User not logged in.");
        return;
      }

      const saveProfile = (photoURL = "") => {
        const profileData = {
          username: document.getElementById("username").value.trim(),
          birthday: document.getElementById("birthday").value,
          gender: document.getElementById("gender").value,
          bio: document.getElementById("bio").value.trim(),
          avatar: photoURL,
          updatedAt: firebase.firestore.FieldValue.serverTimestamp()
        };

        db.collection("users").doc(user.uid).set(profileData, { merge: true })
          .then(() => {
            alert("Profile saved to Firestore!");
            window.location.href = "<?= base_url('loggedin') ?>";
          })
          .catch((error) => {
            console.error("Error saving profile to Firestore: ", error);
            alert("Failed to save profile.");
          });
      };

      if (selectedAvatarFile) {
        const storageRef = storage.ref(`avatars/${user.uid}`);
        storageRef.put(selectedAvatarFile)
          .then(snapshot => snapshot.ref.getDownloadURL())
          .then(downloadURL => {
            avatarURL = downloadURL;
            saveProfile(avatarURL);
          })
          .catch(error => {
            console.error("Error uploading avatar:", error);
            alert("Avatar upload failed.");
          });
      } else {
        saveProfile();
      }
    });

    document.getElementById("username").addEventListener("input", function() {
      const liveUsername = this.value.trim();
      document.querySelector(".profile-username").textContent = liveUsername ? `@${liveUsername}` : "";
    });
    
  </script>

</body>
</html>
