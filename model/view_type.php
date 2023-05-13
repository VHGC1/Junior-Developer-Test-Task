<?php 
class books {
  function typeHandler($attribute){
    return "<p>Weight: {$attribute} KG<p>";
  }
}

class dvds {
  function typeHandler($attribute){
    return "<p>Size: {$attribute} MB<p>";
  }
}

class furnitures {
  function typeHandler($attribute){
    return "<p>Dimensions: {$attribute}<p>";
  }
}
?>