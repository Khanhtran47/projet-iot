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
          echo '<li><a href="../orders/orders.php" class="main-nav-link">My Orders</a></li>';
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





  <div class="row" style="margin-top:30px;">
    <div class="small-12">
      <p><?php echo '<h3>Hi ' . $_SESSION['fname'] . '</h3>'; ?></p>

      <p>
      <h4>Account Details</h4>
      </p>

      <p>Below are your details in the database. If you wish to change anything, then just enter new data in text box and click on update.</p>
    </div>
  </div>


  <form method="POST" action="update.php" style="margin-top:30px;">
    <div class="row">
      <div class="small-12">

        <div class="row">
          <div class="small-3 columns">
            <label for="right-label" class="right inline">First Name</label>
          </div>
          <div class="small-8 columns end">
            <?php

            $result = $mysqli->query('SELECT * FROM users WHERE id=' . $_SESSION['id']);

            if ($result === FALSE) {
              die(printf("Error message: %s\n", $mysqli->error));
            }

            if ($result) {
              $obj = $result->fetch_object();
              echo '<input type="text" id="right-label" placeholder="' . $obj->fname . '" name="fname">';

              echo '</div>';
              echo '</div>';

              echo '<div class="row">';
              echo '<div class="small-3 columns">';
              echo '<label for="right-label" class="right inline">Last Name</label>';
              echo '</div>';
              echo '<div class="small-8 columns end">';

              echo '<input type="text" id="right-label" placeholder="' . $obj->lname . '" name="lname">';

              echo '</div>';
              echo '</div>';

              echo '<div class="row">';
              echo '<div class="small-3 columns">';
              echo '<label for="right-label" class="right inline">Address</label>';
              echo '</div>';
              echo '<div class="small-8 columns end">';
              echo '<input type="text" id="right-label" placeholder="' . $obj->address . '" name="address">';



              echo '</div>';
              echo '</div>';

              echo '<div class="row">';
              echo '<div class="small-3 columns">';
              echo '<label for="right-label" class="right inline">City</label>';
              echo '</div>';
              echo '<div class="small-8 columns end">';
              echo '<input type="text" id="right-label" placeholder="' . $obj->city . '" name="city">';
              echo '</div>';
              echo '</div>';

              echo '<div class="row">';
              echo '<div class="small-3 columns">';
              echo '<label for="right-label" class="right inline">Pin Code</label>';
              echo '</div>';
              echo '<div class="small-8 columns end">';

              echo '<input type="text" id="right-label" placeholder="' . $obj->pin . '" name="pin">';

              echo '</div>';
              echo '</div>';

              echo '<div class="row">';
              echo '<div class="small-3 columns">';
              echo '<label for="right-label" class="right inline">Email</label>';
              echo '</div>';

              echo '<div class="small-8 columns end">';


              echo '<input type="email" id="right-label" placeholder="' . $obj->email . '" name="email">';

              echo '</div>';
              echo '</div>';
            }



            echo '<div class="row">';
            echo '<div class="small-3 columns">';
            echo '<label for="right-label" class="right inline">Password</label>';
            echo '</div>';
            echo '<div class="small-8 columns end">';
            echo '<input type="password" id="right-label" name="pwd">';

            echo '</div>';
            echo '</div>';
            ?>

            <div class="row">
              <div class="small-4 columns">

              </div>
              <div class="small-8 columns">
                <input type="submit" id="right-label" value="Update" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
                <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              </div>
            </div>
          </div>
        </div>
  </form>



  <div class="row" style="margin-top:30px;">
    <div class="small-12">

      <footer>
        <p style="text-align:center; font-size:0.8em;">&copy; HKT Shop. All Rights Reserved.</p>
      </footer>

    </div>
  </div>
</body>

</html>