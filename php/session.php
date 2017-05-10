<?php

	include ('db.php');
	//Start the session_cache_expire
	session_start();
	
	//Set the session variables
	$user_check = $_SESSION['login_user'];
	
	//Make a connection to the database
	$conn =  mysqli_connect($server, $username, $tpassword, $database);	
	$result = mysqli_query($conn, "select firstName from users where firstName = '$user_check'");
		if (!$result) {
			echo ('could not run query: ') . mysql_error();
			exit;
		}
		
	$row = mysqli_fetch_array($result);
		
		$login_session = $row['firstName'];
		
		
	if(!isset($_SESSION['login_user'])){
		header("location:index.html");
	}
			
	
?>