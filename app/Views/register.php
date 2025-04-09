<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register with Firebase</title>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="<?= base_url('js/firebase-config.js') ?>"></script>

</head>
<body>
  <h2>Register</h2>
  <form id="registerForm">
    <input type="email" id="email" placeholder="Email" required><br>
    <input type="password" id="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
    <p>Already have an account? <a href="/login">Login here</a></p>
  </form>
  <p id="message"></p>

  <script>
    const registerForm = document.getElementById("registerForm");
    const msg = document.getElementById("message");

    registerForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;

      firebase.auth().createUserWithEmailAndPassword(email, password)
        .then((userCredential) => {
          const user = userCredential.user;
          msg.textContent = "Registration successful. You can now log in.";
        })
        .catch((error) => {
          msg.textContent = "Error: " + error.message;
        });
    });
  </script>
</body>
</html>
