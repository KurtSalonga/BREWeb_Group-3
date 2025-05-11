<!DOCTYPE html>
<html>
<head>
  <title>COFFEE&CO. CAFE HOMEPAGE</title>
  <link href='https://fonts.googleapis.com/css?family=Irish+Grover|Itim' rel='stylesheet'>
  <style>
    body {
      background-color: #C49B66;
      font-family: Arial, sans-serif;
      text-align: center;
      padding-top: 50px;
    }

    .top-bar {
      background-color: black;
      color: white;
      padding: 15px 250px;
      border-radius: 10px;
      display: inline-block;
    }

    .main-title {
      font-family: 'Itim', cursive;
      display: flex;
      align-items: flex-end;
      justify-content: center;
      gap: 20px;
    }

    .coffee-part, .co-part {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }

    .coffee-text {
      font-size: 30px;
      font-weight: bold;
    }

    .underline {
      width: 120px;
      height: 6px;
      background-color: white;
      margin-top: 5px;
      border-radius: 2px;
      margin-left: 7px;
    }

    .co {
      font-size: 30px;
      font-weight: bold;
      margin-left: -20px;
      margin-top: 0px;
    }

    .sub-title {
      font-size: 14px;
      line-height: 1;
      margin-top: 0px;
      margin-left: -15px;
    }

    .container {
      display: flex;
      justify-content: center;
      margin-top: 50px;
      gap: 50px;
    }

    .card {
      background-color: white;
      padding: 50px;
      width: 350px;
      height: 300px;
      border-radius: 20px;
      box-shadow: 3px 6px 12px rgba(0,0,0,0.3);
      text-decoration: none;
      color: black;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      transition: transform 0.3s;
    }

    .card:hover {
      transform: scale(1.1);
    }

    .button-image {
      width: 200px;
      height: 200px;
      margin-bottom: 20px;
    }

    .card div {
      font-size: 24px;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="top-bar">
    <div class="main-title">
      <div class="coffee-part">
        <div class="coffee-text">COFFEE&</div>
        <div class="underline"></div>
      </div>
      <div class="co-part">
        <div class="co">CO.</div>
        <div class="sub-title">CAFE</div>
      </div>
    </div>
  </div>

  <div class="container">
    <a class="card" href="login.php">
      <img src="staff.png" alt="Staff Icon" class="button-image">
      <div>STAFF</div>
    </a>

    <a class="card" href="menu.php">
      <img src="customer.png" alt="Customer Icon" class="button-image">
      <div>CUSTOMER</div>
    </a>
  </div>

</body>
</html>
