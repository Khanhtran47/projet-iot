<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION["username"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=../../index.php");
}

if ($_SESSION["type"] === "admin") {
  header("location:../../admin/admin.php");
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

  <link rel="stylesheet" href="account.css" />

  <title>High Knowledge Technology</title>
</head>

<body>
  <header class="header" style="background : black">
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

  <div class="container-form right-panel-active" id="containerSignIn">
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <?php echo '<h1>Hi! ' . $_SESSION['fname'] . '</h1>' ?>
          <p>Here are your details in the database. If you wish to change anything, then just enter new data in text box and click on update.</p>
          <button class="ghost" id="signIn"><a href="../products/products.php">Continue Shopping</a></button>
        </div>
      </div>
    </div>
    <div class="form-container sign-up-container">
      <form method="POST" class="cta-form" action="../../components/update.php">
        <h1>Account Detail</h1>
        <?php

        $result = $mysqli->query('SELECT * FROM users WHERE id=' . $_SESSION['id']);

        if ($result === FALSE) {
          die(printf("Error message: %s\n", $mysqli->error));
        }

        if ($result) {
          $obj = $result->fetch_object();

          echo '<div class="flex">';
          echo '<input type="text" placeholder="' . $obj->fname . '" name="fname">';
          echo '<input type="text" id="right-label" placeholder="' . $obj->lname . '" name="lname">';
          echo '</div>';
          echo '<input type="text" id="right-label" placeholder="' . $obj->address . '" name="address">';
          echo '<div class="flex">';
          echo '<input type="text" id="right-label" placeholder="' . $obj->city . '" name="city">';
          echo '<input type="number" id="right-label" placeholder="' . $obj->pin . '" name="pin">';
          echo '</div>';
          echo '<input type="email" placeholder="' . $obj->email . '" />';
          echo '<input type="password" name="pwd" placeholder="Password"/>';

          echo '<button type="submit" id="right-label" value="Update">Reset</button>';
          echo '<button type="reset" id="right-label" value="Reset">Reset</button>';
        }
        ?>
      </form>
    </div>
  </div>

  <footer class="footer">
    <div class="container grid grid--footer">
      <div class="logo-col">
        <a href="#" class="footer-logo">
          <img class="logo" alt="HKGT logo" src="#" />
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
</body>

</html>