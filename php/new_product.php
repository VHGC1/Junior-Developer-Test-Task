<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT']. '/objects/product.php';

$database = new Database();
$db = $database->getConnection();

if ($_POST) {
  $newObject = new $_POST['Type-Switcher']($db);
  
  if ($newObject->getSpecs($_POST)) {
    header('Location: /index.php');
  } else {
    header('Location: /add-product.html');
  }
}

