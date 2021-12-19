<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}
include 'config.php';
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

  <link rel="stylesheet" href="css/style.css" />

  <link rel="stylesheet" href="css/general.css" />
  <title>Products || HKT Shop</title>
  <link rel="stylesheet" href="css/foundation.css" />
</head>

<body>

  <nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1><a href="index.php">HKT Shop</a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li><a href="admin.php">Home</a></li>
        <li class="active"><a href="products_show.php">All Products</a></li>
        <li><a href="add_product.php">Add Product</a></li>
        <li><a href="edit_quantity.php">Edit Quantity</a></li>
        <?php
        if (isset($_SESSION['username'])) {
          echo '<li><a href="account_admin.php">My Account</a></li>';
          echo '<li><a href="logout.php">Log Out</a></li>';
        } else {
          echo '<li><a href="login.php">Log In</a></li>';
          echo '<li><a href="register.php">Register</a></li>';
        }
        ?>
      </ul>
    </section>
  </nav>

  <div class="row" style="margin-top:10px;">
    <div class="row">
      <div class="col-sm-9">
        <a href="add_product.php">
          <button>Add Products</button>
        </a>
      </div>
    </div>

    <div class="small-12">
      <?php
      $i = 0;
      $product_id = array();
      $product_quantity = array();

      $result = $mysqli->query('SELECT * FROM products');
      if ($result === FALSE) {
        die(printf("Error message: %s\n", $mysqli->error));
      }

      if ($result) {

        while ($obj = $result->fetch_object()) {

          echo '<div class="large-4 columns">';
          echo '<p><h3>' . $obj->product_name . '</h3></p>';
          echo '<img src="' . $obj->product_img_name . '"/>';
          echo '<p><strong>Product Code</strong>: ' . $obj->product_code . '</p>';
          echo '<p><strong>Description</strong>: ' . $obj->product_desc . '</p>';
          echo '<p><strong>Units Available</strong>: ' . $obj->qty . '</p>';
          echo '<p><strong>Price (Per Unit)</strong>: ' . $currency . $obj->price . '</p>';
          echo '<a href="product_update.php?up_id=' . $obj->id . '"><input type="submit" value="Updates Product" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a>';
          echo '<a href="product_delete.php?del_id=' . $obj->id . '"><input type="submit" value="Delete Product" style="clear:both; background: red; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a>';

          echo '</div>';

          $i++;
        }
      }

      $_SESSION['product_id'] = $product_id;


      echo '</div>';
      echo '</div>';
      ?>

      <div class="row" style="margin-top:10px;">
        <div class="small-12">
          <footer style="margin-top:10px;">
            <p style="text-align:center; font-size:0.8em;clear:both;">&copy; HKT Shop. All Rights Reserved.</p>
          </footer>
        </div>
      </div>
</body>

</html>