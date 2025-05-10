<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      background-color: #ffd180;
      font-family: Arial, sans-serif;
    }
    
    .login-box {
      width: 600px;
      background-color: #c49e64;
      margin: 150px auto;
      padding: 30px;
      border-radius: 15px;
    }

    .top-bar {
      text-align: center;
      background-color: black;
      color: white;
      padding: 10px;
      border-radius: 10px 10px 0 0;
      font-weight: bold;
    }

    .top-bar span {
      display: block;
      font-size: 14px;
      font-weight: normal;
      margin-top: 5px;
    }

    .login-title {
      text-align: center;
      font-family: 'Irish Grover', cursive;
      font-size: 36px;
      margin: 20px 0;
    }

    label {
      display: block;
      font-weight: bold;
      margin-top: 15px;
      font-size: 14px;
    }

    input[type="text"], input[type="password"] {
      width: 95%;
      padding: 12px;
      font-size: 16px;
      border: none;
      border-radius: 4px;
      margin-top: 5px;
    }

    .forgot {
      text-align: right;
      font-size: 12px;
      margin-top: 5px;
    }

    .forgot a {
      text-decoration: underline;
      color: black;
    }

    .login-button {
      padding: 8px 20px;
      font-size: 14px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      display: block;
      margin: 20px auto 0 auto;
      transition: background-color 0.3s;
    }

    .login-button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <div class="top-bar">
      COFFEE&CO.
      <span>CAFE</span>
    </div>

    <div class="login-title">BREweB</div>
    
    <!-- Login form -->
    <form onsubmit="return validateLogin(event)">
      <label>EMAIL ADDRESS</label>
      <input type="text" id="email" placeholder="Enter your email" required>

      <label>PASSWORD</label>
      <input type="password" id="password" placeholder="Enter your password" required>

      <div class="forgot">
        <a href="#" style="color: blue;">Forgot password?</a>
      </div>

      <button type="submit" class="login-button">LOGIN</button>
    </form>
  </div>

  <script>
  function validateLogin(event) {
    event.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    const users = {
      "user@example.com": "123456",
      "student@example.com": "student123"
    };

    if (users[email] && users[email] === password) {
      alert("Login successful! Welcome!");

      // Redirect logic
      if (email === "student@example.com") {
        window.location.href = "inventory.php";
      } else {
        window.location.href = "order.php";
      }
    } else {
      alert("Login failed. Incorrect email or password.");
    }

    return false;
  }
</script>


</body>
</html>

