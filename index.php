<?php
require_once('./mysql.php');
$query = 'SELECT c.name AS category, p.* FROM products p JOIN categories c ON p.catId = c.id';
$result = mysqli_query($connect, $query);
if (!$result) {
  echo 'Query Failed' . mysqli_error($connect);
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charSet="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WanWanMarket</title>
  <!-- Add the Play CDN script tag to the <head> of your HTML file, and start using Tailwind’s utility classes to style your content.-->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      corePlugins: {
        visibility: false
      }
    }
  </script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>

<body>
  <?php include_once('./layout/header.php') ?>
  <main class="container my-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-4">
        <li class="breadcrumb-item text-capitalize active" aria-current="page">Home</li>
      </ol>
    </nav>
    <div class="grid grid-cols-2 xl:grid-cols-4 gap-4">
      <?php foreach ($result as $product) : ?>
        <a
          title="<?php echo $product['name'] ?>"
          href="edit.php?id=<?php echo $product['id'] ?>">
          <img class="border-1 rounded-lg mb-1 p-3 product-image object-center object-contain transition-all hover:border-orange-300" src="<?php echo json_decode($product['images'])[0] ?>" alt="<?php echo $product['name'] ?>" aria-label="<?php echo $product['name'] ?>">
          <div class="font-semibold text-base mb-1"><?php echo $product['name'] ?></div>
          <div class="mb-1 d-inline-flex align-items-center">
            <span class="text-danger fw-bolder fs-5">$<?php echo $product['price'] ?>&nbsp;</span>
            <span class="text-secondary fw-light fs-6">/&nbsp;<?php echo $product['unit'] ?></span>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </main>
  <?php include_once('./layout/footer.php') ?>
</body>

</html>