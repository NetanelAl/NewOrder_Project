
<?php
// Start the session
session_start();
if(empty($_SESSION["Supp_id"]))
{
	header("location: Login.php");
		exit();
}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

<title>registration</title>
<style>

body{
	box-sizing: border-box;
}

#conteiner{
	
	display:grid;
	grid-template--column:repeat(12,1fr);
	grid-auto-rows:minmax(35px,auto);
	grid-gap:10px;
	//padding:5px;
	max-width:65%;
	height:615px;
	//margin:auto;
	//border:1px solid skyblue;
	//border-bottom:3px solid skyblue;
	margin-top:21px;
	padding:5px;
	background-color:white;
	position:relative;
	top:-7px;
	
}


#btndiv{
	
	grid-column:1/12;
	grid-row:1/3;
	//border:1px solid black;
	border-bottom:3px solid skyblue;
	
}

#divform{
	
	
	grid-column:1/12;
	grid-row:3/4;
	//border:1px solid black;
	border-bottom:3px solid skyblue;
	
}

form{
	
	//border:1px solid black;
	width:65%;
	height:100%;
}

form *{
	margin-left:13px;
}

.links{
	
	text-decoration:none;
	//border:2px solid black;
	border-bottom:2px solid skyblue;
	padding:5px;
	color:rgba(0,0,0);
	position:relative;
	top:37px;
	left:4px;
	color:rgba(45,45,45,0.7);
	
	
}

.links:hover{
	background:Aquamarine;
	color:white;
}

.button {
  background-color: #4CAF50; /* Green */
  transition-duration: 0.4s;
  cursor: pointer;
  
}

.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
  border-radius:3px;
  font-size:21px;
}

.button5:hover {
  background-color: #555555;
  color: white;
}

</style>
</head>

<body>

<div id="conteiner">




<div id="btndiv">


		<?php

if(isset($_SESSION["Supp_id"])){
echo"<span style='display:inline;	position:relative; left:4px; 	padding:5px; font-size:27px; color:DodgerBlue; font-family: 'Montserrat', sans-serif;'>";
echo"Welcome to the Add products Page ".$_SESSION["name"];
echo " Id Number " . $_SESSION["Supp_id"] . "."."<br>";
echo"</span>";

}

?>
<!-- שלושה כפתורים/-->
	<a class="links" href="client order.php">To clients order Page</a>
	<a class="links" href="ChangeProduct.php">To Change Product Page</a>
	<span class="links" id = "contactInfo" style="cursor:pointer;">Contact Information</span>

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

<!-- דיב להכנסת מוצרים של המשתמש/-->
<div id="divform">


<!-- ["PHP_SELF"] שולח את נתוני הטופס שהוגשו לדף עצמו, במקום לעבור לדף אחר/-->
<form action ="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" >


	<!-- <input type="submit" value="orders" href="client order.php"> -->

		<span style="text-decoration:underline; color:LimeGreen; font-size:23px;">Add Product</span>
	
<br><br><br>
<!-- שדות שנדרש למלא להוספת מוצר/-->
<pre style="font-size:17px;"> Name of product  : <input type="text" name="Product_Name" autofocus  style="font-size:21px;color:Maroon;"></pre>
<pre style="font-size:17px;"> Price of product : <input type="text" name="product_price" autofocus style="font-size:21px;color:Maroon;"></pre>
<br><br>

<p><span style="color:DarkSlateGrey; font-size:21px; text-decoration:underline;"> Description</span></p>
<textarea name="comment" rows="5" cols="40" style="font-size:21px; color:CornflowerBlue;"></textarea>

		  <select name=Categories_id style="display:block;">
			<option selected hidden value="1">מוצרי חלב</option>
			<option  value="2">מוצרי בשר</option>
			<option  value="3">מוצרי נקיון</option>
			<option  value="4">מוצרי אלקטורניקה</option>
			<option  value="5">שתיה מתוקה</option>
			<option  value="6">שתיה חריפה</option>
			<option  value="7">חד פעמי</option>
			<option  value="8">תינוקות</option>
			<option  value="9">גבינות</option>
			<option  value="10">פירות</option>
			<option  value="11">ירקות</option>
			<option  value="12">מציאות</option>
			<option  value="13">חטיפים</option>
			<option  value="14">אחר</option>
			
			 </select>
<br>
<!-- כפתור לאחר מילוי פירטי המוצר/-->
<input type="submit" value="send" style="cursor:pointer; padding:12px;" class="button button5">


<form>

</div>

</div>

</body>
</html>


<?php
include 'sql.php';







//בודק שכל השדות מלאים
if(isset($_POST['Product_Name']))
if(!empty( $_POST['Product_Name'] and ($_POST['product_price']) and ($_POST['comment']) and ($_SESSION["Supp_id"]) and ($_POST["Categories_id"])) )

{
	$Product_Name=$_POST['Product_Name'];
	$product_price=$_POST['product_price'];
	$comment=$_POST['comment'];
	$suppler_id=$_SESSION["Supp_id"];
	$Categories_id=$_POST["Categories_id"];
	echo"<br>".$Product_Name." ".$product_price." ".$comment." ".$suppler_id." ".$Categories_id;
	
	
	//השאילתה מכניסה מוצר לטבלת המוצרים לאחר שהספק (המשתמש) מילא את פירטי המוצר
	$sql = "insert into products (Products_name,Categories_id,Price,Description,Suppliers_id)values
									   ('$Product_Name','$Categories_id','$product_price','$comment','$suppler_id')";
										                          $result = mysqli_query($con,$sql);
}


	$id_Suppliers=$_SESSION["Supp_id"];
//השאילתה מחזירה את שם הספק מטבלת הספקים לאחר השווה במספר ספק
$sql = "SELECT Suppliers_name from suppliers WHERE Suppliers_id='$id_Suppliers'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_assoc($result);
			//שמירת התוצאה בסשין
			$_SESSION["name"]=$row['Suppliers_name'];


			

?>















