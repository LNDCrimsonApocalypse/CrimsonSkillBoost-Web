<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Reset</title>
  <!-- Add Firebase SDKs -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }
    body {
      margin: 0;
      padding: 0;
     
background: var(--New-Color, linear-gradient(0deg, #F8FEFF 0%, #F2F8FF 38%, #FFF4F9 85%));;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
   .logo-fixed {
      position: absolute;
      top: 20px;
      left: 40px;
    width: 50px;
      height: 40px;
    }
    .container {
      border-radius: 20px;

background: rgba(234, 130, 240, 0.37);
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      width: 400px;
      text-align: center;
    }
    h2 {
      margin-bottom: 10px;
    }
    p {
      font-size: 0.9rem;
      color: #666;
    }
    input[type="email"],
    input[type="password"],
    .code-input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
    }
    .code-group {
      display: flex;
      justify-content: space-between;
    }
    .code-input {
      width: 40px;
      text-align: center;
      font-size: 1.2rem;
    }
    button {
      background-color:  #D877DD;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      margin-top: 10px;
    }
    .modal {
      background: rgba(0, 0, 0, 0.6);
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .modal-content {
      background: white;
      padding: 20px;
      border-radius: 12px;
      text-align: center;
    }
  </style>
</head>
<body>
    
   <img src="imgs/Logo.png" alt="Logo" class="logo-fixed">
  <!-- Forgot Password -->
  <div class="container" id="step1">
    
    <h2>Forgot Password?</h2>
    <p>Enter your email address and we'll send you a link to reset your password.</p>
    <input type="email" id="email" placeholder="Email Address" required pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
    <button onclick="sendResetEmail()">Send Reset Link</button>
  </div>

  <!-- Success Modal -->
  <div class="modal" id="step2" style="display:none;">
    <div class="modal-content">
      <h2>Reset Link Sent!</h2>
      <p>Please check your email for a link to reset your password.</p>
      <button onclick="closeModal()">OK</button>
    </div>
  </div>

  <script>
    function sendResetEmail() {
      const emailInput = document.getElementById('email');
      const email = emailInput.value.trim();
      const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      if (!emailPattern.test(email)) {
        alert('Please enter a valid email address.');
        return;
      }
      firebase.auth().sendPasswordResetEmail(email)
        .then(() => {
          // Show modal
          document.getElementById('step1').style.display = 'none';
          document.getElementById('step2').style.display = 'flex';
        })
        .catch((error) => {
          let msg = "Error: ";
          if (error.code === "auth/user-not-found") {
            msg = "No account found with this email.";
          } else if (error.code === "auth/invalid-email") {
            msg = "Invalid email address.";
          } else {
            msg += error.message;
          }
          alert(msg);
        });
    }

    function closeModal() {
      document.getElementById('step2').style.display = 'none';
      document.getElementById('step1').style.display = 'block';
      document.getElementById('email').value = '';
    }
  </script>
</body>
</html>