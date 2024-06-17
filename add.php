<?php
require_once('./mysql.php');

// POST - create the product
if ($_POST) {
  $p_price = floatval($_POST['price']);
  $p_unit = in_array($_POST['unit'], array('ea', '100g', '1lb'));
  $p_cat = intval($_POST['category']);
  $p_date = date($_POST['listingDate']);

  if ($p_cat && $_POST['name'] && $_POST['images'] && $p_unit && $p_price && $p_date) {
    $query = "INSERT INTO products (images, catId, name, unit, price, slogan, description, listingDate) VALUES ('" .
    json_encode($_POST['images']) . "', '" .
    $p_cat . "', '" .
    htmlentities($_POST['name'], ENT_QUOTES) . "', '" .
    $_POST['unit'] . "', '" .
    $p_price . "', '" .
    htmlentities($_POST['slogan'], ENT_QUOTES) . "', '" .
    htmlentities($_POST['description'], ENT_QUOTES) . "', '" .
    $p_date . "')";
    $result = mysqli_query($connect, $query);
    if (!$result) {
      echo 'Query Failed' . mysqli_error($connect);
      exit;
    }
    echo "<script>location.href='./'</script>";
  } else {
    return http_response_code(400);
  }
}

//query cateogry
$query_cat = 'SELECT * FROM categories';
$result_cat = mysqli_query($connect, $query_cat);
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
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>

<body>
  <?php include_once('./layout/header.php') ?>
  <main class="container my-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-4 flex">
        <li class="breadcrumb-item">
          <a href="./" title="Home">Home</a>
        </li>
        <li class="breadcrumb-item text-capitalize active flex-1 truncate" aria-current="page">
          New Product
        </li>
      </ol>
    </nav>
    <form method="post" action="add.php" class="needs-validation" noValidate>
      <div class="mb-3">
        <label for="name" class="form-label required">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="" placeholder="Please enter the product name" required>
        <div class="invalid-feedback">
          Please enter the product name
        </div>
      </div>
      <div class="mb-3">
        <label for="listingDate" class="form-label required">Listing Date</label>
        <!--
        W3C-Validator Error: Attribute placeholder is only allowed when the input type is email, number, password, search, tel, text, or url. 
        https://stackoverflow.com/questions/20321202/not-showing-placeholder-for-input-type-date-field
        -->
        <input class="form-control" id="listingDate" onfocus="(this.type='date')" onblur="(this.type='text')" name="listingDate" placeholder="Please select the product listing date" required>
      </div>
      <div class="mb-3">
        <label for="category" class="form-label required">Category</label>
        <select name="category" class="form-select" id="category">
          <?php foreach ($result_cat as $cat) : ?>
            <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="slogan" class="form-label">Slogan</label>
        <textarea class="form-control" id="slogan" name="slogan" rows="5" placeholder="Please enter the product slogan"></textarea>
      </div>
      <div class="mb-3">
        <label for="images" class="form-label required flex align-items-center">
          Images
          <span id="image-add" class="ms-2 btn btn-outline-warning btn-sm">
            <i class="fas fa-plus"></i> Add Image
          </span>
        </label>
        <div class="input-group mb-1">
          <span class="input-group-text">
            <i class="fas fa-image"></i>
          </span>
          <input type="url" class="form-control" id="images<?php echo $i ?>" name="images[]" value="" placeholder="Please enter the product image url" <?php echo $i === 0 ? 'required' : '' ?>>
          <div class="invalid-feedback">
            Please enter the product image URL; it must have at least one image.
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label for="unit" class="form-label">Unit</label>
        <select name="unit" class="form-select" id="unit">
          <option value="1lb">1lb</option>
          <option value="100g">100g</option>
          <option value="ea">ea</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label required">Price</label>
        <input type="number" min="0" step="0.01" class="form-control" name="price" id="price" value="" placeholder="Please enter the product price" required>
        <div class="invalid-feedback">
          Please enter the product price.
        </div>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" rows="16" name="description" placeholder="Please enter the product description"></textarea>
      </div>
      <div class="flex justify-content-end">
        <button type="submit" class="btn btn-lg btn-primary px-5 btn-warning text-light">Submit</button>
      </div>
    </form>
  </main>
  <?php include_once('./layout/footer.php') ?>
  <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
  <script src="./js/script.js"></script>
</body>

</html>