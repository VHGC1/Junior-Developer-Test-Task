<?php

class book extends Product{
  function __construct($db){
    parent::__construct($db);
  }

  public function setSpecs($arr){
    $this->setSku($arr['sku']);
    $this->setName($arr['name']);
    $this->setPrice(number_format((float)$arr['price'],2));
    $this->setType($arr['Type-Switcher'] . "s");
    $this->setWeigth($arr['weight']);

    return $this->create();
  } 
}