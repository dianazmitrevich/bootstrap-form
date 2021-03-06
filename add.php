<?php
require 'configDB.php';

$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$type = $_POST['type-container'];
$size = $_POST['size'];
$height = $_POST['height'];
$width = $_POST['width'];
$length = $_POST['length'];
$weight = $_POST['weight'];

if (!$link) {
   printf('Cannot connect to database. Error code: %s\n', mysqli_connect_error());
   exit;
}

$skuResult = mysqli_query($link, 'SELECT * FROM Items WHERE SKU = \'' . $sku . '\'');
$skuFound = mysqli_fetch_assoc($skuResult);
mysqli_free_result($skuResult);

if ($skuFound) {
   $err['invalid_SKU'] = '<div class="alert alert-warning">Item with this SKU already exists. Please, choose another one.</div>';
} else if ($sku != '') {
   $link->query('INSERT INTO Items(SKU, Name, Price, Type) VALUES (' . $sku . ', "' . $name . '", ' . $price . ', "' . $type . '")');

   $result = $link->query('SELECT id FROM Items WHERE SKU = \'' . $sku . '\'')->fetch_array();
   $itemId = $result['id'];

   if ($type == 'DVD')
      $link->query('INSERT INTO DVD(Size, LinkToItemId) VALUES (' . $size . ', "' . $itemId . '")');
   else if ($type == 'Furniture')
      $link->query('INSERT INTO Furniture(Height, Width, Length, LinkToItemId) VALUES (' . $height . ', ' . $width . ', ' . $length . ', "' . $itemId . '")');
   else if ($type == 'Book')
      $link->query('INSERT INTO Book(Weight, LinkToItemId) VALUES (' . $weight . ', "' . $itemId . '")');

   header('Location: /');
}
