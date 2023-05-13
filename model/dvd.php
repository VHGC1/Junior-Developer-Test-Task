<?php

class dvd extends Product {
  function __construct($db){
    parent::__construct($db);
  }

  public function setSpecs($arr){
    $this->setSku($arr['sku']);
    $this->setName($arr['name']);
    $this->setPrice(number_format((float)$arr['price'],2));
    $this->setType($arr['Type-Switcher'] . "s");
    $this->setSize($arr['size']);

    return $this->create();
  }
}