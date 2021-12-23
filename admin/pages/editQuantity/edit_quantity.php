<?php
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION["username"])) {
  header("location:../../../index.php");
}

if ($_SESSION["type"] != "admin") {
  header("location:../../../index.php");
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

  <link rel="stylesheet" href="../../../css/style.css" />

  <link rel="stylesheet" href="../../../css/general.css" />
  <title>Edit Quantity || HKT Shop</title>
  <link rel="stylesheet" href="../../../css/foundation.css" />
</head>

<body>

  <nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1><a href="../../admin.php">Dashboard <small>Control Panel</small></a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li><a href="../../admin.php">Home</a></li>
        <li><a href="../product/products_show.php">All Products</a></li>
        <li><a href="../addProduct/add_product.php">Add Product</a></li>
        <li class="active"><a href="edit_quantity.php">Edit Quantity</a></li>
        <?php

        if (isset($_SESSION['username'])) {
          echo '<li><a href="../account/account_admin.php">My Account</a></li>';
          echo '<li><a href="../../../components/logout.php">Log Out</a></li>';
        } else {
          echo '<li><a href="../../../pages/login/login.php">Log In</a></li>';
        }
        ?>
      </ul>
    </section>
  </nav>


  <div class="row" style="margin-top:10px;">
    <div class="large-12">
      <?php
      $result = $mysqli->query("SELECT * from products order by id asc");
      if ($result) {
        while ($obj = $result->fetch_object()) {
          echo '<div class="large-4 columns">';
          echo '<p><h3>' . $obj->product_name . '</h3></p>';
          echo '<img src="../../../' . $obj->product_img_name . '"/>';
          echo '<p><strong>Product Code</strong>: ' . $obj->product_code . '</p>';
          echo '<p><strong>Description</strong>: ' . $obj->product_desc . '</p>';
          echo '<p><strong>Units Available</strong>: ' . $obj->qty . '</p>';
          echo '<div class="large-6 columns" style="padding-left:0;">';
          echo '<form method="post" name="update-quantity" action="../../components/admin-update.php">';
          echo '<p><strong>New Qty</strong>:</p>';
          echo '</div>';
          echo '<div class="large-6 columns">';
          echo '<input type="number" name="quantity[]"/>';

          echo '</div>';
          echo '</div>';
        }
      }
      ?>
    </div>
  </div>


  <div class="row" style="margin-top:10px;">
    <div class="small-12">
      <center>
        <p><input style="clear:both;" type="submit" class="button" value="Update"></p>
      </center>
      </form>
      <footer style="margin-top:10px;">
        <p style="text-align:center; font-size:0.8em;">&copy; HKT Shop. All Rights Reserved.</p>
      </footer>
    </div>
  </div>
</body>

</html>