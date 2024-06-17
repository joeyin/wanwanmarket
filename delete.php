<?php
require_once('./mysql.php');
$productId = intval($_GET['id']);

//validation
if (!$productId) {
  return http_response_code(400);
}

$query = "DELETE FROM products WHERE id = " . $productId;
$result = mysqli_query($connect, $query);
if (!$result) {
  echo 'Query Failed' . mysqli_error($connect);
  exit;
}
echo "<script>location.href='./'</script>";