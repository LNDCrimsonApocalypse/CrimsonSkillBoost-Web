<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login with Firebase</title>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
  <script src="<?= base_url('js/firebase-config.js') ?>"></script>

  <style>
    /* Add some basic styling for the loading message and feedback */
    .loading {
      color: #007BFF;
      font-weight: bold;
    }
    .error 
    {
      color: red;
      font-weight: bold;
    }
    .success {
      color: green;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h2>Login</h2>
  <form id="loginForm">
    <input type="email" id="email" placeholder="Email" required><br>
    <input type="password" id="password" placeholder="Password" required><br>
    <button type="submit" id="loginButton">Login</button>
    <p>Don't have an account? <a href="/register">Register here</a></p>
  </form>
  <p id="message"></p>
  <p id="debugMessage"></p> <!-- For debug output -->
  
  <!-- Add a loading indicator -->
  <p id="loadingMessage" class="loading" style="display: none;">Logging in...</p>

  <script>
    const loginForm = document.getElementById("loginForm");
    const msg = document.getElementById("message");
    const debugMsg = document.getElementById("debugMessage");
    const loadingMessage = document.getElementById("loadingMessage");
    const loginButton = document.getElementById("loginButton");

    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;

      // Clear previous messages
      msg.textContent = '';
      debugMsg.textContent = '';
      loadingMessage.style.display = 'block';  // Show loading message
      loginButton.disabled = true;  // Disable the button to prevent multiple clicks

      // Firebase login
      firebase.auth().signInWithEmailAndPassword(email, password)
        .then((userCredential) => {
          const user = userCredential.user;
          console.log("Firebase login successful", user);

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
              loadingMessage.style.display = 'none';  // Hide loading message
              loginButton.disabled = false;  // Enable the button again

              if (data.status === 'success') {
                msg.textContent = "Login successful. Welcome, " + data.email;
                msg.classList.add("success");
              } else {
                msg.textContent = "Login failed on backend validation.";
                msg.classList.add("error");
              }
            });
          });
        })
        .catch((error) => {
          // Firebase login error handling
          const errorCode = error.code;
          const errorMessage = error.message;
          console.error("Firebase login error", error);
          loadingMessage.style.display = 'none';  // Hide loading message
          loginButton.disabled = false;  // Enable the button again
          msg.textContent = `Error: ${errorMessage}`;
          msg.classList.add("error");  // Show error message
          debugMsg.textContent = `Error code: ${errorCode}`; // Show error code for debugging
        });
    });
  </script>
</body>
</html>
