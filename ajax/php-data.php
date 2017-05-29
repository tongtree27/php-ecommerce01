<?php
header('Content-Type: application/json');

if ($_GET['param1'] !== 'getproductlist') {
  echo json_encode(array());
  die();
}

$product_list = array(
  array(
    'id' => 1,
    'code' => 'PRO-001',
    'image' => '../images/product01.jpg',
    'title' => 'One Plus 3 Black 32GB',
    'description' => 'One plus 3 , color black , memory 32GB',
    'price' => 13000,
    'qty' => 20,
    'vatinclude' => 'Y'
  ),
  array(
    'id' => 2,
    'code' => 'PRO-002',
    'image' => '../images/product02.jpg',
    'title' => 'One Plus 3 Black 64GB',
    'description' => 'One plus 3 , color white , memory 64GB',
    'price' => 15000,
    'qty' => 20,
    'vatinclude' => 'N'
  ),
  array(
    'id' => 3,
    'code' => 'PRO-003',
    'image' => '../images/product03.jpg',
    'title' => 'One Plus 3 Black 128GB',
    'description' => 'One plus 3 , color white , memory 128GB',
    'price' => 18000,
    'qty' => 20,
    'vatinclude' => 'I'
  )
);

echo json_encode($product_list);
die();
