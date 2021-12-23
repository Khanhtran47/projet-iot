<?php

include '../../database/config.php';

$product_code = $_POST['product_code'];
$price = $_POST['price'];
$product_desc = $_POST['product_desc'];
$product_name = $_POST['product_name'];

$target = "uploads/";
$file_path = $target . basename($_FILES['file']['name']);
$file_name = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];
$file_store = "uploads/" . $file_name;

move_uploaded_file($file_tmp, $file_store);

$result = "INSERT INTO products (product_code, product_name, product_desc, product_img_name, price) VALUES ('$product_code', '$product_name', '$product_desc', '$file_path', '$price')";

$mysqli->query($result);

header('location: ../pages/product/products_show.php');
