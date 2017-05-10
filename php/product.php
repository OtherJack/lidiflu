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


public function create(){
    
 
    // query to insert record
   $stmt = $this->conn->prepare("INSERT INTO " . $this->table_name . "(name, description, price, image_path, created) VALUES (?, ?, ?, ?, ?)");
    
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->price=htmlspecialchars(strip_tags($this->price));
    $this->descript=htmlspecialchars(strip_tags($this->description));
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