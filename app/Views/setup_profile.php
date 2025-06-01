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
  background: linear-gradient(to bottom right, #fbeaff, #eaf4ff);
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
 font-family: 'Segoe UI', sans-serif;
}

.profile-setup .container {
  max-width: 800px;
  width: 100%;
  padding: 40px;
}

.header {
  text-align: center;
  margin-bottom: 30px;
}

.logo-top-left {
  position: absolute;
  top: 20px;
  left: 20px;
  height: 40px;
  z-index: 10;
}

.header h2 {
  font-size: 1.5rem;
  margin-bottom: 10px;
  color: #333;
}

.header p {
  font-size: 0.95rem;
  color: #777;
}

.profile-content {
  display: flex;
  gap: 30px;
  flex-wrap: wrap;
  align-items: flex-start;
  justify-content: center;
}

.profile-image {
  text-align: center;
  flex: 1;
  min-width: 200px;
}

.profile-image img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 10px;
  border: 3px solid #ccc;
}

.profile-image h3 {
  font-size: 1.1rem;
  color: #222;
}

.profile-image p {
  font-size: 0.9rem;
  color: #666;
}

.profile-form {
  flex: 2;
  min-width: 300px;
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.profile-form input,
.profile-form select,
.profile-form textarea {
  width: 100%;
  padding: 10px;
  font-size: 0.95rem;
  border-radius: 6px;
  border: 1px solid #ccc;
}

.profile-form .row {
  display: flex;
  gap: 10px;
}

.profile-form button {
  padding: 10px;
  font-size: 1rem;
  background: linear-gradient(to right, #d977f7, #c084fc);
  color: white;
  border: none;
  border-radius: 20px;
  cursor: pointer;
  transition: 0.3s ease;
}

.profile-form button:hover {
  opacity: 0.9;
}


  </style>
</head>
<body>
   <section class="profile-setup">
    <div class="container">
      <div class="header">
        <img src="public/img/Logo.png" alt="Logo" class="logo-top-left" />
        <h2>Set up your profile</h2>
        <p>Upload a clear and professional image to help your professor recognize you.</p>
      </div>

      <div class="profile-content">
        <div class="profile-image">
          <img src="public/img/profile.png" alt="Profile Picture" />
          <h3>Jao Nicholas Benedicto</h3>
          <p>@JaoJoaBen10983</p>
        </div>

        <div class="profile-form">
          <input type="email" placeholder="JaoNicholasBenedicto@gmail.com" />
          <div class="row">
            <input type="date" />
            <select>
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
          </div>
          <textarea rows="4" placeholder="Education&#10;Bachelor of Science in Computer Science&#10;Doctorate in Science Engineering"></textarea>
          <button type="submit">Save</button>
        </div>
      </div>
    </div>
  </section>

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
