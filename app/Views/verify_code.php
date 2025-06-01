<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CrimsonSkillBoost: Confirmation Code</title>

  <!-- Firebase SDK -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <script src="<?= base_url('js/firebase-config.js') ?>"></script>

  <!-- Inline CSS -->
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to bottom right, #ffeaf7, #eaf6ff);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .verify-container {
      background: #f3ccf8;
      padding: 40px;
      border-radius: 15px;
      width: 400px;
      text-align: center;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .verify-container h2 {
      font-size: 1.6rem;
      margin-bottom: 10px;
    }

    .verify-container p {
      font-size: 0.9rem;
      color: #444;
      margin-bottom: 20px;
    }

    .code-inputs {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-bottom: 15px;
    }

    .code-inputs input {
      width: 45px;
      height: 50px;
      text-align: center;
      font-size: 1.2rem;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    button {
      background-color: #d172e6;
      color: white;
      border: none;
      padding: 12px 0;
      width: 100%;
      font-size: 1rem;
      border-radius: 999px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background-color: #bb61cf;
    }

    .resend {
      margin-top: 10px;
      font-size: 0.85rem;
    }

    .resend a {
      color: #540094;
      text-decoration: underline;
      cursor: pointer;
    }

    #message {
      margin-top: 10px;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

  <div class="verify-container">
    <h2>Enter Confirmation Code</h2>
    <p>To confirm your account, enter the 6-digit code we sent to<br><strong><?= esc($email) ?></strong></p>

    <form id="verifyForm">
      <div class="code-inputs">
        <?php for ($i = 0; $i < 6; $i++): ?>
          <input type="text" maxlength="1" class="code">
        <?php endfor; ?>
      </div>
      <button type="submit">CONFIRM</button>
    </form>

    <div class="resend">
      Didn’t receive code? <a id="resendLink">Resend</a>
    </div>

    <p id="message"></p>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const message = document.getElementById("message");
      const form = document.getElementById("verifyForm");
      const tempData = JSON.parse(sessionStorage.getItem("tempUser"));

      if (!tempData) {
        message.textContent = "❌ Session expired. Please register again.";
        message.style.color = "red";
        return;
      }

      let redirectInProgress = false;

      firebase.auth().onAuthStateChanged((user) => {
        if (!user) {
          message.textContent = "❌ User not authenticated. Please login again.";
          message.style.color = "red";
          return;
        }

        // Check immediately if already verified
        if (user.emailVerified) {
          handleVerifiedUser(user);
          return;
        }

        const checkVerification = () => {
          if (redirectInProgress) return;

          user.reload().then(() => {
            if (user.emailVerified) {
              handleVerifiedUser(user);
            } else {
              message.textContent = "📩 Waiting for email verification... Please click the link in your email.";
              message.style.color = "orange";
            }
          });
        };

        function handleVerifiedUser(user) {
          if (redirectInProgress) return;
          redirectInProgress = true;

          firebase.firestore().collection("users").doc(user.uid).set({
            fullName: tempData.fullName,
            email: tempData.email,
            birthday: tempData.birthday,
            gender: tempData.gender,
            role: "educator",
            createdAt: new Date().toISOString()
          }).then(() => {
            sessionStorage.removeItem("tempUser");
            message.textContent = "✅ Email verified. Redirecting...";
            message.style.color = "green";
            window.location.href = "<?= base_url('setup_profile') ?>";
          }).catch((error) => {
            redirectInProgress = false;
            message.textContent = "❌ Failed to save data: " + error.message;
            message.style.color = "red";
          });
        }

        // Form submit handler
        form.addEventListener("submit", (e) => {
          e.preventDefault();
          checkVerification();
        });

        // Initial check
        checkVerification();

        // Check every 3 seconds
        const intervalId = setInterval(() => {
          user.reload().then(() => {
            if (user.emailVerified) {
              clearInterval(intervalId);
              checkVerification();
            }
          });
        }, 3000);
      });

      // Resend link handler
      document.getElementById("resendLink").addEventListener("click", () => {
        const user = firebase.auth().currentUser;
        if (user) {
          user.sendEmailVerification().then(() => {
            message.textContent = "📧 Verification email resent.";
            message.style.color = "blue";
          }).catch((error) => {
            message.textContent = "❌ " + error.message;
            message.style.color = "red";
          });
        } else {
          message.textContent = "❌ User not logged in.";
          message.style.color = "red";
        }
      });
    });
  </script>

</body>
</html>
