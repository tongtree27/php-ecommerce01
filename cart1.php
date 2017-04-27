<?php
session_start();

error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );

// print_r($_POST);
// print_r($_SESSION);

$product_list = array(
  1 => array(
    'code' => 'PRO-001',
    'image' => 'images/product01.jpg',
    'title' => 'One Plus 3 Black 32GB',
    'description' => 'One plus 3 , color black , memory 32GB',
    'price' => 13000
  ),
  2 => array(
    'code' => 'PRO-002',
    'image' => 'images/product02.jpg',
    'title' => 'One Plus 3 Black 64GB',
    'description' => 'One plus 3 , color white , memory 32GB',
    'price' => 15000
  )
);

if (isset($_POST) && !empty($_POST['btn-addcart'])) {
  $product_id = intval($_POST['btn-addcart']);
  $old_value = array();
  $product = $product_list[$product_id];

  if (isset($_SESSION['PRODUCTCART']) && count($_SESSION['PRODUCTCART']) > 0) {
    $old_value = $_SESSION['PRODUCTCART'];
    $old_item = $old_value[$product_id];

    if (count($old_item) > 0) {
      $qty = $old_item['qty'] + 1;
      $old_item['qty'] = $qty;
      $old_item['price'] = $product['price'];
      $old_item['totalprice'] = ($product['price'] * $qty);
      $old_item['image'] = $product['image'];
    } else {
      $old_item = array(
        $product_id => array(
          'code' => $product['code'],
          'title' => $product['title'],
          'description' => $product['description'],
          'qty' => 1,
          'price' => $product['price'],
          'totalprice' => ($product['price'] * 1),
          'image' => $product['image']
        )
      );
    }

    // print_r($old_item);

    $old_value[$product_id] = $old_item;
  } else {
    $old_value = array(
      $product_id => array(
        'code' => $product['code'],
        'title' => $product['title'],
        'description' => $product['description'],
        'qty' => 1,
        'price' => $product['price'],
        'totalprice' => ($product['price'] * 1),
        'image' => $product['image']
      )
    );
  }

  $_SESSION['PRODUCTCART'] = $old_value;

  header('location: cart1.php');
  exit();
}

$total_count = 0;
if (isset($_SESSION['PRODUCTCART'])) {
  $old_carts = $_SESSION['PRODUCTCART'];
  foreach ($old_carts as $key => $value) {
    $total_count += $value['qty'];
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<title>Example 01 </title>
<link rel="stylesheet" href="css/bootstrap.min.css?ver=3.3.7" type="text/css" media="all" />
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="pull-right">
        <h4>
          <a href="cart2.php"><span id="label-cart-total" class="label label-primary">Cart : <?php echo $total_count; ?> Items</span></a>
        </h4>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <form class="form-horizontal" action="" method="post">
          <?php foreach ($product_list as $key => $value) { ?>
          <div class="col-sm-4 item">
            <div class="image">
              <img src="<?php echo $value['image'];?>" class="img-responsive" alt="">
            </div>
            <div class="content">
              <h3><?php echo $value['title'];?> </h3>
              <p><?php echo $value['description'];?> </p>
              <h3><span class="label label-danger">Price : <?php echo number_format($value['price'], 2);?></span></h3>
              <button type="submit" id="btn-addcart<?php echo $key;?>" name="btn-addcart" value="<?php echo $key;?>" class="btn btn-primary btn-addcart">Add Cart</button>
            </div>
          </div>
          <?php } ?>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">

      </div>
    </div>
  </div>
</body>
</html>
