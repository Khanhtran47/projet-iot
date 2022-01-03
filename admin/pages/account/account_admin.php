<?php

if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION["username"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=../../admin.php");
}

include '../../../database/config.php';

?>


<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Omnifood is an AI-powered food subscription that will make you eat healthy again, 365 days per year. It's tailored to your personal tastes and nutritional needs." />

  <!-- Always include this line of code!!! -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="icon" href="../../../img/favicon.png" />
  <link rel="apple-touch-icon" href="../../../img/apple-touch-icon.png" />
  <link rel="manifest" href="manifest.webmanifest" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="../../../css/grid.css" />
  <link rel="stylesheet" href="./account_admin.css" />
  <title>My Account || HKT Shop</title>
</head>

<body>

  <header class="header">
    <a href="#" class="main-nav-link">Dashboard <small>Control Panel</small></a>

    <nav class="main-nav">
      <ul class="main-nav-list">
        <li><a href="../../admin.php" class="main-nav-link">Home</a></li>
        <li><a href="../product/products_show.php" class="main-nav-link">All Products</a></li>
        <li><a href="../addProduct/add_product.php" class="main-nav-link">Add Product</a></li>
        <li><a href="../editQuantity/edit_quantity.php" class="main-nav-link">Edit Quantity</a></li>
        <?php
        if (isset($_SESSION['username'])) {
          echo '<li><a href=".account_admin.php" class="main-nav-link">My Account</a></li>';
          echo '<li><a href="../../../components/logout.php" class="main-nav-link">Log Out</a></li>';
        } else {
          echo '<li><a href="../../../pages/login/login.php" class="main-nav-link">Log In</a></li>';
        }
        ?>
      </ul>
    </nav>
  </header>

  <div class="container-form right-panel-active" id="containerSignIn">
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <?php echo '<h1>Hi! ' . $_SESSION['fname'] . '</h1>' ?>
          <p>Here are your details in the database. If you wish to change anything, then just enter new data in text box and click on update.</p>
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

          echo '<button type="reset" id="right-label" value="Reset">Reset</button>';
          echo '<button type="submit" id="right-label" value="Update">Update</button>';
        }
        ?>
      </form>
    </div>
  </div>

</body>

</html>