<?php

include("db.php");

//Start the session
if($_SERVER["REQUEST_METHOD"] == "POST") {
// Make a connection to the database
$conn = new mysqli($server, $user, $tpassword, $database ); 
 // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 
       // username and password from the form 
	   $myusername =$_POST['userName'];
       $mypassword =$_POST['password']; 
       $message = "Incorrect Username or Password";
      
      $result = $conn->query("SELECT * FROM users WHERE userName='". $myusername ."' AND password ='". $mypassword ."'");
      


      $row = $result->fetch_assoc();
      
	     
	//Checks if the users details are valid, and if the user is a Admin or User

		 
			if($row['user']=="Admin"){
			   header('location:rest/admin.html');
			   exit();
			}
			else if($row['user']=="User"){
				header('Location:../catalogue.html');
				exit();
			}
			else 
				
				echo "Incorrect username or password"; /*--------------------- <--work on this */
		
			
}
    

	   $conn->close();

?>
