<?php

if (session_id() == '' || !isset($_SESSION)) {
  session_start();
}

include 'config.php';

$new_id = $_POST['form_id'];
$new_code = $_POST['product_code'];
$new_name = $_POST['product_name'];
$new_price = $_POST['price'];
$new_desc = $_POST['product_desc'];

$target = "uploads/";
$file_path = $target . basename($_FILES['file']['name']);
$file_name = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];
$file_store = "uploads/" . $file_name;

move_uploaded_file($file_tmp, $file_store);

$sql = "UPDATE products SET product_code='$new_code', product_name='$new_name', product_desc='$new_desc', product_img_name='$file_path', price='$new_price' WHERE id='$new_id'";

if (mysqli_query($mysqli, $sql)) {
  header('location: products_show.php');
} else {
  header('location: admin.php');
}
