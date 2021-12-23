<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

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

  <link rel="stylesheet" href="../../../css/style.css" />

  <link rel="stylesheet" href="../../../css/general.css" />
  <title>My Account || HKT Shop</title>
  <link rel="stylesheet" href="../../../css/foundation.css" />
</head>

<body>

  <nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1><a href="#">Dashboard <small>Control Panel</small></a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li><a href="../../admin.php">Home</a></li>
        <li><a href="../product/products_show.php">All Products</a></li>
        <li><a href="../addProduct/add_product.php">Add Product</a></li>
        <li><a href="../editQuantity/edit_quantity.php">Edit Quantity</a></li>
        <?php

        if (isset($_SESSION['username'])) {
          echo '<li class="active"><a href="account_admin.php">My Account</a></li>';
          echo '<li><a href="../../../components/logout.php">Log Out</a></li>';
        } else {
          echo '<li><a href="../../../pages/login/login.php">Log In</a></li>';
        }
        ?>
      </ul>
    </section>
  </nav>

  <div class="row" style="margin-top:30px;">
    <div class="small-12">
      <p><?php echo '<h3>Hi ' . $_SESSION['fname'] . '</h3>'; ?></p>

      <p>
      <h4>Account Details</h4>
      </p>

      <p>Below are your details in the database. If you wish to change anything, then just enter new data in text box and click on update.</p>
    </div>
  </div>


  <form method="POST" action="../../../components/update.php" style="margin-top:30px;">
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