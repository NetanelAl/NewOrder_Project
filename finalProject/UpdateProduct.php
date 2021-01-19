<!-- עמוד למחיקת מוצר מרשימת המוצרים של המספק/-->
<?php
	include 'sql.php';
	
	
	if(!isset($_REQUEST["Delete"]))
	{
		$_REQUEST["Delete"] = ""; 

	}
	else
	{
		session_start();
		$Supp_id = $_SESSION["Supp_id"];
		//echo $Supp_id;
		
		
		$Delete = $_REQUEST["Delete"];

		/*השאילתה מוחקת את המוצר אשר הספק רוצה למחוק על ידי מספר ספק ומספר מוצר*/
		$sql = "DELETE from products WHERE Suppliers_id = $Supp_id and Products_id =  $Delete";

		$result = mysqli_query($con,$sql);
		
		
		
		
		
		
		
		/*$sql = "SELECT * from products WHERE Suppliers_id='$Supp_id'";
		$result = mysqli_query($con,$sql);
		

if ($result->num_rows > 0) {
	
	//echo '<script> let x = $row["Products_id"]; </script>';
	
    echo "<table id='tbl'><tr><th>Products name</th><th>Price</th></th><th>Description</th><th>Products_id</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr class='tblrow'><td>" . $row["Products_name"]. "</td><td>" . $row["Price"]. "</td><td>" . $row["Description"]. "</td><td>" . $row["Products_id"]. "</td></tr>";
    }

    echo "</table>";
	
}*/
		
		
		
		
	}
	






?>