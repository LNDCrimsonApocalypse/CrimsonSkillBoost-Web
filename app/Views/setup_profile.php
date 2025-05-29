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
    /* ... [STYLE BLOCK REMAINS UNCHANGED] ... */
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

      firebase.firestore().collection("users").doc(user.uid).get()
        .then(doc => {
          if (doc.exists) {
            const data = doc.data();
            document.querySelector(".profile-name").textContent = data.fullName || "Your Name";
            document.querySelector(".profile-username").textContent = "@" + (data.username || "yourusername");
            if (data.username) document.getElementById("username").value = data.username;
            if (data.birthday) document.getElementById("birthday").value = data.birthday;
            if (data.gender) document.getElementById("gender").value = data.gender;
            if (data.bio) document.getElementById("bio").value = data.bio;
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
            console.log("Redirecting to /loggedin");
            window.location.href = "/loggedin"; // ✅ Change made here
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

    // Global error logging
    window.addEventListener("error", function (e) {
      console.error("Global error caught:", e.error);
    });
  </script>

</body>
</html>
