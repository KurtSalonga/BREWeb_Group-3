<?php


session_start();

// Only allow students
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'student') {
    // Optional: Redirect or show error
    echo "Access denied. This page is for students only.";
    exit;
}

// Simple session-based inventory (simulate with GET for now)
session_start();

if (!isset($_SESSION["inventory"])) {
    $_SESSION["inventory"] = [];
}

if (isset($_GET["item"])) {
    $_SESSION["inventory"][] = $_GET["item"];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory</title>
</head>
<body>
    <h1>Inventory Page</h1>
    <ul>
        <?php foreach ($_SESSION["inventory"] as $item): ?>
            <li><?= htmlspecialchars($item) ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="order.php">Go to Order Page</a>
</body>
</html>
