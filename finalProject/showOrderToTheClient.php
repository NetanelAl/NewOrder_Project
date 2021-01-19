<?php

	include 'sql.php';
	session_start();

	if(!isset($_REQUEST["showOrderDitle"]))
	{
		$_REQUEST["showOrderDitle"] = "";
	}
	else{
	
	//בעת לחיצה על אחד מכפתורי הסטטוס של המוצרים שהעסק (המשתמש) הזמין
	$Supp_id = $_REQUEST["showOrderDitle"];
	$e =  $_SESSION["business_id"];
	
	$_SESSION["supp_idForHistory"]  = $Supp_id;
	
	

	// show AllOrders בעת לחיצה על כפתור
	if($_SESSION["status"] == 0){
	//השאילתה מחזירה את כל הפרטים מטבלת ההזמנות שהעסק (המשתמש) עשה מספק ספציפי למעט ההזמנות שכבר הגיעו
	$sql = "SELECT * from order3 WHERE Suppliers_id='$Supp_id' AND Business_id='$e' AND accepted != 'the delivery arrived'";
		
	$result = mysqli_query($con,$sql);
	
	//הצגת כל הפרטים מההזמנה שהשאילתה מחזירה
	if ($result->num_rows > 0) {
    echo "<table id='newOrder' style='width:100%;'><tr><th> Suppliers_id </th><th>Products_id</th> <th>Price</th> <th>quantity</th> </th><th>Categories_id</th><th>Products_Name</th> </th><th>status</tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {  
        echo "<tr class = 'all'><td>" . $row["Suppliers_id"]. "</td><td>" . $row["Products_id"]. "</td><td>" . $row["Price"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["Categories_id"]. "</td> <td>" . $row["Products_Name"]. "</td><td>". $row["accepted"] . "</td></tr>";
    }
    echo "</table>";
	}
	echo "<br>";
	echo "<span class='DeleteThisOrder' style='border:1px solid black;padding:7px;cursor:pointer;'>Order received</span>";
	}
	
	// show Accepte dOrder בעת לחיצה על כפתור
	else if($_SESSION["status"] == 1){
	//השאילתה מחזירה את כל הפריטים מטבלת ההזמנות שהספק ספיציפי אישר את הזמנתם למשתמש (עסק) 
	$sql = "SELECT * from order3 WHERE Suppliers_id='$Supp_id' AND Business_id='$e' AND accepted = 'accepted'";
	
	$result = mysqli_query($con,$sql);
	//הצגת כל הפרטים מההזמנה שהשאילתה מחזירה
	if ($result->num_rows > 0) {
    echo "<table id='newOrder'><tr><th> Suppliers_id </th><th>Products_id</th> <th>Price</th> <th>quantity</th> </th><th>Categories_id</th><th>Products_Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {  
        echo "<tr class = 'all'><td>" . $row["Suppliers_id"]. "</td><td>" . $row["Products_id"]. "</td><td>" . $row["Price"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["Categories_id"]. "</td> <td>" . $row["Products_Name"]. "</td>";
    }
    echo "</table>";
	echo "<br>";
	echo "<span class='DeleteThisOrder' style='border:1px solid black;padding:7px;cursor:pointer;'>Order received</span>";
	}
	}
	
	//show Declined Order בעת לחיצה על כפתור 
	else if($_SESSION["status"] == 2){
	//השאילתה מחזירה את כל הפריטים  שנדחו מטבלת ההזמנות על ידי הספק הספציפי שממנו העסק (המשתמש) ביצע הזמנה
	$sql = "SELECT * from order3 WHERE Suppliers_id='$Supp_id' AND Business_id='$e' AND accepted = 'Decline'";
	
	$result = mysqli_query($con,$sql);
	//הצגת כל הפרטים מההזמנה שהשאילתה מחזירה
	if ($result->num_rows > 0) {
    echo "<table id='newOrder'><tr><th> Suppliers_id </th><th>Products_id</th> <th>Price</th> <th>quantity</th> </th><th>Categories_id</th><th>Products_Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {  
        echo "<tr class = 'all'><td>" . $row["Suppliers_id"]. "</td><td>" . $row["Products_id"]. "</td><td>" . $row["Price"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["Categories_id"]. "</td> <td>" . $row["Products_Name"]. "</td>";
    }
    echo "</table>";
	echo "<br>";
	echo "<span class='DeleteThisOrder' style='border:1px solid black;padding:7px;cursor:pointer;'>Order received</span>";
	
	}
	}
	//show Not Yet Desided Order בעת לחיצה על כפתור
	else if($_SESSION["status"] == 3){
	//השאילתה מחזירה את כל הפריטים מטבלת ההזמנות שממתינים לטיפול אצל הספק הספציפי ממנו העסק (המשתמש)ביצע את ההזמנה
	$sql = "SELECT * from order3 WHERE Suppliers_id='$Supp_id' AND Business_id='$e' AND accepted = 'waiting'";
	
	$result = mysqli_query($con,$sql);
	//הצגת כל הפרטים מההזמנה שהשאילתה מחזירה
	if ($result->num_rows > 0) {
    echo "<table id='newOrder'><tr><th> Suppliers_id </th><th>Products_id</th> <th>Price</th> <th>quantity</th> </th><th>Categories_id</th><th>Products_Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {  
        echo "<tr class = 'all'><td>" . $row["Suppliers_id"]. "</td><td>" . $row["Products_id"]. "</td><td>" . $row["Price"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["Categories_id"]. "</td> <td>" . $row["Products_Name"]. "</td>";
    }
    echo "</table>";
	echo "<br>";
	echo "<span class='DeleteThisOrder' style='border:1px solid black;padding:7px;cursor:pointer;'>Order received</span>";
	}
	}
	
	
	}
	
	//לאחר לחיצה על כפתור לבדיקת מצב ההזמנה
	if(!isset($_REQUEST["showOrderStatus"]))
	{
		$_REQUEST["showOrderStatus"] = "";
	}
	else{
	//show AllOrders לאחר לחיצה על כפתור	
	if($_REQUEST["showOrderStatus"] == 0){
	
	$_SESSION["status"] = 0;
		
	$business_id = $_SESSION["business_id"];
	// לא במצב שההזמנה הגיע accepted  השאילתה מחזירה את המספר הספק מטבלת ההזמנות שהעסק (המשתמש) ביצע ממנו הזמנה והשדה 
	$sql = "SELECT DISTINCT Suppliers_id from order3 WHERE  Business_id='$business_id' AND accepted != 'the delivery arrived'";
			
		$result = mysqli_query($con,$sql);


	//הצגת id יחיד לכל עסק
	if ($result->num_rows > 0) {
		//הצגת כפתורים לפי מספר ספק לאחר חזרה מהשאילתה
		while($row = $result->fetch_assoc()) {  
			echo "<p class='cl' style='border:1px solid skyblue; cursor:pointer; width:100px; text-align:center;padding:10px; border-radius:7px;'>";
			echo  $row["Suppliers_id"] ."<br>";
			echo "</p>";
		}
		
	} else {
		echo "0 results"; 
	}
	}
	//show Accepte dOrder לאחר לחיצה על
	else if($_REQUEST["showOrderStatus"] == 1){
			$_SESSION["status"] = 1;
			$business_id = $_SESSION["business_id"];
	//ההזמנה התקבלה אצל הספק והיא בטיפול accepted במצב  accepted השאילתה מחזירה את  כל מספר הספקים מהטבלת ההזמנות שהעסק (המשתמש)ביצע ממנו הזמנה ושדה 		
	$sql = "SELECT DISTINCT Suppliers_id from order3 WHERE  Business_id='$business_id' AND accepted = 'accepted' AND accepted != 'the delivery arrived'";
			
	$result = mysqli_query($con,$sql);


	//הצגת id יחיד לכל עסק
	if ($result->num_rows > 0) {
	//הצגת כפתורים לפי מספר ספק לאחר חזרה מהשאילתה
		while($row = $result->fetch_assoc()) {  
			echo "<p class='cl' style='border:1px solid skyblue; cursor:pointer; width:100px; text-align:center;padding:10px; border-radius:7px;'>";
			echo  $row["Suppliers_id"] ."<br>";
			echo "</p>";
		}
		
	} else {
		echo ""; 
	}
	}
		//show Declined Order לאחר לחיצה על 
		else if($_REQUEST["showOrderStatus"] == 2){
			$_SESSION["status"] = 2;
			$business_id = $_SESSION["business_id"];
			//ההזמנה נדחתה על ידי הספק Decline במצב accepted השאילתה מחזירה את כל מספרי הספקים מטבלת ההזמנות שהעסק (המשתמש)ביצע ממנו הזמנה והשדה 
			$sql = "SELECT DISTINCT Suppliers_id from order3 WHERE  Business_id='$business_id' AND accepted = 'Decline' AND accepted != 'the delivery arrived'";
			
			$result = mysqli_query($con,$sql);


			//הצגת id יחיד לכל עסק
			if ($result->num_rows > 0) {
			//הצגת כפתורים לפי מספר ספק לאחר חזרה מהשאילתה
			while($row = $result->fetch_assoc()) {  
				echo "<p class='cl' style='border:1px solid skyblue; cursor:pointer; width:100px; text-align:center;padding:10px; border-radius:7px;'>";
				echo  $row["Suppliers_id"] ."<br>";
				echo "</p>";
				}
		
			} else {
			echo ""; 
			}
			}
			//show Not Yet Desided Order לאחר לחיצה על
			else if($_REQUEST["showOrderStatus"] == 3){
			$_SESSION["status"] = 3;
			$business_id = $_SESSION["business_id"];
			//ההזמנה ממתינה לטיפול של הספק waiting במצב  accepted השאילתה מחזירה את כל מספרי הספקים מטבלת ההזמנות שהעסק (המשתמש) ביצע ממנו הזמנה והשדה 
			$sql = "SELECT DISTINCT Suppliers_id from order3 WHERE  Business_id='$business_id' AND accepted = 'waiting' AND accepted != 'the delivery arrived'";
			
			$result = mysqli_query($con,$sql);


			//הצגת id יחיד לכל עסק
			if ($result->num_rows > 0) {
			//הצגת כפתורים לפי מספר ספק לאחר חזרה מהשאילתה
			while($row = $result->fetch_assoc()) {  
				echo "<p class='cl' style='border:1px solid skyblue; cursor:pointer; width:100px; text-align:center;padding:10px; border-radius:7px;'>";
				echo  $row["Suppliers_id"] ."<br>";
				echo "</p>";
				}
		
			} else {
			echo ""; 
			}
			}
		
	}
	

	//שפותח את ההודעה על אישור שהמוצרים הגיעו Order received לאחר לחיצה על כפתור 
	if(!isset($_REQUEST["deleteacepted"]))
	{
		$_REQUEST["deleteacepted"] = "";
	}
	else{
		echo "true";
		$supp_idForHistory = $_SESSION["supp_idForHistory"];
		$business_id = $_SESSION["business_id"];
		//השאילתה מעדכהת בטבלת ההזמנות שההזמנה התקבלתה למעת המוצרים שנמצאים בטיפול
				$sql = "UPDATE order3 SET accepted = 'the delivery arrived' WHERE  Business_id = $business_id and Suppliers_id = $supp_idForHistory and accepted != 'waiting'";
				mysqli_query($con,$sql);
				
			// השאילתה מחזירה את כל מספרי הספקים מטבלת ההזמנות של העסק(המשתמש) שהם במצב המתנה לטיפול הספק				
	  		$sql = "SELECT DISTINCT Suppliers_id from order3 WHERE  Business_id='$business_id' AND accepted = 'waiting' AND accepted != 'the delivery arrived'";
			$result = mysqli_query($con,$sql);
			//הצגת id יחיד לכל עסק
			if ($result->num_rows > 0) {
			//הצגת כל הפרטים מההזמנה שהשאילתה מחזירה
			while($row = $result->fetch_assoc()) {  
				echo "<p class='cl' style='border:1px solid skyblue; cursor:pointer; width:100px; text-align:center;padding:10px; border-radius:7px;'>";
				echo  $row["Suppliers_id"] ."<br>";
				echo "</p>";
				}
		
			} else {
			echo ""; 
			}
				
	}
	

?>