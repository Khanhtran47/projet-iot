<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

use PHPMailer\PHPMailer\PHPMailer;

require_once '../../phpmailer/Exception.php';
require_once '../../phpmailer/PHPMailer.php';
require_once '../../phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if (isset($_POST['submit'])) {
  $userName = $_POST["name"];
  $userEmail = $_POST["email"];
  $messageSubject = $_POST["subject"];
  $message = $_POST["message"];

  try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hktech.iot@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'tranduckhanh'; // Gmail address Password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = '465';

    $mail->setFrom('hktech.iot@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('hktech.iot@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = "" . $messageSubject . "";
    $mail->Body = "<h3>Name : $userName <br>Email: $userEmail <br>Message : $message</h3>";

    $mail->send();
    if ($mail) {
      echo "<script>alert('Mail Send.');</script>";
    } else {
      echo "<script>alert('Mail Not Send.');</script>";
    }
  } catch (Exception $e) {
    $alert = '<div class="alert-error">
                <span>' . $e->getMessage() . '</span>
              </div>';
  }
}

?>

<!doctype html>

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
  <link rel="stylesheet" href="./contact.css">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

  <title>High Knowledge Technology</title>
</head>

<body>
  <header class="header">
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
  <div class="container-form">
    <span class="big-circle"></span>
    <img src="../../img/contact/shape.png" class="square" alt="" />
    <div class="form">
      <div class="contact-info">
        <h3 class="title">Let's get in touch</h3>
        <p class="text">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
          dolorum adipisci recusandae praesentium dicta!
        </p>

        <div class="info">
          <div class="information">
            <img src="../../img/contact/location.png" class="icon" alt="" />
            <p>92 Cherry Drive Uniondale, NY 11553</p>
          </div>
          <div class="information">
            <img src="../../img/contact/email.png" class="icon" alt="" />
            <p>lorem@ipsum.com</p>
          </div>
          <div class="information">
            <img src="../../img/contact/phone.png" class="icon" alt="" />
            <p>123-456-789</p>
          </div>
        </div>

        <div class="social-media">
          <p>Connect with us :</p>
          <div class="social-icons">
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="contact-form">
        <span class="circle one"></span>
        <span class="circle two"></span>

        <form action="" method="post" autocomplete="off">
          <h3 class="title">Contact us</h3>
          <div class="input-container">
            <input type="text" name="name" class="input" />
            <label for="">Username</label>
            <span>Username</span>
          </div>
          <div class="input-container">
            <input type="email" name="email" class="input" />
            <label for="">Email</label>
            <span>Email</span>
          </div>
          <div class="input-container">
            <input type="message" name="subject" class="input" />
            <label for="">Subject</label>
            <span>Subject</span>
          </div>
          <div class="input-container textarea">
            <textarea name="message" class="input"></textarea>
            <label for="">Message</label>
            <span>Message</span>
          </div>
          <input type="submit" name="submit" value="Send" class="btn" />
        </form>
      </div>
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

  <script type="text/javascript">
    const inputs = document.querySelectorAll(".input");

    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }

    function focusFunc() {
      let parent = this.parentNode;
      parent.classList.add("focus");
    }

    function blurFunc() {
      let parent = this.parentNode;
      if (this.value == "") {
        parent.classList.remove("focus");
      }
    }

    inputs.forEach((input) => {
      input.addEventListener("focus", focusFunc);
      input.addEventListener("blur", blurFunc);
    });
  </script>
</body>

</html>