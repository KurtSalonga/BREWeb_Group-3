<!DOCTYPE html>
<html>
<head>
  <title>LOGIN PAGE</title>
  <link href="https://fonts.googleapis.com/css2?family=Itim&family=Inter:wght@500;600;700;800&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background-color: #ffd180;
      font-family: 'Inter', sans-serif;
      font-weight: 600;
    }

    .container {
      width: 600px;
      margin: 100px auto;
    }

    .top-bar {
      background-color: black;
      color: white;
      padding: 20px 30px 25px 30px;
      border-radius: 15px 15px 0 0;
      text-align: center;
    }

    .main-title {
      font-family: 'Itim', cursive;
      font-size: 28px;
      font-weight: bold;
      display: flex;
      justify-content: center;
      gap: 0;
    }

    .coffee-part {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .underline {
      width: 100px;
      height: 10px;
      background-color: white;
      margin-top: 5px;
    }

    .co-part {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-left: 1px;
    }

    .co-part .co {
      margin-bottom: 0;
    }

    .sub-title {
      font-size: 16px;
      font-weight: 500;
      margin-top: 1px;
      line-height: 1;
    }

    .login-box {
      background-color: #c49e64;
      padding: 30px;
      border-radius: 0 0 25px 25px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .login-title {
      font-family: 'Irish Grover', cursive;
      font-size: 36px;
      margin: 10px 0 20px 0;
    }

    label {
      display: block;
      font-weight: 600;
      font-size: 14px;
      text-align: left;
      margin-bottom: 5px;
      margin-left: auto;
      margin-right: auto;
      width: 90%;
    }

    .input-group, .input-block {
      position: relative;
      width: 90%;
      margin: 0 auto 15px auto;
    }

    .input-block input,
    .input-group input {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      border: none;
      border-radius: 12px;
      box-sizing: border-box;
    }

    .input-group button {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      font-size: 14px;
      font-weight: bold;
      color: #333;
    }

    .forgot {
      text-align: right;
      font-size: 12px;
      margin-top: -10px;
      margin-right: 5%;
      font-weight: 500;
    }

    .forgot a {
      text-decoration: underline;
      color: black;
      text-transform: uppercase;
    }

    .login-button {
      font-size: 16px;
      background-color: white;
      color: black;
      border: none;
      border-radius: 14px;
      font-weight: 800;
      cursor: pointer;
      padding: 16px 50px;
      margin: 25px auto 0 auto;
      transition: background-color 0.3s;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-button:hover {
      background-color: #d5d5d5;
    }

    .back-button {
      font-size: 13px;
      background-color: #6F4F37;
      color: white;
      border: none;
      border-radius: 14px;
      font-weight: 700;
      cursor: pointer;
      padding: 10px 15px;
      margin-top: 20px;
      width: 90%;
      margin-left: auto;
      margin-right: auto;
      display: block;
      transition: background-color 0.3s;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .back-button:hover {
      background-color: #4B3621;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="top-bar">
      <div class="main-title">
        <div class="coffee-part">
          <div>COFFEE&</div>
          <div class="underline"></div>
        </div>
        <div class="co-part">
          <div class="co">CO.</div>
          <div class="sub-title">CAFE</div>
        </div>
      </div>
    </div>

    <div class="login-box">
      <div class="login-title">LOGIN</div>

      <form onsubmit="return validateLogin(event)">
        <label for="email">EMAIL ADDRESS</label>
        <div class="input-block">
          <input type="text" id="email" placeholder="Enter your email" required>
        </div>

        <label for="password">PASSWORD</label>
        <div class="input-group">
          <input type="password" id="password" placeholder="Enter your password" required>
          <button type="button" onclick="togglePassword()">👁</button>
        </div>

        <div class="forgot">
          <a href="#">FORGOT PASSWORD?</a>
        </div>

        <button type="submit" class="login-button">LOGIN</button>
      </form>

      <button class="back-button" onclick="window.location.href='homepage.php';">
        IF YOU'RE A CUSTOMER, CLICK HERE TO RETURN TO THE HOMEPAGE
      </button>
    </div>
  </div>

  <script>
    function validateLogin(event) {
      event.preventDefault();
      const email = document.getElementById("email").value;
      const password = document.getElementById("password").value;
      const users = {
        "coffee&co@gmail.com": "coffee12345"
      };
      if (users[email] && users[email] === password) {
        alert("Login successful! Welcome!");
        window.location.href = "order.php";
      } else {
        alert("Login failed. Incorrect email or password.");
      }
      return false;
    }

    function togglePassword() {
      const passwordInput = document.getElementById("password");
      passwordInput.type = passwordInput.type === "password" ? "text" : "password";
    }
  </script>

</body>
</html>
