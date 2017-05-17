<?php
class Database {
  
  // Specify the database credentials  
   private $host = "localhost";
   private $db_name ="c9";
   private $username = "angeline80";
   private $password ="";
   public $conn;
    
    // Get the database conection
    public function getConnection() {
    $this->conn = null;
    
    // Create connection
   try 
   {
         if($conn = new mysqli ($host,$username,$password,$db_name))
          
               { 
                echo "Conected Successfully";
               }
          
               else 
               {
                   throw new Exception ("Unable to conect");
               }
          
   }  
          
  catch (Exception $e)
          {
            echo "Connection error: " .$e->getMessage();
          }        
   
    
    
    return $this->conn;
}
}
?>