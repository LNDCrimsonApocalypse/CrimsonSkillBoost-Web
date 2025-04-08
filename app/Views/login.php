<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login with Firebase</title>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="/js/firebase-config.js"></script>
</head>
<body>
  <h2>Login</h2>
  <form id="loginForm">
    <input type="email" id="email" placeholder="Email" required><br>
    <input type="password" id="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
    <p>Don't have an account? <a href="/register">Register here</a></p>
  </form>
  <p id="message"></p>
  <p id="debugMessage"></p> <!-- For debug output -->

  <script>
    const loginForm = document.getElementById("loginForm");
    const msg = document.getElementById("message");
    const debugMsg = document.getElementById("debugMessage");

    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;

      // Clear previous messages
      msg.textContent = '';
      debugMsg.textContent = '';

      // Firebase login
      firebase.auth().signInWithEmailAndPassword(email, password)
        .then((userCredential) => {
          const user = userCredential.user;
          
          // Display user data (email, UID, etc.)
          debugMsg.textContent = `Logged in as: ${user.email}, UID: ${user.uid}`;

          // Get Firebase ID token
          user.getIdToken().then(token => {
            // Send token to backend if needed (for further validation)
            fetch("/auth/verify", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({ token })
            })
            .then(res => res.json())
            .then(data => {
              if (data.status === 'success') {
                msg.textContent = "Login successful. Welcome, " + data.email;
              } else {
                msg.textContent = "Login failed on backend validation.";
              }
            });
          });
        })
        .catch((error) => {
          // Firebase login error handling
          const errorCode = error.code;
          const errorMessage = error.message;
          msg.textContent = `Error: ${errorMessage}`;
          debugMsg.textContent = `Error code: ${errorCode}`; // Show error code for debugging
        });
    });
  </script>
</body>
</html>
