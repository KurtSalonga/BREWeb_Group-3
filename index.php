<!DOCTYPE html>
<html>
<head>
    <title>COFFEE&CO. CAFE</title>
    <link href='https://fonts.googleapis.com/css?family=Irish Grover' rel='stylesheet'>
    <style>
        body {
            background-color: #C49B66;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
        }
        .title {
            background-color: black;
            color: white;
            padding: 15px 30px;
            font-size: 28px;
            font-weight: bold;
            display: inline-block;
            border-radius: 10px;
            font-family: 'Irish Grover', cursive;
        }
        .container {
            display: flex;
            justify-content: center;
            margin-top: 50px;
            gap: 40px;
        }
        .card {
            background-color: white;
            padding: 30px;
            width: 300px;
            height: 180px;
            border-radius: 15px;
            box-shadow: 2px 4px 8px rgba(0,0,0,0.3);
            text-decoration: none;
            color: black;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .icon {
            font-size: 40px;
            margin-bottom: 15px;
        }
    </style>
</head>
<head>
    
<body>

    <div class="title">Coffee&Co. Cafe</div>

    <div class="container">
        <!-- Staff Button -->
        <a class="card" href="login.php">
            <div class="icon">👨‍🍳</div>
            <div>STAFF</div>
        </a>

        <!-- Customer Button -->
        <a class="card" href="menu.php">
            <div class="icon">👥</div>
            <div>CUSTOMER</div>
        </a>
    </div>

</body>
</html>
