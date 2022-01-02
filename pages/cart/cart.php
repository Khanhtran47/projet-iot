<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}
include '../../database/config.php';
?>

<!DOCTYPE html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Omnifood is an AI-powered food subscription that will make you eat healthy again, 365 days per year. It's tailored to your personal tastes and nutritional needs." />

  <!-- Always include this line of code!!! -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="icon" href="../../img/favicon.png" />
  <link rel="apple-touch-icon" href="../../img/apple-touch-icon.png" />
  <link rel="manifest" href="manifest.webmanifest" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../../css/grid.css" />
  <link rel="stylesheet" href="cart.css" />
  <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>

  <title>High Knowledge Technology</title>
</head>

<body>
  <header class="header">
    <a href="../../index.php">
      <img class="logo" alt="Genshin Logo" src="../../img/logo.png" />
    </a>

    <nav class="main-nav">
      <ul class="main-nav-list">
        <li><a href="../products/products.php" class="main-nav-link">Products</a></li>
        <li><a href="../cart/cart.php" class="main-nav-link">View Cart</a></li>
        <li><a href="../contact/contact.php" class="main-nav-link">Contact</a></li>
        <?php

        if (isset($_SESSION['username'])) {
          echo '<li><a href="../orders/orders.php" class="main-nav-link">My Orders</a></li>';
          echo '<li><a href="../pc-care/pc-care.php" class="main-nav-link">My Device</a></li>';
          echo '<li><a href="../myAccount/account.php" class="main-nav-link">My Account</a></li>';
          echo '<li><a href="../../components/logout.php" class="main-nav-link">Log Out</a></li>';
        } else {
          echo '<li><a href="../login/login.php" class="main-nav-link">Log In</a></li>';
        }
        ?>
      </ul>
    </nav>

    <button class="btn-mobile-nav">
      <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
      <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
    </button>
  </header>



  <div class="shopping-cart">
    <?php
    echo '<div class="title">';
    echo '<h1>Your Shopping Cart</h1>';
    echo '<a href="../products/products.php" class="continue">Continue Shopping</a>';
    echo '</div>';

    if (isset($_SESSION['cart'])) {

      $subtotal = 0;
      $tax = 0;
      $ship = 5;
      $total = 0;

      foreach ($_SESSION['cart'] as $product_id => $quantity) {

        $result = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name ,qty, price FROM products WHERE id = " . $product_id);

        if ($result) {

          while ($obj = $result->fetch_object()) {
            $cost = $obj->price * $quantity;
            $subtotal = $subtotal + $cost;
            $tax = $subtotal * 3 / 100;
            $total = $subtotal + $ship + $tax;

            echo '<div class="item">';
            echo '<div class="buttons">';
            echo '<a class="delete-btn" href="../../components/update-cart.php?action=delete&id=' . $product_id . '"></a>';
            echo '<span class="like-btn"></span>';
            echo '</div>';

            echo '<div class="image">';
            echo '<img src="../../' . $obj->product_img_name . '" alt=""/>';
            echo '</div>';

            echo '<div class="description">';
            echo '<span>' . $obj->product_name . '</span>';
            echo '<span>' . $obj->product_code . '</span>';
            echo '<span>' . $obj->product_desc . '</span>';
            echo '</div>';

            echo '<div class="quantity">';
            echo '<button class="plus-btn" type="button" name="button">';
            echo '<a class="button [secondary success alert]" style="padding:5px;" href="../../components/update-cart.php?action=add&id=' . $product_id . '">';
            echo '<img src="../../img/plus.svg" alt="" />';
            echo '</a>';
            echo '</button>';
            echo '<input type="text" name="name" value="' . $quantity . '">';
            echo '<button class="minus-btn" type="button" name="button">';
            echo '<a class="button alert" style="padding:5px;" href="../../components/update-cart.php?action=remove&id=' . $product_id . '">';
            echo '<img src="../../img/minus.svg" alt="" />';
            echo '</a>';
            echo '</button>';
            echo '</div>';

            echo '<div class="total-price">$' . $cost . '</div>';
            echo '</div>';
          }
        }
      }

      echo '<div class="subtotal cf">';
      echo '<ul>';
      echo '<li class="totalRow">';
      echo '<span class="label">Subtotal</span>';
      echo '<span class="value">$' . $subtotal . '</span>';
      echo '</li>';
      echo '<li class="totalRow">';
      echo '<span class="label">Shipping</span>';
      echo '<span class="value">$' . $ship . '</span>';
      echo '</li>';
      echo '<li class="totalRow">';
      echo '<span class="label">Tax</span>';
      echo '<span class="value">$' . $tax . '</span>';
      echo '</li>';
      echo '<li class="totalRow final">';
      echo '<span class="label">Total</span>';
      echo '<span class="value">$' . $total . '</span>';
      echo '</li>';
      echo '<li class="totalRow">';
      if (isset($_SESSION['username'])) {
        echo '<a href="../../components/orders-update.php" class="btn">Checkout</a>';
      } else {
        echo '<a href="../login/login.php" class="btn">Login</a>';
      }
      echo '<a href="../../components/update-cart.php?action=empty" class="btn empty">Empty Cart</a>';
      echo '</li>';
      echo '</ul>';
      echo '</div>';
    } else {
      echo '<div class="empty-cart">';
      echo '<h2>You have no items in your shopping cart.</h2>';
      echo '</div>';
    }
    ?>
  </div>

  <footer class="footer">
    <div class="container grid grid--footer">
      <div class="logo-col">
        <a href="#" class="footer-logo">
          <img class="logo" alt="HKT logo" src="#" />
        </a>

        <ul class="social-links">
          <li>
            <a class="footer-link" href="#">
              <ion-icon class="social-icon" name="logo-instagram"></ion-icon>
            </a>
          </li>
          <li>
            <a class="footer-link" href="#">
              <ion-icon class="social-icon" name="logo-facebook"></ion-icon>
            </a>
          </li>
          <li>
            <a class="footer-link" href="#">
              <ion-icon class="social-icon" name="logo-twitter"></ion-icon>
            </a>
          </li>
        </ul>

        <p class="copyright">
          Copyright &copy; <span class="year">2027</span> by HKT, Inc. All rights reserved.
        </p>
      </div>

      <div class="address-col">
        <p class="footer-heading">Contact us</p>
        <address class="contacts">
          <p class="address">15 avenue Maréchal Foch, 41000 Blois, France</p>
          <p>
            <a class="footer-link" href="tel:+33 123 45 67 89">
              +33 123 45 67 89
            </a>
            <br />
            <a class="footer-link" href="mailto:hktech.iot@gmail.com">
              hktech.iot@gmail.com
            </a>
          </p>
        </address>
      </div>

      <nav class="nav-col">
        <p class="footer-heading">Account</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">Create account</a></li>
          <li><a class="footer-link" href="#">Sign in</a></li>
          <li><a class="footer-link" href="#">iOS app</a></li>
          <li><a class="footer-link" href="#">Android app</a></li>
        </ul>
      </nav>

      <nav class="nav-col">
        <p class="footer-heading">Company</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">About HKT</a></li>
          <li><a class="footer-link" href="#">For Business</a></li>
          <li><a class="footer-link" href="#">Partners</a></li>
          <li><a class="footer-link" href="#">Careers</a></li>
        </ul>
      </nav>

      <nav class="nav-col">
        <p class="footer-heading">Resources</p>
        <ul class="footer-nav">
          <li><a class="footer-link" href="#">Help center</a></li>
          <li><a class="footer-link" href="#">Privacy & terms</a></li>
        </ul>
      </nav>
    </div>
  </footer>
  <script type="text/javascript">
    $('.like-btn').on('click', function() {
      $(this).toggleClass('is-active');
    });
  </script>
</body>

</html>