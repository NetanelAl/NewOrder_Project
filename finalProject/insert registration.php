<?php

include 'sql.php';
/*בודק אם יש שדה ריק בימדה וכן המשתמש יוחזר לעמוד ההרשמה*/
if(empty( $_POST['password'] and ($_POST['password_1']) and ($_POST['username']) and ($_POST['how_I']) and ($_POST['email']) and ($_POST['prefixespon']) and ($_POST['phone'] )) )
	{		
	header("location: registration.php");
		exit();
		}	
if(isset($_POST['username'], $_POST['password'],$_POST['password_1'], $_POST['how_I'], $_POST['email'],$_POST['prefixespon'],$_POST['phone'],$_POST['Address']))
{
	/*בודק אם הסיסמא זהה לאימות סיסמא*/
	if($_POST['password']!=$_POST['password_1'])	
	{		
	header("location: registration.php");
		exit();
		}
	
				$user = $_POST['username'];
				$pass = $_POST['password'];
				$how_I = $_POST['how_I'];
				$email = $_POST['email'];
				$Address = $_POST['Address'];
				$lise=$_POST['prefixespon'].$_POST['phone'];
		//מחזיר את חלק המחרוזת המכיל רק התווים שצוינו
      $r = preg_replace("/[^a-zA-Z0-9]+/", "", $email);
				
	}
	else
		{		
	header("location: registration.php");
		exit();
		}
		
			//Busines
	if(!strcmp($how_I,"Busines"))
		{
		/*מכניס את נתוני המשתמש לדטה בייס*/
	$sql = "insert into business (Business_name,Password,Address,email,phone)values
									('$user','$pass','$Address','$email','$lise')";
													$result = mysqli_query($con,$sql);
													
													
													
										
													
					
	
		/*יצירה של טבלה אישית אשר תשמש את המשתמש להזמנת מוצרים*/
		$sql = "CREATE TABLE $r(
         id INT(10) NOT NULL AUTO_INCREMENT,
         Business_id INT(10) NOT NULL,
		 Products_id INT(10) NOT NULL,
		 Suppliers_id INT(10) NOT NULL,
		 Price INT(10) NOT NULL,
		 quantity DOUBLE(7, 3) NOT NULL,
		 Categories_id INT(10) NOT NULL,
		 Products_Name VARCHAR(50) NOT NULL,
         PRIMARY KEY (id),
		 
		 FOREIGN KEY (Products_id) REFERENCES products(Products_id)
		 
		 ON DELETE CASCADE
         )";
		 
		 $result = mysqli_query($con,$sql);
		
		 session_start();
		 $_SESSION["name_table"]=$r;
			 //Categories_id
			 //Products_Name
																
																	header("location: Login.php");
																	exit();
																					
																					}
																					
	//Supplier																				
	else if(!strcmp($how_I,"Supplier")){	
		if(!empty($_POST['Min_order'])){
			$min_order=$_POST['Min_order'];
		
	$sql = "SELECT * from suppliers WHERE Email='$email'";
		$res = mysqli_query($con,$sql);
		if(mysqli_num_rows($res)==0){
		
		/*מכניס את נתוני המשתמש לדטה בייס*/
	$sql = "insert into suppliers (Suppliers_name,Password,Address,Phone,Email,Minimum_order)values
									   ('$user','$pass','$Address','$lise','$email','$min_order')";
										                          $result = mysqli_query($con,$sql);
																  
		/* $sql = "CREATE TABLE $r(
         id INT(10) NOT NULL AUTO_INCREMENT,
         word VARCHAR(32) NOT NULL,
         PRIMARY KEY (id)
         )";
		 $result = mysqli_query($con,$sql);		*/												  
													header("location: Login.php");
													exit();	

													

														}
														
																			 else
																					{
																			header("location: registration.php");
																							exit();
																					}
								}			
			else {
				header("location: registration.php");
					exit();
				}
				
				
				
		}	


 
 else
	 echo mysqli_error($con);
	


/*else
	{		
	 header("location: registration.php");
	 exit();
	}*/
	
mysqli_close($con);
?>








