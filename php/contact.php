<?php
$email = mysqli_real_escape_string($conn, $_POST['email']);
$to="jacksweeney@outlook.com";


// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("jacksweeney@outlook.com",$vistorname, $vistormessege);
header("location: ../thanks.html");



?>