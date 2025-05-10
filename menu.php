<?php
session_start();

// Prices for each menu item
$menu_prices = [
    "Cafe Americano" => 120,
    "Cafe Mocha" => 140,
    "Caramel Macchiato" => 150,
    "Coffee Jelly" => 130,
    "Dark Mocha" => 140,
    "Dirty Matcha" => 150,
    "Red Velvet Latte" => 150,
    "Salted Caramel" => 140,
    "Sea Salt Latte" => 135,
];

// Prices for toppings
$topping_prices = [
    "Pearl" => 20,
    "Cream Cheese" => 25,
    "Pudding" => 15,
    "Extra Shot" => 30,
];

// Initialize session storage
if (!isset($_SESSION['order'])) $_SESSION['order'] = [];
if (!isset($_SESSION['order_type'])) $_SESSION['order_type'] = '';
if (!isset($_SESSION['payment_mode'])) $_SESSION['payment_mode'] = '';

// Add to order
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_to_order'])) {
        $item = $_POST['item'];
        $topping = $_POST['topping'] ?? null;
        $_SESSION['order'][] = [
            'item' => $item,
            'topping' => $topping
        ];
    } elseif (isset($_POST['place_order'])) {
        // Order Summary
        $total = 0;
        echo "<div style='padding: 20px; background-color: white; margin: 20px; border: 2px solid #ccc;'>";
        echo "<h3>Order Placed!</h3>";
        echo "<ul>";
        foreach ($_SESSION['order'] as $order_item) {
            $item = $order_item['item'];
            $topping = $order_item['topping'];
            $item_price = $menu_prices[$item];
            $topping_price = $topping ? $topping_prices[$topping] : 0;
            $total += $item_price + $topping_price;
            echo "<li>" . htmlspecialchars($item) . " - ₱{$item_price}";
            if ($topping) {
                echo " + " . htmlspecialchars($topping) . " (₱{$topping_price})";
            }
            echo "</li>";
        }
        echo "</ul>";
        echo "Total Amount: ₱" . number_format($total, 2) . "<br>";
        echo "Order Type: " . htmlspecialchars($_SESSION['order_type']) . "<br>";
        echo "Payment Mode: " . htmlspecialchars($_SESSION['payment_mode']) . "<br>";
        echo "</div>";

        // Clear session after placing order
        $_SESSION['order'] = [];
        $_SESSION['order_type'] = '';
        $_SESSION['payment_mode'] = '';
    } elseif (isset($_POST['order_type'])) {
        $_SESSION['order_type'] = $_POST['order_type'];
    } elseif (isset($_POST['payment_mode'])) {
        $_SESSION['payment_mode'] = $_POST['payment_mode'];
    } elseif (isset($_POST['remove_item'])) {
        $index_to_remove = $_POST['remove_item'];
        unset($_SESSION['order'][$index_to_remove]);
        $_SESSION['order'] = array_values($_SESSION['order']); // reindex the array
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>BREWWeb Order System</title>
    <link href='https://fonts.googleapis.com/css?family=Irish Grover' rel='stylesheet'>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffd180;
            padding: 20px;
        }
        h1 {
            text-align: center;
            font-family: 'Irish Grover', cursive;
        }
        .container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .menu, .order {
            background-color: white;
            padding: 20px;
            width: 45%;
            border-radius: 10px;
        }
        select, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
        }
        button {
            background-color: #6d2d18;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #4e1f10;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #f1f1f1;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
        }
        .order-actions {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .order-actions form {
            flex: 1;
        }
    </style>
</head>
<body>

<h1>BREWWeb</h1>

<div class="container">
    <!-- Menu Section -->
    <div class="menu">
        <h2>Menu</h2>
        <form method="POST">
            <select name="item" required>
                <?php foreach ($menu_prices as $item => $price): ?>
                    <option value="<?= $item ?>"><?= $item ?> - ₱<?= $price ?></option>
                <?php endforeach; ?>
            </select>
            <select name="topping">
                <option value="">No Topping</option>
                <?php foreach ($topping_prices as $topping => $price): ?>
                    <option value="<?= $topping ?>"><?= $topping ?> - ₱<?= $price ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="add_to_order">Add to Order</button>
        </form>
    </div>

    <!-- Order Summary -->
    <div class="order">
        <h2>My Order</h2>
        <ul>
        <?php
        $total = 0;
        foreach ($_SESSION['order'] as $index => $order_item):
            $item = $order_item['item'];
            $topping = $order_item['topping'];
            $item_price = $menu_prices[$item];
            $topping_price = $topping ? $topping_prices[$topping] : 0;
            $total += $item_price + $topping_price;
        ?>
            <li>
                <?= htmlspecialchars($item) ?> - ₱<?= $item_price ?>
                <?php if ($topping): ?>
                    + <?= htmlspecialchars($topping) ?> (₱<?= $topping_price ?>)
                <?php endif; ?>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="remove_item" value="<?= $index ?>">
                    <button type="submit" style="background-color: red;">Remove</button>
                </form>
            </li>
        <?php endforeach; ?>
        </ul>

        <p><strong>Total:</strong> ₱<?= number_format($total, 2) ?></p>
        <p><strong>Order Type:</strong> <?= htmlspecialchars($_SESSION['order_type']) ?: "Not Selected" ?></p>
        <p><strong>Payment Mode:</strong> <?= htmlspecialchars($_SESSION['payment_mode']) ?: "Not Selected" ?></p>

        <!-- Order Type Buttons -->
        <div class="order-actions">
            <form method="POST"><input type="hidden" name="order_type" value="Dine In"><button type="submit">Dine In</button></form>
            <form method="POST"><input type="hidden" name="order_type" value="Takeout"><button type="submit">Takeout</button></form>
        </div>

        <!-- Payment Buttons -->
        <div class="order-actions">
            <form method="POST"><input type="hidden" name="payment_mode" value="Cash"><button type="submit">Cash</button></form>
            <form method="POST"><input type="hidden" name="payment_mode" value="Grab"><button type="submit">Grab</button></form>
            <form method="POST"><input type="hidden" name="payment_mode" value="GCash"><button type="submit">GCash</button></form>
        </div>

        <!-- Place Order -->
        <form method="POST">
            <button type="submit" name="place_order">Place Order</button>
        </form>
    </div>
</div>

</body>
</html>
