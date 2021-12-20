<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION["username"])) {
  header("location:../../index.php");
}


?>

<!doctype html>

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

  <link rel="stylesheet" href="../../css/general.css" />


  <title>High Knowledge Technology</title>
</head>

<body>
  <header class="header" style="background : black">
    <a href="../../index.php">
      <img class="logo" alt="Genshin Logo" src="https://webstatic-sea.mihoyo.com/upload/event/2021/10/12/af8f45f5d1a34eb13aa2c70a2af59d05_6274939367807151451.png" />
    </a>

    <nav class="main-nav">
      <ul class="main-nav-list">
        <li><a href="../products/products.php" class="main-nav-link">Products</a></li>
        <li><a href="../cart/cart.php" class="main-nav-link">View Cart</a></li>
        <li><a href="../contact/contact.php" class="main-nav-link">Contact</a></li>
        <?php

        if (isset($_SESSION['username'])) {
          echo '<li><a href="../myAccount/account.php" class="main-nav-link">My Account</a></li>';
          echo '<li><a href="../../components/logout.php" class="main-nav-link">Log Out</a></li>';
        } else {
          echo '<li><a href="../login/login.php" class="main-nav-link">Log In</a></li>';
          echo '<li><a href="../register/register.php" class="main-nav-link">Register</a></li>';
        }
        ?>
      </ul>
    </nav>

    <button class="btn-mobile-nav">
      <ion-icon class="icon-mobile-nav" name="menu-outline"></ion-icon>
      <ion-icon class="icon-mobile-nav" name="close-outline"></ion-icon>
    </button>
  </header>

  <section class="section-cta" id="cta">
    <div class="container">
      <div class="cta">
        <div class="cta-text-box">
          <h2 class="heading-secondary">Join us now</h2>
          <p class="cta-text">
            Start building PC today. We can help you anytime.
          </p>

          <form method="POST" class="cta-form" action="../../components/insert.php" netlify>
            <div>
              <label for="right-label">First Name</label>
              <input type="text" placeholder="Nayan" name="fname">
            </div>

            <div>
              <label for="right-label">Last Name</label>
              <input type="text" id="right-label" placeholder="Seth" name="lname">
            </div>

            <div>
              <label for="right-label">Address</label>
              <input type="text" id="right-label" placeholder="Infinite Loop" name="address">
            </div>

            <div>
              <label for="right-label">City</label>
              <input type="text" id="right-label" placeholder="Blois" name="city">
            </div>

            <div>
              <label for="right-label">Pin Code</label>
              <input type="number" id="right-label" placeholder="41000" name="pin">
            </div>


            <div>
              <label for="right-label">Email</label>
              <input id="right-label" type="email" name="email" required />
            </div>

            <div>
              <label for="right-label">Password</label>
              <input id="right-label" type="password" name="pwd" required />
            </div>
            <input type="submit" id="right-label" value="Login" class="btn btn--form">

          </form>
        </div>
        <div class="cta-img-box" role="img" aria-label="Woman enjoying food"></div>
      </div>
    </div>
  </section>


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
            <a class="footer-link" href="mailto:hungc4k43@gmail.com">
              hungc4k43@gmail.com
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