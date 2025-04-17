<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Set Up Profile</title>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="<?= base_url('js/firebase-config.js') ?>"></script>

  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
    }

    body {
      height: 100vh;
      background: linear-gradient(to bottom right, #ffeaf7, #eaf6ff);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .setup-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 90%;
      max-width: 1100px;
    }

    .left-info {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      padding: 20px;
    }

    .left-info img {
      height: 40px;
      margin-bottom: 20px;
    }

    .avatar {
      width: 180px;
      height: 180px;
      background: #ccc;
      border-radius: 50%;
      position: relative;
      margin-bottom: 20px;
    }

    .avatar::after {
      content: '';
      position: absolute;
      bottom: 10px;
      right: 10px;
      width: 28px;
      height: 28px;
      background: url('<?= base_url("images/camera-icon.png") ?>') no-repeat center;
      background-size: contain;
    }

    .display-name {
      font-weight: bold;
      font-size: 1.2rem;
    }

    .username {
      font-size: 0.9rem;
      color: #777;
    }

    .right-form {
      flex: 1;
      max-width: 500px;
      background: rgba(255,255,255,0.5);
      padding: 20px;
    }

    .right-form h2 {
      margin-bottom: 10px;
      font-size: 1.6rem;
    }

    .right-form p {
      margin-bottom: 25px;
      font-size: 0.95rem;
      color: #555;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    input, select, textarea {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
      width: 100%;
    }

    .input-row {
      display: flex;
      gap: 10px;
    }

    button {
      background: #d172e6;
      border: none;
      border-radius: 30px;
      padding: 12px;
      font-size: 1rem;
      color: white;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: #bb61cf;
    }
  </style>
</head>
<body>
  <div class="setup-container">
    <div class="left-info">
      <img src="<?= base_url('/img/logo.jpg') ?>" alt="Logo">
      <div class="avatar"></div>
      <div class="display-name">Jao Nicholas Benedicto</div>
      <div class="username">@JaoJaoBen110983</div>
    </div>
    <div class="right-form">
      <h2>Set up your profile</h2>
      <p>Upload a clear image to help your student recognize you.</p>

      <form id="profileForm">
        <input type="email" id="email" placeholder="Email">
        <div class="input-row">
          <input type="date" id="birthday" placeholder="Birthday">
          <select id="gender">
            <option value="">Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <textarea id="bio" rows="5" placeholder="Your bio"></textarea>
        <button type="submit">Save</button>
      </form>
    </div>
  </div>

  <script>
    // Example to autofill Firebase user's email
    firebase.auth().onAuthStateChanged(function(user) {
      if (user) {
        document.getElementById("email").value = user.email;
      }
    });

    // Handle form submission
    document.getElementById("profileForm").addEventListener("submit", function(e) {
      e.preventDefault();

      const data = {
        email: document.getElementById("email").value,
        birthday: document.getElementById("birthday").value,
        gender: document.getElementById("gender").value,
        bio: document.getElementById("bio").value,
      };

      // You can use Firestore or send data to CodeIgniter controller via AJAX
      console.log("User Profile Data:", data);

      // TODO: Save to database
      alert("Profile saved (in console for now)");
    });
  </script>
</body>
</html>
