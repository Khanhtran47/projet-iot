<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION["username"])) {
  header("location:../../index.php");
}
include '../../database/config.php';
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Omnifood is an AI-powered food subscription that will make you eat healthy again, 365 days per year. It's tailored to your personal tastes and nutritional needs." />

  <!-- Always include this line of code!!! -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="icon" href="img/favicon.png" />
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
  <link rel="manifest" href="manifest.webmanifest" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="../../css/style.css" />
  <link rel="stylesheet" href="../../css/foundation.css" />

  <link rel="stylesheet" href="../../css/general.css" />
  <title>My Orders || HKT Shop</title>
  <link rel="stylesheet" href="css/foundation.css" />
</head>

<body>

  <nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1><a href="../../index.php">HKT Shop</a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li><a href="../products/products.php">Products</a></li>
        <li><a href="../cart/cart.php">View Cart</a></li>
        <li class="active"><a href="../orders/orders.php">My Orders</a></li>
        <li><a href="../contact/contact.php">Contact</a></li>

        <?php
        if (isset($_SESSION['username'])) {
          echo '<li><a href="../myAccount/account.php">My Account</a></li>';
          echo '<li><a href="../../components/logout.php">Log Out</a></li>';
        } else {
          echo '<li><a href="../login/login.php">Log In</a></li>';
          echo '<li><a href="../register/register.php">Register</a></li>';
        }
        ?>
      </ul>
    </section>
  </nav>

  <div class="row" style="margin-top:10px;">
    <div class="large-12">
      <h3>My COD Orders</h3>
      <hr>

      <?php
      $user = $_SESSION["username"];
      $result = $mysqli->query("SELECT * from orders where email='" . $user . "'");
      if ($result) {
        while ($obj = $result->fetch_object()) {
          //echo '<div class="large-6">';
          echo '<p><h4>Order ID ->' . $obj->id . '</h4></p>';
          echo '<p><strong>Date of Purchase</strong>: ' . $obj->date . '</p>';
          echo '<p><strong>Product Code</strong>: ' . $obj->product_code . '</p>';
          echo '<p><strong>Product Name</strong>: ' . $obj->product_name . '</p>';
          echo '<p><strong>Price Per Unit</strong>: ' . $obj->price . '</p>';
          echo '<p><strong>Units Bought</strong>: ' . $obj->units . '</p>';
          echo '<p><strong>Total Cost</strong>: ' . $currency . $obj->total . '</p>';
          //echo '</div>';
          //echo '<div class="large-6">';
          //echo '<img src="images/products/sports_band.jpg">';
          //echo '</div>';
          echo '<p><hr></p>';
        }
      }
      ?>
    </div>
  </div>

  <div class="row" style="margin-top:10px;">
    <div class="small-12">

      <footer style="margin-top:10px;">
        <p style="text-align:center; font-size:0.8em;">&copy; HKT Shop. All Rights Reserved.</p>
      </footer>

    </div>
  </div>
</body>

</html>