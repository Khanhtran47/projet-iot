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
  <link rel="stylesheet" href="../../../css/grid.css" />
  <link rel="stylesheet" href="./product_update.css" />
  <title>Admin || HKT Shop</title>
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
          echo '<li><a href="../account/account_admin.php" class="main-nav-link">My Account</a></li>';
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
          <h1>Update Products</h1>
          <p>Here are your details in the database. If you wish to change anything, then just enter new data in text box and click on update.</p>
        </div>
      </div>
    </div>

    <div class="form-container sign-up-container">
      <form role="form" action="../../components/product_update_handler.php" method="post" enctype="multipart/form-data">
        <?php
        $new_id = $_GET['up_id'];

        include '../../../database/config.php';

        $sql = "Select * from products WHERE id='$new_id'";

        $results = $mysqli->query($sql);

        $final = $results->fetch_assoc();
        ?>

        <input type="text" id="product_code" placeholder="Enter Product Code" name="product_code" value="<?php echo $final['product_code'] ?>">
        <input type="text" id="product_name" placeholder="Enter Product Name" name="product_name" value="<?php echo $final['product_name'] ?>">
        <input type="text" id="price" placeholder="Price" name="price" value="<?php echo $final['price'] ?>">
        <input type="file" id="product_img_name" name="file" value="<?php echo $final['product_img_name'] ?>">
        <textarea id="description" placeholder="Enter Description" rows="10" name="product_desc" value="<?php echo $final['product_desc'] ?>"></textarea>
        <input type="hidden" value="<?php echo $final['id'] ?>" name="form_id">
        <input type="submit" id="right-label" value="Submit" style="background: #1abc9c; cursor: pointer;">
      </form>
    </div>
  </div>
</body>

</html>