<?php
include 'config.php';
$newid = $_GET['del_id'];

$sql = "Delete from products where id='$newid'";

if (mysqli_query($mysqli, $sql)) {
  header('location: products_show.php');
} else {
  echo "Not Deleted";
}
