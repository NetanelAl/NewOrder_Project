

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

#conteiner{
	display:grid;
	grid-template--column:repeat(12,1fr);
	grid-auto-rows:minmax(35px,auto);
	grid-gap:10px;
	//padding:5px;
	max-width:87%;
	height:580px;
	margin:auto;
	border:1px solid skyblue;
	//border-bottom:3px solid skyblue;
	margin-top:21px;
	padding:5px;
	background-color:white;
	position:relative;
	top:-7px;
}

#srutusbtn{
	display:grid;
	border:2px solid skyblue;
	
	grid-column:1/12;
	grid-row:1/2;
	
	height:210px;
}


#ordersTableDiv{
	
	border:0px solid skyblue;
	overflow:auto;
	
	grid-column:1/12;
	grid-row:2/3;
	
	height:350px;
}


.links{
	text-decoration:none;
	border:2px solid black;
	border-radius:5px;
	padding:5px;
	color:rgba(0,0,0);
	
	
}
.links:hover{
	//background:white;
	background:rgb(253,253,253)
}

table, th, td {
    border: 1px solid black;
}

.DeleteThisOrder:hover{
	background-color:snow;
	color:skyblue;
}

#deleteOrder{
	
	display:none;
	border:1px solid black;
	border-radius: 4px;
	width:250px;
	height:170px;
	text-align:center;
	color:rgb(65,65,65);
	font-size:21px;
	background-color:white;
	
	position: fixed;
	top: 43%;
	left: 50%;
  /* bring your own prefixes */
	transform: translate(-50%, -50%);
	
}

#newOrder{
	width:100%;
}




.spanbtn{
	
	border:2px solid black;
	padding:7px;
	display: inline-block;
	border-radius:3px;
	cursor:pointer;
	width:53px;
	
}
.spanbtn:hover{
	
	color:red;
	background-color:snow;
	
}
body{background:rgb(253,253,253);
	
}
</style>
</head>
<body>


	<div id="conteiner">
	
	<!-- דיב המכיל את כל הכפתורים על מצב סטטוס הזמנה/-->
		<div id="srutusbtn">
	<a class="links" href="business.php">Return to the Business Page</a>
	<button id="showAllOrders" 			style="cursor:pointer;" class="orderStatus">show AllOrders</button>
	<button id="showAcceptedOrder" 		style="cursor:pointer;" class="orderStatus">show Accepte dOrder</button>
	<button id="showDeclinedOrder" 		style="cursor:pointer;" class="orderStatus">show Declined Order</button>
	<button id="showNotYetDesidedOrder" style="cursor:pointer;"	class="orderStatus">show Not Yet Desided Order</button>
	</div>
	
	<div id="deleteOrder">
		<P>By precing ok you delete all the accepted product from your orders</p>
		<span class="spanbtn" id="spanbtnOk">ok</span> <span class="spanbtn" id="spanbtnCancle">cancle</span>
	</div>
	
	<div id="ordersTableDiv">
<?php
	
//התחלת הסשין
include 'sql.php';
session_start();

//התחיל הסשין סטטוס בערך 0
$_SESSION["status"] = 0;

//Login בודק אם הסשינים מעודכנים במידה ולא מחזיר לעמוד 
if(empty($_SESSION["business_id"]) and ($_SESSION["name_table"]))
{
			header("location: Login.php");
     		exit();
}
else{
	
	/// if order ststuce == eccept || ststuce == decline ... this is the difult.
	//echo '<div id="ordersTableDiv">';	
	
	
	$business_id = $_SESSION["business_id"];
	//השאילתה מחזירה כל מספרי המספקים מטבלת ההזמנות שהעסק (המשתמש) ביצע מהם הזמנה וההזמנה במצב שהיא עוד לא הגיע לעסק(המשתמש) 
	$sql = "SELECT DISTINCT Suppliers_id from order3 WHERE  Business_id='$business_id' AND accepted != 'the delivery arrived'";
			
		$result = mysqli_query($con,$sql);


	//הצגת id יחיד לכל עסק
	if ($result->num_rows > 0) {
		//הצגת החזרה מהשאילתה ככפתור עלו רשום מספק הספק ממנו העסק ביצע הזמנה וממתים להגעת המוצר
		while($row = $result->fetch_assoc()) {  
			echo "<p class='cl' style='border:1px solid skyblue; cursor:pointer; width:100px; text-align:center;padding:10px; border-radius:7px;'>";
			echo  $row["Suppliers_id"] ."<br>";
			echo "</p>";
		}
		
	} else {
		echo "0 results"; 
	}
	//echo '</div>';

	}

?>

		</div>
	
	
	</div>
	


	<script>
	
		//style.display = "none"; ההודעה תירד בלי לשנות דבר על ידי cancle נמצא בהודעת על הגעת מוצר כאשר המשתמש ילחץ על cancle כפתור  addEventListener לפעיל על ידי cancle הפיכת כפתור 
		document.getElementById("spanbtnCancle").addEventListener("click",()=>{
			document.getElementById("deleteOrder").style.display = "none";
		});
		
		//ההודעה תירד ותתבצע שינוי בשאילתה שההזמנה הגיעה למשתמש (העסק)  ok נמצא בהודעה על הגעת מוצר כאשר המשתמש ילחץ על ok כפתור addEventListener לפעיל על ידי ok הפיכת כפתור 
		document.getElementById("spanbtnOk").addEventListener("click",()=>{
			document.getElementById("deleteOrder").style.display = "none";
			
			(function showOrderAcodintoStatus(x){
		
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200){
				//לאחר שליחה של נתונים לעמוד זה showOrderToTheClient מעמוד  ordersTableDiv מחזיר ערך ל
				document.getElementById('ordersTableDiv').innerHTML = this.responseText;
			
				
                }
            };
			//בכדי לשנות את הסטטוס ההזמנה להתקבלה אצל המשתמש(הספק)  showOrderToTheClient שליחת נתונים לעמוד 
              xmlhttp.open("GET", "showOrderToTheClient.php?deleteacepted=" + "true", true);
              xmlhttp.send();  
			  })();
			  
			  
			
		});
		
		
		
	
	

		// מוצא את כל כפתורי ההזמנות שהתקבל
		var lis = document.getElementById('ordersTableDiv').querySelectorAll('.cl');
		//עובר בלולאה על כל אלמנט ששיך לפונקציה ומוסיף לו אירוע מסוג לחיצה ומפעיל את הפונקציה שצוינה עם כל לחיצה
		lis.forEach(function(el){
		el.addEventListener('click',showOrderDitle,true);
		});
		
		//הפונציה המופעלת
		function showOrderDitle(e){
		//
		console.log(e);
		console.log(e.target);
		console.log(e.currentTarget);
		var inv;
		//אם סוג האלמנט אינו שווה ל 0
		if (typeof(e.target) != 'undefined' && e.target != null)
		{
			//מוצא את האלמנט
				var li = e.currentTarget;	
				//מוצא את הטקסט שבתוך האלמנט
				inv = li.innerText;
		}
		else{
			//מוצא את האירוע וכל הפרטים שלו כאוביקט
			inv = e;
		}
	
       var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200){
				 
				 //מציג את פרטי ההזמנה שהתקבל מהשרת
				 document.getElementById("ordersTableDiv").innerHTML = this.responseText;
				 
				// מוצא את על כפתורי ההזמנה התקבלה 
				var elementbtn = document.getElementById('ordersTableDiv').querySelectorAll('.DeleteThisOrder');
				
				//בלולאה מוסיף לכל כפתור וכפתור אירוע לחיצה
				elementbtn.forEach(function(el){
				el.addEventListener('click',()=>{
					//לאחר לחיצה מציג את חלון האישור הסופי
					document.getElementById("deleteOrder").style.display = "block";
					
				},true);
				});

					
                  }
              };
			  //שולח פרמטר עם הנתונים שנבחרו לשרת
              xmlhttp.open("GET", "showOrderToTheClient.php?showOrderDitle=" + inv, true);
              xmlhttp.send();  
      }
	  
	  
	  //מוצא כפתור סטטוס הזמנה
	  var userSelection = document.getElementsByClassName('orderStatus');
	  
	  
		//עובר בלולאה על כל כפתור סטטוס ומוסיף אירוע לחיצה
	  for(var i = 0; i < userSelection.length; i++) {
		  (function(index) {
			userSelection[index].addEventListener("click", function() {
				   showOrderAcodintoStatus(index);
			 })
		  })(i);
		}
	  
	  
	  //פונקצית אג'קס שמחזירה את כל ההזמנות ששיכות לאותו הסטטוס
	  function showOrderAcodintoStatus(x){
		
       var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200){
				//מחזיר את כל הכפתורים ששיכים לאוטו הסטטוס
				document.getElementById("ordersTableDiv").innerHTML = this.responseText;
				
				// מוצא כל כפתור וכפתור ששיך לסטוס
				var lis = document.getElementById('ordersTableDiv').querySelectorAll('.cl');
				// עובר בלולאה ומוסיף אירוע לכל כפתור ששיך לסטטוס
				lis.forEach(function(el){
				el.addEventListener('click',showOrderDitle,true);
				});

				
                  }
              };
			  
			  // שולח פרמטר עם התנונים שנבחרו לשרת
              xmlhttp.open("GET", "showOrderToTheClient.php?showOrderStatus=" + x, true);
              xmlhttp.send();  
      }
	  
	  //////////////////////////////////////////////////////////////////////////////////////
	  
	 /* function showOrderAcodintoStatus(x){
		
       var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("ordersTableDiv").innerHTML = this.responseText;
				
				var lis = document.getElementById('ordersTableDiv').querySelectorAll('.cl');
				lis.forEach(function(el){
				el.addEventListener('click',showOrderDitle,true);
				});

				
                  }
              };
              xmlhttp.open("GET", "showOrderToTheClient.php?showOrderStatus=" + x, true);
              xmlhttp.send();  
      }*/
	  
	  /////////////////////////////////////////////////////////////////////////////////////
		
	</script>
	
</body>
</html>

