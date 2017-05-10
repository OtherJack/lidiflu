<?php
// Required Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type:Application/json; charset=UTF8");

//Include Database and object file
include_once 'database.php';
include_once 'product.php';
//instantie database and product object
$database = new Database();
$db = $database->getConnection();

$product= new Product($db);
//Read products
$result = $product->read();
// Check if more than 0 results
if($result > 0){
// products array
$products_arr = array();
$products_arr["records"]=array();

while ($row = $result->fetch(PDO::FETCH_ASSOC)){
	// extract row from the database

	extract($row);
	$product_item=array(
	"id"=> $id,
	"name"=>$name,
	"description" =>html_entity_decode($description),
	"price"=> $price,
	"image_path"=> $image_path,
	"created" => $created,
	"modified_time"=> $modified_time
	
	);
	
	array_push($products_arr["records"],$product_item);
}
echo json_encode($products_arr);
}
	else{
		
	echo json_encode( array("Message" => "No Products Found"));
	}

?>