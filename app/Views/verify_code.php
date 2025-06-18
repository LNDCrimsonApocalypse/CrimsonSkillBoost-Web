<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CrimsonSkillBoost: Confirmation Code</title>

  <!-- Firebase SDK -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
  <!-- ^^^ FIXED PATH: use public/js/firebase-config.js not js/firebase-config.js -->

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
    <p id="emailPrompt">
      To confirm your account, enter the 6-digit code we sent to<br>
      <strong id="userEmail"><?= esc($email) ?></strong>
    </p>
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
      const codeInputs = document.querySelectorAll(".code-inputs input");
      const emailElem = document.getElementById("userEmail");
      let userUID = null;
      let canEnterCode = false;
      let redirectInProgress = false;
      const tempData = (() => {
        try {
          return JSON.parse(sessionStorage.getItem("tempUser") || "{}");
        } catch (e) {
          return {};
        }
      })();

      // Set email display from tempData if available
      if (tempData && tempData.email) {
        document.getElementById("userEmail").textContent = tempData.email;
      }

      // --- CONTINUOUS CODE INPUT LOGIC ---
      codeInputs.forEach((input, idx) => {
        input.addEventListener("input", function(e) {
          let value = this.value.replace(/[^0-9]/g, "");
          if (value.length === 0) {
            this.value = "";
            return;
          }
          let chars = value.split("");
          this.value = chars[0];
          let nextIdx = idx;
          for (let i = 1; i < chars.length && nextIdx < codeInputs.length - 1; i++) {
            nextIdx++;
            codeInputs[nextIdx].value = chars[i];
          }
          let focusSet = false;
          for (let i = idx + 1; i < codeInputs.length; i++) {
            if (codeInputs[i].value === "") {
              codeInputs[i].focus();
              focusSet = true;
              break;
            }
          }
          if (!focusSet && getCodeValue().length === codeInputs.length) {
            triggerAutoSubmit();
          }
        });
        input.addEventListener("keydown", function(e) {
          if (e.key === "Backspace" && this.value === "" && idx > 0) {
            codeInputs[idx - 1].focus();
          }
        });
        input.addEventListener("paste", function(e) {
          e.preventDefault();
          const paste = (e.clipboardData || window.clipboardData).getData("text").replace(/\D/g, "");
          if (paste) {
            for (let i = 0; i < codeInputs.length; i++) {
              codeInputs[i].value = paste[i] || "";
            }
            if (paste.length >= codeInputs.length) {
              codeInputs[codeInputs.length - 1].focus();
              triggerAutoSubmit();
            } else {
              codeInputs[paste.length].focus();
            }
          }
        });
      });

      function getCodeValue() {
        return Array.from(codeInputs).map(i => i.value.trim()).join("");
      }

      function triggerAutoSubmit() {
        if (getCodeValue().length === codeInputs.length) {
          form.dispatchEvent(new Event("submit", { cancelable: true, bubbles: true }));
        }
      }

      firebase.auth().onAuthStateChanged((user) => {
        if (!user) {
          message.textContent = "❌ User not authenticated. Please login again.";
          message.style.color = "red";
          form.querySelector("button").disabled = true;
          codeInputs.forEach(i => i.disabled = true);
          return;
        }

        // Set email and UID from Firebase user
        emailElem.textContent = user.email;
        userUID = user.uid;

        // Only allow code entry after email is verified
        function enableCodeEntry() {
          canEnterCode = true;
          message.textContent = "✅ Email verified! Now enter the 6-digit code sent to your email.";
          message.style.color = "green";
          form.querySelector("button").disabled = false;
          codeInputs.forEach(i => i.disabled = false);
          codeInputs[0].focus();
        }

        function disableCodeEntry(msgText, color = "orange") {
          canEnterCode = false;
          message.textContent = msgText;
          message.style.color = color;
          form.querySelector("button").disabled = true;
          codeInputs.forEach(i => i.disabled = true);
        }

        // Initial check
        if (user.emailVerified) {
          enableCodeEntry();
        } else {
          disableCodeEntry("📩 Waiting for email verification... Please click the link in your email.");
        }

        // Poll for email verification
        const intervalId = setInterval(() => {
          user.reload().then(() => {
            if (user.emailVerified) {
              clearInterval(intervalId);
              enableCodeEntry();
            }
          });
        }, 3000);

        // Form submit handler
        form.addEventListener("submit", (e) => {
          e.preventDefault();
          if (!canEnterCode) {
            message.textContent = "Please verify your email first by clicking the link sent to your email.";
            message.style.color = "red";
            return;
          }
          let code = getCodeValue();
          if (code.length !== 6) {
            message.textContent = "Please enter the 6-digit code.";
            message.style.color = "red";
            return;
          }
          if (code !== "123456") {
            message.textContent = "❌ Invalid confirmation code.";
            message.style.color = "red";
            return;
          }
          // All checks passed, proceed
          redirectToSetupProfile();
        });

        function redirectToSetupProfile() {
          if (redirectInProgress) return;
          redirectInProgress = true;
          sessionStorage.removeItem("tempUser");
          window.location.href = "<?= base_url('setup_profile') ?>";
        }

        // Resend link handler
        document.getElementById("resendLink").addEventListener("click", async () => {
          if (!user) {
            message.textContent = "❌ User not logged in.";
            message.style.color = "red";
            return;
          }
          try {
            await user.sendEmailVerification();
            message.textContent = "📧 Verification email resent.";
            message.style.color = "blue";
          } catch (error) {
            message.textContent = "❌ " + error.message;
            message.style.color = "red";
          }
        });
      });
    });
  </script>
</body>
</html>
