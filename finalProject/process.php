






<?php
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
include 'sql.php';



session_start();
if(empty($_SESSION["business_id"]) and ($_SESSION["name_table"]))
{
			header("location: Login.php");
     		exit();
}



////////////////////////////////////////////////////////////////////////////////////////////q
if(!isset($_REQUEST["q"]))
{
  $_REQUEST["q"] = "";
}
else {
	
$word = $_REQUEST["q"];

//מפצל את המחרוזת למערך בכל מקום אשר נמצת כוכבית
$arr1 = explode("*",$word);

/*$i = count($arr1);

for ($x = 0; $x < $i; $x++){
  echo $arr1[$x];
}
*/
	//כאשר נבחר מוצר מתוך הצעות שדה החיפוש
	if(count($arr1) == 2){
		$e =  $_SESSION["business_id"];
		$table_name = $_SESSION["name_table"];
		//a מקבל את מספר המוצר
		$a =  $arr1[0];
		$b =  $arr1[1];
		
		

						//מוצא את המוצר הנדרש לפי המספר מוצר
						$sql = "SELECT * from products WHERE Products_id='$a'";
						$result = mysqli_query($con,$sql);
						
						
						if ($result->num_rows > 0) {
							    $row = $result->fetch_assoc();
								
					
								//מכניס את המוצר שחיפשנו לטבלת המוצרים האישית לפני ההזמנה
								$sql = "insert into $table_name (Business_id,Products_id,Suppliers_id,Price,quantity,Categories_id,Products_Name)values
								('$e','$a','$row[Suppliers_id]','$row[Price]','$b','$row[Categories_id]','$row[Products_name]')";
								$result = mysqli_query($con,$sql);
								

										
								//	מחזיר את כל מספרי הספקים ככפתור לאחר שהכנסו לטבלה לפני ההזמנה הסופית
								//השאילתה מחזירה את כל מספרי הספק אשר נמצאים בטבלה ההזמנות
								$sql = "SELECT DISTINCT Suppliers_id from $table_name WHERE Business_id='$e'";
			
		$result = mysqli_query($con,$sql);
		

						if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {  
				echo "<p class='cl' id='$row[Suppliers_id]' style='border:1px solid skyblue; cursor:pointer; width:100px; text-align:center;padding:10px; border-radius:7px;'>";
							// מציג את הכפתור מוחזר
							echo  $row["Suppliers_id"] . "<br>";
		echo "</p>";
    }
    
}	
										
										
										
								
							
						} else {
							echo "0 results"; 
						}
						
		
	}else{
	//כאשר נבחר מוצר מתוך טבלת המוצרים	
	


	$table_name = $_SESSION["name_table"];
	

$a =  $arr1[0];
$b =  $arr1[1];
$c =  $arr1[2];
$d =  $arr1[3];
$p =  $arr1[4];
$f =  $arr1[5];
$g =  $arr1[6];


$e =  $_SESSION["business_id"];

//מכניס לתןך טבלת ההזמנות את המוצר שנבחר מתוך טבלת המוצרים
//השאילתה הכניסה את המוצר הנבחר לתוך טבלה של הזמנות
$sql = "insert into $table_name (Business_id,Products_id,Suppliers_id,Price,quantity,Categories_id,Products_Name)values
									   ('$e','$b','$a','$p','$g','$c','$d')";
$result = mysqli_query($con,$sql);



								//	מחזיר את כל מספרי הספקים ככפתור לאחר שהכנסו לטבלה לפני ההזמנה הסופית
								//השאילתה מחזירה את כל מספרי הספק אשר נמצאים בטבלה ההזמנות
$sql = "SELECT DISTINCT Suppliers_id from $table_name WHERE Business_id='$e'";
		$result = mysqli_query($con,$sql);
		

if ($result->num_rows > 0) {
   // echo "<table><tr><th> Business_id</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo "<p class='cl' style='border:1px solid skyblue; cursor:pointer; width:100px; text-align:center;padding:10px; border-radius:7px;'>";
		// מציג את הכפתור מוחזר
        echo  $row["Suppliers_id"] . "<br>";
		echo "</p>";
    }
    
} else {
    echo "0 results"; 
}

}
}
////////////////////////////////////////////////////////////////////////////////////////////q
//                                            חלון פירטי הזמנה
if(!isset($_REQUEST["p"]))
{
  $_REQUEST["p"] = "";
}
else {
	//מציג את כפתור היציאה מהחלון
	echo"<p id='closeIt' style='padding:0px;margin:0px;text-align:right;margin-bottom:7px;font-size:25px;cursor:pointer;'>x</p>
	<br>";
	
	
	$wordTwo = $_REQUEST["p"];
	$e =  $_SESSION["business_id"];
	$table_name = $_SESSION["name_table"];

	//מציג את כל הפרטים מטבלת ההזמנה עבור כל ספק וספק
	//השאילתה מחזירה את כל פירטי המוצרים אשר הוכנסו להזמנה מכל ספק 
	$sql = "SELECT * from $table_name WHERE Suppliers_id='$wordTwo' AND Business_id='$e'";
		
		$result = mysqli_query($con,$sql);
	
	if ($result->num_rows > 0) {
    echo "<table id='newOrder'><tr><th> Suppliers_id </th><th>Products_id</th> <th>Price</th> <th>quantity</th> </th><th>Categories_id</th><th>Products_Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {  
	//	מציג את כל במוצרים שהוזמנו מספק זה בטבלה
        echo "<tr class = 'all'><td>" . $row["Suppliers_id"]. "</td><td>" . $row["Products_id"]. "</td><td>" . $row["Price"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["Categories_id"]. "</td> <td>" . $row["Products_Name"]. "</td><td class='tooltiptext'>"."delete ".$row["Products_Name"]."</td></tr>";
    }
    echo "</table>";
	///////////////////////
	
	//  השאילתה מחזירה את כל פירטי ספק 
	$sql = "SELECT * from suppliers WHERE Suppliers_id = $wordTwo";
	$result = mysqli_query($con,$sql);
	$row = $result->fetch_assoc();
	echo "<br>";
	//    הצגת כל פירטי הספק
	echo "<div  id='bim'  style='border:1px solid black;display:inline-block;padding:7px;'>";
	echo "the Address of this suppliers is :" . $row['Address'].".";
	echo "<br>";
	echo "the Phone number of this supplier is :" . $row['Phone'].".";
	echo "<br>";
	echo "the Email of this supplier is :" . $row['Email'].".";
	echo "<br>";
	echo "the Minimum_order from this supplier is :" . $row['Minimum_order'].".";

	echo "</div>";
	
	echo "<br>";
	
				
				//השאילתה מחשבת את הסכום אשר העסק צריך לשלם עבור ההזמנה
	 $sql = "select SUM(price*quantity) as sumi from $table_name WHERE Suppliers_id='$wordTwo' AND Business_id='$e'";
	 $result = mysqli_query($con,$sql);
	 $row = ($result->fetch_assoc());
	 //מציג את הסכום שהעסק צריך לשלם לספק
	 echo '<p  id="bam" style="font-size:21px;display:inline-block;">the total price for this order is : </p>'.'<span  id="bom" style="font-size:27px;color:Tomato;"> '.$row["sumi"].'</span>';
	 
	  //כפתור לאישור ההזמנה
	 echo '<div id="lBtn" style="display:block;">  
	<button type="button" id="orderok" style="border:1px solid skyblue; cursor:pointer; width:100px; text-align:center;padding:10px; border-radius:7px;">אישור הזמנה</button>
	</div>';
	 
	 
}



}



if(!isset($_REQUEST["w"]))
{
  $_REQUEST["w"] = "";
}
else{
	
	echo $_REQUEST["w"];
	

$wordTwo = $_REQUEST["w"];
$aaa = $_SESSION["business_id"];
$table_name = $_SESSION["name_table"];


		
								//השאילתה מכניסה את טבלת המוצרים האישית לפני אישור סופי לטבלת ההזמנות הכללתי לאחר אישור ההזמנה
						$sql = "insert into order3 (Business_id,Products_id,Suppliers_id,Price,quantity,Categories_id,Products_Name)
								SELECT Business_id , Products_id , Suppliers_id , Price , quantity , Categories_id , Products_Name
								from $table_name WHERE Suppliers_id='$wordTwo' AND Business_id='$aaa'

					";
						$result = mysqli_query($con,$sql);
			//השאלתה מוחקת כל הכפתור של מספר ספק לאחר אישור ההזמנה
	$sql = "DELETE from $table_name WHERE Suppliers_id='$wordTwo'";					
					$result = mysqli_query($con,$sql);
					
					preg_replace('/[^0-9\-]/', '', $wordTwo);
					
					echo $wordTwo;
		
}


if(!isset($_REQUEST["d"]))
{
  $_REQUEST["d"] = "";
}
else{
	

	
$word = $_REQUEST["d"];
$arr2 = explode("*",$word);

$a =  $arr2[0];
$b =  $arr2[1];
$c =  $arr2[2];
$d =  $arr2[3];
$p =  $arr2[4];
$f =  $arr2[5];
$g =  $arr2[6];

$table_name = $_SESSION["name_table"];
$e =  $_SESSION["business_id"];


//echo $f;

//               השאילתה מוחקת מוצר ספציפי אשר המשתמש מבקש למחוק מטבלת ההזמנות האישית שלו        
$sql = "DELETE from $table_name WHERE Products_id = $b and Suppliers_id = $a and Price = $c and quantity = $d  and Categories_id = $p";
$result = mysqli_query($con,$sql);
///////////////


//         השאילתה מציגה את כל המידע מטבלת ההזמנה האישית של העסק לפי בקשה המשתמש 
	$sql = "SELECT * from $table_name WHERE Suppliers_id='$a' AND Business_id='$e'";
		
		$result = mysqli_query($con,$sql);
	
	if ($result->num_rows > 0) {
		
	echo"<p id='closeIt' style='padding:0px;margin:0px;text-align:right;margin-bottom:7px;font-size:25px;cursor:pointer;'>x</p>";
	echo "<br>";

    echo "<table id='newOrder'><tr><th> Suppliers_id </th><th>Products_id</th> <th>Price</th> <th>quantity</th> </th><th>Categories_id</th><th>Products_Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
//הצגה של כל פרטי המידע מטבלת ההזמנה האישית		
        echo "<tr class = 'all'><td>" . $row["Suppliers_id"]. "</td><td>" . $row["Products_id"]. "</td><td>" . $row["Price"]. "</td><td>" . $row["quantity"]. "</td><td>" . $row["Categories_id"]. "</td> <td>" . $row["Products_Name"]. "</td><td class='tooltiptext'>"."delete ".$row["Products_Name"]."</td></tr>";
    }
    echo "</table>";
	

//                       השאילתה מחזירה את כל הפרטים האישים של הספק הנדרש על ידי המשתמש
	$sql = "SELECT * from suppliers WHERE Suppliers_id = $a";
	$result = mysqli_query($con,$sql);
	$row = $result->fetch_assoc();
	echo "<br>";
//                       הצגת כל הפרטים
	echo "<div  id='bim'  style='border:1px solid black;display:inline-block;padding:7px;'>";
	echo "the Address of this suppliers is :" . $row['Address'].".";
	echo "<br>";
	echo "the Phone number of this supplier is :" . $row['Phone'].".";
	echo "<br>";
	echo "the Email of this supplier is :" . $row['Email'].".";
	echo "<br>";
	echo "the Minimum_order from this supplier is :" . $row['Minimum_order'].".";

	echo "</div>";
	
	echo "<br>";
	
	//                     השאילתה מחשבת כמה כסף יצטרך העסק לשלם לספק
	 $sql = "select SUM(price*quantity) as sumi from $table_name WHERE Suppliers_id='$a' AND Business_id='$e'";
	 $result = mysqli_query($con,$sql);
	 $row = ($result->fetch_assoc());
	 echo '<p  id="bam" style="font-size:21px;display:inline-block;">the total price for this order is : </p>'.'<span  id="bom" style="font-size:27px;color:Tomato;"> '.$row["sumi"].'</span>';
	 
	 //כפתור לאישור הזמנה
	 echo '<div id="lBtn" style="display:block;">
	<button type="button" id="orderok" style="border:1px solid skyblue; cursor:pointer; width:100px; text-align:center;padding:10px; border-radius:7px;">אישור הזמנה</button>
	</div>';
	
	
	//////////////////
	//echo "<br>";
	//echo "<button onclick='myFunction()'>Click me</button>";	 
}
else{
	$newvarempty = "empty";
	echo $newvarempty;
}


}
//חיפוש מהיר של מוצר
if(!isset($_REQUEST["S"]))
{
  $_REQUEST["S"] = "";
}
else{
	
	$suggestions = $_REQUEST["S"];
	
	$hint = "";
	// השאילתה משמשת לחיפוש מוצר מטבלת המוצרים על ידי חיפוש בשורת החיפוש
	$sql = "SELECT Products_Name , Price ,  Suppliers_id , Products_id
	FROM products
	WHERE Products_Name LIKE '$suggestions%'";
	
	$result = mysqli_query($con,$sql);
	
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {  
			 //הצגה של המוצר שהמשתמש חיפש
			 $hint .= "<span style='display:block;' class='txthintfind'>".$row["Products_Name"]. " מחיר " .$row["Price"]." ספק ".$row["Suppliers_id"]." מפתח מוצר ".$row["Products_id"]."</span>";
    }
		
		$hint = rtrim($hint, ",");
		//$hint.=".";
        echo $hint;				
	



		
}

	 else {
	// "No results" אם המוצר המבושק לא קיים יחזור 
        echo "No results";
        }

        mysqli_close($con);
	

	
}
	//  מציג את תוצאת החיפוש 
	if(!isset($_REQUEST["A"]))
	{
		// מחזיר ריק במידה ושורת החיפוש ריקה
	  $_REQUEST["A"] = "";
	}
	else{
		
		$TheHint = $_REQUEST["A"];
		//  במידה ויש ערך לתוצאת החיפוש יחזיר את הפרטים על המוצר שהמשתמש חיפש
		echo $TheHint;
		
	}


?>