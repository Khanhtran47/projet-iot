<?php
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION["username"])) {
  header("location:index.php");
}

if ($_SESSION["type"] != "admin") {
  header("location:index.php");
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
  <title>Admin || HKT Shop</title>
  <link rel="stylesheet" href="css/foundation.css" />
</head>

<body>

  <nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1><a href="index.php">Dashboard <small>Control Panel</small></a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li><a href="admin.php">Home</a></li>
        <li><a href="products_show.php">All Products</a></li>
        <li class="active"><a href="add_product.php">Add Product</a></li>
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
    <div class="small-12">
      <p>
      <h4>Update Products</h4>
      </p>

      <p>Below are your details in the database. If you wish to change anything, then just enter new data in text box and click on update.</p>
    </div>
  </div>

  <form role="form" action="product_update_handler.php" method="post" enctype="multipart/form-data" style="margin-top:10px;">
    <?php
    $new_id = $_GET['up_id'];

    include 'config.php';

    $sql = "Select * from products WHERE id='$new_id'";

    $results = $mysqli->query($sql);

    $final = $results->fetch_assoc();
    ?>
    <div class="row">
      <div class="small-12">
        <div class="row">
          <div class="small-10 columns">
            <label for="product_code" class="left inline">Product Code</label>
            <input type="text" id="product_code" placeholder="Enter Product Code" name="product_code" value="<?php echo $final['product_code'] ?>">
          </div>
        </div>

        <div class="row">
          <div class="small-10 columns">
            <label for="product_name" class="left inline">Name</label>
            <input type="text" id="product_name" placeholder="Enter Product Name" name="product_name" value="<?php echo $final['product_name'] ?>">
          </div>
        </div>

        <div class="row">
          <div class="small-10 columns">
            <label for="price" class="left inline">Price</label>
            <input type="text" id="price" placeholder="Price" name="price" value="<?php echo $final['price'] ?>">
          </div>
        </div>

        <div class="row">
          <div class="small-10 columns">
            <label for="picture" class="left inline">File Input</label>
            <input type="file" id="product_img_name" name="file" value="<?php echo $final['product_img_name'] ?>">
          </div>
        </div>

        <div class="row">
          <div class="small-10 columns">
            <label for="product_desc" class="left inline">Description</label>
            <textarea id="description" placeholder="Enter Description" rows="10" name="product_desc" value="<?php echo $final['product_desc'] ?>"></textarea>
          </div>
        </div>

        <div class="row">
          <div class="small-4 columns">

          </div>
          <div class="small-8 columns">
            <input type="hidden" value="<?php echo $final['id'] ?>" name="form_id">
            <input type="submit" id="right-label" value="Submit" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
          </div>
        </div>
      </div>
    </div>
  </form>


  <div class="row" style="margin-top:10px;">
    <div class="small-12">
      <footer style="margin-top:10px;">
        <p style="text-align:center; font-size:0.8em;">&copy; HKT Shop. All Rights Reserved.</p>
      </footer>
    </div>
  </div>
</body>

</html>