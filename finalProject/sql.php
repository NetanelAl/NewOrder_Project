<?php
//חיבור לדטה בייס

define("HOST","localhost");
define("USER","root");
define("PASS","");
define("DB","neworderdb");

$con = mysqli_connect(HOST,USER,PASS,DB);
mysqli_set_charset($con,"utf8");



	if (!$con) {
		
    die("Connection failed: " . mysqli_connect_error());
}




	
?>
