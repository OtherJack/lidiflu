<?php
include "db.php"; 
$table ="users"; 

//form data posted
$firstName= $_POST['firstName'];
$lastName = $_POST['lastName'];
$userName = $_POST['userName'];
$email = $_POST['email'];
$news = $_POST['news'];
$password = $_POST['password'];
$type = 'user';


// make connection to database
$conn = new mysqli($server, $user, $tpassword, $database, $port ); if ($conn->connect_error){
	 die("Connection failed: ". $conn->connect_error);
 }
 header( "Location: ../newUser.html" );

 $sql = "INSERT INTO users (firstName, lastName, userName, email, news, password, user)VALUE ('$firstName','$lastName', '$userName', '$email', '$news', '$password', $type)";
 if ($conn->query($sql) === TRUE) {
    echo ($firstName);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>