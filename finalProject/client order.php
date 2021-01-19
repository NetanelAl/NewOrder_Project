
<?php include 'sql.php'; 

/* הפעלת הסישן */
session_start();
if(empty($_SESSION["Supp_id"])){
	header("location: Login.php");
		exit();
}

?>
<!DOCTYPE html>
<html>
<head>
<!--      עיצוב הטקסט של העמוד   /-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300&display=swap" rel="stylesheet">
<style>

table, th, td {
    border: 1px solid black;
}
/*
.links{
	text-decoration:none;
	border:1px solid black;
	//border-radius:5px;
	padding:3px;
	color:rgba(0,0,0);
}
.links:hover{
	background:white;
}
.clrow:hover{
	background-color:skyblue;
	cursor:pointer;
}

#refresh{
  border:1px solid black;
  padding:3px;
	
}*/

.btnnew{
	border:1px solid black;
	background-color:white;
	text-decoration:none;
	font-size:21px;
	padding:3px;
	color:black;
	width:150px;
	display:inline-block;
	text-align:center;
	cursor:pointer;	
}

.btnnew{
	border:1px solid black;
	background-color:white;;
	text-decoration:none;
	font-size:21px;
	padding:3px;
	color:black;
	width:150px;
	display:inline-block;
	text-align:center;
	cursor:pointer;	
	
}

.btnnew:hover{
	background-color:RoyalBlue;
	color:white;
}

.cl:hover{
	background-color:LightSkyBlue;
	color:white;
}
</style>
</head>
<body>
		<!-- כותרת עם שם המערכת/-->
		<h1 style="text-decoration:underline; color:black; font-size:34px; font-family: 'Montserrat', sans-serif;">New Order</h1>	
		<div style="border-bottom:3px solid black; margin-bottom:10px;">
		
		<!-- שתי כפתורים אחד לחזור מעמוד העסק והשני לרענן את מערכת בכדי לראות אם הוזמנו מוצרים נוספים/-->
		<button id = "refresh" class="btnnew">order refresh</button>
		<a href='suppliers.php' class="btnnew">suppliers</a><br><br>
		</div>

	<!-- דיב המכיל את כל פרטי ההזמנה מאותו עסק אשר ביצע הזמנה/-->
		<div id="above"></div>



<script src="suplierJs.js"></script>
</body>
</html>

<?php 
					$Supp_id = $_SESSION["Supp_id"];


//echo $Supp_id;



	//השאילתה מחזירה את כל מספרי העסקים אשר ביצעו הזמנה מאותו ספר
	// השיאלתה מחזירה את כל מספרי העסקים מטבלת ההזמנות אשר העסקים הזמינו מאותו ספק לפני שההזמנה הגיעה ללקוח (העסק) 
	$sql = "SELECT DISTINCT Business_id from order3 WHERE Suppliers_id='$Supp_id' AND accepted != 'the delivery arrived'";
			
		$result = mysqli_query($con,$sql);


//הצגת id יחיד לכל עסק
//כפתור שמציג את כל העסקים אשר ביצוע הזמנה 
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {  
		echo "<p class='cl' style='border-bottom:1px solid skyblue; cursor:pointer; padding:10px; display:block;'>";
        echo  " " . $row["Business_id"] ."<br>";
		echo "</p>";
    }
    
} else {
    echo "0 results"; 
}
?>
