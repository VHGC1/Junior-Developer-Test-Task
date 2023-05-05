<?php
class Product{
  private $conn;
  private $table_name = "products";

  public $sku;
  public $name;
  public $price;
  public $type;
  public $attribute;

  public function __construct($db){
    $this->conn = $db;
  }

  public function setSku($sku){
    $this->sku = $sku;
  }

  public function setName($name){
    $this->name = $name;
  }

  public function setType($type){
    $this->type = $type;
  }

  public function setPrice($price){
    $this->price = $price;
  }

  public function setWeigth($weight){
    $this->attribute = $weight;
  }

  public function setSize($size){
    $this->attribute = $size;
  }

  public function setDimensions($height, $width, $length){
    $this->attribute = "{$height}x{$width}x{$length}";
  }

  function create(){
    
    $query = "INSERT INTO
      " . $this->table_name . "
      SET
        sku=:sku, name=:name, price=:price, type=:type, attribute=:attribute";

    $stmt = $this->conn->prepare($query);

    $this->sku = htmlspecialchars(strip_tags($this->sku));
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->price = htmlspecialchars(strip_tags($this->price));
    $this->type = htmlspecialchars(strip_tags($this->type));
    $this->attribute = htmlspecialchars(strip_tags($this->attribute));
    
    $stmt->bindParam(":sku", $this->sku);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":price", $this->price);
    $stmt->bindParam(":type", $this->type);
    $stmt->bindParam(":attribute", $this->attribute);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  function delete($id){
    
    $query = "DELETE FROM products WHERE id='{$id}'";
    
    $stmt = $this->conn->prepare($query);
   
    $stmt->execute();
  }

  function getProducts(){
    $products = [];

    $query = "SELECT * FROM products";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      array_push($products, $row);
    }
    return $products;
  }  
}

class book extends Product{
  function __construct($db){
    parent::__construct($db);
  }

  public function getSpecs($arr){
    $this->setSku($arr['sku']);
    $this->setName($arr['name']);
    $this->setPrice(number_format((float)$arr['price'],2));
    $this->setType($arr['Type-Switcher'] . "s");
    $this->setWeigth($arr['weight']);
    var_dump($arr);

    return $this->create();
  } 
}

class dvd extends Product {
  function __construct($db){
    parent::__construct($db);
  }

  public function getSpecs($arr){
    $this->setSku($arr['sku']);
    $this->setName($arr['name']);
    $this->setPrice(number_format((float)$arr['price'],2));
    $this->setType($arr['Type-Switcher'] . "s");
    $this->setSize($arr['size']);

    return $this->create();
  }
}

class furniture extends Product {
  function __construct($db){
    parent::__construct($db);
  }

  public function getSpecs($arr){
    $this->setSku($arr['sku']);
    $this->setName($arr['name']);
    $this->setPrice(number_format((float)$arr['price'],2));
    $this->setType($arr['Type-Switcher'] . "s");
    $this->setDimensions($arr['height'],$arr['width'],$arr['length']);

    return $this->create();
  }
}


 
