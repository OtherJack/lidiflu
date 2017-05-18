<?php
// check if value was posted
if($_POST){
 
    // include database and object file
    include_once 'database.php';
    include_once 'product.php';
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare product object
    $product = new Product($db);
     
    // set product id to be deleted
    $product->id = $_POST['id'];
     
    // delete the product
    if($product->delete()){
        echo "Product was deleted.";
    }
     
    // if unable to delete the product
    else{
        echo "Unable to delete object.";
    }
}

?>