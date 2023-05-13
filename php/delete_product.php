<?php
	include_once $_SERVER['DOCUMENT_ROOT']. '/config/database.php';
	include_once $_SERVER['DOCUMENT_ROOT']. '/model/product.php';
	
	$database = new Database();
	$db = $database->getConnection();

	$product = new Product($db);

	if (isset($_POST['toDelete']) and $_POST['toDelete'] != "") {
		$elementsToDelete = $_POST['toDelete'];
		$elementsIndividual = explode("-",$elementsToDelete);
		foreach($elementsIndividual as $element){	
			$elementMap = explode("_",$element);
			$product->delete($element);
		}
		header("Location: ../index.php");
    exit;
	}
	header("Location: ../index.php");
  exit;
?>
