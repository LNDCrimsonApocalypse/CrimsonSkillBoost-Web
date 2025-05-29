<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Reset</title>
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
    <p>Enter your email address and we'll send you a code to reset your password.</p>
    <input type="email" id="email" placeholder="Email Address" required pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
    <button onclick="validateEmail()">Send Code</button>
  </div>

  <!-- Verification Code -->
  <div class="container" id="step2" style="display:none;">
    <h2>Enter Verification Code</h2>
    <p>We've sent a code to your email</p>
    <div class="code-group">
      <input class="code-input" maxlength="1">
      <input class="code-input" maxlength="1">
      <input class="code-input" maxlength="1">
      <input class="code-input" maxlength="1">
    </div>
    <button onclick="nextStep(3)">Verify</button>
  </div>

  <!-- Set New Password -->
  <div class="container" id="step3" style="display:none;">
    <h2>Set New Password</h2>
    <p>Create a strong password that you haven't used before.</p>
    <input type="password" id="newPassword" placeholder="New Password" required>
    <input type="password" id="confirmPassword" placeholder="Confirm Password" required>
    <button onclick="validatePassword()">Reset Password</button>
  </div>

  <!-- Success Modal -->
  <div class="modal" id="step4" style="display:none;">
    <div class="modal-content">
      <h2>Code Verified!</h2>
      <p>Password Reset Successful</p>
      <p>You can now log in with your new password.</p>
    </div>
  </div>

  <script>
    function nextStep(step) {
      for (let i = 1; i <= 4; i++) {
        document.getElementById('step' + i).style.display = 'none';
      }
      document.getElementById('step' + step).style.display = step === 4 ? 'flex' : 'block';
    }

    function validateEmail() {
      const emailInput = document.getElementById('email');
      const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      if (!emailPattern.test(emailInput.value)) {
        alert('Please enter a valid email address.');
        return;
      }
      nextStep(2);
    }

    function validatePassword() {
      const password = document.getElementById('newPassword').value;
      const confirmPassword = document.getElementById('confirmPassword').value;
      const passwordPattern = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,16}$/;

      if (!passwordPattern.test(password)) {
        alert('Password must be 8-16 characters long, contain at least one number and one uppercase letter.');
        return;
      }

      if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return;
      }

      nextStep(4);
    }
     const inputs = document.querySelectorAll('.code-group input');

  inputs.forEach((input, index) => {
    input.addEventListener('input', () => {
      const value = input.value;

      // Only allow digits
      input.value = value.replace(/[^0-9]/g, '');

      if (input.value && index < inputs.length - 1) {
        inputs[index + 1].focus();
      }
    });

    input.addEventListener('keydown', (e) => {
      if (e.key === 'Backspace' && !input.value && index > 0) {
        inputs[index - 1].focus();
      }
    });
  });
  </script>
</body>
</html>