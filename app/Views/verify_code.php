<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CrimsonSkillBoost: The Computer Science Learning Hub - Confirmation Code</title>

  <!-- Firebase -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
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
          <input type="text" maxlength="1" class="code" required>
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
    // Focus auto jump
    const inputs = document.querySelectorAll('.code');
    inputs.forEach((input, i) => {
      input.addEventListener('input', () => {
        if (input.value.length === 1 && i < inputs.length - 1) {
          inputs[i + 1].focus();
        }
      });
    });

    document.getElementById("verifyForm").addEventListener("submit", function(e) {
      e.preventDefault();

      const code = Array.from(inputs).map(input => input.value).join("");
      const message = document.getElementById("message");
      message.textContent = "";

      // Firebase verification logic placeholder
      if (code.length === 6) {
        // You would validate this code with your backend or Firebase here
        message.textContent = "Code verified successfully!";
        message.style.color = "green";
      } else {
        message.textContent = "Please enter a 6-digit code.";
        message.style.color = "red";
      }
    });

    // Resend link
    document.getElementById("resendLink").addEventListener("click", () => {
      const message = document.getElementById("message");
      // Firebase sendEmailVerification or your API to resend OTP
      message.textContent = "Verification code resent!";
      message.style.color = "blue";
    });
  </script>

</body>
</html>
