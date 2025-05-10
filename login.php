<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700;800&family=Irish+Grover&display=swap" rel="stylesheet">
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
      text-align: center;
      padding: 10px;
      border-radius: 15px 15px 0 0;
      font-weight: bold;
    }

    .top-bar span {
      display: block;
      font-size: 14px;
      font-weight: normal;
      margin-top: 5px;
    }

    .login-box {
      background-color: #c49e64;
      padding: 30px;
      border-radius: 0 0 25px 25px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .login-title {
      text-align: center;
      font-family: 'Irish Grover', cursive;
      font-size: 36px;
      margin: 10px 0 20px 0;
    }

    label {
      display: block;
      font-weight: 600;
      margin-top: 15px;
      font-size: 14px;
    }

    .input-group, .input-block {
      position: relative;
      width: 95%;
      margin-bottom: 10px;
    }

    .input-block input,
    .input-group input {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      border: none;
      border-radius: 12px;
      margin-top: 5px;
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
      margin-top: 5px;
      font-weight: 500;
    }

    .forgot a {
      text-decoration: underline;
      color: black;
      text-transform: uppercase;
    }

    .login-button {
      font-size: 18px;
      background-color: white;
      color: black;
      border: none;
      border-radius: 14px;
      font-weight: 800;
      cursor: pointer;
      padding: 16px 32px;
      margin: 25px auto 15px auto;
      display: block;
      transition: background-color 0.3s;
    }

    .login-button:hover {
      background-color: #f0f0f0;
    }

    .back-button {
      font-size: 14px;
      background-color: #6F4F37; /* Coffee brown color */
      color: white;
      border: none;
      border-radius: 14px;
      font-weight: 700;
      cursor: pointer;
      padding: 12px 24px;
      transition: background-color 0.3s;
      display: block;
      margin: 15px auto 0 auto;
    }

    .back-button:hover {
      background-color: #4B3621; /* Darker brown color on hover */
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="top-bar">
      COFFEE&CO.
      <span>CAFE</span>
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

      <button class="back-button" onclick="window.location.href='index.html';">
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
