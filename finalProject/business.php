<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
<title>registration</title>
<style>

.cl{
	margin:auto;
	margin-top:3px;
}

#conteiner{
	display:grid;
	grid-template--column:repeat(12,1fr);
	grid-auto-rows:minmax(35px,auto);
	grid-gap:10px;
	//padding:5px;
	max-width:87%;
	height:580px;
	margin:auto;
	//border:1px solid skyblue;
	//border-bottom:3px solid skyblue;
	margin-top:21px;
	padding:5px;
	background-color:white;
	position:relative;
	top:-7px;
}

#title{
	grid-column:1/12;
	grid-row:1/2;
	//border:1px solid black;
}

#Status{
	
	font-size:21px;
	text-decoration:none;
	border:1px solid black;
	display:inline-block;
	width:25%;
	text-align:center;
	height:55%;
	padding:15px;
	border-radius:7px;
	font-size:23px;
	
	font-family: 'Raleway', sans-serif;
	
}

#Status:hover{
	color:skyblue;
	//background-color:smoke;
	background-color:rgb(250 250 250);
}

#refresh{
	
	font-size:21px;
	text-decoration:none;
	border:1px solid black;
	display:inline-block;
	width:25%;
	text-align:center;
	height:55%;
	padding:15px;
	border-radius:7px;
	font-size:23px;
	font-family: 'Raleway', sans-serif;

	
	
}

#refresh:hover{
	cursor:pointer;
	color:skyblue;
	background-color:rgb(250 250 250);
}

#serchengine{
	grid-column:1/12;
	grid-row:2/4;
	border:1px solid black;
	
	display:grid;
	grid-template--column:repeat(12,1fr);
	grid-auto-rows:minmax(35px,auto);
	grid-gap:10px;
	padding:5px;
}

#txt1{
	grid-column:3/12;
	grid-row:1/1;
	text-align:center;
	font-size:27px;
}

#txtHint{
	grid-column:1/12;
	grid-row:2/4;
	border:1px solid black;
	font-size:27px;
		text-align:center;
}


#txtHint span:hover{
	background-color:skyblue;
}

#suplierorder{
	grid-column:1/2;
	grid-row:4/6;
	border:1px solid black;
	height:345px;
	border-radius:4px;
}

#show{
	
  position: fixed;
  top: 25%;
  left: 25%;
  /* bring your own prefixes */
  background-color:white;
  padding:7px;
  border:3px solid black;
	
}

#producttablediv{
	grid-column:2/12;
	grid-row:4/6;
	//border:1px solid black;
	border-collapse: collapse;
	padding:0px;	
	height:345px;
}






body{background:rgb(253,253,253);
	
}
fieldset{background:white;

width:270px; height:380px;
  border: 2px solid;
  padding: 10px;
  border-radius: 25px;
}
.links{
	text-decoration:none;
	border:2px solid black;
	border-radius:5px;
	padding:5px;
	color:rgba(0,0,0);
	background-color:skyblue;

}
.links:hover{
	background:white;
}

table{
	width:100%;
	height:100%;
	position:relative;
	top:-16px;
	border-collapse: collapse;		
}

table, th, td {
    border: 1px solid black;
}

table th{
    background-color: Lavender;
	height:50px;
	font-size:21px;
	//font-family: 'Caveat', cursive;
	font-family: 'Cinzel', serif;
}

#customconfirm{
  display:none;
  min-width:310px;
  border:3px solid Tomato;
  border-radius: 7px;
  margin:0px auto;
  background-color:white;
  position:absolute;
  left:250px;
  top:50px;
  padding:15px;
}

#customconfirm p{
  margin-top:-5px;
  font-size:23px;
}

#customconfirm button{
  cursor:pointer;
  text-align: center;
  background-color:white;
  border: 2px solid black;
  border-radius:7px;
  padding:15px;
  position:relative;
  left:12px;
}


.all:hover{
	background-color:white;
	cursor:pointer;
}

.all {
  position: relative;
  //display: inline;
  //border-bottom: 1px dotted black;
}

.all .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  //top: 10px;
  left: 50%;
  margin-left: -15%;
  margin-top :-30px;
  
  background-color:skyblue;
  color:black;
  /* Fade in tooltip - takes 1 second to go from 0% to 100% opac: */
  opacity: 0;
  transition: opacity 1s;
}

.all:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}

.cl:hover{
	background:#b3babb;

}



.ove:hover{
	background:#b3babb;
}

.ove{
cursor:pointer;	
}

#txtHint{
	cursor:pointer;
}


#contactInfo{
	font-size:21px;
	text-decoration:none;
	border:1px solid black;
	display:inline-block;
	width:25%;
	text-align:center;
	height:55%;
	padding:15px;
	border-radius:7px;
	font-size:23px;
	font-family: 'Raleway', sans-serif;
}

#contactInfo:hover{
	color:skyblue;
	cursor:pointer;
}



</style>

<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
</head>
<title>business</title>
<body>
	
	<span style="font-size:21px;font-family: 'Quicksand', sans-serif;position:relative;left:30px;top:5px;text-decoration:underline;color:rgb(35,35,35);">NewOrder</span>
	<div id="conteiner">
	
	<div id="title">
	<!--  כפתור מעבר לעמוד סטטוס הזמנה/-->
	<a id = "Status" href="Orderstatus.php">order Status</a>
	<span id = "refresh">order refresh</span>
	<span id = "contactInfo">Contact Information</span>
	
	<div id="popupContact" style="display:none;  background-color:white; border:1px solid skyblue; border-radius:4px;margin:auto; margin-left:250px; position:absolute;  z-index: 1; padding:7px;">
	<p id = "exitContact" style="text-align:left; background-color:white; border:1px solid black; border-radius:3px;width :10px; padding:7px;margin-top:1px; cursor:pointer;">X</p>
	<p>Our email: NewOrder@Email.com</p>
	<p>Our phone: 0549999999</p>
	</div>
	
	<script>
			/*addEventListener הופך את הכפתור ללחיץ על ידי הוספת */
			document.getElementById('contactInfo').addEventListener('click',()=>{
			/*מציג את חלון פירטי ההתקשרות*/
			document.getElementById('popupContact').style.display = 'block';
			
				/*ללחיץ X הופך את כפתור*/
			document.getElementById('exitContact').addEventListener('click',()=>{
				/*מסתיר את החלון פירטי התקשרות*/
			document.getElementById('popupContact').style.display = 'none';});
		});

	</script>
	
	</div>
	
	<!--  דיב עבור כמות הזמה ממוצר שנבחר/-->
	<div id="customconfirm">
      <p>How Many?</p>
	  <input id="in" type="number">
      <button id = "clickyes">submit</button>
	  <button id = "exit">X</button>
    </div>
	
	<div id="serchengine">
	<p style="font-size:21px;text-align:center;position:relative;left:35px;">Search:</p>
	<br>
	<!-- שדה של חיפוש מוצרים/-->
	<input type="text" id="txt1" onkeyup="showHint(this.value)">

	<!-- מציג את תוצאת החיפוש /-->
	<span id="txtHint"></span>
	</div>

	<script>
		//שדה חיפוש מוצר
		//מקבל טקסט ושולח לעמוד פרוסס במטרה למצוא מוצר משדה חיפש 
		
			
	
			function showHint(str){//הפונקציה מקבלת מחרוזת
			
			if(str.length == 0){// במידה והמחרוזת ריקה
				document.getElementById("txtHint").innerHTML = ""; // ערך שדה הצעות העדכון מתעדכן לריק
				return; // ואז יציאה מהפונקציה
			}
			
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {

                     document.getElementById("txtHint").innerHTML = this.responseText; // מקבל את הצעות החיפוש ומציג אותם בשדה המתאים
					 
                  }
              };

              xmlhttp.open("POST", "process.php?S=" + str, true);
              xmlhttp.send();// שולח לקבוץ פרוסס את ההחרוזת 
			  
              }	
			  
			

	</script>

<?php

if(empty($_SESSION["business_id"]) and ($_SESSION["name_table"]))// אם הסשן לא מאותחל הסקריפט מחזיר לחלון הכניסה לאתר
{
			header("location: Login.php");
     		exit();
}
include 'sql.php'; //מצרף את קובץ סקיול


$business_id;
$business_id=$_SESSION["business_id"];



//שאילתה למציאת המייל של העסק
$sql = "SELECT Email from business WHERE Business_id='$business_id'";
				$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_assoc($result);
				$name=$row['Email'];
				$_SESSION["name_table"]=$name;
				$_SESSION["name_table"] = preg_replace("/[^a-zA-Z0-9]+/", "", $name);
				//echo " ". $_SESSION["name_table"];
				//echo $name;
				$table_name = $_SESSION["name_table"];
				



//שאילתה למציאת שם של עסק
//SESSIONבמטרה לשמור אותו ב
	$sql = "SELECT Business_name from business WHERE Business_id='$business_id'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_assoc($result);
			$_SESSION["name"]=$row['Business_name'];





//השיאלתה מחזירה את כל הפרטים של המוצר מהספק הספיציפי
$sql = "SELECT * from products WHERE Suppliers_id";
		$result = mysqli_query($con,$sql);
		
if ($result->num_rows > 0) {
	echo "<div id='producttablediv' style='overflow: auto;'>";
    echo "<table id='fourme'><tr><th> Suppliers_id <th> Products_id </th><th> Categories_id </th><th> Products name </th><th> Price</th></th><th>Description</th></th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
		//הצגת כל הפרטים שהשיאלתה מחזירה 
        echo "<tr class='ove'><td><p>"  . $row["Suppliers_id"]      ."<td><p>" .$row["Products_id"].  "<td><p>".$row["Categories_id"].  "</p></td><td><p>"   . $row["Products_name"]. "</p></td><td><p>" . $row["Price"]. "</p></td><td><p>" . $row["Description"]. "</td></tr></p>" ;
    }
    echo "</table>";
	echo "</div>";
	
} else {
    echo "0 results";
}



?>


<h1 id="i"></h1>
<div id="show" style="display:none;">




<div id="lBtn" style="display:none;">
<button type="button" id="orderok" style='border:1px solid skyblue; cursor:pointer; width:100px; text-align:center;padding:10px; border-radius:7px;'>אישור הזמנה</button>
</div>
</div>



<div id="suplierorder">
<?php


//מציג את הספקים אשר העסק רוצה להזמין מהם מוצר
//שאילתה שמחזירה את המספר ספק אשר נמצאים בטבלה הזמנית
$sql = "SELECT DISTINCT Suppliers_id from $table_name WHERE Business_id='$business_id'";
			
		$result = mysqli_query($con,$sql);
		
//מחזיר כפתור שהוא העסק אשר אתה רוצה להזמין ממנו
if ($result->num_rows > 0) {
   // echo "<table><tr><th> Business_id</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {  
		echo "<p class='cl' id='$row[Suppliers_id]' style='border:1px solid skyblue; cursor:pointer; width:100px; text-align:center;padding:10px; border-radius:7px;'>";
        echo  $row["Suppliers_id"] . "<br>";
		echo "</p>";
    }
    
} else {
    echo "0 results"; 
}

	

?>
</div>

</div>
<script type="text/javascript" src="script.js"></script>



</body>
</html>




