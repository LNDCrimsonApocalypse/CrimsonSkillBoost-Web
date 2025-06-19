<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Inter', sans-serif;
  background: linear-gradient(to right, #fce4ec, #e1f5fe);
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.profile-container {
  width: 100%;
  max-width: 1000px;
  background: white;
  border-radius: 16px;
  padding: 30px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.profile-card {
  display: flex;
  flex-wrap: wrap;
  gap: 40px;
  align-items: flex-start;
}

.profile-left {
  text-align: center;
  flex: 1;
}

.profile-img {
  width: 160px;
  height: 160px;
  object-fit: cover;
  border-radius: 50%;
  border: 4px solid #eee;
}

.profile-name {
  font-size: 20px;
  font-weight: 600;
  margin-top: 10px;
}

.profile-username {
  font-size: 14px;
  color: #777;
}

.profile-right {
  flex: 2;
}

.profile-right h2 {
  font-size: 24px;
  font-weight: 600;
  margin-bottom: 5px;
}

.subtext {
  color: #555;
  margin-bottom: 20px;
}

.form-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 12px 16px;
}

.form-grid input,
.form-grid select,
.form-grid textarea {
  padding: 10px;
  border-radius: 8px;
  border: 1px solid #ccc;
  font-size: 14px;
  width: 100%;
}

.form-grid textarea {
  grid-column: span 2;
  resize: none;
  height: 100px;
}

.save-btn {
  margin-top: 20px;
  padding: 12px 24px;
  border: none;
  background-color: #e88ae9;
  color: white;
  font-weight: 600;
  border-radius: 24px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.save-btn:hover {
  background-color: #d56ed8;
}

.cancel-btn {
  margin-top: 20px;
  padding: 12px 24px;
  border: none;
  background-color: #e88ae9;
  color: white;
  font-weight: 600;
  border-radius: 24px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.cancel-btn:hover {
  background-color: #d56ed8;
}
.camera-icon {
      margin-top: -20px;
      margin-bottom: 15px;
      font-size: 20px;
      color: gray;
    }
</style>
<body>
  <div class="profile-container">
    <div class="profile-card">
      <div class="profile-left">
        <label for="profile-pic-input" style="cursor:pointer; display:inline-block; margin-top: 50px;">
          <img id="profile-pic" src="https://ui-avatars.com/api/?name=User&background=cccccc&color=fff&size=160" alt="Profile Picture">
          <div class="camera-icon">📷</div>
        </label>
        <input type="file" id="profile-pic-input" accept="image/*" style="display:none;">
      
        <div class="profile-name">Jao Nicholas Benedicto</div>
        <div class="profile-username">@JaoJoaBen010983</div>
      </div>

      <div class="profile-right">
        <h2>Edit your profile</h2>
        <p class="subtext">Upload a clear and professional image to help your professor recognize you.</p>

        <div class="form-grid">
          <input type="text" placeholder="First Name" required/>
          <input type="text" placeholder="Middle Name" required/>
          <input type="text" placeholder="last Name" required/>
          <input type="text" placeholder="Extension Name" />
          <input type="text" placeholder="Username" required />
          <input type="email" placeholder="Email Address" required/>
          
             <input type="date" id="birthday" placeholder="Birthday" required />
          
          <select id="gender" required>
            <option value="" disabled selected>Gender</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
          <textarea placeholder="Education&#10;Bachelor of Science in Computer Science&#10;Doctorate in Science Engineering"></textarea>
        </div>

        <button class="save-btn">Save</button>
        <button class="cancel-btn">Cancel</button>
      </div>
    </div>
  </div>
</body>
</html>
