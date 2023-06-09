<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT']. '/model/product.php';
include_once $_SERVER['DOCUMENT_ROOT']. '/model/book.php';
include_once $_SERVER['DOCUMENT_ROOT']. '/model/dvd.php';
include_once $_SERVER['DOCUMENT_ROOT']. '/model/furniture.php';

$database = new Database();
$db = $database->getConnection();

if ($_POST) {
  $newObject = new $_POST['Type-Switcher']($db);
  
  try {
    if($newObject->setSpecs($_POST)) {
      header('Location: /index.php');
    } 
  }
  catch (Exception $e) {
    echo "<script>alert('{$e->getMessage()}')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/styles/product.css" />
    <title>Add Product</title>
  </head>
  <body>
    <main>
      <form
        id="product_form"
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
        method="post"
      >
        <header>
          <h1>Add Product</h1>
          <div>
            <button type="submit" class="button save_button">Save</button>
            <a href="index.php" class="button cancel_button">Cancel</a>
          </div>
        </header>
        <hr />
        <div class="form-container">
          <div class="form-control">
            <label for="sku">SKU</label>
            <input name="sku" id="sku" type="text" pattern="^[a-zA-Z0-9]*$" required/>
            <label for="name">Name</label>
            <input name="name" id="name" type="text" pattern="^[a-zA-Z0-9]*$" required/>
            <label for="price">Price ($)</label>
            <input name="price" id="price" type="text" pattern="^[0-9]*$" required/>
            <label for="Type-Switcher">Type Switcher</label>
            <select name="Type-Switcher" id="productType">
              <option id="Book" value="book">Book</option>
              <option id="DVD" value="dvd">DVD</option>
              <option id="Furniture" value="furniture">Furniture</option>
            </select>
            <div id="type" class="type">
            </div>
          </div>
        </div>
      </form>
      <hr />
    </main>
    <footer>
      <span>Scandiweb Test assignment</span>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/type.js"></script>
  </body>
</html>
