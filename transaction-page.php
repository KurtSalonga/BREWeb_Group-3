<?php include 'data.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Transaction Page</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="container">
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="header">
      <button class="menu-btn">☰</button>
      <span>Transaction</span>
      <input type="text" placeholder="🔍" />
    </div>
    <div class="transaction-list">
      <?php
      $current_date = "";
      foreach ($transactions as $txn) {
          if ($txn["date"] !== $current_date) {
              echo "<div class='date'>DATE: {$txn["date"]}</div>";
              $current_date = $txn["date"];
          }
          echo "<div class='row'>";
          echo "<span>TIME: {$txn["time"]}</span>";
          echo "<span>P{$txn["total"]}</span>";
          echo "</div>";
      }
      ?>
    </div>
  </div>

  <!-- Details Panel -->
  <div class="details">
    <?php $active_txn = $transactions[0]; ?>
    <div class="top-bar">
      <span>Total</span>
      <span>Items</span>
    </div>
    <div class="total">P<?php echo $active_txn["total"]; ?></div>
    <div class="item-list">
      <?php foreach ($active_txn["items"] as $item): ?>
        <div class="item">
          <span><?php echo $item["name"]; ?></span>
          <span>P<?php echo $item["price"]; ?></span>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="bottom-bar">
      <span>Subtotal</span>
      <span>P<?php echo $active_txn["total"]; ?></span>
    </div>
    <div class="actions">
      <button class="reprint">Reprint Receipt #<?php echo $active_txn["receipt_no"]; ?></button>
      <button class="refund">REFUND</button>
    </div>
  </div>
</div>
</body>
</html>
