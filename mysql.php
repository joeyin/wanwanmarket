<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'wanwanmarket');
if (!$connect) {
  echo 'Connection Failed' . mysqli_connect_error();
  exit;
}
?>