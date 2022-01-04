<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

require_once '../phpmailer/Exception.php';
require_once '../phpmailer/PHPMailer.php';
require_once '../phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);
$my_email = getenv('MY_EMAIL');
$my_email_password = getenv('MY_EMAIL_PASSWORD');

$alert = '';

include '../database/config.php';

if (isset($_SESSION['cart'])) {

  $total = 0;

  foreach ($_SESSION['cart'] as $product_id => $quantity) {

    $result = $mysqli->query("SELECT * FROM products WHERE id = " . $product_id);

    if ($result) {

      if ($obj = $result->fetch_object()) {
        $cost = $obj->price * $quantity;

        $user = $_SESSION["username"];

        $query = $mysqli->query("INSERT INTO orders (product_code, product_name, product_desc, price, units, total, email) VALUES('$obj->product_code', '$obj->product_name', '$obj->product_desc', $obj->price, $quantity, $cost, '$user')");

        if ($query) {
          $newqty = $obj->qty - $quantity;
          if ($mysqli->query("UPDATE products SET qty = " . $newqty . " WHERE id = " . $product_id)) {
          }
        }

        //send mail script
        $query = $mysqli->query("SELECT * FROM orders ORDER BY id DESC LIMIT 1");
        if ($query) {
          while ($obj = $query->fetch_object()) {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $my_email; // Gmail address which you want to use as SMTP server
            $mail->Password = $my_email_password; // Gmail address Password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = '465';
            $mail->setFrom("" . $my_email . ""); // Gmail address which you used as SMTP server
            $mail->addAddress('' . $user . ''); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

            $mail->isHTML(true);

            $mail->Subject = "Your Order ID " . $obj->id;
            $mail->Body = "<h3>Order ID -> $obj->id <br> <strong>Date of Purchase</strong>: $obj->date <br> <strong>Product Code</strong>: $obj->product_code <br> <strong>Product Name</strong>: $obj->product_name <br> <strong>Price Per Unit</strong>: $obj->price <br> <strong>Units Bought</strong>: $obj->units <br> <strong>Total Cost</strong>: $obj->total </h3>";
            $mail->send();

            if ($mail) {
              echo "<script>alert('Mail Send.');</script>";
            } else {
              echo "<script>alert('Mail Not Send.');</script>";
            }
          }
        }
      }
    }
  }
}

unset($_SESSION['cart']);
header("location:../pages/success/success.php");
