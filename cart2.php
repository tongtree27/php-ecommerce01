<?php
session_start();

error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );

$total_count = 0;
$old_carts = array();

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
        <h4><span id="label-cart-total" class="label label-primary">Cart : <?php echo $total_count; ?> Items</span></h4>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <table class="table table-border table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Image</th>
              <th>Code</th>
              <th>Title</th>
              <th>Qty</th>
              <th>Price</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($old_carts as $key => $value) { ?>
            <tr>
              <td><?php echo $key + 1; ?> </td>
              <td>
                <img src="<?php echo $value['image'];?>" class="img-responsive" alt="" style="width: 120px;">
              </td>
              <td><?php echo $value['code']; ?></td>
              <td><?php echo $value['title']; ?></td>
              <td><?php echo $value['qty']; ?></td>
              <td><?php echo $value['price']; ?></td>
              <td><?php echo $value['totalprice']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <div class="clearfix"></div>

        <a href="cart1.php">Go Back </a>
        <a href="cart3.php" class="pull-right">Clear Cart </a>

      </div>
    </div>
  </div>
</body>
</html>
