<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object file
include_once '../config/database.php';
include_once '../objects/product.php';

// instantiate Database and Product objects
$database = new Database();
$db = $database->getConnection();

// initialise product object
$product = new Product($db);

//read products
$result = $product->read();


// check if more than 0 record found
if($result){
    
    
    // products array
    $products_arr=array();
    $products_arr["records"]=array();
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    
        // extract row
        // this will make $row['name'] to
        // just $name only

    extract($row);
 
        $product_item =array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "image_path" => $image_path,
            "created" => $created,
            "modified"=> $modified
        );
    array_push($products_arr["records"], $product_item);
      }

      echo json_encode($products_arr);
}
  else
     {
        echo json_encode(
        array("message" => "No products found.")
    ); 
         
     }

?>