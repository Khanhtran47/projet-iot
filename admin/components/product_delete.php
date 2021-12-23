<?php
include '../../database/config.php';
$newid = $_GET['del_id'];

$sql = "DELETE FROM products WHERE id='$newid'";

if (mysqli_query($mysqli, $sql)) {
  header('location: ../pages/product/products_show.php');
} else {
  echo "Not Deleted";
}
