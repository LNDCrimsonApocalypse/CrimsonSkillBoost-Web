<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Welcome Page</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to bottom right, #fbefff, #e0ccff);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .content-container {
      display: flex;
      align-items: center;
      gap: 50px;
      padding: 40px;
      max-width: 1000px;
    
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

      .profile {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .profile img.profile-pic {
      width: 180px;
      height: 180px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #fff;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .profile img.center-logo {
      width: 40px;
      margin-top: -16px;
    }

    .welcome-message {
      text-align: left;
    }

    .welcome-message h1 {
      font-size: 32px;
      margin: 0;
    }

    .welcome-message h1 span {
      font-style: italic;
      font-weight: bold;
    }

    .welcome-message p {
      margin-top: 10px;
      font-size: 18px;
    }
  </style>
</head>
<body>

  <div class="content-container">
   
    <div class="profile">
      <img src="imgs/profile.png" alt="Profile Photo" class="profile-pic" />
       <img src="imgs/Logo.png" alt="Logo" class="center-logo" />
    </div>

    <div class="welcome-message">
      <h1>Welcome to <span>CrimsonSkillBoost!</span></h1>
      <p>Your Tech Journey Begins Here!</p>
    </div>
  </div>

</body>
</html>