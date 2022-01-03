<?php
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION["username"])) {
  header("location:../index.php");
}

if ($_SESSION["type"] != "admin") {
  header("location:../index.php");
}

include '../database/config.php';
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="Omnifood is an AI-powered food subscription that will make you eat healthy again, 365 days per year. It's tailored to your personal tastes and nutritional needs." />

  <!-- Always include this line of code!!! -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="icon" href="../img/favicon.png" />
  <link rel="apple-touch-icon" href="../img/apple-touch-icon.png" />
  <link rel="manifest" href="manifest.webmanifest" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="../css/grid.css" />
  <link rel="stylesheet" href="./admin.css" />
  <title>Admin || HKT Shop</title>
</head>

<body>
  <header class="header">
    <a href="#" class="main-nav-link">Dashboard <small>Control Panel</small></a>

    <nav class="main-nav">
      <ul class="main-nav-list">
        <li><a href="admin.php" class="main-nav-link">Home</a></li>
        <li><a href="./pages/product/products_show.php" class="main-nav-link">All Products</a></li>
        <li><a href="./pages/addProduct/add_product.php" class="main-nav-link">Add Product</a></li>
        <li><a href="./pages/editQuantity/edit_quantity.php" class="main-nav-link">Edit Quantity</a></li>
        <?php
        if (isset($_SESSION['username'])) {
          echo '<li><a href="./pages/account/account_admin.php" class="main-nav-link">My Account</a></li>';
          echo '<li><a href="../components/logout.php" class="main-nav-link">Log Out</a></li>';
        } else {
          echo '<li><a href="../pages/login/login.php" class="main-nav-link">Log In</a></li>';
        }
        ?>
      </ul>
    </nav>
  </header>

  <div class="row">
    <div class="col">
      <a href="./pages/addProduct/add_product.php">
        <button>Add Products</button>
      </a>
    </div>
    <div class="col">
      <a href="./pages/editQuantity/edit_quantity.php">
        <button>Edit Quantity</button>
      </a>
    </div>
    <div class="col">
      <a href="./pages/account/account_admin.php">
        <button>My Account</button>
      </a>
    </div>
  </div>
</body>

</html>