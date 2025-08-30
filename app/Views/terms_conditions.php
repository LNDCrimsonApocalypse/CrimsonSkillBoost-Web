<html> 
    <head>
        <title>"Terms and Conditions"</title>
    </head>
<style>

   body {
      background: linear-gradient(to bottom, #f8e6f7 0%, #eaf1fb 100%);
      font-family: 'Montserrat', Arial, sans-serif;
      margin: 0;
      padding: 10;
      min-height: 100vh;
    }
    .container {
      max-width: 600px;
      margin: 60px auto 0 auto;
      background: rgba(255,255,255,0.95);
      border-radius: 18px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.06);
      padding: 40px 36px 32px 36px;
      text-align: center;
    }
    .logo img {
  width: 100px;
  margin-bottom: 20px;
  float: center;
  margin-left:900px;
  margin-top: 50px;
}

    h1 {
      font-size: 2.2rem;
      font-weight: 700;
      margin-bottom: 32px;
      margin-top: 12px;
      color: #222;
      letter-spacing: -1px;
    }
    p {
      color: #5a5a5a;
      font-size: 1.07rem;
      line-height: 1.7;
      margin-bottom: 22px;
      text-align: left;
    }
    a {
      color: #6bb6ff;
      text-decoration: none;
      font-weight: 500;
    }
    a:hover {
      text-decoration: underline;
    }
    .agree-btn {
      display: block;
      margin: 36px auto 0 auto;
      padding: 14px 0;
      width: 220px;
      background: linear-gradient(90deg, #d1a4e6 0%, #e88ad6 100%);
      color: #fff;
      font-size: 1.15rem;
      font-weight: 700;
      border: none;
      border-radius: 24px;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(209,164,230,0.15);
      transition: background 0.2s;
    }
    .agree-btn:hover {
      background: linear-gradient(90deg, #e88ad6 0%, #d1a4e6 100%);
    }
    @media (max-width: 650px) {
      .container {
        padding: 24px 8vw 20px 8vw;
      }
      .agree-btn {
        width: 100%;
      }
    }
  </style>

</style>

 <body>
   <div class="logo">
        <img src="public/img/Logo.png" alt="Logo">
    </div> 
    <div class="container">
     <h1>Terms and Condition</h1>
    <p>
      People who use our platform may have their account details shared with their assigned professors for academic purposes.
      <a href="#">Learn more</a>
    </p>
    <p>
      By tapping I agree, you confirm that you have read and accepted CrimsonSkillBoost's
      <a href="#">Terms</a>, <a href="#">Privacy Policy</a>, and <a href="#">Cookies Policy</a>.
    </p> 
    <p>
      The <a href="#">Privacy Policy</a> explains how we collect, use, and protect your data when you create an account. For example, we use this information to enhance learning experiences, provide personalized recommendations, and improve platform features.
    </p>
    <button class="agree-btn" onclick="window.location.href='<?= base_url('register') ?>'">I agree</button>
  </div>

</html>