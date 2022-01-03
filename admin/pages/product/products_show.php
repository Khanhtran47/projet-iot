<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
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

  <link rel="icon" href="img/favicon.png" />
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
  <link rel="manifest" href="manifest.webmanifest" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../../../css/grid.css" />
  <link rel="stylesheet" href="./products.css" />
  <title>Products || HKT Shop</title>
</head>

<body>

  <header class="header">
    <a href="#" class="main-nav-link">Dashboard <small>Control Panel</small></a>

    <nav class="main-nav">
      <ul class="main-nav-list">
        <li><a href="../../admin.php" class="main-nav-link">Home</a></li>
        <li><a href="./products_show.php" class="main-nav-link">All Products</a></li>
        <li><a href="../addProduct/add_product.php" class="main-nav-link">Add Product</a></li>
        <li><a href="../editQuantity/edit_quantity.php" class="main-nav-link">Edit Quantity</a></li>
        <?php
        if (isset($_SESSION['username'])) {
          echo '<li><a href="../account/account_admin.php" class="main-nav-link">My Account</a></li>';
          echo '<li><a href="../../../components/logout.php" class="main-nav-link">Log Out</a></li>';
        } else {
          echo '<li><a href="../../../pages/login/login.php" class="main-nav-link">Log In</a></li>';
        }
        ?>
      </ul>
    </nav>
  </header>

  <div class="row" style="margin-top:10px;">
    <div>
      <a href="../addProduct/add_product.php">
        <button>Add Products</button>
      </a>
    </div>

    <div class="small">
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

          echo '<div class="columns">';
          echo '<p><h3>' . $obj->product_name . '</h3></p>';
          echo '<div class="product-img-box">';
          echo '<img class="product-img" src="../../../' . $obj->product_img_name . '"/>';
          echo '</div>';
          echo '<div class="product-info">';
          echo '<p><strong>Product Code</strong>: ' . $obj->product_code . '</p>';
          echo '<p><strong>Description</strong>: ' . $obj->product_desc . '</p>';
          echo '<p><strong>Units Available</strong>: ' . $obj->qty . '</p>';
          echo '<p><strong>Price (Per Unit)</strong>: ' . $currency . $obj->price . '</p>';
          echo '</div>';
          echo '<div class="submit">';
          echo '<a href="../productUpdate/product_update.php?up_id=' . $obj->id . '"><input type="submit" value="Updates Product" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a>';
          echo '<a href="../../components/product_delete.php?del_id=' . $obj->id . '"><input type="submit" value="Delete Product" style="clear:both; background: red; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a>';
          echo '</div>';

          echo '</div>';

          $i++;
        }
      }

      $_SESSION['product_id'] = $product_id;


      echo '</div>';
      echo '</div>';
      ?>
</body>

</html>