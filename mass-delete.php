<?php
require 'ConfigDB.php';

$checkboxes = $_POST['checkboxes'];
foreach ($checkboxes as $item) {
   $element = $link->query('SELECT * FROM Items WHERE id = \'' . $item . '\'')->fetch_array();
   $link->query('DELETE FROM ' . $element['Type'] . ' WHERE LinkToItemId = \'' . $item . '\'');
   $link->query('DELETE FROM Items WHERE id = \'' . $item . '\'');
}

header('Location: /');
