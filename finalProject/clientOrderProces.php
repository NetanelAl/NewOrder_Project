<?php

include 'sql.php';
// התחלת סישן 
session_start();
if(empty($_SESSION["Supp_id"])){
	header("location: Login.php");
		exit();
}
else{

if(!isset($_REQUEST["q"]))
{
  $_REQUEST["q"] = "";
}

else{
	
	$Supp_id = $_SESSION["Supp_id"];
	$Business = $_REQUEST["q"];
	//echo $me;
	$_SESSION["Business"] = $Business ;
	
	
	
	
	//השאילתה מחזירה את כל הפרטים מטבלת ההזמנות של הספק עבור עסק ספיציפי כאשר ההזמנה עדיין לא הגיע ללקוח
	$sql = "SELECT * from order3 WHERE Suppliers_id='$Supp_id' AND Business_id='$Business' AND accepted != 'the delivery arrived'";
		
	$result = mysqli_query($con,$sql);
	
	if ($result->num_rows > 0) {

    echo "<table id='torder'><tr><th> Business_id </th><th>Products_id</th> <th>Price</th> <th>quantity</th> </th><th>Categories_id</th><th>Products_Name</th><th>Status</th></tr>";

    while($row = $result->fetch_assoc()) { 
		//הצגה של כל פירטי ההזמנות מהספק(המשתמש) 
        echo "<tr class='clrow'><td>" . $row["Business_id"]. "</td><td>" . $row["Products_id"]. "</td><td>" . $row["Price"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["Categories_id"]. "</td> <td>" . $row["Products_Name"]. "</td><td>". $row["accepted"] . "</td></tr>";
		
    }
    echo "</table>";
	
	
	//  השאילתה מחזירה את כל הפרטים על העסק אשר ביצע הזמנה
	$sql = "SELECT * from business WHERE Business_id = $Business";
	$result = mysqli_query($con,$sql);
	$row = $result->fetch_assoc();
	echo "<br>";
    //   הצגת כל הפרטים של העסק אשר ביצע הזמנה
	echo "<div style='border:1px solid black;display:inline-block;padding:7px;'>";
	echo "the Address of this client is :" . $row['Address'];
	echo "<br>";
	echo "the Phone number of this client is :" . $row['phone'];
	echo "<br>";
	echo "the Email of this client is :" . $row['email'];
	echo "</div>";
	
	echo "<br>";

	
			
			//             שתי כפתורים המשנים את מצב ההזמנה
			echo"<br><button type='button'  style='display: inline;' id='accepted'>Confirm purchase</button>";
			echo" <button type='button'  style='display: inline;' id='Declinepurchase'>Decline purchase</button><br><br>";

			
	} else {
		echo "0 results"; 
	}
			
		

	}

	//Confirm purchase לאחר לחיצה על כפתור 
	if(!isset($_REQUEST["w"]))
	{
	  $_REQUEST["w"] = "";
	  
	}
	else{
				
				
				//עבור ההזמנה של עסק ספציפי accepted בטבלת ההזמנות לערך  accepted השאילתה משנה את הערך של השדה 
				$sql = "UPDATE order3 SET accepted = 'accepted' WHERE  Business_id = $_SESSION[Business] and accepted!='the delivery arrived'";
				mysqli_query($con,$sql);
		
			$Supp_id = $_SESSION["Supp_id"];	
			
			
			//מחזיר את כל הפרטים מטבלת ההזמנות שהעסק הזמין מהספק (המשתמש) 
				$sql = "SELECT * from Order3 WHERE Suppliers_id='$Supp_id' AND Business_id= $_SESSION[Business]";
				
				$result = mysqli_query($con,$sql);
			
			if ($result->num_rows > 0) {

			// מציג את כל הפרטים מטבלת ההזמנות שהעסק הזמין מהספק (המשתמש) 
			echo "<table id='torder'><tr><th> Business_id </th><th>Products_id</th> <th>Price</th> <th>quantity</th> </th><th>Categories_id</th><th>Products_Name</th><th>Status</th></tr>";

			while($row = $result->fetch_assoc()) { 
			
				echo "<tr class='clrow'><td>" . $row["Business_id"]. "</td><td>" . $row["Products_id"]. "</td><td>" . $row["Price"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["Categories_id"]. "</td> <td>" . $row["Products_Name"]. "</td><td>". $row["accepted"] . "</td></tr>";
				
			}
			echo "</table>";
			

			
			echo"<br><button type='button' id='accepted'>Confirm purchase</button><br><br>";

			
		} else {
			echo "0 results"; 
		}
				
			}
		
	
	//  Decline purchase לאחר ליצה על כפתור
		if(!isset($_REQUEST["Declinepurchase"]))
		{
		  $_REQUEST["Declinepurchase"] = "";
		}
		else{
			
			
			//עבור ההזמנה של עסק ספציפי Decline בטבלת ההזמנות לערך  accepted השאילתה משנה את הערך של השדה 
				$sql = "UPDATE order3 SET accepted = 'Decline' WHERE  Business_id = $_SESSION[Business] and accepted!='the delivery arrived'";
				mysqli_query($con,$sql);
					
				$Supp_id = $_SESSION["Supp_id"];	

				//מחזיר את כל הפרטים מטבלת ההזמנות שהעסק הזמין מהספק (המשתמש) 
				$sql = "SELECT * from Order3 WHERE Suppliers_id='$Supp_id' AND Business_id= $_SESSION[Business]";
				$result = mysqli_query($con,$sql);
				
							if ($result->num_rows > 0) {
				// מציג את כל הפרטים מטבלת ההזמנות שהעסק הזמין מהספק (המשתמש) 
			echo "<table id='torder'><tr><th> Business_id </th><th>Products_id</th> <th>Price</th> <th>quantity</th> </th><th>Categories_id</th><th>Products_Name</th><th>Status</th></tr>";

			while($row = $result->fetch_assoc()) { 
			
				echo "<tr class='clrow'><td>" . $row["Business_id"]. "</td><td>" . $row["Products_id"]. "</td><td>" . $row["Price"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["Categories_id"]. "</td> <td>" . $row["Products_Name"]. "</td><td>". $row["accepted"] . "</td></tr>";
				
			}
			echo "</table>";
			
			
			

			
			echo"<br><button type='button' id='accepted'>Confirm purchase</button><br><br>";

			
		} else {
			echo "0 results"; 
		}
				
		}

		
	//Decline לערך accepted בעת לחיצה על שדה מטבלה ההזמנות של הספק(המשתמש) ישתנה הערך של השדה ספציפי מהשדה
		if(!isset($_REQUEST["RP"]))
		{
		  $_REQUEST["RP"] = "";
		}
		else{
		
		// פונקציה שמפוצצת את טקסט במקום שבו מופיע * ומכניסה לפני כל פיצוץ למערך
		$x = $_REQUEST["RP"];
		$arr1 = explode("*",$x);
		//echo $x;
		
		$a =  $arr1[0];
		$b =  $arr1[1];
		$c =  $arr1[2];
		$d =  $arr1[3];
		$p =  $arr1[4];
		$f =  $arr1[5];
		$g =  $arr1[6];
		
		


		// בעת לחיצה של הספק(המשתמש) מההזמנות שעסק ביצע אצלו Decline מטבלת ההזמנות לערך accepted השאילתה משנה את ערך שדה ספיציפי של	
		$sql = "UPDATE order3 SET accepted = 'Decline' WHERE  Business_id = $_SESSION[Business] AND Products_id = $b and accepted!='the delivery arrived'" ;
		mysqli_query($con,$sql);
		
		
			$Supp_id = $_SESSION["Supp_id"];	
	
			//השאילתה מחזירה את כל הפרטים מטבלת ההזמנות עבור הספק (המשתמש) עבור הזמנה שעסק ביצע מאותו ספק
			$sql = "SELECT * from order3 WHERE Suppliers_id=$_SESSION[Supp_id] AND Business_id= $_SESSION[Business]";
				
				$result = mysqli_query($con,$sql);
			
			if ($result->num_rows > 0) {
			//מציג את כל הפרטים מהשאילתה
			echo "<table id='torder'><tr><th> Business_id </th><th>Products_id</th> <th>Price</th> <th>quantity</th> </th><th>Categories_id</th><th>Products_Name</th><th>Status</th></tr>";

			while($row = $result->fetch_assoc()) { 
			
				echo "<tr class='clrow'><td>" . $row["Business_id"]. "</td><td>" . $row["Products_id"]. "</td><td>" . $row["Price"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["Categories_id"]. "</td> <td>" . $row["Products_Name"]. "</td><td>". $row["accepted"] . "</td></tr>";
				
			}
			echo "</table>";

			echo"<br><button type='button' id='accepted'>Confirm purchase</button><br><br>";

			
			} else {
				echo "0 results"; 
			}
		
	}

}

?>
