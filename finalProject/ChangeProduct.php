<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>


table{
    border: 1px solid black;
	width:90%;
	max-height:590px;
	text-align:center;
	margin:auto;
	font-size:27px;
	//overflow:auto;
}

table, th , td{
    height:85px;
}

table, th, td {
    border: 1px solid black;
}

/*

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
}*/
.tblrow:hover{
	background-color:deepskyblue;
	cursor:pointer;
}

#deletEedit{
	
	display:none;
	position: fixed;
	margin-left: auto;
	margin-right: auto;
	left: 0;
	right: 0;
	top:175px;
	text-align: center;
	
	border:3px solid black;
	background-color:white;
	width:250px;
	
	
	background-color:white;
	
	border-radius:5px;
	

	
}
#deletEedit button{
	
	/*text-align: center;
	position:relative;
	left:20px;
	cursor:pointer;
	background-color:white;
	border:1px solid black;
	padding:4px;
	border-radius:4px;*/
	
}

#deleteProduct{
	
	float:left;
	margin:10px;
	border:none;
	display:block;
	background-color:transparent;
	
	font-size:27px;
	
	border:1px solid black;
	padding:7px;
	border-radius:3px;
	color:deepskyblue;

	
}

#deleteProduct:hover{
	cursor:pointer;
	background-color:transparent;
	color:Tomato;
}


.links{
	
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
	position: relative;
	left: 67px;
	width:200px;
	
}

.links:hover{
	background-color:RoyalBlue;
	color:white;
}

#exitnew{
	
	display:block;
	float:right;
	border:none;
	font-size:27px;
	background-color:transparent;
	margin:7px;
	
}

#exitnew:hover{
	
	font-weight:bold;
	cursor:pointer;
	color:Tomato;
	
}

</style>
</head>
<body>

<a class="links" href="suppliers.php">To The Supplier page</a>
<br><br>

<!--  דיב המכיל בתוכו הודעה על מחירת מוצר שהספק רוצה /-->
	<div id="deletEedit">
		
	<!--ליציאה מההודעה X כפתור /-->	
		<button type="button" id="exitnew">X</button>
		<br>
	<!--למחיקת המוצר Yse כפתור /-->
		<p style="text-align:left;margin-left:17px; margin-top:25px;font-size:19px">if you want to Delete the product click yes.</p>
		<button type="button" id="deleteProduct">Yse</button>
		
	<!--	<button id = "exit">X</button> -->

	</div>

	
</body>
</html>
<?php

include 'sql.php';
session_start();
if(empty($_SESSION["Supp_id"])){
	header("location: Login.php");
		exit();
							   }
else{		
				$Supp_id = $_SESSION["Supp_id"];

//echo $Supp_id;

//השאילתה מחזירה את כל פירטי המוצרים מספק (המשתמש) 
$sql = "SELECT * from products WHERE Suppliers_id='$Supp_id'";
		$result = mysqli_query($con,$sql);
		

if ($result->num_rows > 0) {
	
	//echo '<script> let x = $row["Products_id"]; </script>';
	
	//הצגת כל פירטי המוצר מספק ספציפי לאחר חזרה מהשאילתה
    echo "<table id='tbl'><tr><th>Products name</th><th>Price</th></th><th>Description</th><th>Products_id</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr class='tblrow'><td>" . $row["Products_name"]. "</td><td>" . $row["Price"]. "</td><td>" . $row["Description"]. "</td><td>" . $row["Products_id"]. "</td></tr>";
    }

    echo "</table>";
	
} else {
    echo "0 results";
}




	echo "<script>
	
	
	
		/*let d = document.getElementById('deleteProduct');
			d.addEventListener('click',function(str){
			

	          var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
					  
					  
					console.log(this.responseText);
					
					//document.getElementById('above').innerHTML = this.responseText;
                  }
              };

              xmlhttp.open('POST', 'UpdateProduct.php?Delete=' + str, true);
              xmlhttp.send();
      
		},false);*/
		
		/*var elements = document.getElementsByClassName('tblrow');
		
		var myFunction = function() {
			document.getElementById('deletEedit').style.display = 'block';
		};

		for (var i = 0; i < elements.length; i++) {
			elements[i].addEventListener('click', myFunction, false);
		}*/
		
		/*let tlb = document.getElementById('tbl');
		console.log(tlb.rows.length);
		console.log(tlb.rows[0].cells.length);
													
		for(var i = 1; i < tlb.rows.length; i++) {
		for(var j = 0; j < tlb.rows[i].cells.length; j++) {
		tlb.rows[i].cells[j].addEventListener('click',function(){
		let id = this.innerText;
		console.log(id);
		});					
		}
		}*/
		
					
					
					
					/* של כל טבלת המוצרים  idמקבל את ה tlb*/
					/*addEventListener לאחר מכן הופך כל שורה ללחיצה על ידי הוספת */
					
					let tlb = document.getElementById('tbl');
					for(var i = 1; i < tlb.rows.length; i++) {
					tlb.rows[i].addEventListener('click',function(){
					let id = this.cells[3].innerText;
					console.log(id);
					

					/* מציג את ההודעה על אפשרות מחיקה של המוצר עלו לחץ המשתמש display = 'block'*/
					/*בכדי למחוק את המוצר המבוקש addEventListener באמצעות yes מוסיף לחיצה על כפתור */
					
					document.getElementById('deletEedit').style.display = 'block';
					document.getElementById('deleteProduct').addEventListener('click',function(){
			

					  var xmlhttp = new XMLHttpRequest();
					  xmlhttp.onreadystatechange = function() {
						  if (this.readyState == 4 && this.status == 200) {  
							console.log(this.responseText);
							//document.getElementById('above').innerHTML = this.responseText;
							location.reload();
							
							//document.getElementById('tbl').innerHTML = this.responseText;
							
							document.getElementById('deletEedit').style.display = 'none';
							
						  }
					  };
						/*שליחה לעמוד עדכון מוצר לאחר שהמשתמש רוצה למחוק את המוצר המבוקש */

					  xmlhttp.open('POST', 'UpdateProduct.php?Delete=' + id, true);
					  xmlhttp.send();
			  
					  },false);
					
					
					});					
					}
					
					/*ליציאה מהודעת מחיקת מוצר  X לחצן*/
					/*display = 'none' העלמת הודעה על מחיקת מוצר באמצעות */
					
					document.getElementById('exitnew').addEventListener('click',function(){
						document.getElementById('deletEedit').style.display = 'none';
					});
					
		
		
	  
		</script>";
		
		
		

}

?>