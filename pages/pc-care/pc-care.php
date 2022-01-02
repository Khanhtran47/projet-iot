<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

function Read_Temperature($ip, $port, $adr, $nRegist)
{
  require_once '../../ModbusMaster/ModbusMaster.php';
  try {
    $modbus = new ModbusMaster($ip, "TCP", $port); //créer un trame Modbus
    $recData = $modbus->readMultipleRegisters(1, $nRegist, $adr);
    $val16bits = $recData[0] * 256 + $recData[1]; //Calcul de la valeur du mot
    return $val16bits;
  } catch (Exception $e) {
    if ($nRegist == 61) {
      return 2;
    }
    if ($nRegist == 59) {
      return 2;
    } else {
      echo "Aucune sonde de température n'est détecté";
    }
  }
}

function Lecture_Temperature($numerodesond)
{
  try {
    $temperature_sonde = Read_Temperature("192.168.52.232", 502, 1, 15 + $numerodesond) / 10; //Lire le registre de la sonde
    return $temperature_sonde;
  }
  #S'il y a une erreur alors on affiche qu'il y a un problème
  catch (Exception $e) {
    echo "Problème de lecture de la température pour enregistrer";
  }
}

// $mot_a_lire = (Read_Temperature("192.168.52.232", 502, 1, 16)) / 10;
//$tmp = Lecture_Temperature(1);
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
  <link rel="stylesheet" href="./pc-care.css">
  <title>High Knowledge Technology</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <header class="header">
    <a href="index.php">
      <img class="logo" alt="Logo" src="https://webstatic-sea.mihoyo.com/upload/event/2021/10/12/af8f45f5d1a34eb13aa2c70a2af59d05_6274939367807151451.png" />
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

  <?php

  if (array_key_exists('button1', $_POST)) {
    Allumer_Ventilateur();
  }
  if (array_key_exists('button2', $_POST)) {
    Eteindre_Ventilateur();
  }
  if (array_key_exists('button3', $_POST)) {
    Allumer_Resistance();
  }
  if (array_key_exists('button4', $_POST)) {
    Eteindre_Resistance();
  }

  function Allumer_Ventilateur()
  {
    Ecrire_mot("192.168.52.232", 502, 4, 1);
  }
  function Eteindre_Ventilateur()
  {
    Ecrire_mot("192.168.52.232", 502, 4, 0);
  }
  function Allumer_Resistance()
  {
    Ecrire_mot("192.168.52.232", 502, 5, 1);
  }
  function Eteindre_Resistance()
  {
    Ecrire_mot("192.168.52.232", 502, 5, 0);
  }
  function Ecrire_mot($ip, $port, $adr, $value)
  {
    require_once '../../ModbusMaster/ModbusMaster.php';
    $modbus = new ModbusMaster($ip, "TCP", $port);
    $data = array($value);
    $dataType = array("WORD");
    $modbus->writeMultipleRegister(0, $adr, $data, $dataType); // envoi de l'ordre pour allumer le ventilateur
  }
  ?>

  <section id="container">
    <div class="left-side" id="left-side">
      <h4>
        Ventilateur
      </h4>

      <form method="post" class="fan-control">
        <input type="submit" name="button1" class="button" value="Allumer Ventilateur" />
        <input type="submit" name="button2" class="button" value="Eteindre Ventilateur" />
        <input type="submit" name="button3" class="button" value="Allumer Resistance" />
        <input type="submit" name="button4" class="button" value="Eteindre Resistance" />
      </form>
    </div>

    <div class="right-side" id="right-side">

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
          Copyright &copy; <span class="year">2027</span> by HKT, Inc. All
          rights reserved.
        </p>
      </div>

      <div class="address-col">
        <p class="footer-heading">Contact us</p>
        <address class="contacts">
          <p class="address">15 avenue Maréchal Foch, 41000 Blois, France</p>
          <p>
            <a class="footer-link" href="tel:+33 123 45 67 89">+33 123 45 67 89</a><br />
            <a class="footer-link" href="mailto:hktech.iot@gmail.com">hktech.iot@gmail.com</a>
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
    // function refreshDiv() {
    //   $('#left-side').load(location.href + " #left-side");
    //   $('#right-side').load(location.href + " #right-side");
    // }
    function loadlink() {
      $('#right-side').load('./right-side.php');
      $('#trafficlight').load('./trafficlight.php');
    }

    loadlink(); // This will run on page load
    setInterval(function() {
      loadlink() // this will run after every 5 seconds
    }, 2000);
  </script>

</body>

</html>