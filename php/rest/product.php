<?php

class Product{
	//Database connection
private $conn;
private $table_name ="product";

	
    public $id;
    public $name;
    public $description;
    public $price;	
    public $image_path;
    public $created;
    public $modified_time;


//Constructer

public function __construct($db){
$this->conn = $db;	
}
public function read(){
	
	
	$query ="SELECT * FROM " .$this ->table_name ."";
	$result = $this->conn->query($query);
	return $result;
}

   function readOne(){
 
    // query to read single record
    $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind id of product to be updated
    $stmt->bindParam(1, $this->id);
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->name = $row['name'];
    $this->description = $row['description'];
    $this->price = $row['price'];
    $this->category_id = $row['image_path'];
    $this->category_name = $row['created'];
}
  
  
  
  // update the product
    function update(){
 
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                description = :description,
                price = :price,
                image_path = :image_path
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->price=htmlspecialchars(strip_tags($this->price));
    $this->image_path=htmlspecialchars(strip_tags($this->image_path));
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind new values
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':image_path', $this->image_path);
    $stmt->bindParam(':id', $this->id);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

public function create(){
    
 
    // query to insert record
   $stmt = $this->conn->prepare("INSERT INTO " . $this->table_name . "(name, description, price, image_path, created) VALUES (?, ?, ?, ?, ?)");
    
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
     $this->descript=htmlspecialchars(strip_tags($this->description));
    $this->price=htmlspecialchars(strip_tags($this->price));
    $this->image_path=htmlspecialchars(strip_tags($this->image_path));
    $this->created=htmlspecialchars(strip_tags($this->created));
 
    // bind values
    
    $stmt->bind_param("ssdss", $name, $description, $price, $image_path, $created);
    
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}
      
    
    
}

?>