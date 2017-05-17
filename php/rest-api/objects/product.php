<?php

class Product {
   
   // database coection and table name
    private $conn;
    private $table_name ="products";
    
    // Object properties
    public $id;
    public $name;
    public $description;
    public $price;
    public $image_path;
    public $created;
    public $modified;
  
  
    // Constructor wiyh $db as database connection
    public function __construct($db){
      $this->conn = $db;
      
      }
  
    // read products
    public function read(){
        
      // select all query
      $query ="SELECT * FROM " . $this->table_name . "";
      $result = $this->conn->query($query);
      return $result;
      }
  
  
  
      // used when filling up the update product form
      function readOne(){
 
      // query to read single record
      $query ="SELECT * FROM  " . $this->table_name . " WHERE id = $this->id";
 
      // prepare query statement
      $stmt = $this->conn->prepare($query);
      // execute query
      $stmt->execute();
 
      // get retrieved row
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
     // set values to object properties
     $this->name = $row['name'];
     $this->price = $row['price'];
     $this->description = $row['description'];
     $this->image_path = $row['image_path'];
     $this->created = $row['created'];
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
            WHERE id = :id ";
 
      // prepare query statement
      $stmt = $this->conn->prepare($query);
 
      // sanitize
      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->description = htmlspecialchars(strip_tags($this->description));
      $this->price = htmlspecialchars(strip_tags($this->price));
      $this->image_path = htmlspecialchars(strip_tags($this->image_path));
      $this->id = htmlspecialchars(strip_tags($this->id));
 
      // bind new values
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':description', $this->description);
      $stmt->bindParam(':price', $this->price);
      $stmt->bindParam(':image_path', $this->image_path);
      $stmt->bindParam(':id', $this->id);
 
     // execute the query
     if($stmt->execute()){ 
        return true;
        } else {
             return false;
        }
   
          
    }
  
  
      // create product(Ensure that students modify the create function)
    function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, description =:description, price=:price, image_path=:image_path, created=:created";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->price=htmlspecialchars(strip_tags($this->price));
    $this->image_path=htmlspecialchars(strip_tags($this->image_path));
    $this->created=htmlspecialchars(strip_tags($this->created));
 
    // bind values
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":price", $this->price);
    $stmt->bindParam(":image_path", $this->image_path);
    $stmt->bindParam(":created", $this->created);
 
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}


     // delete the product
       function delete(){
 
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
     
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
 
    if($result = $stmt->execute()){
        return true;
    }else{
        return false;
    }
    }

   
 
 
    // will upload image file to server
     function uploadPhoto(){
 
     $result_message="";
 
      // now, if image is not empty, try to upload the image
      if($this->image_path){
 
        // sha1_file() function is used to make a unique file name
        $target_directory = "../images/";
        $target_file = $target_directory . $this->image_path;
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
 
        // error message is empty
        $file_upload_error_messages="";
        
        
        // make sure that file is a real image
        $check = getimagesize($_FILES["image_path"]["tmp_name"]);
       if($check!==false){
        // submitted file is an image
       }else{
        $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
        }
 
       /* make sure certain file types are allowed
         $allowed_file_types=array(".jpg", ".jpeg", ".png", ".gif");
         if(!in_array($file_type, $allowed_file_types)){
        $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
         }*/
 
      // make sure file does not exist
      if(file_exists($target_file)){
      $file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
      }
 
      // make sure submitted file is not too large, can't be larger than 1 MB
     if($_FILES['image_path']['size'] > (1024000)){
       $file_upload_error_messages.="<div>Image must be less than 1 MB in size.</div>";
     }
 
     // make sure the 'uploads' folder exists
     // if not, create it
     if(!is_dir($target_directory)){
      mkdir($target_directory, 0777, true);
       }
        
        // if $file_upload_error_messages is still empty
        if(empty($file_upload_error_messages)){
            // it means there are no errors, so try to upload the file
           if(move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)){
           // it means photo was uploaded
           } else {
            $result_message.="<div class='alert alert-danger'>";
            $result_message.="<div> Unable to upload photo.</div>";
            $result_message.="<div> Update the record to upload photo.</div>";
            $result_message.="</div>";
           }
         }
           // if $file_upload_error_messages is NOT empty
          else{
           // it means there are some errors, so show them to user
          $result_message.="<div class='alert alert-danger'>";
          $result_message.="{$file_upload_error_messages}";
          $result_message.="<div> Update the record to upload photo.</div>";
          $result_message.="</div>";
          }
     
        }
 
         return $result_message;
     }
    
    
    }


 ?>