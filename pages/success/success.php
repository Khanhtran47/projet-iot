<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

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
  <title>HKT Shop</title>
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
        <li><a href="../contact/contact.php">Contact</a></li>
        <?php

        if (isset($_SESSION['username'])) {
          echo '<li><a href="../orders/orders.php" class="main-nav-link">My Orders</a></li>';
          echo '<li><a href="../myAccount/account.php">My Account</a></li>';
          echo '<li><a href="../../components/logout.php">Log Out</a></li>';
        } else {
          echo '<li><a href="../login/login.php">Log In</a></li>';
        }
        ?>
      </ul>
    </section>
  </nav>

  <div class="row" style="margin-top:10px;">
    <div class="small-12">
      <p>Success. Whatever task you performed, has been executed successfully. Congrats!</p>
      <p>In case you purchased a product, then please check your spam in email for the receipt.</p>

      <footer style="margin-top:10px;">
        <p style="text-align:center; font-size:0.8em;">&copy; HKT Shop. All Rights Reserved.</p>
      </footer>
    </div>
  </div>
</body>

</html>